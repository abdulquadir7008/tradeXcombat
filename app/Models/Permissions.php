<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    //
    protected $table = 'user_permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'status'

    ];
    protected $hidden = ['created_at', 'updated_at'];
}
