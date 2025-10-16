<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CommissionLevels extends Model
{
    //
     //
     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
	protected $table = 'commission_levels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'level',
        'commission_rate',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
