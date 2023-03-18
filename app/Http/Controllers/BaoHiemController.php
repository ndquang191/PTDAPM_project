<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use App\Models\BaoHiem;


class BaoHiemController extends Controller
{
    public function showListBHXH(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $insurances = BaoHiem::all();
        return view('baohiemxhs.dsbhxh',['user' => $user,'insurances' => $insurances]);
    }

    public function createBHXH(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('baohiemxhs.addbhxh',['user' => $user]);
    }

    public function storeBHXH(Request $request){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employee = NhanVien::where('MaNV',$request->ID);
        if(true){
            return redirect()->back()->with(['message' => 'Nhân viên đã có bảo hiểm', 'type' => 'error']);
        }
        DB::transaction(function () use($request){
            BaoHiem::create([
                'NgayBatDau' => $request->startDate,
                'MucDongQDTS' => $request->QDTS,
                'MucDongTNLD' => $request->TNLD,
                'MucDongHT' => $request->HT,
                'MucDongBHTN' => $request->BHTN,
                'Thang' => $request->month,	
            ]);

            $lastRecord = BaoHiem::order_by('MaBH', 'desc')->first();

            NhanVien::where('MaNV',$request->ID)->update([
                'MaBH' => $lastRecord->MaBH,
            ]);
        });

    }

    public function getInfoBHXH($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('baohiemxhs.infobhxh',['user' => $user]);
    }
}
