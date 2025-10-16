<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\Models\ReferralCommission;
use App\Models\referralprogram;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    //
    public function get_referral(){
         $user = auth('api')->user();
         if (!$user) {
            return response()->json([
                 'status' =>false,
                'error' => 'Unauthenticated or invalid token'], 200);

        }
        $program = referralprogram::where('referral_type','deposit')->where('is_active',1)->first();
        // dd($program);
        if (!$program) {
        return response()->json([
            'status' => false,
            'message' => 'No active referral program found.'
        ], 200);
        }
        $referrals = $this->loadReferralTree($user);
        $commission = ReferralCommission::where('user_id', $user->id)->sum('amount');
        return response()->json([
        'status' => true,
        'message' => 'Referral program fetched successfully.',
        'response' => [
            'name'        => $program->name,
            'description' => $program->description,
            'share_person'=> $program->share_person,
            'giveaway'    => $program->giveaway,
            'referral_type' => $program->referral_type,
            'referral_code' => $user->referral_code,
            'commission' =>  (float)$commission,
            'referrals'  => $referrals
        ]
       ]);

    }
    private function loadReferralTree($user)
    {
        $tree = [];

        foreach ($user->referrals as $ref) {
            $tree[] = [
                'id' => $ref->id,
                'name' => $ref->name,
                'email' => $ref->email,
                // 'referral_code' => $ref->referral_code,
                'profile_image' => $ref->profile_image ? asset('storage/app/public/' . $user->profile_image) : null,
                'referrals' => $this->loadReferralTree($ref)
            ];
        }

        return $tree;
    }

}
