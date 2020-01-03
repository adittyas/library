<?php

namespace App\Transformers;

use App\Booking;
use App\Book;
use League\Fractal\TransformerAbstract;

class BookingTransformer extends TransformerAbstract
{
    /**
     * @param \App\Booking $booking
     * @return array
     */
    public function transform(Booking $booking)
    {
        $full = '<button title="loan fulfilled" class="full-booking btn btn-outline-light btn-sm border-0" data-id="'.$booking->id.'"><i class="fas fa-check"></i></buttton>';

        $extend = '<button title="Renew transaction" class="renew-booking btn btn-outline-light btn-sm border-0"data-id="'.$booking->id.'"><i class="far fa-hourglass"></i></buttton>';

        if($booking->fullfill===0){
            $act =  '<button title="Edit data" class="edit-booking btn btn-outline-light btn-sm border-0" data-id="'.$booking->id.'"><i class="fas fa-pen-nib"></i></buttton><button title="Delete data" class="delete-booking btn btn-outline-light btn-sm border-0" data-id="'.$booking->id.'"><i class="fas fa-trash-alt"></i></button>';
            if($booking->renew === 1){
                $extend = '';
            }
        }else if($booking->fullfill===1){
            $act = '<span></span>';
            $extend = '<span>Complete';
            $full = '</span>';
        }

        return [
            'id'            => (int) $booking->id,
            'code'          => $booking->code,
            'title'         => $booking->book->title,
            'member'        => $booking->member->name,
            'out_date'      => \Carbon\Carbon::parse(now())->toFormattedDateString(),
            'end_date'      => \Carbon\Carbon::parse($booking->end_date)->toFormattedDateString(),
            'late'          => $booking->late.' Day',
            'charge'        => $booking->charge,
            'created'       => $booking->created_at->diffForHumans(),
            'updated'       => $booking->updated_at->diffForHumans(),
            'decision'      => $extend.''.$full,
            'action'        => $act,

        ];
    }
}