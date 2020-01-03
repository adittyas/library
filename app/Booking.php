<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
       'code','book_id','member_id','out_date','end_date','return_date','late','charge','q1','q2'
    ];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
    public function late()
    {
        $start = \Carbon\Carbon::parse($this->end_date);
        $end = \Carbon\Carbon::parse($this->return_date);

        if(now() > $start){
            $diff = $this->late=now()->diffInDays($start);
            $this->charge = $diff * 2000;
            $this->save();
        }
    }
}