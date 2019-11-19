<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\MemberTransformer;
use App\Member;
use DataTables;

class MemberController extends Controller
{
     public function index()
  {
        $member = Member::query();
        return DataTables::eloquent($member)
                ->setTransformer(new MemberTransformer)
                ->toJson();
  }
}
