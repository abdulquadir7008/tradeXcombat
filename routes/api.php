<?php

use App\Http\Controllers\RestApi\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApi\AuthController;
use App\Http\Controllers\RestApi\MasterController;
use App\Http\Controllers\RestApi\EmailVerificationController;
use App\Http\Controllers\RestApi\ReferralController;
use App\Http\Controllers\RestApi\WalletController;
use App\Http\Controllers\RestApi\GroupCombatController;

// Auth routes
Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
     Route::post('verify', 'verify');
      Route::get('profile', 'profile');
      Route::post('update', 'update');
      Route::post('forgetPassword', 'forgetPassword');
      Route::post('resetpassword', 'resetPasswordWithOtp');
      Route::post('changetheme', 'changetheme');
       Route::post('resendotp', 'resendotp');


});
Route::get('/tournaments', [MasterController::class, 'tournaments']);
Route::get('/playerstype', [MasterController::class, 'playerstype']);
Route::get('/combattypes', [MasterController::class, 'combattypes']);
Route::get('/countries', [MasterController::class, 'countries']);
Route::get('/timeslot', [MasterController::class, 'timeslot']);
Route::get('/entryamtdetails', [MasterController::class, 'entryamtdetails']);
Route::get('/getcombatdetails/{id}', [MasterController::class, 'getcombatdetails']);
 Route::get('/referralprograms', [MasterController::class, 'referralprograms']);
 Route::get('/currencies', [MasterController::class, 'currencies']);


// -------------------------------------------------------------------------
// FOREX GROUP COMBAT: PUBLIC LOOKUP ROUTES (No JWT required)
// -------------------------------------------------------------------------
Route::prefix('combats')->group(function () {
    Route::get('/', [GroupCombatController::class, 'index']);           // List active/upcoming combats
    Route::get('/{combat_id}', [GroupCombatController::class, 'show']);  // Show details
    Route::get('/{combat_id}/leaderboard', [GroupCombatController::class, 'getLeaderboard']); // Show leaderboard
});


// Protected routes (require JWT)
Route::middleware(['jwt'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
        Route::post('change-password', 'changePassword');
    });

// -------------------------------------------------------------------------
    // FOREX GROUP COMBAT: PROTECTED ACTION ROUTES (JWT required)
    // -------------------------------------------------------------------------
    Route::prefix('combats')->group(function () {
        Route::post('/{combat_id}/join', [GroupCombatController::class, 'joinCombat']);
        Route::post('/{combat_id}/trades', [GroupCombatController::class, 'submitTrade']);
        Route::put('/{combat_id}/trades/{trade_id}/close', [GroupCombatController::class, 'closeTrade']);
    });
    Route::post('send-email-verification', [EmailVerificationController::class, 'send']);
});


Route::get('/email/verify', [EmailVerificationController::class, 'verify'])->name('verify.email')->middleware('signed');
Route::middleware(['jwt'])->group(function () {
    Route::post('send-email-otp', [EmailVerificationController::class, 'send']);
    Route::post('verify-email-otp', [EmailVerificationController::class, 'verifyOtp']);
});
Route::controller(WalletController::class)->group(function () {
    Route::post('wallet_deposit', 'wallet_deposit');
    Route::post('withdrawal_request', 'withdrawal_request');
    Route::post('transaction_list', 'transaction_list');
    Route::get('payment_methods', 'payment_methods');
    Route::post('scan_pay/recognize-qr', 'scan_and_pay');
    Route::get('usdt_accounts', 'get_usdt_accounts');
});

Route::controller(AdminController::class)->group(function () {
    Route::post('create_payment_method', 'create_payment_method');

});
Route::controller(ReferralController::class)->group(function () {
    Route::get('referral', 'get_referral');

});
