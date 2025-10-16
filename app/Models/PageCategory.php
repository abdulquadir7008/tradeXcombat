<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    //
    protected $table = 'page_categories';
    protected $primaryKey = 'page_category_id';
    protected $fillable = [
        'category_name',
        'is_active',
        'order_by',
        'created_by'

    ];
    protected $hidden = ['created_at', 'updated_at'];
      public function pages()
    {
        return $this->hasMany(Pages::class, 'page_category_id', 'page_category_id');
    }
}
