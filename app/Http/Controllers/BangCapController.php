<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BangCap;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BangCapController extends Controller
{
    public function showByMaNV($id){
        $user = NhanVien::find(Auth::user()->MaNV);
        $employee = NhanVien::find($id);
        $degrees = BangCap::where('MaNV',$id)->get();
        return view('bangcaps.dsbc',['user' => $user,'degrees' => $degrees,'employee' => $employee]);
    }

    public function create(){
        $user = NhanVien::find(Auth::user()->MaNV);
        return view('bangcaps.addbc',['user' => $user]);
    }

    public function edit($id,$degreeID){
        $user = NhanVien::find(Auth::user()->MaNV);
        $degree = BangCap::find($degreeID);
        return view('bangcaps.dsbc',['user' => $user,'degree' => $degree]);
    }

    public function store(Request $request,$id){
        $validator = $request->validate([
            'tenbangcap' => 'required|unique:App\Models\BangCap,TenBC',
            'loaibangcap' => 'required',
            'ngaycap' => 'required',
        ],
        [
            'required' => 'Vui lòng nhập đầy đủ thông tin',
            'tenbangcap.unique' => 'Tên bằng cấp đã tồn tại'
        ]);

        BangCap::create([
            'MaNV' => $id,
            'TenBC' => $request->tenbangcap,
            'LoaiBC' => $request->loaibangcap,
            'NgayCap' => $request->ngaycap,
        ]);

        return redirect()->back()->with(['message' => 'Thêm thành công']);
    }
    

    public function destroy($id){
        BangCap::where('MaBC',$id)->delete();
        return redirect()->back()->with(['message' => 'Xóa thành công']);

    }
}
