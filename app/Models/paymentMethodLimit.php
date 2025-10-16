<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paymentMethodLimit extends Model
{
    //
     protected $table = 'payment_methods';
    protected $fillable = [
        'method_id',
        'method_name',
        'min_amount',
        'max_amount',
        'method_icon',
        'status'


    ];
    protected $hidden = ['created_at', 'updated_at'];
}
