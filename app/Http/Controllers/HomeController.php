<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WalletDeposit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $players = User::whereNull('role_id')
               ->orderBy('id', 'desc')
               ->take(5)
               ->get();
        $recentPendingDeposits = WalletDeposit::where('status', 'pending')
                ->where('transaction_type', 'deposit')
                ->whereHas('user', function ($q) {
                    $q->where('is_active', 1);
                })
                ->orderBy('id', 'desc')
                ->take(5)
                ->get();
        $recentPendingWithdrawals = WalletDeposit::where('status', 'pending')
                ->where('transaction_type', 'withdrawal')
                ->whereHas('user', function ($q) {
                    $q->where('is_active', 1);
                })
                ->orderBy('id', 'desc')
                ->take(5)
                ->get();


        $user_count = User::orderBy('id', 'desc')->count();
        return view('home' ,compact('user_count','players','recentPendingDeposits','recentPendingWithdrawals'));
    }
}
