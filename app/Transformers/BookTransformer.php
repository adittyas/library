<?php

namespace App\Transformers;

use App\Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    /**
     * @param \App\Book $book
     * @return array
     */
    public function transform(Book $book)
    {
        return [
            'id'            => (int) $book->id,
            'title'         => $book->title,
            'publisher'  => $book->publisher->name,
            'author'        => $book->author,
            'category'      => $book->category,
            'hal'           => $book->hal,
            'qty'           => $book->qty,
            'created'       => $book->created_at->diffForHumans(),
            'updated'       => $book->updated_at->diffForHumans(),
            'action'        => '<btn title="Edit data" class="edit-user btn btn-outline-light btn-sm border-0" data-id="'.$book->id.'"><i class="fas fa-pen-nib"></i></btn><btn title="Delete data" class="delete-user btn btn-outline-light btn-sm border-0" data-id="'.$book->id.'"><i class="fas fa-trash-alt"></i></btn>',
        ];
    }
}
