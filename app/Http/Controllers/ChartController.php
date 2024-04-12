<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function viewChart(){
        return view('admin.partials.charts');
    }
}
