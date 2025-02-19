<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title', 
        'slug', 
        'content', 
        'excerpt', 
        'status', 
        'Accountid', 
        'Categoriesid'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'Accountid');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Categoriesid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'Posts_Tags', 'Postsid', 'Tagsid');
    }
}
