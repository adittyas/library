<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $fillable = [
       'publisher_id','title', 'author', 'category', 'hal', 'qty'
    ];

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }
}