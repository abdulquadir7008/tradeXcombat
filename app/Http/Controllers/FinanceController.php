<?php

namespace App\Http\Controllers;

use App\Models\CommissionLevels;
use App\Models\paymentMethodLimit;
use App\Models\ReferralCommission;
use App\Models\User;
use App\Models\WalletDeposit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class FinanceController extends Controller
{
    //
    public function payment_methods()
    {
        $paymentedit = array();
		$methods = paymentMethodLimit::orderBy('id', 'desc')->get();
        // dd($methods);
        return view('transactions.payment_methods',compact('methods','paymentedit'));
    }

     public function storepayment(Request $request): RedirectResponse
    {
        // dd($request);
        $this->validate($request, [
            'method_name' => 'required|string|max:50',
            'min_amount'   => 'required|numeric|min:0',
            'max_amount'   => 'required|numeric|gte:min_amount',
            'method_icon'  => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'required'
        ]);

		 $icon_path = null;


            if ($request->hasFile('method_icon')) {
                $file = $request->file('method_icon');
                $icon_path = $file->store('payment_method_icons', 'public');
            }

            // dd($icon_path);

		$payment = new paymentMethodLimit();
        $notification = 'Payment method created successfully';
        // dd($notification);

        $payment->method_name = $request->method_name;
        $payment->method_icon = $icon_path;
        $payment->min_amount = $request->min_amount;
        $payment->max_amount = $request->max_amount;
        $payment->status = $request->status;
        $payment->save();

        // dd($payment);

        return redirect()->route('paymentmethods')->with('success',$notification);
    }

    public function edit_payment($id): View
    {
        $paymentedit = paymentMethodLimit::find($id);
        $methods = paymentMethodLimit::orderBy('id', 'desc')->get();

        return view('transactions.payment_methods',compact('paymentedit','methods'));
    }
    public function storeeditpayment(Request $request, $id): RedirectResponse
    {
        // dd($request);
        $this->validate($request, [
            'method_name' => 'required|string|max:50',
            'min_amount'  => 'required|numeric|min:0',
            'max_amount'  => 'required|numeric|gte:min_amount',
            'method_icon' => 'nullable|file|mimes:jpg,jpeg,png',
            'status'      => 'required'
        ]);

        $payment = paymentMethodLimit::findOrFail($id);
        $notification = 'Payment method updated successfully';

        if ($request->hasFile('method_icon')) {
            $file = $request->file('method_icon');
            $icon_path = $file->store('payment_method_icons', 'public');
            $payment->method_icon = $icon_path;
        }

        $payment->method_name = $request->method_name;
        $payment->min_amount = $request->min_amount;
        $payment->max_amount = $request->max_amount;
        $payment->status = $request->status;
        $payment->save();

        return redirect()->route('paymentmethods')->with('success', $notification);
    }
    public function withdrawal_requests(Request $request)
    {
         $requests = WalletDeposit::
                        with('user')
                        ->orderBy('id', 'desc')
                        ->where('transaction_type', 'withdrawal')
                        ->latest()
                        ->paginate(10);
            // dd($requests);
        return view('transactions.list',compact('requests'));
            // ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function view_request($id){
         $request = WalletDeposit::
                        with('user')->find($id);
                        // dd($request);
         $wallet_balance = WalletDeposit::where('transaction_type', 'deposit')
            ->where('user_id', $request->user_id)
            ->where('status', 'approved')
            ->sum('amount');
        //  dd($wallet_balance);

        return view('transactions.view_request',compact('request','wallet_balance'));
    }
    // public function transactions(Request $request)
    // {
    //      $requests = WalletDeposit::
    //                     with('user','paymentMethod')
    //                     ->orderBy('id', 'desc')
    //                     // ->where('transaction_type', 'withdrawal')
    //                     ->latest()
    //                     ->paginate(10);
    //                     $totalTransactions = WalletDeposit::count();
    //         // dd($requests);
    //         $totaldeposit = WalletDeposit::where('transaction_type', 'deposit')
    //         ->where('status', 'completed')
    //         ->sum('amount');
    //         $totalwithdrawal = WalletDeposit::where('transaction_type', 'withdrawal')
    //         ->where('status', 'completed')
    //         ->sum('withdrawal_amount');
    //         // dd($totalwithdrawal);
    //     return view('transactions.total_list',compact('requests','totalTransactions','totaldeposit','totalwithdrawal'));
    //         // ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    public function transactions(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $query = WalletDeposit::with('user', 'paymentMethod')
            ->whereHas('user', function ($q) {
                $q->where('is_active', 1);
            })
            ->orderBy('id', 'desc');

        if ($filter === 'deposit') {
            $query->where('transaction_type', 'deposit');
        } elseif ($filter === 'withdrawal') {
            $query->where('transaction_type', 'withdrawal');
        }

        $requests = $query->get();

        $depositCount = WalletDeposit::where('transaction_type', 'deposit')
            ->whereHas('user', function ($q) {
                $q->where('is_active', 1);
            })->count();

        $withdrawalCount = WalletDeposit::where('transaction_type', 'withdrawal')
            ->whereHas('user', function ($q) {
                $q->where('is_active', 1);
            })->count();

        $totalTransactions = WalletDeposit::whereHas('user', function ($q) {
            $q->where('is_active', 1);
        })->count();

        $totaldeposit = WalletDeposit::where('transaction_type', 'deposit')
            ->where('status', 'completed')
            ->whereHas('user', function ($q) {
                $q->where('is_active', 1);
            })->sum('amount');

        $totalwithdrawal = WalletDeposit::where('transaction_type', 'withdrawal')
            ->where('status', 'completed')
            ->whereHas('user', function ($q) {
                $q->where('is_active', 1);
            })->sum('withdrawal_amount');

        return view('transactions.total_list', compact(
            'requests', 'totalTransactions', 'totaldeposit',
            'totalwithdrawal', 'filter', 'depositCount', 'withdrawalCount'
        ));
    }


    public function view_transaction($id){
        $request = WalletDeposit::with('user','paymentMethod')
            ->where(DB::raw('MD5(id)'), $id)
            ->first();
                        // dd($request);
         $wallet_balance = WalletDeposit::where('transaction_type', 'deposit')
            ->where('user_id', $request->user_id)
            ->where('status', 'completed')
            ->sum('amount');
        //  dd($wallet_balance);

        return view('transactions.approval',compact('request','wallet_balance'));
    }
    public function approveTransaction($id){
        // dd($id);
         $request = WalletDeposit::with('user','paymentMethod')
            ->where(DB::raw('MD5(id)'), $id)
            ->first();
            $request->status = "completed";

            $notification = "Transaction Approved Successfully";

            if($request->save()){
                // Commission Calculation
                if ($request->transaction_type === 'deposit') {
                    $user = $request->user;
                    $amount = $request->amount;
                    // dd($amount);

                    // $commissionRates = [
                    //     1 => 0.05,
                    //     2 => 0.025,
                    //     3 => 0.01
                    // ];

                    $commissionRates = CommissionLevels::pluck('commission_rate', 'level')->toArray();
                    // dd($commissionRates);

                    $currentUser = $user;

                    for ($level = 1; $level <= 3; $level++) {
                        if (!$currentUser->referred_by) {
                            break;
                        }

                        $referrer = User::find($currentUser->referred_by);
                        if (!$referrer) {
                            break;
                        }

                        $commissionAmount = $amount * $commissionRates[$level];
                        // dd($commissionAmount);

                        ReferralCommission::create([
                            'user_id' => $referrer->id,
                            'source_user_id' => $user->id,
                            'amount' => $commissionAmount,
                            'level' => $level,
                        ]);

                        $currentUser = $referrer;
                    }
                }
             return redirect()->back()->with('success',$notification);

            }
            return redirect()->back()->with('error', 'Approval failed.');


    }
     public function rejectTransaction($id){
        // dd($id);
         $request = WalletDeposit::with('user','paymentMethod')
            ->where(DB::raw('MD5(id)'), $id)
            ->first();
            // dd($request);
            $request->status = "rejected";
            // $request->save();
            $notification = "Transaction Rejected Successfully";
            if($request->save()){
             return redirect()->back()->with('success',$notification);

            }


    }
    public function playertransactions(Request $request, $id): View
    {
        $user = User::whereRaw('MD5(id) = ?', [$id])->firstOrFail();

        $filter = $request->query('filter');
        $query = WalletDeposit::with(['user', 'paymentMethod'])
            ->where('user_id', $user->id);

        if ($filter === 'pending') {
            $query->where('status', 'pending')->orderBy('id', 'desc');
        } elseif($filter === 'all') {
            $query->orderBy('id', 'desc');
        }

        $transactions = $query->paginate(10)->appends(['filter' => $filter]);

        return view('players.transactions', [
            'user' => $user,
            'transactions' => $transactions,
            'filter' => $filter,
        ]);
    }
    public function pending_transactions(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $query = WalletDeposit::with('user', 'paymentMethod')
                    ->where('status', 'pending')
                    ->whereHas('user', function ($q) {
                        $q->where('is_active', 1);
                    })
                    ->orderBy('id', 'desc');

        if ($filter === 'deposit') {
            $query->where('transaction_type', 'deposit');
        } elseif ($filter === 'withdrawal') {
            $query->where('transaction_type', 'withdrawal');
        }

        $requests = $query->paginate(10);

        // Count only pending deposits of active users
        $depositCount = WalletDeposit::where('transaction_type', 'deposit')
                                ->where('status', 'pending')
                                ->whereHas('user', function ($q) {
                                    $q->where('is_active', 1);
                                })
                                ->count();

        // Count only pending withdrawals of active users
        $withdrawalCount = WalletDeposit::where('transaction_type', 'withdrawal')
                                    ->where('status', 'pending')
                                    ->whereHas('user', function ($q) {
                                        $q->where('is_active', 1);
                                    })
                                    ->count();

        $totalTransactions = WalletDeposit::where('status', 'pending')
                                    ->whereHas('user', function ($q) {
                                        $q->where('is_active', 1);
                                    })
                                    ->count();

        return view('transactions.pending_list', compact(
            'requests', 'depositCount', 'withdrawalCount', 'totalTransactions', 'filter'
        ));
    }
   public function pending_all_transactions(Request $request): View
    {
        $typeFilter = $request->query('type');

        $query = WalletDeposit::with(['user', 'paymentMethod'])
            ->where('status', 'pending')
            ->whereHas('user');

        if (in_array($typeFilter, ['deposit', 'withdrawal'])) {
            $query->where('transaction_type', $typeFilter);
        }

        // $transactions = $query->orderBy('id', 'desc')
        //     ->paginate(10)
        //     ->appends(['type' => $typeFilter]);
        $transactions = $query->orderBy('id', 'desc')->get();

        return view('players.transactions', [
            'transactions' => $transactions,
            'filter' => $typeFilter . " Pending",
        ]);
    }








}
