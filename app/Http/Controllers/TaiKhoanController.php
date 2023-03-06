<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\NhanVien;
use App\Models\TaiKhoan;

class TaiKhoanController extends Controller
{
    public function showLoginPage(){
        if(Auth::check()){
            return redirect('/homepage');
        }
        else{
            return view('login');
        }
    }

    public function showHomePage(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('homepage',['user' => $user]);
    }

    public function login(Request $request){
        $exists = DB::table('taikhoan')->where('MaNV',$request->username)->first();
        $validated = $request->validate([
            'username' => 'bail|required',
            'password' => 'required|min:6',
        ],
        [
            'username.required' => "Vui lòng điển tên đăng nhập và đăng nhập.",
            'password.required' => "Vui lòng điển mật khẩu và đăng nhập.",
            'password.min' => "Mật khẩu phải có 6 kí tự trở lên.",
        ]);
        if($exists){
            $credentials = [
                'MaNV' => $request->username,
                'password' => $request->password,
            ];
            if(Auth::attempt($credentials)){
                if(Auth::user()->TrangThai == 1){
                    return redirect('/homepage');
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
        $activeCount = TaiKhoan::where('TrangThai',1)->count();
        $stopActiveCount = TaiKhoan::where('TrangThai',0)->count();
        return view('ListAccEmployee.listaccemployee',
            [
                'user' => $user,
                'accounts' => $accounts,
                'activeCount' => $activeCount,
                'stopActiveCount' =>$stopActiveCount,
            ]
        );
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