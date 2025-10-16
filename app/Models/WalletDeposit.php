<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletDeposit extends Model
{
    //


    protected $table = 'wallet_deposit';
    protected $fillable = [
        'user_id',
        'deposit_method_id',
        'sub_method_id',
        'amount',
        'currency',
        'converted_amount',
        'converted_currency',
        'wallet_address',
        'receiptFileUrl',
        'status',
        'withdrawal_method_id',
        'withdrawal_amount',
        'withdrawal_status',
        'recipient_acc_no',
        'additional_info',
        'transaction_type'
    ];
    protected $hidden = ['created_at', 'updated_at'];

     public function paymentMethod()
{
    return $this->belongsTo(paymentMethodLimit::class, 'withdrawal_method_id');
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
