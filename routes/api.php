<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS PROTEGIDAS POR TOKEN
//===================================================================
Route::group(['middleware' => 'auth:api'], function () {
    //Protegidas

    //User
    //=====================================
    Route::get('/user/all', [UserController::class, 'show']);
    Route::get('/user/id/{idUser}', [UserController::class, 'showIdUser']);
    Route::get('/user/email/{email}', [UserController::class, 'showEmail']);
    Route::delete('/user/{idUser}', [UserController::class, 'destroy']);
    Route::put('/user', [UserController::class, 'update']);
});



//RUTAS NO PROTEGIDAS POR TOKEN
//===================================================================
Route::get('/language/all', [LanguageController::class, 'show']);
Route::post('/user', [UserController::class, 'create']);
Route::post('/user/login', [UserController::class, 'login']);
