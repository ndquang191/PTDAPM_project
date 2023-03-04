<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('hdlds.hdld_ds');
// });
// Route::get('/', function () {
//     return view('hdlds.hdld_add');
//  });
//  Route::get('/', function () {
//     return view('hdlds.hdld_edit');
//  });
 Route::get('/', function () {
   return view('hdlds.hdld_show');
});