<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthenticationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

Route::get(' /user' , function(){
    return view('user.index');
});
Route::get(' /' , function(){
    return view('welcome');
});



Route::get('/auth',[AuthenticationController::class,'getAuth']);
Route::get('/homepage',[AuthenticationController::class,'homePage']);
Route::get('/listaccemployee',[AuthenticationController::class,'listaccemployee']);
Route::post('/register',[AuthenticationController::class,'register']);
Route::get('/profile', function () {
    return dd('Thông tin của một nhân viên nào đó');
})->middleware('checkrole');




Route::get('/dsnv',function(){
    return view('dsnvs.dsnv');
});
Route::get('/addnv',function(){
    return view('dsnvs.addNv');
});
Route::get('/infonv',function(){
    return view('dsnvs.infoNv');
});
Route::get('/editnv',function(){
    return view('dsnvs.editNv');
});
Route::get('/dsbcnv', function () {
    return view('bangcaps.dsbc');
});
Route::get('/addbcnv', function () {
    return view('bangcaps.addbc');
});
Route::get('/editbcnv', function () {
    return view('bangcaps.editbc');
});
