<?php

namespace App\Transformers;

use App\Guest;
use League\Fractal\TransformerAbstract;

class GuestTransformer extends TransformerAbstract
{
    /**
     * @param \App\Guest $guest
     * @return array
     */
    public function transform(Guest $guest)
    {
        return [
            'id'        => (int) $guest->id,
            'idcard'    => $guest->idcard,
            'type'      => $guest->type,
            'name'      => $guest->name,
            'time'      => \Carbon\Carbon::parse($guest->created_at)->toFormattedDateString(),
            'action'    => '<button title="Delete data" class="delete-guest btn btn-outline-light btn-sm border-0" data-id="'.$guest->id.'"><i class="fas fa-trash-alt"></i></button>'
        ];
    }
}