<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CRUDcontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[CustomAuthController::class,'userlogin'])->middleware('NotLoggedOut');
Route::get('/register',[CustomAuthController::class,'registration'])->middleware('NotLoggedOut');;
Route::post('/regsubmit',[CustomAuthController::class,'register_click'])->name('user-register');
Route::post('/loginsubmit',[CustomAuthController::class,'login_click'])->name('user-login');
Route::get('/userhome',[CustomAuthController::class,'login_success'])->middleware('IsLoggedIn');
Route::get('/logout',[CustomAuthController::class,'logout']);

Route::resource('students', CRUDcontroller::class);

Route::resource('admin', Admincontroller::class);

Route::get('/gallery',[ImageController::class,'gallery']);
Route::post('/gallery/upload',[ImageController::class,'upload'])->name('img-add');
