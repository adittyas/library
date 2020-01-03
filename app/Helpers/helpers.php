<?php

use Illuminate\Support\Facades\DB;

if(!function_exists('duplicate_email')){

    function duplicate_email($table=null, $email=null, $except=0)
    {
        $data = DB::table($table)->where('id','!=', $except)->where('email', $email)->first();
        if(!empty($data)){
            return ['status'=>'400', 'message'=>'Duplicate email : '.$email ];
        }
        return null;
    }
}
if(!function_exists('duplicate_id_employee')){

    function duplicate_id_employee($table=null, $id=null, $except=0 )
    {
        $data = DB::table($table)->where('id','!=', $except)->where('id_employee', $id)->first();
        if(!empty($data)){
            return ['status'=>'400', 'message'=>'Duplicate ID employee : '.$id ];
        }
        return null;
    }
}
if(!function_exists('duplicate_contact')){

    function duplicate_contact($table=null, $contact=null, $except=0 )
    {
        $data = DB::table($table)->where('id','!=', $except)->where('contact', $contact)->first();
        if(!empty($data)){
            return ['status'=>'400', 'message'=>'Duplicate Contact : '.$contact ];
        }
        return null;
    }
}
if(!function_exists('duplicate_nim')){

    function duplicate_nim($table=null, $nim=null, $except=0 )
    {
        $data = DB::table($table)->where('id','!=', $except)->where('nim', $nim)->first();
        if(!empty($data)){
            return ['status'=>'400', 'message'=>'Duplicate NIM : '.$nim ];
        }
        return null;
    }
}
if(!function_exists('duplicate_title')){

    function duplicate_title($table=null, $title=null, $except=0 )
    {
        $data = DB::table($table)->where('id','!=', $except)->where('title', $title)->first();
        if(!empty($data)){
            return ['status'=>'400', 'message'=>'Duplicate title : '.$title ];
        }
        return null;
    }
}
if(!function_exists('duplicate_name')){

    function duplicate_name($table=null, $name=null, $except=0 )
    {
        $data = DB::table($table)->where('id','!=', $except)->where('name', $name)->first();
        if(!empty($data)){
            return ['status'=>'400', 'message'=>'Duplicate name : '.$name ];
        }
        return null;
    }
}

if(!function_exists('id_exist')){
    function id_exist($table=null,$id=null)
    {
        $table = substr($table,0,-1);
        if($id===null){
            return ['status'=>'400', 'message'=>''.$table.' not exist!'];
        }
        return null;
    }
}