<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\BranchesController;
use App\Http\Controllers\admin\DynamicsController;

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
    $page='HOME';
    return view('welcome',compact('page'));
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::group(['prefix' =>'admin','middleware' => 'auth:sanctum'],function () {
    Route::get('/',get_controller(HomeController::class,'index'));
    Route::resource('/branches',get_controller(BranchesController::class));

    Route::group(['prefix' =>'dynamics'],function () {
        Route::get('/home',get_controller(DynamicsController::class,'edit_home'));
        Route::post('/home',get_controller(DynamicsController::class,'update_home'));
        Route::get('/about',get_controller(DynamicsController::class,'edit_about'));
        Route::post('/about',get_controller(DynamicsController::class,'update_about'));
    });
});
