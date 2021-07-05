<?php

use App\Http\Controllers\api\v1\ApiUserController;
use App\Http\Middleware\ApiToken;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::name('api.')->group(function () {
    Route::resource('users', ApiUserController::class)->middleware(ApiToken::class);


});
