<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Publisher;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Transformers\PublisherTransformer;

class PublisherController extends Controller
{
  public function index()
  {
        $publisher = publisher::query();
        return DataTables::eloquent($publisher)
                ->setTransformer(new PublisherTransformer)
                ->toJson();
  }
}