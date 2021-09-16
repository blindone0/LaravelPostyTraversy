<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StreamController extends Controller
{
    //streamLive
    public function streamLive()
    {
        $records = array_filter(Storage::disk('public')->files(), function ($item) {
            //only png's
             $f = strpos($item, '.mp4');
             return Storage::url($f);
         });
        return view('stream', [
            "records" => $records,
        ]);
    }
}
