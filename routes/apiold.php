<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestApi\AuthController;
use App\Http\Controllers\RestApi\MasterController;
use App\Http\Controllers\RestApi\EmailVerificationController;

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




// Protected routes (require JWT)
Route::middleware(['jwt'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
        Route::post('change-password', 'changePassword');
    });

    
    Route::post('send-email-verification', [EmailVerificationController::class, 'send']);
});


Route::get('/email/verify', [EmailVerificationController::class, 'verify'])->name('verify.email')->middleware('signed');
Route::middleware(['jwt'])->group(function () {
    Route::post('send-email-otp', [EmailVerificationController::class, 'send']);
    Route::post('verify-email-otp', [EmailVerificationController::class, 'verifyOtp']);
});