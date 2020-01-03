<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
       'user_id','name', 'email', 'address', 'contact'
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}