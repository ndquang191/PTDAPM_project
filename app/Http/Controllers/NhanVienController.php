<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Carbon\Carbon;
use Str;
use Hash;

class NhanVienController extends Controller
{
    public function list(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employees = NhanVien::all();
        return view('dsnvs.dsnv',['user' => $user,'employees' => $employees])->with(['status','success']);
    }

    public function create(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('dsnvs.addNv',['user' => $user]);
    }
    
    public function store(Request $request){
        // Kiểm tra định dạng các trường
        // return dd($request->all());
        // $validated = $request->validate([
        //     // 'username' => 'bail|required',
        // ],
        // [
        //     // 'username.required' => "Vui lòng điển tên đăng nhập và đăng nhập.",

        // ]);
        NhanVien::create([
            'TenNV' => Str::random(5),
            'HinhAnh' => null,
            'NgaySinh' => Carbon::today()->subDays(rand(0, 365)),
            'GioiTinh' => floor(rand(0,1)),
            'CCCD' => '0'.strval(rand(10000000000,99999999999)),
            'DiaChi' => Str::random(20),
            'NoiSinh' => Str::random(8),
            'TonGiao' => Str::random(8),
            'DanToc' => Str::random(8),
            'SDT' => '0'.strval(rand(100000000,999999999)),
            'Email' => Str::random(5).'@gmail.com',
            'ChuyenNganh' => Str::random(8),
            'TrinhDoHocVan' => Str::random(8),
            'PhongBan' => Str::random(8),
            'ChucVu' => Str::random(8),
        ]);

        TaiKhoan::create([
            'MaNV' => NhanVien::orderBy('MaNV','desc')->first()->MaNV,
            'MatKhau' => Hash::make('member'),
            'TrangThai' => 1,'QuyenTruyCap' => 'member',
            'NgayTao' => Carbon::now(),
        ]);
        // Điều hướng về trang nhân viên
        return redirect()->route('listEmployee');
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
