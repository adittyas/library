<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Member;
use App\Book;
use App\Publisher;
use App\Profile;
use App\Vendor;
use App\Booking;
use Alert;
use App\http\Resources\Token as TokenResource;

class ViewController extends Controller
{
    public function __construct()
    {
        $user = User::all();
        $user->each->checkApi();
    }
    public function token()
    {
        // $user = Auth::user();
        $user = User::find(Auth::id());
        return new TokenResource($user);
        // return response()->json($user);
    }
    public function master()
    {
        return view('page.user');
    }

    public function dashboard()
    {
        $member = [
            "all"   =>  count(Member::all()),
            "new"   =>  count(Member::all())
        ];
        $book = [
            "all"   =>  count(Book::all()),
            "new"   =>  count(Book::all())
        ];
        $booking = [
            "all"   =>  count(Booking::all()),
            "new"   =>  count(Booking::all()),
        ];
        $months = ['January', 'February', 'March', 'April', 'Mey', 'June','July','August', 'September','October','November','December'];
        $cil = $mil = $bil = $xil = [];
        for ($i=1; $i <= 12; $i++) {
            $cil[$i-1] = DB::table('bookings')->whereMonth('created_at',$i)->get();
            $cil[$i-1] = count($cil[$i-1]);
            $mil[$i-1] = DB::table('members')->whereMonth('created_at',$i)->get();
            $mil[$i-1] = count($mil[$i-1]);
            $bil[$i-1] = DB::table('books')->whereMonth('created_at',$i)->get();
            $bil[$i-1] = count($bil[$i-1]);
            $xil[$i-1] = DB::table('guests')->whereMonth('created_at',$i)->get();
            $xil[$i-1] = count($xil[$i-1]);
        }

        return view('page.dashboard', compact('member','book','booking','months','cil', 'mil', 'bil', 'xil'));
    }
     public function catalog()
    {
         return view('page.catalog');
    }
    // transaction
     public function booking()
    {
        return view('page.booking');
    }
     public function return()
    {
        return "return";
    }
     public function guest()
    {
        $type = ['ktp','sim','paspor','nim'];
        return view('page.guest', compact('type'));
    }
    // master navbar
     public function book()
    {
        $category = ['horror','romance','sci-fi','adult'];
        $info = ['donation', 'forfeit'];
        return view('page.book', compact('category','info'));
    }
    public function publisher()
    {
        return view('page.publisher');
    }
    public function member()
    {
        $reason = ['none','reason one','reason two','reason three', 'reason four'];
        return view('page.member', compact('reason'));
    }
     public function profile()
    {
        $user = auth()->user();
        $profile = auth()->user()->profile;
        return view('page.profile', compact('user','profile'));
    }
}