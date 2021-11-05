<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\TipCatController;
use App\Http\Controllers\CountiesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/search', [App\Http\Controllers\TipsController::class, 'searchTip'])->name('tips.search')->middleware('auth');
Route::get('/counties', [App\Http\Controllers\CountiesController::class,'index'])->name('counties.index')->middleware('auth');
Route::post('/tipUpdate', [App\Http\Controllers\TipsController::class, 'updateTip'])->name('tips.updateTip')->middleware('auth');
Route::resource('tips',TipsController::class)->middleware('auth');
Route::resource('tip-categories',TipCatController::class)->middleware('auth');





// Route::get('/', function () {
//     return view('welcome');
// });


