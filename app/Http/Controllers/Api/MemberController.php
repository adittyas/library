<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\MemberTransformer;
use App\Member;
use DataTables;

class MemberController extends Controller
{
     public function index()
  {
        $member = Member::query();
        return DataTables::eloquent($member)
                ->setTransformer(new MemberTransformer)
                ->toJson();
  }
  public function edit($member)
    {
        $data = Member::find($member);
        return response()->json($data);
    }
   public function destroy($member)
   {
       Member::destroy($member);
       return response()->json(['status'=>'200']);
   }
   public function store(Request $request)
   {
        $dp_Email = duplicate_email('members', $request->email_member);
        $dp_contact = duplicate_contact('members', $request->contact_member);
        $dp_nim = duplicate_nim('members', $request->nim_member);

        if($dp_Email!==null){
             return response()->json($dp_Email);
        }
        if($dp_contact!==null){
             return response()->json($dp_contact);
        }
        if($dp_nim!==null){
             return response()->json($dp_nim);
        }

       $member = new Member([
           'user_id' => auth('api')->user()->id,
           'name' => $request->name_member,
           'email' => $request->email_member,
           'nim' => $request->nim_member,
           'contact' => $request->contact_member,
       ]);

       if($member->save()){
           return response()->json(['status'=>'200']);
       }
   }
   public function update(Request $request, $member)
   {
        $dp_email = duplicate_email('members', $request->email_member, $request->id_member);
        $dp_contact = duplicate_contact('members', $request->contact_member, $request->id_member);
        $dp_nim = duplicate_nim('members', $request->nim_member, $request->id_member);

        if($dp_email!==null){
             return response()->json($dp_email);
        }
        if($dp_nim!==null){
             return response()->json($dp_nim);
        }
        if($dp_contact!==null){
             return response()->json($dp_contact);
        }

        $update = Member::find($request->id_member);
        $update->user_id = auth('api')->user()->id;
        $update->nim = $request->nim_member;
        $update->name = $request->name_member;
        $update->email = $request->email_member;
        $update->contact = $request->contact_member;
        $update->status = $request->status_member;
        if($request->status_member==1){
            $update->reason = 'none';
        }else{
            $update->reason = $request->reason_member;
        }

        if($update->save()){
            return response()->json(['status'=>'200']);
        }else{
            return response()->json(['status'=>'400', 'message'=>'Something wrong with the server']);
        }
   }
}