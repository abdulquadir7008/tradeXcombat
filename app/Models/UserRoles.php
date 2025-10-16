<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserRoles extends Model
{
    //
    use HasRoles;
    protected $table = 'user_roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'status'

    ];
    protected $hidden = ['created_at', 'updated_at'];
        public function permissions()
    {
        return $this->hasMany(
        RolePermissions::class,'role_id','id');
    }
}
