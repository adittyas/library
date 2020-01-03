<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
      protected $fillable = [
       'user_id','name','nim', 'email', 'contact', 'active', 'reason'
    ];
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}