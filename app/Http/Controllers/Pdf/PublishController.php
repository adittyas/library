<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\User;

class PublishController extends Controller
{
    public function master()
    {
        $user = User::all();
        $pdf = PDF::loadview('pdf.user',compact('user'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('user.pdf');
    }
}
