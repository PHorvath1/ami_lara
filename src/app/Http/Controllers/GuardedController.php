<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;

class GuardedController extends Controller
{
    public function __construct()
    {
        $this->middleware([BouncerCheck::class]);
    }
}
