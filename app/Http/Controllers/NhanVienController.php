<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\NhanVien;

class NhanVienController extends Controller
{
    public function list(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employees = NhanVien::all();
        return view('dsnvs.dsnv',['user' => $user,'employees' => $employees]);
    }

    public function create(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('dsnvs.addNv',['user' => $user]);
    }
    
    public function store(){

    }

    public function edit(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('dsnvs.editNv',['user' => $user]);
    }

    public function update(){
        
    }

    public function destroy(){
        
    }

    public function findNVbyID(){

    }

    public function findNVbyChucVu(){
        
    }

    public function findNVbyPhongBan(){
        
    }

    public function findNVbyTen(){
        
    }

    public function findNVbyTrangThai(){
        
    }

    public function getEmployeeInfo($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employee = NhanVien::find($id);
        return view('dsnvs.infoNv',['employee' => $employee,'user' => $user]);
    }
}
