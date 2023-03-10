<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\NhanVien;
use App\Models\DanhGia;


class DanhGiaController extends Controller
{
    public function showListEvaluate(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluates = DanhGia::orderBy('NgayQuyetDinh','asc')->get();
        return view('danhgia.danhgia_ds',['user' => $user,'evaluates' => $evaluates]);
    }

    public function addEvaluate(Request $request){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('danhgia.danhgia_add',['user' => $user]);
    }

    public function editEvaluate(Request $request,$id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluates = DanhGia::orderBy('NgayQuyetDinh','asc')->get();
        return view('danhgia.danhgia_edit',['user' => $user, 'evaluate' => null]);
    }
}
