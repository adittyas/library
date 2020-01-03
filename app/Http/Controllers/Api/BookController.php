<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\BookTransformer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Book;
use DataTables;
use App\Book_in_stock;
use App\Book_out_stock;
use App\Member;

class BookController extends Controller
{
    private function calc($id)
    {
        $store = Book_in_stock::all();
        $out = Book_out_stock::all();

        $x = 0;
        foreach ($store as $key) {
            if($key->book_id==$id){
                $x = $key->qty + $x;
            }
        }
        $y = 0;
        foreach ($out as $key) {
            if($key->book_id==$id){
                $y = $key->qty + $y;
            }
        }
        $res = $x - $y;
        Book::where('id',$id)->update(['available' => $res]);
    }

    public function __construct()
    {
        $all = Book::all();
        foreach ($all as $key) {
            $this->calc($key->id);
        }
    }
    public function index()
    {
        $book = Book::query();
        return DataTables::eloquent($book)
                ->setTransformer(new BookTransformer)
                ->toJson();
    }
   public function edit($book)
    {
        $data = Book::find($book);
        return response()->json($data);
    }
   public function destroy($book)
   {
       book::destroy($book);
       return response()->json(['status'=>'200']);
   }
   public function store(Request $request)
   {
        $dp_title = duplicate_title('books', $request->title_book);

        if($dp_title!==null){
             return response()->json($dp_title);
        }

       $book = new Book([
           'title'          => $request->title_book,
           'publisher_id'   => $request->publisher_book,
           'author'         => $request->author_book,
           'category'       => $request->category_book,
           'hal'            => $request->hal_book,
           'user_id'        => auth('api')->user()->id
       ]);


       if($book->save()){
           return response()->json(['status'=>'200']);
       }
   }
   public function update(Request $request, $book)
   {
       $dp_title = duplicate_title('books', $request->title_book, $request->id_book);

        if($dp_title!==null){
             return response()->json($dp_nim);
        }

        $update = Book::find($request->id_book);

        $update->title = $request->title_book;
        $update->publisher_id = $request->publisher_book;
        $update->author = $request->author_book;
        $update->category = $request->category_book;
        $update->hal = $request->hal_book;
        $update->user_id = auth('api')->user()->id;

        if($update->save()){
            return response()->json(['status'=>'200']);
        }else{
            return response()->json(['status'=>'400', 'message'=>'Something wrong with the server']);
        }
   }

//    for restock the book

    public function storeIn(Request $request)
   {
        $book = new Book_in_stock([
            'book_id'       => $request->book_id,
            'input_id'      => auth('api')->user()->id,
            'qty'           => $request->qty_bookIn,
            'info'          => $request->info_bookIn,
       ]);
       if($book->save()){
           $this->calc($book->book_id);
           return response()->json(['status'=>'200']);
       }
   }
    public function storeOut(Request $request)
   {
        $book = new Book_out_stock([
            'book_id'       => $request->book_id,
            'output_id'     => auth('api')->user()->id,
            'qty'           => $request->qty_bookIn,
            'info'          => $request->info_bookIn,
       ]);
       if($book->save()){
           $this->calc($book->book_id);
           return response()->json(['status'=>'200']);
       }
   }
   public function destroyIn($stock)
   {
       $xr = Book_in_stock::find($stock);
       $id = $xr->book_id;
       if($xr->delete()){
           $this->calc($id);
           return response()->json(['status'=> '200']);
       }
   }
   public function destroyOut($stock)
   {
       $xr = Book_out_stock::find($stock);
       $id = $xr->book_id;
       if($xr->delete()){
           $this->calc($id);
           return response()->json(['status'=> '200']);
       }
   }
    public function editIn($id)
    {
        $data = Book_in_stock::find($id);
        return response()->json($data);
    }
    public function editOut($id)
    {
        $data = Book_out_stock::find($id);
        return response()->json($data);
    }
    public function updateIn(Request $request, $stock)
    {
        $upd = Book_in_stock::find($stock);
        $upd->qty = $request->qty_bookIn;
        $upd->info = $request->info_bookIn;
        $upd->edit_id = auth('api')->user()->id;
        if($upd->save()){
            $this->calc($upd->book_id);
            return response()->json(['status'=>'200']);
        }
    }
    public function updateOut(Request $request, $stock)
    {
        $upd = Book_out_stock::find($stock);
        $upd->qty = $request->qty_bookIn;
        $upd->info = $request->info_bookIn;
        $upd->edit_id = auth('api')->user()->id;
        if($upd->save()){
            $this->calc($upd->book_id);
            return response()->json(['status'=>'200']);
        }
    }
}