<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    //
    protected $table = 'role_permissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'role_id',
        'page_id',
        'created_by'

    ];
    protected $hidden = ['created_at', 'updated_at'];
     public function page()
    {
        return $this->belongsTo(Pages::class, 'page_id', 'page_id');
    }
}
