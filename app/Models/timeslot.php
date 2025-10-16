<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

class timeslot extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
	protected $table = 'time_slot';
    protected $primaryKey = 'id';
    protected $fillable = [
        'combat_id',
        'timeslot',
        'duration',
        'is_active'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function combatType()
    {
        return $this->belongsTo(Combattypes::class, 'combat_id');
    }
}
