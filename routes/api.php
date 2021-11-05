<?php
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\GeneralController;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

//Route::resource('products',ProductsController::class);


//Public Routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Products GET
Route::get('/products',[ProductsController::class,'index']);
Route::get('/products/{id}',[ProductsController::class,'show']);
Route::get('/products/search/{name}',[ProductsController::class,'search']);

// Tips GET
Route::get('/tips',[TipsController::class,'index']);
Route::get('/tips/{id}',[TipsController::class,'show']);
Route::get('/tips/search/{name}',[TipsController::class,'search']);

//Categories GET
Route::get('/countiesandcategories',[GeneralController::class,'index']);
Route::get('/county_data',[GeneralController::class,'getCountyData'])->name('api.county-data');

//Protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    //Products
    Route::post('/products',[ProductsController::class,'store']);
    Route::put('/products/{id}',[ProductsController::class,'update']);
    Route::delete('/products/{id}',[ProductsController::class,'destroy']);
    //Tips 
    Route::post('/tips',[TipsController::class,'store']);
    Route::put('/tip/{id}',[TipsController::class,'update']);
    Route::delete('/tips/{id}',[TipsController::class,'destroy']);

    //logout
    Route::post('/logout',[AuthController::class,'logout']);


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//vue
Route::get('/items',[ItemsController::class,'index']);
Route::prefix('/item')->group(function(){
    Route::post('/store',[ItemsController::class,'store']);
    Route::put('/{id}',[ItemsController::class,'update']);
    Route::delete('/{id}',[ItemsController::class,'destroy']);
});