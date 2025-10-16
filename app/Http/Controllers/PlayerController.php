<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\countrie;
use App\Models\ReferralCommission;
use App\Models\User;
use App\Models\WalletDeposit;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash as FacadesHash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        // $data = User::latest()->paginate(5);

        // return view('players.index',compact('data'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);

        $data = User::whereNull('role_id')->orderBy('id', 'desc')->get();
        $activeCount = User::whereNull('role_id')->where('is_active', 1)->count();
        $bannedCount = User::whereNull('role_id')->where('is_active', 2)->count();
            // $data = User::orderBy('created_at', 'desc')->paginate(5);


        return view('players.index2',compact('data','activeCount','bannedCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {


        $user = User::find($id);

        return view('users.show',compact('user'));
    }

    public function create_player(): View
    {


        return view('players.create');
    }
   public function store_player(Request $request)
{
    // Validate incoming request
    $request->validate([
        'name'           => 'required|string|max:255',
        'email'          => 'required|email|unique:users,email',
        'phone'          => 'required|string|max:20',
        'birth_date'     => 'nullable|date',
        'bio'            => 'nullable|string',
        'country'        => 'nullable|string|max:100',
        'profile_image'  => 'required|image|mimes:jpg,jpeg,png',
        'password' => 'required|string|min:6',
        'is_active'      => 'required|in:0,1',

    ]);

    // Create new User instance
    $user = new User();
    $user->name        = $request->name;
    $user->email       = $request->email;
    $user->phone       = $request->phone;
    $user->birth_date  = $request->birth_date;
    $user->bio         = $request->bio;
    $user->country     = $request->country;
     $user->is_active   = $request->is_active;

     if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $path = $image->store('profile_images', 'public');
                $user->profile_image = $path;
            }

    $user->password = FacadesHash::make($request->password);


    $user->save();

    return redirect()->route('players')->with('success', 'Player created successfully!');
}

    public function view_player($id): View
    {

        $user = User::whereRaw('MD5(id) = ?', [$id])->first();

        // return view('players.view',compact('user'));


        $summary = WalletDeposit::selectRaw("
                COUNT(*) as total_transactions,

                SUM(CASE
                    WHEN transaction_type = 'deposit' AND status = 'completed'
                    THEN amount
                    ELSE 0
                END) as total_deposit,

                SUM(CASE
                    WHEN transaction_type = 'withdrawal' AND status = 'completed'
                    THEN withdrawal_amount
                    ELSE 0
                END) as total_withdrawal,



                COUNT(CASE
                    WHEN status = 'pending'
                    THEN 1
                    ELSE NULL
                END) as pending_count
            ")
            ->where('user_id', $user->id)
        ->first();
        $recentPendingTransactions = WalletDeposit::where('user_id', $user->id)
        ->where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        $transactionHistory = WalletDeposit::with(['paymentMethod'])
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
        $referrals = User::where('referred_by',$user->id)
        ->orderBy('id', 'desc')
        ->get();

        // $referredUserIds = User::where('referred_by', $user->id)->pluck('id');

        $commissions = ReferralCommission::with('sourceUser')
            ->where('user_id', $user->id)
            // ->whereIn('source_user_id', $referredUserIds)
            ->orderBy('id', 'desc')
            ->get();


            // $referrerId = $user->id;

            // $referredUsers = User::where('referred_by', $referrerId)
            //     ->with(['commissionsAsSource' => function($q) use ($referrerId) {
            //         $q->where('user_id', $referrerId)
            //         ->orderBy('id', 'desc');
            //     }])
            //     ->orderBy('id', 'desc')
            //     ->get();



        return view('players.view', [
            'user' => $user,
            'totalTransactions' => $summary->total_transactions,
            'totalDeposit' => $summary->total_deposit,
            'totalWithdrawal' => $summary->total_withdrawal,
            'pending_transactions'=> $summary->pending_count,
            'recent_pending' => $recentPendingTransactions,
            'transaction_history' => $transactionHistory,
            'referrals' => $referrals,
            'commissions' => $commissions
        ]);
    }
    public function edit_player($id): View
    {
        //  $countries = countrie::get();

        $user = User::whereRaw('MD5(id) = ?', [$id])->first();
        // dd($user);

        return view('players.edit',compact('user'));
    }
     public function player_activate($id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $user->is_active = 1;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User activated successfully',
            'user' => $user
        ]);


    }
      public function player_deactivate($id)
    {

        $user = User::find($id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $user->is_active = 0;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User deactivated successfully',
            'user' => $user
        ]);


    }
    public function ban_player(Request $request)
    {
        // dd($request);

        $user = User::find($request->user_id);

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

        $user->is_active = 2;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User Banned successfully',
            'user' => $user
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    public function update_player(Request $request, $id): RedirectResponse
    {
        $user = User::whereRaw('MD5(id) = ?', [$id])->firstOrFail();

        // Validate the input
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . $user->id,
            'phone'          => 'required|string|max:20',
            'birth_date'     => 'nullable|date',
            'bio'            => 'nullable|string',
            'country'        => 'nullable|string|max:100',
            'profile_image'  => 'nullable|image|mimes:jpg,jpeg,png',
            'is_active'      => 'required|in:0,1',
        ]);

        // Update basic info
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->phone       = $request->phone;
        $user->birth_date  = $request->birth_date;
        $user->bio         = $request->bio;
        $user->country     = $request->country;
        $user->is_active   = $request->is_active;

        if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $path = $image->store('profile_images', 'public');
                $user->profile_image = $path;
            }
            if ($request->filled('password')) {
                $user->password = FacadesHash::make($request->password);
            }

        $user->save();

        return redirect()->back()->with('success', 'Player updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function delete_player(Request $request , $id)
    {
        $user = User::whereRaw('MD5(id) = ?', [$id])->firstOrFail();
        // dd($user);

        $user->delete();

        return redirect()->route('players')
            ->with('success', 'User account has been deleted successfully.');

    }
}
