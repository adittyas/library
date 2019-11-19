<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\BookTransformer;
use App\Book;
use DataTables;

class BookController extends Controller
{
     public function index()
  {
        $book = Book::query();
        return DataTables::eloquent($book)
                ->setTransformer(new BookTransformer)
                ->toJson();
  }
}
