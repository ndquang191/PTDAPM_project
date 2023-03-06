<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\BangCapController;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;

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

Route::controller(BangCapController::class)->middleware(['auth','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/{id}/degree','showByMaNV'); // Hiển thị danh sách bằng cấp của nhân viên
    Route::get('/{id}/degree/add','create')->name('addDegreeForm'); // Hiển thị form thêm bằng cấp nhân viên
    Route::get('/{id}/degree/{degreeID}/edit','edit')->name('editDegreeForm'); // Hiển thị danh sách bằng cấp của nhân viên
});


Route::get('/test' , function(){

    $user = NhanVien::find(Auth::user()->MaNV);
    return view('Leavelist.leavelist',['user' => $user]);
});

Route::get('dsnv', function () {
    return view('dsnvs.addNv');
});
