<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class DownloadFileController extends Controller
{
    /**
     * @throws FileNotFoundException
     */
    public function download($fileName)
    {
        $path = 'uploads/articles/'.$fileName;
        $header = ['Content-Type: application/pdf'];
        return response()->file($path, $header);
    }
}
