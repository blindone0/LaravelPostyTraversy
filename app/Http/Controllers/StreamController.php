<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StreamController extends Controller
{
    //streamLive
    public function streamLive()
    {
        $records = array_filter(Storage::disk('public/')->files(), function ($item) {
            //only png's
            return strpos($item, '.mp4');
         });
         dd($records);
        return view('stream', [
            "records" => $records,
        ]);
    }
}
