<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_out_stock extends Model
{
    protected $fillable = [
       'book_id','member_id','qty','output_id', 'edit_id', 'info'
    ];
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
