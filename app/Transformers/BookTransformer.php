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
            'publisher'     => $book->publisher->name,
            'author'        => $book->author,
            'category'      => $book->category,
            'hal'           => $book->hal,
            'available'     => $book->available,
            'stock_in'      => $book->book_in_stocks,
            'stock_out'     => $book->book_out_stocks,
            'created'       => $book->created_at->diffForHumans(),
            'updated'       => $book->updated_at->diffForHumans(),
            'action'        => '<button title="Edit data" class="edit-book btn btn-outline-light btn-sm border-0" data-id="'.$book->id.'"><i class="fas fa-pen-nib"></i></button><button title="Delete data" class="delete-book btn btn-outline-light btn-sm border-0" data-id="'.$book->id.'"><i class="fas fa-trash-alt"></i></button><button title="Stock in book" class="stock-in btn btn-outline-light btn-sm border-0" data-id="'.$book->id.'"><i class="fas fa-plus"></i></button><button title="Stock out book" class="stock-out btn btn-outline-light btn-sm border-0" data-id="'.$book->id.'"><i class="fas fa-minus"></i></button>',
        ];
    }
}