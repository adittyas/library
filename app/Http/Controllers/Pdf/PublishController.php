<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\User;
use App\Publisher;
use App\Book;
use App\Booking;
use App\Member;
use App\Guest;


class PublishController extends Controller
{
    public function master()
    {
        $user = User::all();
        $pdf = PDF::loadview('pdf.user',compact('user'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('user.pdf');
    }
    public function publisher()
    {
        $publisher = Publisher::all();
        $pdf = PDF::loadview('pdf.publisher',compact('publisher'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('publisher.pdf');
    }
    public function member()
    {
        $member = Member::all();
        $pdf = PDF::loadview('pdf.member',compact('member'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('member.pdf');
    }
    public function book()
    {
        $book = Book::all();
        $pdf = PDF::loadview('pdf.book',compact('book'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('book.pdf');
    }
    public function booking()
    {
        $booking = Booking::all();
        $pdf = PDF::loadview('pdf.booking',compact('booking'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('booking.pdf');
    }
    public function guest()
    {
        $guest = Guest::all();
        $pdf = PDF::loadview('pdf.guest',compact('guest'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('guest.pdf');
    }
}