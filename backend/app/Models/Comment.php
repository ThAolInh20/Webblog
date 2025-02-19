<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'content', 
        'Accountid', 
        'Postsid'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'Accountid');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'Postsid');
    }
}
