<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\NhanVienController;

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

Route::controller(TaiKhoanController::class)->prefix('/')->group(function(){
    Route::get('/','showLoginPage')->name('login');
    Route::post('/','login');
    Route::get('/logout','logout');
    Route::get('/homepage','showHomePage')->middleware('checkLogin'); // Trang người dùng
    // Route tới admin page //
});

Route::controller(NhanVienController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/','list')->name('listEmployee'); // Hiển thị danh sách nhân viên
    Route::get('/add','create')->name('addEmployeePage'); // Hiển thị form thêm nhân viên
    Route::post('/add','store'); // Lưu thông tin nhân viên thêm mới
    Route::get('/{id}','getEmployeeInfo')->name('getEmployeeInfo'); // Hiển thị chi tiết hồ sơ nhân viên
    Route::get('/{id}/edit','editEmployeeInfo'); // chỉnh sửa chi tiết hồ sơ nhân viên

});

Route::controller(/* AccountController*/)->middleware(['auth','checkAdmin1'])->prefix('/account')->group(function(){
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
Route::get('/test',function(){
    return view('login2');
});
