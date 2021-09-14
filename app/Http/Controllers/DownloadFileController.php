<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\Response;

class DownloadFileController extends Controller
{
    function downloadFile($file_name){
        $path = storage_path('app/public/');
        return Storage::download($path, $file_name);
    }
}
