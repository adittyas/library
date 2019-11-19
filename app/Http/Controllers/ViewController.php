<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use App\Vendor;
use Alert;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function token()
    {
        $user = Auth::user();
        return response()->json($user->api_token);
    }
    public function master()
    {
        return view('page.user');
    }

    public function dashboard()
    {
        return view('page.dashboard');
    }
     public function catalog()
    {
        return "catalog";
    }
    // transaction
     public function booking()
    {
        return "booking";
    }
     public function return()
    {
        return "return";
    }
     public function guest()
    {
        return "guest";
    }
    // master navbar
     public function book()
    {
        return view('page.book');
    }
    public function publisher()
    {
        return view('page.publisher');
    }
    public function member()
    {
        return view('page.member');
    }
     public function profile()
    {
        $user = auth()->user();
        $profile = auth()->user()->profile;
        return view('page.profile', compact('user','profile'));
    }
}
