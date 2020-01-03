<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Imports\PublishersImport;
use App\Imports\MembersImport;
use App\Imports\BooksImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function master()
    {
        Excel::import(new UsersImport, request()->file('excel'));
        return redirect()->back();
    }
    public function publisher()
    {
        Excel::import(new PublishersImport, request()->file('excel'));
        return redirect()->back();
    }
    public function book()
    {
        Excel::import(new BooksImport, request()->file('excel'));
        return redirect()->back();
    }
    public function member()
    {
        Excel::import(new MembersImport, request()->file('excel'));
        return redirect()->back();
    }
}