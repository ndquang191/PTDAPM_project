<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\NghiPhep;


class NghiPhepController extends Controller
{
    public function list(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leaves = NghiPhep::with('nhanvien')->get();
        return view('LeaveList.leavelist',['user' => $user,'leaves' => $leaves]);
    }

    public function create(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('LeaveList.addleave',['user' => $user]);
    }

    public function edit($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leave = NghiPhep::where('MaNP',$id)->with('nhanvien')->first();
        return view('LeaveList.editleave',['user' => $user,'leave' => $leave]);
    }

    public function userList(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('user.nghiphep',['user' => $user]);
    }
}
