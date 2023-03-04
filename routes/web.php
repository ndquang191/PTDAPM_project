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
*/

Route::get(' /user' , function(){
    return view('user.index');
});
Route::get(' /' , function(){
    return view('welcome');
});
// Route::get('/',[AuthenticationController::class,'index']);
// Route::post('/',[AuthenticationController::class,'login'])->name('login');
// Route::get('/logout',[AuthenticationController::class,'logout']);
// Route::get('/register',function (){
//     return view('register');
// });
// Route::post('/register',[AuthenticationController::class,'register']);
// Route::get('/profile', function () {
//     return dd('Thông tin của một nhân viên nào đó');
// })->middleware('checkrole');


Route::get('/auth',[AuthenticationController::class,'getAuth']);
Route::get('/homepage',[AuthenticationController::class,'homePage']);
Route::get('/listaccemployee',[AuthenticationController::class,'listaccemployee']);
Route::post('/register',[AuthenticationController::class,'register']);
Route::get('/profile', function () {
    return dd('Thông tin của một nhân viên nào đó');
})->middleware('checkrole');

