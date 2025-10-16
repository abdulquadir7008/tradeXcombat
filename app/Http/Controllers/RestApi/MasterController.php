<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournaments;
use App\Models\Playersvs;
use App\Models\referralprogram;
use App\Models\timeslot;
use App\Models\currencie;
use App\Models\Combattypes;
use App\Models\countrie;
use App\Models\entryamount;
use App\Models\challenge;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use App\Models\EmailOtp;
use App\Notifications\EmailOTPNotification;
use Illuminate\Support\Facades\Validator;
 


class MasterController extends Controller
{

   public function tournaments()
{
   $tournaments = Tournaments::where('is_active', 1)->get();

    return response()->json([
        'status' => true,
        'message' => 'tournaments fetched successfully',
        'response' => $tournaments
    ]);
}
 public function playerstype()
{
   $players = Playersvs::where('is_active', 1)->get();

    return response()->json([
        'status' => true,
        'message' => 'players type fetched successfully',
        'response' => $players
    ]);
}
 public function combattypes()
{
    $combatTypes = Combattypes::where('is_active', 1)->get();

    $combatTypes->transform(function ($combat) {
        $combat->icon_url = $combat->icon
            ? asset('storage/app/public/' . $combat->icon)
            : null;
        return $combat;
    });

    return response()->json([
        'status' => true,
        'message' => 'Combat types fetched successfully',
        'response' => $combatTypes
    ]);
}
public function getcombatdetails($id)
{
    $combatId = (int) $id;

    // Get combat type info (for maincolor and subcolor)
    $combatType = Combattypes::select('maincolor', 'subcolor')->find($combatId);

    if (!$combatType) {
        return response()->json([
            'status' => false,
            'message' => 'Combat type not found',
            'response' => null
        ], 404);
    }

    // Get tournaments that use this combat_id
    $tournaments = Tournaments::where('combat_id', $combatId)->get();

    // Add icon_url, maincolor, subcolor to each tournament
    $tournaments->transform(function ($tournament) use ($combatType) {
        $tournament->icon_url = $tournament->icon
            ? asset('storage/app/public/' . $tournament->icon)
            : null;
        $tournament->maincolor = $combatType->maincolor;
        $tournament->subcolor = $combatType->subcolor;
        return $tournament;
    });

    // Get player vs types records that match this combat_id
    $playerVsTypes = Playersvs::where('combat_id', $combatId)->get();

    return response()->json([
        'status' => true,
        'message' => 'Combat details fetched successfully',
        'response' => [
            'tournaments' => $tournaments,
            'player_vs_types' => $playerVsTypes
        ]
    ]);
}

 public function timeslot()
{
   $timeslot = timeslot::where('is_active', 1)->get();

    return response()->json([
        'status' => true,
        'message' => 'timeslot fetched successfully',
        'response' => $timeslot
    ]);
} public function referralprograms()
{
   $referral = referralprogram::where('is_active', 1)->get();

    return response()->json([
        'status' => true,
        'message' => 'referral programs fetched successfully',
        'response' => $referral
    ]);
}
 public function currencies()
{
   $currencie = currencie::get();

    return response()->json([
        'status' => true,
        'message' => 'currencie fetched successfully',
        'response' => $currencie
    ]);
}
 public function countries()
{
   $countries = countrie::get();

    return response()->json([
        'status' => true,
        'message' => 'countries fetched successfully',
        'response' => $countries
    ]);
}

public function entryamtdetails(Request $request)
{
    
    $user = auth('api')->user();   

    if (!$user) {
        return response()->json([
            'status'  => false,
            'message' => 'Invalid or expired token.',
        ], 401);
    }

    // 2. Fetch the supporting data.
    $entryamount = EntryAmount::where('is_active', 1)->get();
    $timeslot    = TimeSlot::where('is_active', 1)->get();
    $challenges  = Challenge::where('is_active', 1)->get();

    // 3. Return everything, including wallet balance.
    // return response()->json([
    //     'status'         => true,
    //     'message'        => 'Entry amount fetched successfully.',
    //     'wallet_balance' => $user->wallet_balance,  // <- from users table
    //     'entryamount'    => $entryamount,
    //     'timeslot'       => $timeslot,
    //     'challenges'     => $challenges,
    // ]);

      return response()->json([
         'status'         => true,
         'message'        => 'Entry amount fetched successfully.',
        'response' => [
            'wallet_balance' => $user->wallet_balance ?? 0,
            'entryamount'    => $entryamount,
            'timeslot'       => $timeslot,
            'challenges'     => $challenges,
        ]
    ]);
}
}
