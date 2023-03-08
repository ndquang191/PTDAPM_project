<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\BangCapController;
use App\Http\Controllers\HDLDController;
use App\Http\Controllers\NghiPhepController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\TestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('hdld/hdld_ds',[HDLDController::class,'ds_hdld']);
Route::get('hdld/hdld_add',[HDLDController::class,'add_hdld']);
Route::get('hdld/hdld_edit',[HDLDController::class,'edit_hdld']);
Route::get('hdld/hdld_show',[HDLDController::class,'show_hdld']);

Route::controller(TaiKhoanController::class)->prefix('/')->group(function(){
    Route::get('/','showLoginPage')->name('login');
    Route::post('/','login');
    Route::get('/logout','logout');
    Route::get('/homepage','showHomePage')->middleware('checkLogin'); // Trang người dùng
    Route::get('/admin','showAdminPage')->middleware(['checkLogin','checkAdmin']); // Trang admin
});

Route::controller(NhanVienController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/employee')->group(function(){
    Route::get('/','list')->name('listEmployee'); // Hiển thị danh sách nhân viên
    Route::get('/add','create')->name('addEmployeePage'); // Hiển thị form thêm nhân viên
    Route::post('/add','store')->name('storeEmployee'); // Lưu thông tin nhân viên thêm mới
    Route::get('/{id}','getEmployeeInfo')->name('getEmployeeInfo'); // Hiển thị chi tiết hồ sơ nhân viên
    Route::post('/{id}','store')->name('updateEmployeeInfo'); // chỉnh sửa chi tiết hồ sơ nhân viên
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
    Route::get('/{id}/edit','edit')->name('editLeave'); // Hiển thị form sửa hợp đồng
});

Route::controller(DanhGiaController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/evaluate')->group(function(){

});

Route::controller(TaiKhoanController::class)->middleware(['checkLogin','checkAdmin1'])->prefix('/account')->group(function(){
    Route::get('/','listAccount')->name('showListAccount'); // Hiển thị danh sách tài khoản
    Route::post('/{id}/reset','resetPassword'); // Hiển thị danh sách tài khoản

});

Route::middleware(['checkLogin'])->prefix('/user')->group(function(){
    Route::get('/evaluate',[DanhGiaController::class,'showEvaluate'])->name('showEvaluateUser'); // Hiển thị danh sách đánh giá
    Route::get('/info',[TaiKhoanController::class,'showInfo'])->name('showInfoUser'); // Hiển thị thông tin tài khoản
    // Route::get('/contract',[HDLDController::class,'showDetailUser'])->name('showContractUser'); // Hiển thị chi tiết HDLD
    Route::get('/leave',[NghiPhepController::class,'userList'])->name('???'); // Hiển thị
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

Route::get('dsbhxh', function () {
    return view('baohiemxhs.dsbhxh');
});
Route::get('infobhxh', function () {
    return view('baohiemxhs.infobhxh');
});
Route::get('addbhxh', function () {
    return view('baohiemxhs.addbhxh');
});
Route::get('/homepage',[TestController::class,'homePage']);
Route::get('/listaccemployee',[TestController::class,'listaccemployee']);
Route::get('/changepw',[TestController::class,'changepw']);
Route::get('/leavelist',[TestController::class,'leavelist']);
Route::get('/addleave',[TestController::class,'addleave']);
Route::get('/editleave',[TestController::class,'editleave']);
Route::get('/historyleave',[TestController::class,'historyleave']);
Route::get('/salary',[TestController::class,'salary']);
Route::get('/detailsalary',[TestController::class,'detailsalary']);
Route::get('/pdfsalary',[TestController::class,'pdfsalary']);