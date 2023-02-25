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

    public function login(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if(Auth::attempt($credentials)){
            return redirect('/');
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
        return view('img', ['base64' => $base64]);
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
}
