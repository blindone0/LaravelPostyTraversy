<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StreamController extends Controller
{
    //streamLive
    public function streamLive()
    {
        dd(Storage::allFiles());
        $records = array_filter(Storage::allFiles(public_path()), function ($item) {
            //only png's
            return strpos($item, '.mp4');
         });
        return view('stream', [
            "records" => $records,
        ]);
    }
}
