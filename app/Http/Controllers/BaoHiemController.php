<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use App\Models\BaoHiem;


class BaoHiemController extends Controller
{
    public function showListBHXH(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $insurances = BaoHiem::all();
        return view('baohiemxhs.dsbhxh',['user' => $user,'insurances' => $insurances]);
    }

    public function createBHXH(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('baohiemxhs.addbhxh',['user' => $user]);
    }
}
