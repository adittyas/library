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


class DashboardController extends Controller
{
    public function index()
    {
        $model = User::query()->where('id','!=',1);
        return DataTables::eloquent($model)->setTransformer(new UserTransformer)->toJson();
    }
}
