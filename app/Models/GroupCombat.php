<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCombat extends Model
{
    use HasFactory;

    // Custom Primary Key setup
    protected $primaryKey = 'combat_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // The combat_id, user_id, trade_id should be assigned explicitly.
    protected $guarded = [];

    // Cast specific columns for safety and correct type handling
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'teamA_currentPL' => 'float',
        'teamB_currentPL' => 'float',
    ];

    /**
     * Get all participants for the group combat.
     */
    public function participants()
    {
        return $this->hasMany(CombatParticipant::class, 'combat_id', 'combat_id');
    }

    /**
     * Get all trades recorded for the group combat.
     */
    public function trades()
    {
        return $this->hasMany(CombatTrade::class, 'combat_id', 'combat_id');
    }
}