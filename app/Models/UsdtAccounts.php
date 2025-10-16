<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsdtAccounts extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'usdt_accounts';

    protected $fillable = [

        'name',
        'conversion_rate',
        'status',

    ];
}
