<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\BangCapController;
use App\Http\Controllers\HDLDController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\NghiPhepController;
use App\Http\Controllers\BaoHiemController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\UserController;
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
    Route::get('/homepage','showHomePage')->name('getHomepage')->middleware('checkLogin'); // Trang người dùng
    Route::get('/admin','showAdminPage')->name('getAdminPage')->middleware(['checkLogin','checkAdmin']); // Trang admin
});

Route::controller(NhanVienController::class)->middleware(['checkLogin','checkAdmin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/','list')->name('listEmployee'); // Hiển thị danh sách nhân viên
    Route::get('/add','create')->name('addEmployeePage'); // Hiển thị form thêm nhân viên
    Route::post('/add','store')->name('storeEmployee'); // Lưu thông tin nhân viên thêm mới
    Route::get('/{id}','getEmployeeInfo')->name('getEmployeeInfo'); // Hiển thị chi tiết hồ sơ nhân viên
    Route::post('/{id}','update')->name('updateEmployeeInfo'); // chỉnh sửa chi tiết hồ sơ nhân viên
});

Route::controller(BangCapController::class)->middleware(['checkLogin','checkAdmin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/{id}/degree','showByMaNV')->name('showDegree'); // Hiển thị danh sách bằng cấp của nhân viên
    Route::get('/{id}/degree/add','create')->name('addDegreeForm'); // Hiển thị form thêm bằng cấp nhân viên
    Route::post('/{id}/degree/add','store')->name('storeDegree'); // Hiển thị form thêm bằng cấp nhân viên
    Route::get('/{id}/degree/{degreeID}/edit','edit')->name('editDegreeForm'); // Hiển thị danh sách bằng cấp của nhân viên
    Route::post('/degree/{degreeID}/delete','destroy')->name('deleteDegree');
});

Route::controller(HDLDController::class)->middleware(['checkLogin','checkAdmin','checkAdmin1'])->prefix('/contract')->group(function(){
    Route::get('/','showListHDLD')->name('showListHDLD'); // Hiển thị danh sách hợp đồng
    Route::get('/add','createHDLD')->name('createHDLD'); // Hiển thị form thêm hợp đồng
    Route::post('/add','storeHDLD')->name('storeHDLD'); // Lưu HDLD
    Route::get('/{id}/edit','editHDLD')->name('editHDLD'); // Hiển thị form sửa hợp đồng
    Route::post('/{id}/edit','updateHDLD')->name('updateHDLD');
    Route::get('/{id}/showDetail','showDetail')->name('showDetailHDLD'); // Hiển thị hợp đồng nhân viên
    Route::post('/{id}/delete','destroy')->name('deleteHDLD');

});

Route::controller(NghiPhepController::class)->middleware(['checkLogin','checkAdmin','checkAdmin2'])->prefix('/leave')->group(function(){
    Route::get('/approve','listApprove')->name('showListApproveLeave');
    Route::get('/request','listRequest')->name('showListRequestLeave');
    Route::get('/request/detail/{requestID}','showRequestDetail')->name('showRequestDetail');
    Route::post('/request/detail/{requestID}','approveLeaveRequest')->name('approveLeaveRequest');
    Route::get('/add','create')->name('createLeave'); // Hiển thị form thêm hợp đồng
    Route::get('/{id}/edit','edit')->name('editLeave'); // Hiển thị form sửa hợp đồng
    Route::get('/detail/{id}','showDetail')->name('showDetailLeave');
    Route::get('/history/{id}','showHistory')->name('showHistory');
});

Route::controller(DanhGiaController::class)->middleware(['checkLogin','checkAdmin','checkAdmin2'])->prefix('/evaluate')->group(function(){
    Route::get('/','showListEvaluate')->name('showListEvaluate');
    Route::get('/detail/{id}','showDetail')->name('showDetail');
    Route::get('/add','addEvaluate')->name('addEvaluate');
    Route::post('/add','storeEvaluate')->name('storeEvaluate');
    Route::get('/edit/{id}','editEvaluate')->name('editEvaluate');
    Route::post('/edit/{id}','updateEvaluate')->name('updateEvaluate');

});

Route::controller(BaoHiemController::class)->middleware(['checkLogin','checkAdmin','checkAdmin2'])->prefix('/insurance')->group(function(){
    Route::get('/','showListBHXH')->name('showListBHXH');
    Route::get('/add','createBHXH')->name('createBHXH');
    Route::post('/add','storeBHXH')->name('storeBHXH');
    Route::get('/info/{id}','getInfoBHXH')->name('getInfoBHXH');
    Route::get('/edit/{id}','editBHXH')->name('editBHXH');
    Route::post('/edit/{id}','updateBHXH')->name('updateBHXH');
});

Route::controller(TaiKhoanController::class)->middleware(['checkLogin','checkAdmin','checkAdmin1'])->prefix('/account')->group(function(){
    Route::get('/','listAccount')->name('showListAccount'); // Hiển thị danh sách tài khoản
    Route::post('/{id}/reset','resetPassword'); // Hiển thị danh sách tài khoản
});

Route::controller(LuongController::class)->middleware(['checkLogin','checkAdmin','checkAdmin2'])->prefix('/salary')->group(function(){
    Route::get('/','showSalary')->name('showSalary');
    Route::get('/{id}/detail','showSalaryDetail')->name('showSalaryDetail');
});

Route::controller(UserController::class)->middleware(['checkLogin'])->prefix('/user')->group(function(){
    Route::get('/evaluate','showEvaluate')->name('showEvaluateUser'); // Hiển thị danh sách đánh giá
    Route::get('/info','showInfo')->name('showInfoUser'); // Hiển thị thông tin tài khoản
    Route::get('/contract','showContract')->name('showContractUser');
    Route::get('/insurance','showInsurance')->name('showInsuranceUser');
    Route::get('/leave','showLeave')->name('showLeaveUser');
    Route::post('/leave','storeLeaveRequest')->name('storeLeaveRequest');
    Route::get('/salary','showSalary')->name('showSalaryUser');
});