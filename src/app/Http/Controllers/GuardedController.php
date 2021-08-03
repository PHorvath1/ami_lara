<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use Illuminate\Http\Request;

abstract class GuardedController extends Controller
{
    protected array $except = [];

    public function __construct()
    {
        $this->middleware(BouncerCheck::class)->except($this->except);
    }
}
