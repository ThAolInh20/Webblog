<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    
    protected $fillable = [
        'email', 
        'name', 
        'datebirth', 
        'phone'
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'Userid');
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, Account::class);
    }
}
