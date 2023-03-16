<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use App\Models\PhongBan;
use App\Models\ChucVu;
use App\Models\TrinhDoHocVan;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Str;
use Crypt;

class NhanVienController extends Controller
{
    public function list(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employees = NhanVien::with('phongban')->with('trinhdohocvan')->with('chucvu')->get();
        return view('dsnvs.dsnv',['user' => $user,'employees' => $employees])->with(['status','success']);
    }

    public function create(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $phongbans = PhongBan::all();
        $TDHVs = TrinhDoHocVan::all();
        $chucvus = ChucVu::all();
        return view('dsnvs.addNv',['user' => $user,'phongbans' => $phongbans, 'TDHVs' => $TDHVs,'chucvus' => $chucvus]);
    }
    
    public function store(Request $request){
        // Kiểm tra định dạng các trường
            $validator = $request->validate([
                'image' => 'bail|required',
                'birthday' => 'bail|required',
                'ngaycap' => 'bail|required',
                'noicap' => 'bail|required',
                'name' => 'bail|required|regex:/^[\p{L}][\p{L}\s]*$/u',
                'CCCD' => 'bail|required|numeric',
                'gender' => 'bail|required|in:Nam,Nữ',
                'nation' => 'bail|required|regex:/^[\p{L}\p{M}]+$/u',
                'email' => 'bail|required|email',
                'religion' => 'bail|required|regex:/^[\p{L}\p{M}]+$/u',
                'placeofbirth' => 'bail|required',
                'address' => 'bail|required',
                'phonenumber' => 'bail|required|numeric',
            ],[
                // 'image.required' => 'Chưa chọn hình ảnh.',
                // 'birthday.required' => 'Chưa chọn ngày sinh.',
                // 'name.required' => 'Chưa nhập tên nhân viên.',
                // 'name.regex' => 'Tên nhân viên chứa kí tự không hợp lệ.',
                // 'CCCD.required' => 'Chưa nhập số căn cước công dân',
                // 'CCCD.numberic' => 'Căn cước công dân không hợp lệ',
            ]);

            return dd('Thêm thành công');
            NhanVien::create([
                'TenNV' => $request->name,
                // 'HinhAnh' => file_get_contents($request->file('image')->getPathname()),
                'HinhAnh' => null,
                'NgaySinh' => $request->birthday,
                'GioiTinh' => $request->gender == 'Nam' ? 0 : 1,
                'CCCD' => $request->CCCD,
                'NgayCap' => $request->ngaycap,
                'NoiCap' => $request->noicap,
                'DiaChi' => $request->address,
                'NoiSinh' => $request->placeofbirth,
                'TonGiao' => $request->religion,
                'SDT' => $request->phonenumber,
                'DanToc' => $request->nation,
                'Email' => $request->email,
                'MaTDHV' => $request->trinhdo,
                'MaPB' => $request->phongban,
                'MaCV' => $request->chucvu,
                'TrangThai' => 1,
                'TrangThaiHonNhan' => 0,
                'GhiChu' => null,
            ]);

            TaiKhoan::create([
                'MaNV' => NhanVien::orderBy('MaNV','desc')->first()->MaNV,
                'MatKhau' => Hash::make('00000000'),
                'TrangThai' => 1,'QuyenTruyCap' => 'member',
                'NgayTao' => Carbon::now(),
            ]);

        return redirect()->route('listEmployee')->with(['message' => "Thêm nhân viên thành công"]);
    }

    public function edit(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $phongbans = PhongBan::all();
        $TDHVs = TrinhDoHocVan::all();
        $chucvus = ChucVu::all();
        return view('dsnvs.editNv',['user' => $user,'phongbans' => $phongbans, 'TDHVs' => $TDHVs,'chucvus' => $chucvus]);
    }

    public function update(Request $request, $id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $validator = $request->validate([
            'birthday' => 'bail|required',
            'name' => 'bail|required|regex:/^[\p{L}][\p{L}\s]*$/u',
            'CCCD' => 'bail|required|numeric',
            'gender' => 'bail|required|in:0,1',
            'nation' => 'bail|required|regex:/^[\p{L}\p{M}]+$/u',
            'email' => 'bail|required|email',
            'religion' => 'bail|required|regex:/^[\p{L}\p{M}]+$/u',
            'placeofbirth' => 'bail|required',
            'address' => 'bail|required',
            'phonenumber' => 'bail|required|numeric',
            'trinhdo' => 'bail|required|in:Trình độ 1,Trình độ 2,Trình độ 3,Trình độ 4',
            'chuyennganh' => 'bail|required|in:Chuyên ngành 1,Chuyên ngành 2,Chuyên ngành 3,Chuyên ngành 4',
            'phongban' => 'bail|required|in:Phòng ban 1,Phòng ban 2,Phòng ban 3,Phòng ban 4',
            'chucvu' => 'bail|required|in:Chức vụ 1,Chức vụ 2,Chức vụ 3,Chức vụ 4',
        ]);
        $employee = NhanVien::where('MaNV',$id)->first();
        $employee->update([
            'TenNV' => $request->name,
            'NgaySinh' => $request->birthday,
            'GioiTinh' => $request->gender,
            'CCCD' => $request->CCCD,
            'DiaChi' => $request->address,
            'NoiSinh' => $request->placeofbirth,
            'TonGiao' => $request->religion,
            'DanToc' => $request->nation,
            'SDT' => $request->phonenumber,
            'Email' => $request->email,
            'ChuyenNganh' => $request->chuyennganh,
            'TrinhDoHocVan' => $request->trinhdo,
            'PhongBan' => $request->phongban,
            'ChucVu' => $request->chucvu,
            'TrangThai' => 1,
        ]);

        if ($request->file('image') != null){
            $employee->update([
                'HinhAnh' => file_get_contents($request->file('image')->getPathname()),
            ]);
        }
        return redirect()->route('getEmployeeInfo',['id' => $id])->with(['message' => 'Cập nhật thành công']);
    }

    public function destroy(){
        
    }

    public function getEmployeeInfo($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $id = Crypt::decrypt($id);
        $employee = NhanVien::find($id);
        return view('dsnvs.infoNv',['employee' => $employee,'user' => $user]);
    }
}
