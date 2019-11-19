<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
     protected $fillable = [
        'user_id','address', 'province', 'district', 'sub_district' ,'urban_village', 'postal_code', 'contact', 'about'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}