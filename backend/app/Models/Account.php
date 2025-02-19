<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'nickname',
        'roll', 
        'password', 
        'avatar', 
        'Userid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'Userid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
