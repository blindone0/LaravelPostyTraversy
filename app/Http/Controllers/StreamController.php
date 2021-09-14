<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamController extends Controller
{
    //streamLive
    public function streamLive()
    {
        return view('streamLive');
    }
}
