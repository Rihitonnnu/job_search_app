<?php

use App\Http\Controllers\User\UserInfoController;
use App\Http\Controllers\User\RecruitController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\RecruitMailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\SpreadSheetController;
use App\Http\Controllers\User\ApplicationController;

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
    return view('user.welcome');
});

Route::resource('info',UserInfoController::class)
->middleware(['auth:users']);

Route::resource('recruit',RecruitController::class)
->middleware(['auth:users']);

Route::get('/dashboard',[DashboardController::class,'show'])->middleware(['auth:users'])->name('dashboard');

Route::get('/mail', [RecruitMailController::class,'index'])->middleware(['auth:users']);
Route::post('/mail', [RecruitMailController::class,'send'])->middleware(['auth:users']);

Route::resource('sheet',SpreadSheetController::class)->middleware(['auth:users']);

Route::get('application/{id}',[ApplicationController::class,'registration'])->middleware(['auth:users'])->name('application');
require __DIR__.'/auth.php';
