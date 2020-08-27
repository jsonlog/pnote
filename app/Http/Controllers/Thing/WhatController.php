<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
use DB;

class WhatController extends Controller
{
    public function index1() {
        $data = DB::table('what') -> get();
        dd($data);
        return view('thing.what',compact('data'));
    }
    public function index2() {
        //                 $data = What::simplePaginate(1);
        $data = DB::table('what') -> paginate(15);
        return view('thing.what',compact('data'));
    }
    public function index() {
        return DB::table('what') -> get();
    }
}
