<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
     protected $fillable = [
        'address', 'city', 'country', 'postal' ,'about'
    ];
}