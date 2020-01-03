<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Transformers\UserTransformer;

class DataController extends Controller
{
    public function index()
    {
        $model = User::query()->where('id','!=',1);
        return DataTables::eloquent($model)->setTransformer(new UserTransformer)->toJson();
    }

    public function store(Request $request)
    {
        $dp_Email = duplicate_email('users', $request->email_user);
        $dp_idEmployee = duplicate_id_employee('users', $request->idEmployee_user);

        if($dp_idEmployee!==null){
             return response()->json($dp_idEmployee);
        }
        if($dp_Email!==null){
             return response()->json($dp_Email);
        }

        $user = User::create([
            'first_name'    => $request->firstName_user,
            'last_name'     => $request->lastName_user,
            'id_employee'   => $request->idEmployee_user,
            'email'         => $request->email_user,
            'password'      => Hash::make($request->lastName_user.$request->idEmployee_user),
            'role'          => $request->role_user
            ]);

        $profile = new Profile([
            'address'       => $request->address_user,
            'province'      => $request->province_user,
            'district'      => $request->district_user,
            'sub_district'  => $request->subDistrict_user,
            'urban_village' => $request->urbanVillage_user,
            'postal_code'   => $request->postalCode_user,
            'contact'       => $request->contact_user,
        ]);
        $user->profile()->save($profile);
        $user->assignRole($request->role);
        return response()->json(['status'=>'200']);
    }

    public function edit($user)
    {
        $user = User::find($user);
        $profile = $user->profile;
        $data = [
            'user' => $user,
            'profile' => $profile
        ];
        return response()->json($data);
    }

    public function update(Request $request, $user)
    {
        $dp_Email = duplicate_email('users', $request->email_user, $request->id_user);
        $dp_idEmployee = duplicate_id_employee('users', $request->idEmployee_user, $request->id_user);

        if($dp_idEmployee!==null){
             return response()->json($dp_idEmployee);
        }
        if($dp_Email!==null){
             return response()->json($dp_Email);
        }
        // if(is_null($request)){
        //     return response()->json('request kosong');
        // }else if(is_null($user)){
        //     return response()->json('user kosong');
        // }else{
            $userUpdate = User::find($user);
             $userUpdate->first_name = $request->firstName_user;
             $userUpdate->last_name = $request->lastName_user;
             $userUpdate->id_employee = $request->idEmployee_user;
             $userUpdate->email = $request->email_user;
             $userUpdate->updated_at = now();
             $userUpdate->role = $request->role_user;
            if($userUpdate->save()){

            $userUpdate->syncRoles([$request->role]);
            $userUpdate->profile()->update([
                'address' =>  $request->address_user,
                'province' =>  $request->provinces_user,
                'district' =>  $request->districts_user,
                'sub_district' =>  $request->subDistricts_user,
                'urban_village' =>  $request->urbanVillages_user,
                'postal_code' =>  $request->postalCode_user,
                'contact' =>  $request->contact_user,
                'updated_at' =>  now(),
            ]);
            return response()->json(['status'=>'200']);
            // }

        }

    }


    public function destroy($user)
    {
        User::destroy($user);
        $error = 'berhasil di delete';
        return response()->json(['status'=> '200', 'message' => $error]);
   }
}