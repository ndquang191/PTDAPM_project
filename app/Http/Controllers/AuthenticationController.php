<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
class AuthenticationController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('homepage');
        }
        else{
            return view('login');
        }
    }
    public function homePage(){
            return view('homepage');
    }
    public function listaccemployee(){
        return view('ListAccEmployee/listaccemployee');
}
    public function login(Request $request){
        $validated = $request->validate([
            'username' => 'bail|required',
            'password' => 'required',
        ]);
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if(Auth::attempt($credentials)){
            if(Auth::User()->Status == 1)
                return redirect('/');
            else{
                Auth::guard()->logout();
                $request->session()->invalidate();
                return dd('Tài khoản ngừng hoạt động');
            }
        }
        else{
            dd('Đăng nhập thất bại');
        }
    }

    public function register(Request $request){
        DB::table('accounts')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'Status' => 1,
        ]);
        return dd('Đăng ký thành công');
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    public function getAuth(){
        if(Auth::check()) return Auth::User();
        return dd('Chưa đăng nhập');
    }
}
