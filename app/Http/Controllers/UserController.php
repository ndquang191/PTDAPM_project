<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\DanhGia;
use App\Models\HDLD;
use App\Models\BaoHiem;
use App\Models\NghiPhep;



class UserController extends Controller
{
    public function showEvaluate(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluates = DanhGia::where('MaNV',Auth::user()->MaNV)->get();
        return view('user.danhgia',['user' => $user,'evaluates' => $evaluates]);
    }

    public function showInfo(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employeeInfo = NhanVien::where("MaNV",Auth::user()->MaNV)->first();
        return view('user.detail',['user' => $user,'employeeInfo' => $employeeInfo]);
    }

    public function showContract(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = HDLD::where("MaNV", Auth::user()->MaNV)->where('TrangThai',1)->first();
        return view('user.hdld',['user' => $user,'contract' => $contract]);
    }

    public function showInsurance(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = BaoHiem::where("MaBH",Auth::user()->MaBH)->first();
        return view('user.baohiem',['user' => $user,'contract' => $contract]);
    }

    public function showLeave(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leaves = NghiPhep::where("MaNV",Auth::user()->MaNV)->get();
        return view('user.nghiphep',['user' => $user,'leave' => $leaves]);
    }

    public function storeLeaveRequest(Request $request){
        NghiPhep::create([
            'MaNV' => Auth::user()->MaNV,
            'NgayBatDau' => $request->startDate,
            'NgayKetThuc' => $request->endDate,
            'NoiDung' => $request->reason,
            'PheDuyet' => 0,
            'CoPhep' => 1,
        ]);
        return redirect()->route('showLeaveUser')->with(['message' => "Gửi yêu cầu thành công !", 'type' => 'success']);
    }
}
