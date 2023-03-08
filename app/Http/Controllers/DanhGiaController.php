<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    //
    public function list_danhgia(){
        return view('danhgia.danhgia_ds');
    }
    public function add_danhgia(){
        return view('danhgia.danhgia_add');
    }
    public function edit_danhgia(){
        return view('danhgia.danhgia_edit');
    }
}
