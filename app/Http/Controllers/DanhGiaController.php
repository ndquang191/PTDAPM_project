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
        $evaluates = DanhGia::with('nhanvien')->orderBy('MaNV','asc')->orderBy('PhanLoai','desc')->get();
        return view('danhgia.danhgia_ds',['user' => $user,'evaluates' => $evaluates]);
    }

    public function addEvaluate(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('danhgia.danhgia_add',['user' => $user]);
    }

    public function storeEvaluate(Request $request){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $validator = $request->validate([
            'MaNV' => 'required',
            'NgayQuyetDinh' => 'required',
            'NoiDung' => 'required',
            'GiaTri' => 'required',
            'PhanLoai' => 'required',
        ],[
            'required' => 'Vui lòng nhập đầy đủ thông tin'
        ]);

        if(($request->PhanLoai == 1 && $request->GiaTri < 0) || ($request->PhanLoai == 0 && $request->GiaTri > 0)){
            return redirect()->back()->withInput()->with(['message' => 'Giá trị không hợp lệ','type' => 'error']);
        }

        DanhGia::create([
            'MaNV' => $request->MaNV,
            'NgayQuyetDinh' => $request->NgayQuyetDinh,
            'NoiDung' => $request->NoiDung,
            'GiaTri' => $request->GiaTri,
            'PhanLoai' => $request->PhanLoai,
        ]);
        return redirect()->route('showListEvaluate')->with(['message' => 'Thêm thành công','type' => 'success']);

    }

    public function editEvaluate($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluate = DanhGia::where('MaDG',$id)->with('nhanvien')->first();
        return view('danhgia.danhgia_edit',['user' => $user, 'evaluate' => $evaluate]);
    }

    public function updateEvaluate(Request $request,$id){
        $evaluate = DanhGia::where('MaDG',$id)->with('nhanvien')->first();
        $validator = $request->validate([
            'MaNV' => 'required',
            'NgayQuyetDinh' => 'required',
            'NoiDung' => 'required',
            'GiaTri' => 'required',
            'PhanLoai' => 'required',
        ],[
            'required' => 'Vui lòng nhập đầy đủ thông tin'
        ]);

        if(($request->PhanLoai == 1 && $request->GiaTri < 0) || ($request->PhanLoai == 0 && $request->GiaTri > 0)){
            return redirect()->back()->withInput()->with(['message' => 'Giá trị không hợp lệ','type' => 'error']);
        }

        $evaluate->update([
            'MaNV' => $request->MaNV,
            'NgayQuyetDinh' => $request->NgayQuyetDinh,
            'NoiDung' => $request->NoiDung,
            'GiaTri' => $request->GiaTri,
            'PhanLoai' => $request->PhanLoai,
        ]);
        
        return redirect()->route('showListEvaluate')->with(['message' => 'Cập nhật thành công','type' => 'success']);
    }

    public function showDetail($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluate = DanhGia::with('nhanvien')->where('MaDG',$id)->first();
        return view('danhgia.danhgia_show',['user' => $user,'evaluate' => $evaluate]);
    }
}
