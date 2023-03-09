<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\DanhGia;
use App\Models\HDLD;
use App\Models\BaoHiem;



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
        $contracts = HDLD::where("MaNV",Auth::user()->MaNV)->get();
        return view('user.hdld',['user' => $user,'contracts' => $contracts]);
    }

    public function showInsurance(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contracts = BaoHiem::where("MaNV",Auth::user()->MaNV)->get();
        return view('user.',['user' => $user,'contracts' => $contracts]);
    }
}
