<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\Response;

class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        $file = "app/public/robots.txt";
        return Response::download($file);
    }
}
