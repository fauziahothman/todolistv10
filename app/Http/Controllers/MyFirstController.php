<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstController extends Controller
{
    //
    function aboutus($kementerian) {
        return view('aboutus',compact('kementerian'));
    }
}
