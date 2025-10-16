<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
     protected $table = 'pages';
    protected $primaryKey = 'page_id';
    protected $fillable = [
        'page_category_id',
        'pagename',
        'filename',
        'is_submenu',
        'active',
        'page_order',
        'show_in_menu',

    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(PageCategory::class, 'page_category_id', 'page_category_id');
    }

    public function children()
    {
        return $this->hasMany(Pages::class, 'is_submenu', 'page_id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(Pages::class, 'is_submenu', 'page_id');
    }
}
