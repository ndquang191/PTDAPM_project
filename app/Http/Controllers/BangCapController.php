<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BangCap;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BangCapController extends Controller
{
    public function showByMaNV($id){
        $user = NhanVien::find(Auth::user()->MaNV);
        $employee = NhanVien::find($id);
        $degrees = BangCap::where('MaNV',$id)->get();
        return view('bangcaps.dsbc',['user' => $user,'degrees' => $degrees,'employee' => $employee]);
    }

    public function create(){
        $user = NhanVien::find(Auth::user()->MaNV);
        return view('bangcaps.addbc',['user' => $user]);
    }

    public function edit($id,$degreeID){
        $user = NhanVien::find(Auth::user()->MaNV);
        $degree = BangCap::find($degreeID);
        return view('bangcaps.addbc',['user' => $user,'degree' => $degree]);
    }
    
}
