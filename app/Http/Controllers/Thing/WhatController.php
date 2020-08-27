<?php

namespace App\Http\Controllers\Thing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use DB;

class WhatController extends Controller
{
    public function index() {
        $data = DB::table('what') -> get();
//         dd($data);
        return view('thing.what',compact('data'));
    }
}
