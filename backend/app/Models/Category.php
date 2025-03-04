<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'status'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'Categoriesid');
    }
}
