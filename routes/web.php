<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\BangCapController;
use App\Http\Controllers\HDLDController;
use App\Http\Controllers\NghiPhepController;
use App\Http\Controllers\DanhGiaController;
use App\Models\NhanVien;

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
    Route::get('/admin','showAdminPage')->middleware(['checkLogin','checkAdmin']); // Trang admin
    Route::get('/info','showInfo')->name('showInfo')->middleware('checkLogin');
});

Route::controller(NhanVienController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/','list')->name('listEmployee'); // Hiển thị danh sách nhân viên
    Route::get('/add','create')->name('addEmployeePage'); // Hiển thị form thêm nhân viên
    Route::post('/add','store')->name('storeEmployeePage'); // Lưu thông tin nhân viên thêm mới
    Route::get('/{id}','getEmployeeInfo')->name('getEmployeeInfo'); // Hiển thị chi tiết hồ sơ nhân viên
    Route::get('/{id}/edit','editEmployeeInfo'); // chỉnh sửa chi tiết hồ sơ nhân viên

});

Route::controller(BangCapController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/{id}/degree','showByMaNV'); // Hiển thị danh sách bằng cấp của nhân viên
    Route::get('/{id}/degree/add','create')->name('addDegreeForm'); // Hiển thị form thêm bằng cấp nhân viên
    Route::get('/{id}/degree/{degreeID}/edit','edit')->name('editDegreeForm'); // Hiển thị danh sách bằng cấp của nhân viên
});

Route::controller(HDLDController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/contract')->group(function(){
    Route::get('/','showListHDLD')->name('showListHDLD'); // Hiển thị danh sách hợp đồng
    Route::get('/add','createHDLD')->name('createHDLD'); // Hiển thị form thêm hợp đồng
    Route::get('/{id}/edit','editHDLD')->name('editHDLD'); // Hiển thị form sửa hợp đồng
    Route::get('/{id}/showDetail','showDetail')->name('showDetailHDLD'); // Hiển thị hợp đồng nhân viên
});

Route::controller(NghiPhepController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/leave')->group(function(){
    Route::get('/','list')->name('showListLeave'); // Hiển thị danh sách nghỉ phép
    Route::get('/add','create')->name('createLeave'); // Hiển thị form thêm hợp đồng
});

Route::controller(TaiKhoanController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/account')->group(function(){
    Route::get('/','listAccount')->name('showListAccount'); // Hiển thị danh sách tài khoản
});

Route::controller(DanhGiaController::class)->middleware(['checkLogin'])->prefix('/evaluate')->group(function(){
    Route::get('/','showEvaluate')->name('showEvaluate'); // Hiển thị danh sách đánh giá
});


Route::get('/test' , function(){
    $user = NhanVien::find(Auth::user()->MaNV);
    return view('test',['user' => $user]);
});

Route::get('/testSubmit' , function(){
    return redirect('/test')->with(['message' => 'test']);
});

Route::get('/test2' , function(){
    $user = NhanVien::find(Auth::user()->MaNV);
    return view('user.index',['user' => $user]);
});

Route::get('dsnv', function () {
    return view('dsnvs.addNv');
});
