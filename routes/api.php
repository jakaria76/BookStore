<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // 'auth:sanctum' middleware apply kora, mane Sanctum token authentication required
    return $request->user();
    // Request theke user data fetch kore return kora
});

