<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Combattypes;
use App\Models\Colors;


use Spatie\Permission\Traits\HasRoles;

class Tournaments extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
	protected $table = 'tournaments';
    protected $fillable = [
        'title',
        'totalplayer',
        'tournatype',
        'combat_id',
        'bgcolor',
        'startdate',
        'enddate',
        'icon',
        'is_active',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function combat()
    {
        return $this->belongsTo(Combattypes::class, 'combat_id');
    }
    public function color()
    {
        return $this->belongsTo(Colors::class, 'bgcolor');
    }
}
