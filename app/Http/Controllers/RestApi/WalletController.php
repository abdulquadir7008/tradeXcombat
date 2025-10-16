<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WalletDeposit;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WalletDepositResource;
use App\Models\paymentMethodLimit;
use App\Models\ReferralCommission;
use App\Models\UsdtAccounts;
use App\Models\withdrawalRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

class WalletController extends Controller
{
    //
    public function wallet_deposit(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'deposit_method_id'   => 'required|string',
        'sub_method_id'       => 'required|string',
        'amount'              => 'required|numeric|min:1',
        'currency'            => 'required|string|in:USDT,BTC,ETH,USD',
        'converted_amount'    => 'required|numeric|min:1',
        'converted_currency'  => 'required|string|in:USD,AED,EUR',
        'wallet_address'      => 'required|string',
        'receiptFileUrl'      => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
     ]);

        if ($validator->fails()) {
            return response()->json([
                'status' =>false,
                'errors' => $validator->errors()], 200);
        }
        $user = auth('api')->user();
        // dd($user);
         if (!$user) {
            return response()->json([
                'status' =>false,
                'error' => 'Unauthenticated or invalid token'], 200);

        }

        $receipt_path = null;
        if ($request->hasFile('receiptFileUrl')) {
            $receipt = $request->file('receiptFileUrl');
            $receipt_path = $receipt->store('wallet_receipt', 'public');
        }



     // Save to DB
        $wallet = WalletDeposit::create([
            'user_id'             => $user->id,
            'deposit_method_id'   => $request->deposit_method_id,
            'sub_method_id'       => $request->sub_method_id,
            'amount'              => (float) $request->amount,
            'currency'            => $request->currency,
            'converted_amount'    => (float) $request->converted_amount,
            'converted_currency'  => $request->converted_currency,
            'wallet_address'      => $request->wallet_address,
            'receiptFileUrl'        => $receipt_path,
            'status'              => 'pending',
            'transaction_type' => 'deposit'
        ]);



        return response()->json([
            'message' => 'Wallet deposit request submitted successfully',
            'status' => true,
            'response' => new WalletDepositResource($wallet)
        ], 200);

    }
    public function withdrawal_request(Request $request){
        // dd($request);
         $user = auth('api')->user();
         if (!$user) {
            return response()->json([
                 'status' =>false,
                'error' => 'Unauthenticated or invalid token'], 200);

        }
         $validator = Validator::make($request->all(), [
            'withdrawal_method_id'         => 'required|integer|exists:payment_methods,id',
            'withdrawal_amount' => 'required|numeric|min:1',
            'recipient_acc_no'  => 'required|string|max:150',
            'additional_info'   => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }
        $limit = paymentMethodLimit::where('id', $request->withdrawal_method_id)->first();

        if (!$limit) {
            return response()->json([
                'status' => false,
                'message' => 'Withdrawal method not found'
            ], 200);
        }

        // dd($request->withdrawal_amount);

        if ($request->withdrawal_amount < $limit->min_amount || $request->withdrawal_amount > $limit->max_amount) {
            return response()->json([
                'status' => false,
                'message' => 'Withdrawal amount must be between ' . $limit->min_amount . ' and ' . $limit->max_amount,
            ], 200);
        }
            // $hasPending = WalletDeposit::where('user_id', $user->id)
            //     ->where('transaction_type', 'withdrawal')
            //     ->where('withdrawal_status', 'pending')
            //     ->exists();

            // if ($hasPending) {
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'You already have a pending withdrawal request.',
            //     ]);
            // }
            // dd($user->id);
         $approvedBalance = WalletDeposit::where('user_id', $user->id)
            ->where('transaction_type', 'deposit')
            // ->where('status', 'approved')
            ->sum('amount');

            // dd( $approvedBalance);

        if ($request->withdrawal_amount > $approvedBalance) {
            return response()->json([
                'status' => false,
                'message' => 'Insufficient wallet balance. Available: ' . $approvedBalance,
            ], 200);
        }
        $withdrawal =  WalletDeposit::create([
        'user_id'          => $user->id,
        'withdrawal_method_id' => (float)$request->withdrawal_method_id,
        'withdrawal_amount'           =>(float) $request->withdrawal_amount,
        'recipient_acc_no' => (float) $request->recipient_acc_no,
        'additional_info'  => $request->additional_info,
        'status'           => 'pending',
        'transaction_type' => 'withdrawal'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Your withdrawal request has been submitted.',
            'response' => [
                'id' => $withdrawal->id,
                'user_id'          => $user->id,
                'withdrawal_method_id' => $withdrawal->withdrawal_method_id,
                'withdrawal_amount' => $withdrawal->withdrawal_amount,
                'recipient_acc_no' => $withdrawal->recipient_acc_no,
                'additional_info'  => $withdrawal->additional_info,
                'status'  =>  $withdrawal->status,
                'transaction_type' =>  $withdrawal->transaction_type
            ]
        ], 200);


    }

    public function payment_methods(){
    $user = auth('api')->user();

    if (!$user) {
        return response()->json([
            'status' => false,
            'error'  => 'Unauthenticated or invalid token'
        ], 200);
    }

    $methods = paymentMethodLimit::where('status', 1)->get();

    $response = [];

    foreach ($methods as $method) {
        $response[] = [
            'id'           => $method->id,
            'method_id'    => $method->method_id,
            'method_icon'  => $method->method_icon
                ? asset('storage/app/public/' . $method->method_icon)
                : null,
            'method_name'  => $method->method_name,
            'min_amount'   => (float) $method->min_amount,
            'max_amount'   => (float) $method->max_amount,
            'status'       => (int) $method->status,
        ];
    }

    return response()->json([
        'status'  => true,
        'message' => 'Payment Methods fetched successfully.',
        'response'=> $response
    ], 200);
}

    public function transaction_list(Request $request)
    {
        //  dd($request);
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'status' =>false,
                'error' => 'Unauthenticated'], 401);
        }

        $status     = $request->input('filters.status', []);
        $types      = $request->input('filters.type', []);
        $startDate  = $request->input('filters.startDate', null);
        $endDate    = $request->input('filters.endDate',null);
        $page       = $request->input('pagination.page', 1);
        $limit      = $request->input('pagination.limit', 20);
        // $startDate  = $request->input('filters.startDate', null);
        // dd($startDate, $endDate);
        $start = $startDate ? date("Y-m-d H:i:s", strtotime($startDate)) : null;
        $end   = $endDate ? date("Y-m-d H:i:s", strtotime($endDate)) : null;
        // dd($start, $end);



        $query = WalletDeposit::with('paymentMethod')->where('user_id', $user->id);

        if (!empty($status)) {
            $query->whereIn('status', $status);
        }

        if (!empty($types)) {
            $query->whereIn('transaction_type', $types);
        }

        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }
        elseif ($start && !$end) {
            $query->where('created_at', '>=', $start);
        } elseif (!$start && $end) {
            $query->where('created_at', '<=', $end);
        } else {
            $query->where('created_at', '<=', now());
        }

        $paginator = $query->orderBy('created_at', 'desc')
            ->paginate($limit, ['*'], 'page', $page);

        $transactions = $paginator->items();

        $formatted = array_map(function ($txn) {
             $iconPath = $txn->paymentMethod->method_icon ?? null;
            return [
                'transactionId' => 'TXN_' . strtoupper($txn->currency) . '_' . strtoupper($txn->transaction_type) . '_' . str_pad($txn->id, 3, '0', STR_PAD_LEFT),
                'type'          => $txn->transaction_type,
                'amount' => (float) ($txn->converted_amount ?? $txn->withdrawal_amount),
                'icon'          => $iconPath ? asset('storage/app/public/' . $iconPath) : null,

                'currency'      => $txn->converted_currency,
                'timestamp'     => Carbon::parse($txn->created_at)->toIso8601String(),
                'status'        => $txn->status ?? $txn->withdrawal_status ?? null,
            ];
        }, $transactions);

        return response()->json([
            'status' => true,
            'message' => 'Transaction list fetched successfully',
            'response' => $formatted,
            'pagination' => [
                'page'         => $paginator->currentPage(),
                'limit'        => $paginator->perPage(),
                'totalRecords' => $paginator->total(),
                'totalPages'   => $paginator->lastPage(),
            ]
        ]);
    }

     public function scan_and_pay(Request $request){
        $user = auth('api')->user();
        if (!$user) {
            return response()->json([
                'status' =>false,
                'error' => 'Unauthenticated'], 200);
        }

        // $barcode = Crypt::decryptString($request->input('encrypted_barcode'));
        // $targetUser = User::where('barcode_id', $barcode)->first();
         $hashedBarcode = $request->input('encrypted_barcode');
        $targetUser = User::whereRaw('MD5(barcode_id) = ?', [$hashedBarcode])->first();

        if (!$targetUser) {
            return response()->json([
                'status' => false,
                'message' => 'QR Code not found.'
            ], 200);
        }

        if ($targetUser->is_active != 1) {
            return response()->json([
                'status' => false,
                'message' => 'User is not active.'
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'Scanner user details fetched successfully.',
            'response' => [
                'wallet_id'  => $request->input('encrypted_barcode'),
                'user_id'   => $targetUser->id,
                'name'           => $targetUser->name,
                'profile_image'  => $targetUser->profile_image ? asset('storage/app/public/' . $targetUser->profile_image) : null,
            ]
        ]);

    }
    public function get_usdt_accounts(){
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'error'  => 'Unauthenticated or invalid token'
            ], 200);
        }

        $accounts = UsdtAccounts::where('status', 1)->get();

        $response = [];

        foreach ($accounts as $account) {
            $response[] = [
                'id'           => $account->id,
                'name'         =>$account->name,
                'conversion_rate' => (float)($account->conversion_rate),
                'status'        => $account->status
            ];
        }

        return response()->json([
            'status'  => true,
            'message' => 'Usdt accounts fetched successfully.',
            'response'=> $response
        ], 200);

    }

}
