<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CombatTrade extends Model
{
    use HasFactory;

    // Custom Primary Key setup
    protected $primaryKey = 'trade_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    // Cast columns
    protected $casts = [
        'timestamp' => 'datetime',
        'volume' => 'float',
        'entry_price' => 'float',
        'profit_loss' => 'float',
    ];

    /**
     * Get the combat that this trade belongs to.
     */
    public function combat()
    {
        return $this->belongsTo(GroupCombat::class, 'combat_id', 'combat_id');
    }

    // You would typically define a relationship to your main User model here as well
}