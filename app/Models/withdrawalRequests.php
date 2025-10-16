<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class withdrawalRequests extends Model
{
    //
      protected $table = 'withdrawal_requests';
    protected $fillable = [
        'user_id',
        'withdrawal_method',
        'amount',
        'status',
        'recipient_acc_no',
        'additional_info'

    ];
    protected $hidden = ['created_at', 'updated_at'];
}
