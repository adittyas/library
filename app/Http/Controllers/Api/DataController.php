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

        $validation = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'idEmployee' => 'required',
            'email' => 'required',
            'address' => 'required',
            'province' => 'required',
            'district' => 'required',
            'subDistrict' => 'required',
            'urbanVillage' => 'required',
            'postalCode' => 'required',
            'contact' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'id_employee' => $request->idEmployee,
            'email' => $request->email,
            'password' => Hash::make($request->lastName.$request->idEmployee),
            'role' => $request->role
            ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'province' => $request->province,
            'district' => $request->district,
            'sub_district' => $request->subDistrict,
            'urban_village' => $request->urbanVillage,
            'postal_code' => $request->postalCode,
            'contact' => $request->contact,
        ]);
        $user->assignRole($request->role);
        return response()->json('200');
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
        if(is_null($request)){
            return response()->json('request kosong');
        }else if(is_null($user)){
            return response()->json('user kosong');
        }else{
            $userUpdate = User::find($user);
             $userUpdate->first_name = $request->firstName;
             $userUpdate->last_name = $request->lastName;
             $userUpdate->id_employee = $request->idEmployee;
             $userUpdate->email = $request->email;
             $userUpdate->updated_at = now();
             $userUpdate->role = $request->role;
            if($userUpdate->save()){
                $userUpdate->syncRoles([$request->role]);
                 $profileUpdate = Profile::where('user_id',$userUpdate->id)->update([
                'address' =>  $request->address,
                'province' =>  $request->province,
                'sub_district' =>  $request->subDistrict,
                'postal_code' =>  $request->postalCode,
                'contact' =>  $request->contact,
                'updated_at' =>  now(),
                ]);
                return response()->json('200');
            }
        }

    }


    public function destroy($user)
    {
        User::destroy($user);
        return response()->json('success');
   }
}