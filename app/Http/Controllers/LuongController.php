<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LuongController extends Controller
{
    public function index(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        // $salerys = NghiPhep::with('nhanvien')->get();
        return view('Salary.salary',['user' => $user]);
    }
    
}
