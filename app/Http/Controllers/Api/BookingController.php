<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Book_out_stock;
use App\Book_in_stock;
use App\Book;
use App\Member;
use App\Http\Controllers\Controller;
use App\Transformers\BookingTransformer;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $booking = Booking::all();
        $booking->each->late();

    }
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

    public function index()
    {
        $booking = Booking::query();
        return DataTables::eloquent($booking)
                ->setTransformer(new BookingTransformer)
                ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qtyBook = Book::find($request->book_booking);
        $id_member = id_exist('members', $request->member_booking);
        $id_book = id_exist('books', $request->book_booking);
        $deactive = Member::find($request->member_booking);
        $oneBook = Book_out_stock::where('member_id',$request->member_booking)->where('book_id',$request->book_booking)->first();
        if($oneBook!=null){
            return response()->json(['status'=>'400', 'message'=>'One member one book!']);
        }else if($qtyBook->available<=0){
            return response()->json(['status'=>'400', 'message'=>'Book out of stock']);
        }else if($id_member!==null){
             return response()->json($id_member);
        }else if($id_book!==null){
             return response()->json($id_book);
        }else if($deactive->status===0){
            return response()->json(['status'=>'400', 'message'=>'Member is non active']);
        }else{
            $booking = new Booking([
                'code'       => '212',
                'book_id'    => $request->book_booking,
                'member_id'  => $request->member_booking,
                'out_date'   => now(),
                'end_date'   => now()->addWeek(),
                'q1'         => auth('api')->user()->id,
                'q2'         => auth('api')->user()->id
            ]);

            $out = new Book_out_stock([
                'book_id'       => $request->book_booking,
                'member_id'     => $request->member_booking,
                'output_id'     => auth('api')->user()->id,
                'qty'           => 1,
                'info'          => '*'.$booking->member->name,
            ]);

            if($booking->save() && $out->save()){
                $this->calc($out->book_id);
                return response()->json(['status'=>'200']);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $data = Booking::find($booking);
        $data = $data[0];
        $res = [
            'id'            => $data->id,
            'book_id'       => $data->book_id,
            'member_id'     => $data->member_id,
            'book_name'     => $data->book->title,
            'member_name'   => $data->member->name
        ];
        return response()->json($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        $id_member = id_exist('members', $request->member_booking);
        $id_book = id_exist('books', $request->book_booking);

        if($id_member!==null){
             return response()->json($id_member);
        }else if($id_book!==null){
             return response()->json($id_book);
        }
        else{
           $update = Booking::find($request->id_booking);
           $update->book_id     = $request->book_booking;
           $update->member_id   = $request->member_booking;
           $update->q2          = auth('api')->user()->id;
           if($update->save()){
               return response()->json(['status'=>'200']);
            }else{
                return response()->json(['status'=>'400', 'message'=>'Something wrong with the server']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($booking)
    {
        $data = Booking::find($booking);
        $out = DB::table('book_out_stocks')->where('created_at', $data->created_at)->first();
        Book_out_stock::destroy($out->id);
        Booking::destroy($booking);
       return response()->json(['status'=>'200']);
    }

    public function renew($booking)
    {
        $data = Booking::find($booking);
        $data->end_date = date('Y-m-d', strtotime($data->end_date. ' + 7 days'));
        $data->renew = 1;
         if($data->save()){
            return response()->json(['status'=>'200']);
        }
    }
    public function fullfill($booking)
    {
        $data = Booking::find($booking);
        $out = DB::table('book_out_stocks')->where('created_at', $data->created_at)->first();
        Book_out_stock::destroy($out->id);
        $data->return_date = now();
        $data->fullfill = 1;

        if($data->save()){
            return response()->json(['status'=>'200']);
        }
    }
}