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
        $evaluates = DanhGia::with('nhanvien')->get();
        return view('danhgia.danhgia_ds',['user' => $user,'evaluates' => $evaluates]);
    }

    public function addEvaluate(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('danhgia.danhgia_add',['user' => $user]);
    }

    public function storeEvaluate(Request $request){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        if(($request->PhanLoai == 1 && $request->GiaTri < 0) || ($request->PhanLoai == 0 && $request->GiaTri > 0)){
            return redirect()->back()->with(['message' => 'Giá trị không hợp lệ','type' => 'error']);
        }
        return redirect()->route('showListEvaluate')->with(['message' => 'Thêm thành công','type' => 'success']);

    }

    public function editEvaluate(Request $request,$id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluates = DanhGia::orderBy('NgayQuyetDinh','asc')->get();
        return view('danhgia.danhgia_edit',['user' => $user, 'evaluate' => null]);
    }
    public function ls_danhgia(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('danhgia.danhgia_lichsu',['user' => $user, 'evaluate' => null]);
    }
    public function show_danhgia(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('danhgia.danhgia_show',['user' => $user, 'evaluate' => null]);
    }
}
