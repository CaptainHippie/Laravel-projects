<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerRegistration;

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


Route::get('/',[CustomerRegistration::class,'indexpage'])->name('add-customers');
Route::get('/view',[CustomerRegistration::class,'viewcustomer'])->name('all-customers');
Route::get('/showcustomer/{id}',[CustomerRegistration::class,'showCustomer'])->name('view-customer');

Route::post('api/fetch-state',[CustomerRegistration::class,'fetchState']);
Route::post('api/fetch-city',[CustomerRegistration::class,'fetchCity']);

Route::post('',[CustomerRegistration::class,'create'])->name('customer-add');

