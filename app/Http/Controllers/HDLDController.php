<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\HDLD;
use App\Models\NhanVien;


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

        ]);
        if(NhanVien::where('MaNV',$request->MaNV)->first() == null){
            return redirect()->back()->withInput()->with(['error' => 'Mã nhân viên không tồn tại']);
        }
        if(Carbon::parse($request->NgayBatDau)->gt(Carbon::parse($request->NgayKetThuc))){
            return redirect()->back()->withInput()->with(['error' => 'Ngày bắt đầu phải nhỏ hơn hoặc bằng ngày kết thúc']);
        }
        DB::transaction(function () use($request){
            HDLD::where('MaNV',$request->MaNV)->update([
                'TrangThai' => 0,
            ]);
            HDLD::create([
                'MaNV' => $request->MaNV,
                'LoaiHopDong' => $request->LoaiHD,
                'NgayKi' => $request->NgayKi,
                'NgayBatDau' => $request->NgayBatDau,
                'NgayKetThuc' => $request->NgayKetThuc,
                'DiaDiem' => $request->DiaDiem,
                'PhapNhan' => $request->PhapNhan,
                'ChuyenMon' => $request->ChuyenMon,
                'LuongCoBan' => $request->Luong,
                'HeSoLuong' => $request->HeSoLuong,
            ]);
        });

        return redirect()->route('showListHDLD')->with(['message' => 'Thêm hợp đồng thành công', 'type' => 'success']);
    }

    public function editHDLD($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = HDLD::where('MaHDLD',$id)->first();
        return view('hdlds.hdld_edit',['user' => $user,'contract' => $contract]);
    }

    public function showDetail($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = HDLD::where('MaHDLD',$id)->first();
        return view('hdlds.hdld_show',['user' => $user, 'contract' => $contract]);
    }

    public function updateHDLD(Request $request, $id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $validator = $request->validate([
            'LoaiHD' => 'required',
            'NgayKi' => 'required',
            'NgayBatDau' => 'required',
            'NgayKetThuc' => 'required',
            'DiaDiem' => 'required',
            'ChuyenMon' => 'required',
            'PhapNhan' => 'required',
        ],[
            // 'required' => "Nhập thiếu thông tin",
            'HeSoLuong.max' => 'Hệ số lương không vượt quá 8',

        ]);
        $contract = HDLD::where('MaHDLD',$id)->with('nhanvien')->first();   
        $contract->update([
            'LoaiHopDong' => $request->LoaiHD,
            'NgayKi' => $request->NgayKi,
            'NgayBatDau' => $request->NgayBatDau,
            'NgayKetThuc' => $request->NgayKetThuc,
            'DiaDiem' => $request->DiaDiem,
            'PhapNhan' => $request->PhapNhan,
            'ChuyenMon' => $request->ChuyenMon,
            'TrangThai' => $request->TrangThai,
            'LuongCoBan' => $request->Luong,
            'HeSoLuong' => $request->HeSoLuong,
        ]);
        if($request->TrangThai == 1){
            HDLD::where('MaNV',$contract->MaNV)->where('MaHDLD','!=',$id)->update([
                'TrangThai' => 0,
            ]);
        }

        return redirect()->route('showDetailHDLD',['id' => $id])->with(['message' => 'Cập nhật hợp đồng thành công', 'type' => 'success']);
    }

    public function destroy($id){
        HDLD::where('MaHDLD', $id)->delete();
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = HDLD::where('MaHDLD',$id)->first();
        return redirect()->route('showListHDLD')->with(['message' => 'Xóa hợp đồng thành công', 'type' => 'success']);
    }
}
