<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','id_employee' ,'email', 'password', 'api_token', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/no_image.png');
        }else{
            return asset('images/'.$this->avatar);
        }
    }
    public function checkApi()
    {
        if($this->api_token===null && $this->email_verified_at>$this->created_at){
            $this->api_token =  Str::random(80);
            $this->save();
        }
    }
    public function profile()
    {
        return $this->hasOne('App\profile');
    }
}
