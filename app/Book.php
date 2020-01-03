<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $fillable = [
       'publisher_id','user_id','title', 'author', 'category', 'hal'
    ];

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }
    public function book_in_stocks()
    {
        return $this->hasMany('App\Book_in_stock');
    }
    public function book_out_stocks()
    {
        return $this->hasMany('App\Book_out_stock');
    }
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}