<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailOtp extends Model
{
    protected $table = 'email_otps';
    protected $fillable = ['user_id', 'otp', 'expires_at','type'];
}