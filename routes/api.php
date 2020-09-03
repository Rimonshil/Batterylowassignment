<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Zttp\Zttp;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/match', function() {
    $apiKey = config('services.entitysport.key');
    $response = Zttp::get("https://rest.entitysport.com/v2/matches/?token=$apiKey");
    return $response->json()['response']['items'];
});
