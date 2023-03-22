<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\NhanVien;
use App\Models\TaiKhoan;

class TaiKhoanController extends Controller
{
    public function showLoginPage(){
        if(Auth::check()){
            if(Auth::user()->QuyenTruyCap == 'member')
                return redirect('/homepage');
            else
                return redirect('/admin');
        }
        else{
            return view('login');
        }
    }

    public function showAdminPage(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('homepage',['user' => $user]);
    }

    public function showHomePage(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('user.index',['user' => $user]);
    }


    public function login(Request $request){
        $exists = DB::table('taikhoan')->where('MaNV',$request->username)->first();
        $validated = $request->validate([
            'username' => 'bail|required',
        ],
        [
            'username.required' => "Vui lòng điền tên đăng nhập và đăng nhập.",
        ]);

        $validated = $request->validate([
            'password' => 'required|min:6',
        ],
        [
            'password.required' => "Vui lòng điền mật khẩu (mật khẩu trên 6 ký tự) và đăng nhập",
            'password.min' => "Vui lòng điền mật khẩu (mật khẩu trên 6 ký tự) và đăng nhập",
        ]);
        if($exists){
            $credentials = [
                'MaNV' => $request->username,
                'password' => $request->password,
            ];
            if(Auth::attempt($credentials)){
                if(Auth::user()->TrangThai == 1){
                    if (Auth::user()->QuyenTruyCap == 'member'){
                        return redirect('/homepage');
                    }
                    else{
                        return redirect('/admin');
                    }
                }
                else{
                    Auth::guard()->logout();
                    return redirect()->back()->with(['message' => "Tài khoản ngừng hoạt động"]);
                }
            }
            else{
                return redirect()->back()->with(['message' => 'Mật khẩu không đúng']);

            }
        }
        else{
            return redirect()->back()->with(['message' => 'Tài khoản không tồn tại']);
        }
    }

    public function logout(){
        Auth::guard()->logout();
        Session::forget('key');
        return redirect('/');
    }

    public function listAccount(){
        $user = NhanVien::find(Auth::user()->MaNV);
        $accounts = TaiKhoan::with('nhanvien')->get();
        $memberCount = TaiKhoan::where('QuyenTruyCap','member')->count();
        $admin1Count = TaiKhoan::where('QuyenTruyCap','admin1')->count();
        $admin2Count = TaiKhoan::where('QuyenTruyCap','admin2')->count();
        return view('ListAccEmployee.listaccemployee',
            [
                'user' => $user,
                'accounts' => $accounts,
                'memberCount' => $memberCount,
                'admin1Count' => $admin1Count,
                'admin2Count' => $admin2Count,
            ]
        );
    }

    public function resetPassword($id){
        $account = TaiKhoan::where('ID',$id)->first();
        $account->update([
            'MatKhau' => Hash::make('00000000'),
        ]);
        return redirect()->route('showListAccount')->with('message','Reset thành công!');
    }

    public function create(){

    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }
}


?>