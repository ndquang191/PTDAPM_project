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

    public function edit($id,$degreeID,Request $request){
        $request->validate([
            'tenbangcap' => 'required',
            'loaibangcap' => 'required',
            'ngaycap' => 'required',
        ],[
            'required' => "Nhập thiếu thông tin"
        ]);

        BangCap::find($degreeID)->update([
            'TenBC' => $request->tenbangcap,
            'LoaiBC' => $request->loaibangcap,
            'NgayCap' => $request->ngaycap,
        ]);
        return redirect()->route("showDegree",['id' => $id])->with(['message' => "Sửa thành công"]);
    }

    public function store(Request $request,$id){
        $validator = $request->validate([
            'tenbangcap' => 'required',
            'loaibangcap' => 'required',
            'ngaycap' => 'required',
        ],
        [
            'required' => 'Vui lòng nhập đầy đủ thông tin',
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
