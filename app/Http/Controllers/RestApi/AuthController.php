<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use App\Models\EmailOtp;
use App\Notifications\EmailOTPNotification;
use Illuminate\Support\Facades\Validator;
 use Carbon\Carbon;
use Google_Client;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class AuthController extends Controller
{
//    public function register(Request $request)
// {
//     $validated = $request->validate([
//         'name' => 'required|string',
//         'email' => 'required|email|unique:users',
//         'password' => 'required|confirmed|min:6'
//     ]);

//     $user = User::create([
//         'name' => $validated['name'],
//         'email' => $validated['email'],
//         'password' => Hash::make($validated['password'])
//     ]);

//     // issue token using api guard
//     $token = auth('api')->login($user);

//     DB::table('user_tokens')->insert([
//         'user_id'    => $user->id,
//         'token'      => $token,
//         'created_at' => now()
//     ]);

//     return response()->json([
//         'message' => 'registered successfully',
//         'status' => true,
//         'Response' => [
//             'access_token' => $token,
//             'token_type'   => 'bearer',
//             'expires_in'   => auth('api')->factory()->getTTL() * 60,
//             'id'           => $user->id,
//             'email'        => $user->email,
//         ]
//     ]);
// }
 public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        // 'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
        'referred_by' => 'nullable|string'
    ]);

  $user = User::where('email', $request->email)->first();

    if($user){
     return response()->json([
            'status' => false,
            'message' => 'Email already registered.'
        ], 200);
    }else{

        $referredById = null;
        // dd($request->referred_by);
        if (!empty($request->referred_by)) {
            $referrer = User::where('referral_code', $request->referred_by)
                ->where('is_active', 1)
                ->where('email_verify', 1)
                ->first();
                // dd($referrer);

            if (!$referrer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid referral code or user not active.'
                ], 200);
            }

            $referredById = $referrer->id;
            // dd($referredById);
        }



    $user = User::create([
        'name' => $validated['name'],
        'email' => $request->email,
        'email_verify' => 0,
        'password' => Hash::make($validated['password']),
        'referred_by' => $referredById
    ]);

    $hashed = substr(md5($user->id . now()), 0, 10);
    $barcodeId = 'BC' . strtoupper($hashed);
    do {
    $referralCode = strtoupper(Str::random(8)) . rand(100, 999);
    } while (User::where('referral_code', $referralCode)->exists());

    // dd($referralCode);

    $user->update([
        'barcode_id' => $barcodeId,
        'referral_code' => $referralCode,
    ]);

    // ? Issue token using API guard
    $token = auth('api')->login($user);

    DB::table('user_tokens')->insert([
        'user_id'    => $user->id,
        'token'      => $token,
        'created_at' => now()
    ]);

    // ? Generate a 6-digit OTP
    $otp = rand(100000, 999999);

    // ? Save OTP to the email_otps table
    EmailOtp::create([
        'user_id' => $user->id,
        'otp'     => $otp,
        'expires_at' => now()->addMinutes(10),
        'type' => 1
    ]);

    // ? Send OTP to user's email
    $user->notify(new EmailOTPNotification($otp));

    return response()->json([
        'message' => 'Registered successfully. OTP sent to email.',
        'status' => true,
        'response' => [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
            'id'           => $user->id,
            'email'        => $user->email,
            'email_verify'        => $user->email_verify,
            'profile_image' => $user->profile_image ? asset('storage/app/public/' . $user->profile_image) : null,
            'country' => $user->country ?? null,
            'bio' => $user->bio ?? null,
            //'barcode_id' => $user->barcode_id,
            'birth_date' => $user->birth_date
        ? Carbon::parse($user->birth_date)->format('Y-m-d\TH:i:s.000')
        : null,
        ]
    ]);
    }
}
// public function googleLogin(Request $request)
// {
//     $request->validate([
//         'idToken' => 'required|string'
//     ]);

//     $idToken = $request->input('idToken');

//     // Google client setup
//     $client = new Google_Client(['client_id' => 'YOUR_GOOGLE_CLIENT_ID']);
//     $payload = $client->verifyIdToken($idToken);

//     if ($payload) {
//         $email = $payload['email'];
//         $name = $payload['name'] ?? 'Gmail User';

//         // Create or find the user
//         $user = User::firstOrCreate(
//             ['email' => $email],
//             [
//                 'name' => $name,
//                 'password' => Hash::make(Str::random(16)), // random password
//                 'email_verified_at' => now(),
//             ]
//         );

//         // Create Laravel access token (e.g., Sanctum or Passport)
//         $token = $user->createToken('google_token')->plainTextToken;

//         return response()->json([
//             'status' => true,
//             'message' => 'Login successful',
//             'token' => $token,
//             'user' => $user
//         ]);
//     } else {
//         return response()->json([
//             'status' => false,
//             'message' => 'Invalid Google ID token'
//         ], 401);
//     }
// }


public function update(Request $request)
    {
        $token = JWTAuth::getToken();

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',

            'country'       => 'nullable|string|max:100',
            'bio' => 'nullable|string|max:65535'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'status'  => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = auth('api')->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated or invalid token'], 401);
        }

        $user->name = $request->name;
        $user->country = $request->country;
        $user->birth_date = $request->birth_date
            ? Carbon::createFromFormat('Y-m-d\TH:i:s.v', $request->birth_date)->format('Y-m-d H:i:s')
            : null;
        $user->bio = $request->bio;



        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $path = $image->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully.',
            'status'  => true,
            'response' => [
                'id'         => $user->id,
                'name'       => $user->name,
                'email'       => $user->email,
                'profile_image'  => $user->profile_image ? asset('storage/app/public/' . $user->profile_image) : null,
                // 'birth_date'   =>  $user->birth_date ? Carbon::parse($user->birth_date)->format('Y-m-d H:i:s') : null,
                'birth_date' => $user->birth_date
        ? Carbon::parse($user->birth_date)->format('Y-m-d\TH:i:s.000')
        : null,

                'country'      => $user->country,
                'bio'          => $user->bio,
                "email_verify" => $user->email_verify
            ]
        ]);
    }
  protected function respondWithToken($token)
{
    $user = auth('api')->user();

    return response()->json([
        'message' => 'loginned successfully',
        'status' => true,
        'response' => [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'id' => $user->id,
            'email' => $user->email,
            'email_verify' => $user->email_verify,
            'profile_image' => $user->profile_image ? asset('storage/app/public/' . $user->profile_image) : null,
            'country' => $user->country ?? null,
            'bio' => $user->bio ?? null,
            'birth_date' => $user->birth_date
        ? Carbon::parse($user->birth_date)->format('Y-m-d\TH:i:s.000')
        : null,

        ],
    ]);
}
public function changetheme(Request $request){

         $user = auth('api')->user();
         if (!$user) {
            return response()->json(['error' => 'Unauthenticated or invalid token'], 401);
        }
        $user->is_theme  = $request->is_theme;
        $user->save();

         return response()->json([
            'message' => 'Theme changed successfully.',
            'status'  => true,
            'response' => [
                'is_theme'  => $user->is_theme,
            ]
        ]);

    }
public function forgetPassword(Request $request)
{
    // $request->validate([
    //     'email' => 'required|email|exists:users,email',
    // ]);

    $user = User::where('email', $request->email)->first();

   if(!$user){

        return response()->json([
        'status' => false,
        'message' => 'invalid email.'
    ]);
    }
    $otp = rand(100000, 999999);


    EmailOtp::updateOrCreate(
        ['user_id' => $user->id, 'type' => 2],
        ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
    );


    $user->notify(new EmailOTPNotification($otp));

    return response()->json([
        'status' => true,
        'message' => 'OTP sent to your email for password reset.'
    ]);
}

public function resendotp(Request $request)
{

    if($request->type == 1){
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid email.'
        ]);
    }

    // Delete expired OTPs (optional: only for this user and type = 1)
    EmailOtp::where('user_id', $user->id)
        ->where('type', 1)
        ->where('expires_at', '<', now())
        ->delete();



    $otp = rand(100000, 999999);

    EmailOtp::updateOrCreate(
        ['user_id' => $user->id, 'type' => 1],
        ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
    );

    $user->notify(new EmailOTPNotification($otp));

    return response()->json([
        'status' => true,
        'message' => 'OTP sent to your email for password reset.'
    ]);
}
elseif($request->type == 2){
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid email.'
        ]);
    }

    // Delete expired OTPs (optional: only for this user and type = 1)
    EmailOtp::where('user_id', $user->id)
        ->where('type', 2)
        ->where('expires_at', '<', now())
        ->delete();



    $otp = rand(100000, 999999);

    EmailOtp::updateOrCreate(
        ['user_id' => $user->id, 'type' => 1],
        ['otp' => $otp, 'expires_at' => now()->addMinutes(10)]
    );

    $user->notify(new EmailOTPNotification($otp));

    return response()->json([
        'status' => true,
        'message' => 'OTP sent to your email for password reset.'
    ]);
}
}

public function resetPasswordWithOtp(Request $request)
{

    $user = User::where('email', $request->email)->first();


    // $otpRecord = EmailOtp::where('user_id', $user->id)
    //     ->where('type', 2)
    //     ->where('otp', $request->otp)
    //     ->where('expires_at', '>', now())
    //     ->latest()
    //     ->first();

    // if (!$otpRecord) {
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Invalid or expired OTP.'
    //     ], 422);
    // }

    // Update password
    $user->password = \Hash::make($request->new_password);
    $user->save();

    // Delete OTP
    // $otpRecord->delete();

    return response()->json([
        'status' => true,
        'message' => 'Password has been reset successfully.'
    ]);
}
public function verify(Request $request)
{

    if($request->type == 1){
     $validated = $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required|digits:6'
    ]);

    $user = User::where('email', $validated['email'])->first();


    $otpEntry = EmailOtp::where('user_id', $user->id)
                ->where('type', 1)
                ->where('otp', $validated['otp'])
                ->where('expires_at', '>', now())
                ->latest()
                ->first();

    if (!$otpEntry) {
        return response()->json([
            'message' => 'Invalid or expired OTP.',
            'status' => false
        ], 200);
    }


    $user->update(['email_verify' => 1]);


    $otpEntry->delete();

    return response()->json([
        'message' => 'Email verified successfully.',
        'status' => true
    ]);
    }elseif($request->type == 2){


        $validated = $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required|digits:6'
    ]);

    $user = User::where('email', $validated['email'])->first();


    $otpEntry = EmailOtp::where('user_id', $user->id)
                ->where('type', 2)
                ->where('otp', $validated['otp'])
                ->where('expires_at', '>', now())
                ->latest()
                ->first();

    if (!$otpEntry) {
        return response()->json([
            'message' => 'Invalid or expired OTP.',
            'status' => false
        ], 200);
    }


    // $user->update(['email_verify' => 1]);


    $otpEntry->delete();

    return response()->json([
        'message' => 'Email verified successfully.',
        'status' => true
    ]);
    }

}

    public function changePassword(Request $request){
            $user = auth('api')->user();
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:6|confirmed',
            ]);
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Current password is incorrect.'
                ], 200);
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Password changed successfully.'
            ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'status'=>false,
                'message' => 'Unauthorized user'], 200);
        }
        DB::table('login_logs')->insert([
            'user_id'       => auth('api')->id(),
            'token'         => $token,
            'ip_address'    => $request->ip(),
            'user_agent'    => $request->header('User-Agent'),
            'logged_in_at'  => now(),
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
        return $this->respondWithToken($token);
    }
 public function profile(Request $request){


        $user = auth('api')->user();
        $token = $request->bearerToken();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized',
                'status' => false
            ], 200);
        }
        if($user->is_active!= 1){
            return response()->json([
                'message' => 'User is not active',
                'status' => false
            ], 200);
        }
       // $hashed_barcodeid = Hash::make($user->barcode_id);
       // $encrypted_barcodeid = Crypt::encryptString($user->barcode_id);
        $hashed_barcodeid = md5($user->barcode_id);

        return response()->json([
            'message' => 'User profile fetched successfully.',
            'status' => true,
            'response' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'wallet_balance'=>$user->wallet_balance,
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'id'            => $user->id,
                'name'          => $user->name,
                'email'         => $user->email,
                'email_verify'  => $user->email_verify,
                'profile_image' => $user->profile_image ? asset('storage/app/public/' . $user->profile_image) : null,
                'country' => $user->country ?? null,
                'bio' => $user->bio ?? null,
                'barcode_id' => $hashed_barcodeid,

                'birth_date' => $user->birth_date
        ? Carbon::parse($user->birth_date)->format('Y-m-d\TH:i:s.000')
        : null,
            ]
        ]);

    }
    public function logout()
    {
        $token = JWTAuth::getToken();
        auth()->logout();
        DB::table('login_logs')
            ->where('token', $token)
            ->update([
                'logged_out_at' => now(),
                'updated_at'    => now()
            ]);
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out']);
    }
}
