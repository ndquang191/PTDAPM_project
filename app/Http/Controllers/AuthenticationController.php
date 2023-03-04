<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
class AuthenticationController extends Controller
{

    protected $username = 'MaNV';


    // public function username(){
    //     return 'user';
    // }

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
            'MaTK' => $request->username,
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
<<<<<<< HEAD
        DB::table('accounts')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'Status' => 1,
=======
        DB::table('taikhoan')->insert([
            'MaNV' => 1,
            'MatKhau' => Hash::make('admin1'),
            'TrangThai' => 1,
            'QuyenTruyCap' => 'admin1',
>>>>>>> origin/Auth
        ]);
        return dd('Đăng ký thành công');
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

<<<<<<< HEAD
    public function getAuth(){
        if(Auth::check()) return Auth::User();
        return dd('Chưa đăng nhập');
=======
    public function getIndex(){
        $data = DB::table('image')->where('ID',2)->first();
        $base64 = base64_encode($data->img);
        // return view('img', ['base64' => $base64]);
        // $content = file_get_contents($data->img);
        return dd($data);
    }

    public function storeImg(Request $request){
        $file = $request->file('img');
        $data = file_get_contents($file->getPathname());
        // DB::table('image')->insert([
        //     'img' => $data,
        // ]);
        // return redirect('/img');
        // return dd($data);
        return dd($file->getPathname());
>>>>>>> origin/Auth
    }
}
