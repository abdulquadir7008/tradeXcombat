<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\Models\GroupCombat;
use App\Models\CombatTrade;
use App\Models\CombatParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GroupCombatController extends Controller
{
   
    private function getCurrentPrice(string $assetPair): float
    {
        // Mocking a price based on the asset pair for example purposes
        if ($assetPair === 'EUR/USD') return 1.0850;
        if ($assetPair === 'GBP/JPY') return 180.50;
        return 1.0000;
    }

    /**
     * GET /api/combats
     * Retrieve a list of all active and upcoming group combats.
     */
    public function index()
    {
        try {
            $combats = GroupCombat::whereIn('status', ['waiting', 'in_progress'])
                ->orderBy('start_time', 'asc')
                ->get([
                    'combat_id',
                    'status',
                    'asset_pair',
                    'duration_minutes',
                    'start_time',
                    'end_time',
                    'teamA_name',
                    'teamB_name',
                    'teamA_currentPL',
                    'teamB_currentPL',
                ]);

            return response()->json($combats);

        } catch (\Exception $e) {
            \Log::error('Error fetching group combats: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to fetch combats due to a server error.'], 500);
        }
    }

    /**
     * GET /api/combats/{combat_id}
     * Retrieve the detailed information for a single combat.
     */
    public function show($combat_id)
    {
        $combat = GroupCombat::where('combat_id', $combat_id)->first();

        if (!$combat) {
            return response()->json(['message' => 'Group Combat not found.'], 404);
        }

        return response()->json($combat);
    }

    /**
     * GET /api/combats/{combat_id}/leaderboard
     * Retrieve the participants and their current performance, sorted by P/L.
     */
    public function getLeaderboard($combat_id)
    {
        $participants = GroupCombat::findOrFail($combat_id)
            ->participants()
            ->select('user_id', 'team_id', 'current_capital', 'current_unrealizedPL')
            // A simplified sort, prioritizing unrealized PL (which should be updated by a background process)
            ->orderByRaw('current_unrealizedPL DESC')
            ->get();

        $groupedParticipants = $participants->groupBy('team_id');

        return response()->json([
            'combat_id' => $combat_id,
            'leaderboard' => $groupedParticipants
        ]);
    }

    /**
     * POST /api/combats/{combat_id}/join
     * Endpoint for a user to join a combat and assign to a team.
     */
    public function joinCombat(Request $request, $combat_id)
    {
        $request->validate(['user_id' => 'required|string|max:36']);
        $user_id = $request->input('user_id');

        $combat = GroupCombat::where('combat_id', $combat_id)->where('status', 'waiting')->first();

        if (!$combat) {
            return response()->json(['message' => 'Combat not found or is already in progress.'], 400);
        }

        // Logic to assign user to the team with fewer participants
        $teamA_count = $combat->participants()->where('team_id', 'TeamA')->count();
        $teamB_count = $combat->participants()->where('team_id', 'TeamB')->count();

        $assigned_team = ($teamA_count <= $teamB_count) ? 'TeamA' : 'TeamB';
        $initial_capital = $combat->settings_initialCapital;

        try {
            $combat->participants()->create([
                'user_id' => $user_id,
                'team_id' => $assigned_team,
                'initial_capital' => $initial_capital,
                'current_capital' => $initial_capital,
                'current_unrealizedPL' => 0.00,
            ]);

            return response()->json([
                'message' => 'Successfully joined combat.',
                'team' => $assigned_team,
            ], 201);

        } catch (\Exception $e) {
            // Check for duplicate entry (user already joined)
            if (Str::contains($e->getMessage(), 'Duplicate entry')) {
                return response()->json(['message' => 'You have already joined this combat.'], 409);
            }
            \Log::error('Join Combat Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to join combat.'], 500);
        }
    }


    /**
     * POST /api/combats/{combat_id}/trades
     * Opens a new trade for a participant in the combat.
     */
    public function submitTrade(Request $request, $combat_id)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:36',
            'type' => 'required|in:BUY,SELL', // Trade direction
            'volume' => 'required|numeric|min:0.01', // Trade size
            'entry_price' => 'required|numeric', // Price at the time of execution
        ]);

        // 1. Check Combat and Participant Status
        $combat = GroupCombat::where('combat_id', $combat_id)->where('status', 'in_progress')->first();
        if (!$combat) {
            return response()->json(['message' => 'Combat is not active.'], 400);
        }

        $participant = CombatParticipant::where('combat_id', $combat_id)
            ->where('user_id', $validated['user_id'])
            ->first();

        if (!$participant) {
            return response()->json(['message' => 'User not a participant in this combat.'], 404);
        }
        
        // ** (In a real application, you would add margin and leverage checks here) **

        // 2. Create the Trade Record
        try {
            $trade = CombatTrade::create([
                'trade_id' => Str::uuid()->toString(),
                'combat_id' => $combat_id,
                'user_id' => $validated['user_id'],
                'team_id' => $participant->team_id, // Inherit team ID
                'timestamp' => Carbon::now(),
                'type' => $validated['type'],
                'volume' => $validated['volume'],
                'entry_price' => $validated['entry_price'],
                'status' => 'open',
                'profit_loss' => null, // P/L is null until closed
            ]);

            // ** IMPORTANT NOTE: In a production system, a dedicated background worker/job
            // would constantly update the 'current_unrealizedPL' field for all open trades/participants.
            // This API endpoint only registers the trade.

            return response()->json([
                'message' => 'Trade opened successfully.',
                'trade_id' => $trade->trade_id,
                'asset_pair' => $combat->asset_pair,
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Submit Trade Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to open trade.'], 500);
        }
    }


    /**
     * PUT /api/combats/{combat_id}/trades/{trade_id}/close
     * Closes an open trade, calculates P/L, and updates participant/team capital.
     */
    public function closeTrade(Request $request, $combat_id, $trade_id)
    {
        $validated = $request->validate([
            'exit_price' => 'required|numeric', // Price at the time of closure
        ]);

        $trade = CombatTrade::where('combat_id', $combat_id)
            ->where('trade_id', $trade_id)
            ->where('status', 'open')
            ->first();

        if (!$trade) {
            return response()->json(['message' => 'Open trade not found for this combat.'], 404);
        }

        $combat = GroupCombat::find($combat_id);
        $participant = CombatParticipant::where('combat_id', $combat_id)->where('user_id', $trade->user_id)->first();

        // 1. Calculate Profit/Loss (P/L)
        $entryPrice = $trade->entry_price;
        $exitPrice = $validated['exit_price'];
        $volume = $trade->volume;

        // Simplified P/L formula: P/L = (Exit Price - Entry Price) * Volume * Multiplier
        // Using a 100,000 unit contract size for simplicity (standard lot)
        $contractSize = 100000;
        $priceDifference = ($trade->type === 'BUY') ? ($exitPrice - $entryPrice) : ($entryPrice - $exitPrice);
        $profitLoss = round($priceDifference * $volume * $contractSize, 2);


        // 2. Start Transaction to ensure all updates happen or none do
        try {
            DB::beginTransaction();

            // 3. Update the Trade record
            $trade->status = 'closed';
            $trade->profit_loss = $profitLoss;
            $trade->save();

            // 4. Update the Participant's capital (Realized P/L affects capital)
            $participant->current_capital += $profitLoss;
            $participant->total_profit_loss += $profitLoss; // Update total realized P/L
            // Since the trade is closed, its contribution to unrealized PL is zero.
            // A background job would handle the global unrealized PL recalculation.
            $participant->save();

            // 5. Update the Group Combat Team Score (Realized P/L affects team score)
            $teamPLField = ($trade->team_id === 'TeamA') ? 'teamA_currentPL' : 'teamB_currentPL';
            $combat->increment($teamPLField, $profitLoss);

            DB::commit();

            return response()->json([
                'message' => 'Trade closed successfully.',
                'realized_pl' => $profitLoss,
                'new_capital' => $participant->current_capital,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Close Trade Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to close trade due to an error.'], 500);
        }
    }
}
