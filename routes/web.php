<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



route::group(['prefix'=>'admin','middleware'=>['isadmin','auth']],function(){
    route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    route::get('dashboard',[AdminController::class,'profile'])->name('admin.profile');
    route::get('dashboard',[AdminController::class,'settings'])->name('admin.settings');
});

route::group(['prefix'=>'user','middleware'=>['isuser','auth']],function(){
    route::get('dashboard',[UserController::class,'index'])->name('user.dashsboad');
    route::get('profile',[UserController::class,'index'])->name('user.profile');
    route::get('settings',[UserController::class,'index'])->name('user.settings');

});