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

Route::controller(AuthenticationController::class)->prefix('/')->group(function(){
    Route::get('/','index');
    Route::post('/','login')->name('login');
    Route::get('/logout','logout');
});

Route::controller(/* EmployeeController*/)->middleware(['checkLogin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/','index'); // Hiển thị danh sách nhân viên
    Route::get('/add','create'); // Hiển thị form thêm nhân viên
    Route::post('/add','store'); // Hiển thị form thêm nhân viên
    Route::get('/{id}','getEmployeeInfo'); // Hiển thị chi tiết hồ sơ nhân viên
    Route::get('/{id}/edit','editEmployeeInfo'); // chỉnh sửa chi tiết hồ sơ nhân viên

});

Route::controller(/* AccountController*/)->middleware(['checkLogin','checkAdmin1'])->prefix('/account')->group(function(){
    Route::get('/','index'); // Hiển thị danh sách tài khoản

});


Route::get('/profile', function () {
    return dd('Thông tin của một nhân viên nào đó');
})->middleware(['checkLogin','checkAdmin1']);

Route::get('/img',[AuthenticationController::class,'getIndex']);
Route::post('/img',[AuthenticationController::class,'storeImg']);





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
