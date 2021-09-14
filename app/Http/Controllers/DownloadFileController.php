<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\Response;

class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        $file = Storage::disk('public')->get($file_name);
  
        return (new Response($file, 200))
              ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }
}
