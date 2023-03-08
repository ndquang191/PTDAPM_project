<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\HDLD;

class HDLDController extends Controller
{
    //
    public function showListHDLD(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contracts = HDLD::all();
        return view('hdlds.hdld_ds',['user' => $user,'contracts' => $contracts]);
    }

    public function createHDLD(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_add',['user' => $user]);
    }
    
    public function storeHDLD(Request $request){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $validator = $request->validate([
            'MaNV' => 'required|numeric',
            'LoaiHD' => 'required',
            'NgayKi' => 'required',
            'NgayBatDau' => 'required',
            'NgayKetThuc' => 'required',
            'DiaDiem' => 'required',
            'ChuyenMon' => 'required',
            'PhapNhan' => 'required',
            'Luong' => 'required|numeric',
            'HeSoLuong' => 'required|numeric|max:8',
        ],[
            'required' => "Nhập thiếu thông tin",
            'MaNV.numeric' => 'Mã nhân viên sai định dạng',
            'HeSoLuong.max' => 'Hệ số lương không vượt quá 8',
            'Luong.numeric' => 'Lương sai định dạng',
            'HeSoLuong.numeric' => 'Hệ số lương sai định dạng',

        ]);

        HDLD::create([
            'MaNV' => $request->MaNV,
            'SoHD' => floor(rand(10000,99999)),
            'LoaiHopDong' => $request->LoaiHD,
            'NgayKi' => $request->NgayKi,
            'NgayBatDau' => $request->NgayBatDau,
            'NgayKetThuc' => $request->NgayKetThuc,
            'DiaDiem' => $request->DiaDiem,
            'PhapNhan' => $request->PhapNhan,
            'LuongCoBan' => $request->Luong,
            'HeSoLuong' => $request->HeSoLuong,
            'ChuyenMon' => $request->ChuyenMon,
        ]);
        return redirect()->route('showListHDLD')->with(['message' => 'Thêm hợp đồng thành công', 'type' => 'success']);
    }

    public function editHDLD($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_edit',['user' => $user]);
    }

    public function showDetail(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('hdlds.hdld_show',['user' => $user]);
    }

    public function test(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('user.hdld',['user' => $user]);
    }
}
