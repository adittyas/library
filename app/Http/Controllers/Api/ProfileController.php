<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdate;
use Illuminate\Support\Facades\Hash;
use Alert;


class ProfileController extends Controller
{
  public function updateUser(ProfileUpdate $request, $user)
  {

      $upd = User::find($user);

      $request->validated();

        if(!empty($request->file('avatar'))){
            if(!empty($upd->avatar)){
                Storage::delete($upd->avatar);
            }
             $upd->avatar = $request->file('avatar')->store('avatar');
        }
        if(!empty($request->psw)){
            $upd->password = Hash::make($request->psw);
        }
        if(!empty($request->email)){
             if($request->email!=$upd->email){
                 $upd->email = $request->email;
                 $upd->email_verified_at = null;
             }
        }
        $upd->save();
        return redirect()->route('index.profile')->with('success', 'Profile updated!');
    }
}