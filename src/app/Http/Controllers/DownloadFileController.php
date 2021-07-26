<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class DownloadFileController extends Controller
{
    public function download($fileName)
    {
       $file=Storage::disk('public')->get($fileName);
       return (new Response($file, 200))->header('Content-Type', 'pdf');
    }
}
