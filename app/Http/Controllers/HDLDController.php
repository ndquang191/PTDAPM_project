<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HDLDController extends Controller
{
    public function showListHDLD(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_ds',['user' => $user]);
    }

    public function createHDLD(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_add',['user' => $user]);
    }

    public function editHDLD($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_edit',['user' => $user]);
    }

    public function showDetail(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_show',['user' => $user]);
    }
}
