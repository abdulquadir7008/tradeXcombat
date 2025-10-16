<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Carbon;
use App\Notifications\VerifyEmailNotification;
use App\Models\User;
 use App\Models\EmailOtp;
use App\Notifications\EmailOTPNotification;
use Illuminate\Support\Str;


class EmailVerificationController extends Controller
{

   
public function send(Request $request)

{
       $user = Auth::guard('api')->user();
       
    if($request->otp_type == 1){

    if ($user->email_verified_at) {
        return response()->json(['status' => false, 'message' => 'Email already verified.']);
    }

    $otp = rand(100000, 999999);

    // Save OTP to DB
    EmailOtp::updateOrCreate(
    ['user_id' => $user->id, 'type' => 1], // condition
    ['otp' => $otp, 'expires_at' => now()->addMinutes(10)] // values to update
);

    // Send email
    $user->notify(new EmailOTPNotification($otp));

    return response()->json(['status' => true, 'message' => 'OTP sent to email.']);

}
elseif($request->otp_type == 2){

     $otp = rand(100000, 999999);

    // Save OTP to DB
    EmailOtp::updateOrCreate(
    ['user_id' => $user->id, 'type' => 2], // condition
    ['otp' => $otp, 'expires_at' => now()->addMinutes(10)] // values to update
);

    // Send email
    $user->notify(new EmailOTPNotification($otp));

    return response()->json(['status' => true, 'message' => 'OTP sent to email.']);
}   

}
public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|numeric',
    ]);

    $user = Auth::guard('api')->user();

    $record = \App\Models\EmailOtp::where('user_id', $user->id)
        ->where('otp', $request->otp)
        ->where('expires_at', '>', now())
        ->first();

    if (! $record) {
        return response()->json(['status' => false, 'message' => 'Invalid or expired OTP.']);
    }

    $user->markEmailAsVerified();
    if ($record->type == 1) {
    $record->delete();
}
    return response()->json(['status' => true, 'message' => 'Email verified successfully.']);
}
    // ✅ Send the verification email
   

    // ✅ Verify the email from the link
    public function verify(Request $request)
    {
        $user = User::findOrFail($request->id);

        if (! URL::hasValidSignature($request)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid or expired verification link.'
            ], 403);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => false,
                'message' => 'Email already verified.'
            ]);
        }

        $user->markEmailAsVerified();

        event(new Verified($user));

        return response()->json([
            'status' => true,
            'message' => 'Email verified successfully.'
        ]);
    }
}
