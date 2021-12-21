<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PersonalizedController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UsercenterController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\StateController;

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
    Route::get('/user/id/{idUser}', [UserController::class, 'showIdUser']);
    Route::get('/user/all', [UserController::class, 'show']);
    Route::get('/user/email/{email}', [UserController::class, 'showEmail']);
    Route::delete('/user/{idUser}', [UserController::class, 'destroy']);
    Route::put('/user', [UserController::class, 'update']);

    //User Center
    //=====================================
    Route::get('/user/center/all', [UsercenterController::class, 'show']);
    Route::get('/user/center/id/{idUser}', [UsercenterController::class, 'showIdUser']);

    //Bank
    //=====================================
    Route::get('/bank/all', [BankController::class, 'all']);
    Route::get('/bank/country/{idBank}', [BankController::class, 'getDataXidCountry']);
    Route::post('/bank/country/ids', [BankController::class, 'showSeveralIdCountrys']);
    Route::post('/bank', [BankController::class, 'create']);
    Route::delete('/bank/{idBank}', [BankController::class, 'destroyXIdBank']);

    //Country
    //=====================================
    Route::get('/country/all', [CountryController::class, 'show']);
    Route::get('/country/id/{idCountry}', [CountryController::class, 'showIdCountry']);
    Route::post('/country/ids', [CountryController::class, 'showSeveralIdCountrys']);
    Route::post('/country', [CountryController::class, 'create']);
    Route::delete('/country/{idCountry}', [CountryController::class, 'destroy']);
    Route::put('/country', [CountryController::class, 'update']);

    //Region
    //=====================================
    Route::get('/region/all', [RegionController::class, 'show']);
    Route::get('/region/id/{idRegion}', [RegionController::class, 'showIdRegion']);
    Route::post('/region/ids', [RegionController::class, 'showSeveralIdRegions']);
    Route::get('/region/country/{idCountry}', [RegionController::class, 'showCountry']);
    Route::post('/region', [RegionController::class, 'create']);
    Route::delete('/region/{idRegion}', [RegionController::class, 'destroy']);
    Route::put('/region', [RegionController::class, 'update']);

    //Center
    //=====================================
    Route::get('/center/all', [CenterController::class, 'show']);
    Route::get('/center/id/{idCenter}', [CenterController::class, 'showIdCenter']);
    Route::post('/center/ids', [CenterController::class, 'showSeveralIdCenter']);
    Route::get('/center/region/{idRegion}', [CenterController::class, 'showIdRegion']);
    Route::post('/center', [CenterController::class, 'create']);
    Route::delete('/center/{idCenter}', [CenterController::class, 'destroy']);
    Route::put('/center', [CenterController::class, 'update']);

    //Office
    //=====================================
    Route::get('/office/all', [OfficeController::class, 'show']);
    Route::get('/office/id/{idOffice}', [OfficeController::class, 'showIdOffice']);
    Route::get('/office/center/{idCenter}', [OfficeController::class, 'showIdCenter']);
    Route::post('/office/center/ids', [OfficeController::class, 'showSeveralIdOffice']);
    Route::post('/office', [OfficeController::class, 'create']);
    Route::delete('/office/{idOffice}', [OfficeController::class, 'destroy']);
    Route::put('/office', [OfficeController::class, 'update']);

    //Route
    //=====================================
    Route::post('/route/office/ids', [RouteController::class, 'showSeveralIdOffice']);

    //Transfers
    //=====================================
    Route::get('/transfer/id/{idUser}', [TransferController::class, 'showTransferIdUser']);
    Route::post('/transfer/save/image', [TransferController::class, 'saveImage']);
    Route::post('/transfer/save', [TransferController::class, 'save']);
    Route::put('/transfer/status', [TransferController::class, 'changeStatus']);

    //States
    //=====================================
    Route::post('/states/country/ids', [StateController::class, 'showStatesIdCountry']);

    //Personalizados
    //=====================================
    Route::get('/personalized/id/{idUser}', [StateController::class, 'showDataUser']);
});

//Route
//=====================================
Route::get('/route/all', [RouteController::class, 'show']);
Route::get('/route/id/{idRoute}', [RouteController::class, 'showIdRoute']);
Route::get('/route/office/{idOffice}', [RouteController::class, 'showIdOffice']);
Route::get('/route/{idOffice}/{type}', [RouteController::class, 'showRouteXOfficeType']);

Route::post('/route', [RouteController::class, 'create']);
Route::delete('/route/{idRoute}', [RouteController::class, 'destroy']);
Route::put('/route', [RouteController::class, 'update']);



//RUTAS NO PROTEGIDAS POR TOKEN
//===================================================================
Route::get('/language/all', [LanguageController::class, 'show']);
Route::post('/user', [UserController::class, 'create']);
Route::post('/user/login', [UserController::class, 'login']);

Route::get('u/{id}', function ($id) {
    return 'User ' . $id;
});
