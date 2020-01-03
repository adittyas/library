<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Publisher;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Transformers\PublisherTransformer;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
{
  public function index()
  {
        $publisher = publisher::query();
        return DataTables::eloquent($publisher)
                ->setTransformer(new PublisherTransformer)
                ->toJson();
  }
  public function edit($publisher)
    {
        $data = Publisher::find($publisher);
        return response()->json($data);
    }
   public function destroy($publisher)
   {
       $org = Publisher::find($publisher);
       if(count($org->books)>0){
            return response()->json(['status'=>'400', 'message'=>'cannot delete data, parent of foreign key' ]);
       }else{
            Publisher::destroy($publisher);
            return response()->json(['status'=>'200']);
       }

   }
   public function store(Request $request)
   {
        $dp_Email = duplicate_email('publishers', $request->email_publisher);
        $dp_contact = duplicate_contact('publishers', $request->contact_publisher);

        if($dp_Email!==null){
             return response()->json($dp_Email);
        }
        if($dp_contact!==null){
             return response()->json($dp_contact);
        }

       $publisher = new Publisher([
           'user_id' => auth('api')->user()->id,
           'name' => $request->name_publisher,
           'email' => $request->email_publisher,
           'contact' => $request->contact_publisher,
           'address' => $request->address_publisher,
       ]);

       if($publisher->save()){
           return response()->json(['status'=>'200']);
       }
   }
   public function update(Request $request, $publisher)
   {
        $dp_Email = duplicate_email('publishers', $request->email_publisher, $request->id_publisher);
        $dp_contact = duplicate_contact('publishers', $request->contact_publisher, $request->id_publisher);

        if($dp_Email!==null){
             return response()->json($dp_Email);
        }
        if($dp_contact!==null){
             return response()->json($dp_contact);
        }

        $update = Publisher::find($request->id_publisher);
        $update->user_id = auth('api')->user()->id;
        $update->name = $request->name_publisher;
        $update->email = $request->email_publisher;
        $update->contact = $request->contact_publisher;
        $update->address = $request->address_publisher;

        if($update->save()){
            return response()->json(['status'=>'200']);
        }else{
            return response()->json(['status'=>'400', 'message'=>'Somethig wrong with the server']);
        }
   }
}