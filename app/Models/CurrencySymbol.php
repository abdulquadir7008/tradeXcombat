<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencySymbol extends Model
{
    //
    protected $table = 'currency_symbols';
    protected $fillable = [
    'currency_code',
    'symbol',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
