<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dir\DirController;
use App\Http\Controllers\District\DistrictController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[Home::class,'index']);
Auth::routes();


Route::prefix('admin')->middleware(['auth','web','adminCheck'])->group(function()
{
    Route::get('/',[AdminController::class,'index']);
    Route::get('/user',[UserController::class,'index']);
    Route::post('/add-user',[UserController::class,'create']);
    Route::get('/user/view',[UserController::class,'view']);
    Route::get('/user-edit/{id}',[UserController::class,'edit']);
    Route::put('/user-edit/{id}',[UserController::class,'update']);


});
Route::prefix('dir')->middleware(['auth','web','dirCheck'])->group(function()
{
    Route::get('/',[DirController::class,'index']);
    Route::post('/sanction-add',[DirController::class,'store']);
    Route::get('/view',[DirController::class,'view']);
    Route::get('/edit/{id}',[DirController::class,'edit']);
    Route::put('/sanction-update/{id}',[DirController::class,'update']);
});

Route::prefix('district')->middleware(['auth','web','distCheck'])->group(function()
{
    Route::get('/',[DistrictController::class,'index']);
    Route::get('/details/{gp}',[DistrictController::class,'details']);
    Route::get('/add-progress/{id}',[DistrictController::class,'progress']);
    Route::post('add-progress/',[DistrictController::class,'addProgress']);
});