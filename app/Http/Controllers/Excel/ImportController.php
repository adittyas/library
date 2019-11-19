<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function master()
    {
        Excel::import(new UsersImport, request()->file('excel'));
        return redirect()->back();
    }
}
