<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class newsAndTutorials extends Model
{
    //
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
	protected $table = 'news_and_tutorials';
    protected $fillable = [
        'title',
        'category',
        'is_active',
        'file_path',
        'content',
        // 'show_to_all'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
