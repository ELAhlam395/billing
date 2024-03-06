<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaidController;
use App\Models\Morocco;


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
///////////////////////view//////////////////
Route::get('/', function () {
    $morocco =Morocco::all();
    return view('menu.index',compact('morocco'));
});
Route::get('/index', [PaidController::class, 'viewindex']);
Route::get('/welcome', [PaidController::class, 'viewwelcome']);


//------------------ACTIONS-----maroc---------------------------
Route::post('/added', [PaidController::class, 'add']);
Route::get('/searchMR', [PaidController::class, 'search']);
Route::get('/deleted/{id}', [PaidController::class, 'destroy']);
Route::post('/edit/{id}', [PaidController::class, 'update']);

//------------------ACTIONS-----india---------------------------
Route::post('/addedind', [PaidController::class, 'addind']);
Route::get('/searchind', [PaidController::class, 'searchind']);
Route::get('/deletedind/{id}', [PaidController::class, 'destroyind']);
Route::post('/editind/{id}', [PaidController::class, 'updateind']);