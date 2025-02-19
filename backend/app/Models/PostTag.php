<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'Posts_Tags';

    protected $fillable = [
        'Postsid', 
        'Tagsid'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'Postsid');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'Tagsid');
    }
}
