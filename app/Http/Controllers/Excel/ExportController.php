<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\PublishersExport;
use App\Exports\MembersExport;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function master()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function publisher()
    {
        return Excel::download(new PublishersExport, 'publishers.xlsx');
    }
    public function book()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }
    public function member()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
}