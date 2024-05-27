<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\MainController;

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

//Route::get('/', function () {
    //return view('dashboard');
//});

Route::prefix('management')->middleware(['auth'])
->controller(MainController::class)
->name('management.')
->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
});

Route::get('/', [FirstController::class, 'index'])
->middleware(['auth'])
->name('dashboard');

require __DIR__.'/auth.php';
