<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\GuestTransformer;
use App\Guest;
use DataTables;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guest = Guest::query();
        return DataTables::eloquent($guest)->setTransformer(new GuestTransformer)->toJson();
    }

    public function store(Request $request)
    {
        $guest = new Guest([
           'idcard'     => $request->iden_guest,
           'type'       => $request->type_guest,
           'name'       => $request->name_guest,
           'admin'      => auth('api')->user()->id
       ]);

       if($guest->save()){
           return response()->json(['status'=>'200']);
       }
    }

    public function destroy($guest)
    {
        Guest::destroy($guest);
       return response()->json(['status'=>'200']);
    }
}