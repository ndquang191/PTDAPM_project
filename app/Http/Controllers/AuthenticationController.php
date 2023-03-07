<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request){
        $validated = $request->validate([
            'username' => 'bail|required',
            'password' => 'required',
        ],
        [
            'username.required' => "Tài khoản không được để trống !",
            'password.required' => "Mật khẩu không được để trống !"
        ]);
        $credentials = [
            'MaNV' => $request->username,
            'password' => $request->password,
        ];
        if(DB::table('taikhoan')->where('MaNV',$request->username)->first()){
            if(Auth::attempt($credentials)){
                if(Auth::User()->TrangThai == 1){
                    $user = DB::table('nhanvien')->where('MaNV',Auth::User()->MaNV)->first();
                    return view('homepage',['user' => $user]);
                }
                else{
                    Auth::guard()->logout();
                    $request->session()->invalidate();
                    return redirect()->back()->with(['message' => "Tài khoản ngừng hoạt động"]);
                }
                return view('homepage');
            }
            else{
                dd('Đăng nhập thất bại');
            }
        }
        else{
            return dd('Tài khoản không tồn tại!');
        }
    }


    public function register(Request $request){
        DB::table('taikhoan')->insert([
            'MaNV' => 1,
            'MatKhau' => Hash::make('admin1'),
            'TrangThai' => 1,
            'QuyenTruyCap' => 'admin1',
        ]);
        return dd('Đăng ký thành công');
    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }

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
    }
    //Điều hướng để làm giao diện

}
?>