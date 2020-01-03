<?php

namespace App\Transformers;

use App\Publisher;
use League\Fractal\TransformerAbstract;

class PublisherTransformer extends TransformerAbstract
{
    /**
     * @param \App\Publisher $publisher
     * @return array
     */
    public function transform(Publisher $publisher)
    {
        return [
            'id' =>$publisher->id,
            'name' => $publisher->name,
            'email' => $publisher->email,
            'address' => $publisher->address,
            'contact' => $publisher->contact,
            'created' => $publisher->created_at->diffForHumans(),
            'updated' => $publisher->updated_at->diffForHumans(),
            'action' => '<button title="Edit data" class="edit-publisher btn btn-outline-light btn-sm border-0" data-id="'.$publisher->id.'"><i class="fas fa-pen-nib"></i></button><button title="Delete data" class="delete-publisher btn btn-outline-light btn-sm border-0" data-id="'.$publisher->id.'"><i class="fas fa-trash-alt"></i></button>',
        ];
    }
}