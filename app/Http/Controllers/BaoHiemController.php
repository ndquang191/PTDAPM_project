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
        $validator = $request->validate([
            'startDate' => 'required',
            'ID' => 'required',
            'QDTS' => 'required',
            'HT' => 'required',
            'BHTN' => 'required',
            'TNLD' => 'required',
            'month' => 'required',
        ],
        [
            'required' => "Nhập thiếu thông tin"
        ]);
        $employee = NhanVien::where('MaNV',$request->ID)->first();
        if($employee == null){
            return redirect()->back()->with(['message' => 'Nhân viên không tồn tại', 'type' => 'error']);
        }
        else{
            if ($employee->MaBH != null){
                return redirect()->back()->with(['message' => 'Nhân viên đã có bảo hiểm', 'type' => 'error']);
            }
        }
        DB::transaction(function () use($request){
            $baohiem = BaoHiem::create([
                'NgayBatDau' => $request->startDate,
                'MucDongQDTS' => $request->QDTS,
                'MucDongTNLD' => $request->TNLD,
                'MucDongHT' => $request->HT,
                'MucDongBHTN' => $request->BHTN,
                'Thang' => $request->month,	
            ]);
            $lastRecord = BaoHiem::orderBy('MaBH', 'desc')->first();
            NhanVien::where('MaNV',$request->ID)->update([
                'MaBH' => $lastRecord->MaBH,
            ]);
        });

        return redirect()->route('showListBHXH')->with(['message' => "Thêm bảo hiểm thành công",'type' => 'success']);

    }

    public function getInfoBHXH($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = BaoHiem::where('MaBH',$id)->first();
        return view('baohiemxhs.infobhxh',['user' => $user,'contract' => $contract]);
    }

    public function editBHXH($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = BaoHiem::where('MaBH',$id)->first();
        return view('baohiemxhs.editbhxh',['user' => $user,'contract' => $contract]);
    }

    public function updateBHXH(Request $request, $id){
        BaoHiem::where('MaBH',$id)->update([
            'NgayBatDau' => $request->startDate,
            'MucDongQDTS' => $request->QDTS,
            'MucDongTNLD' => $request->TNLD,
            'MucDongHT' => $request->HT,
            'MucDongBHTN' => $request->BHTN,
            'Thang' => $request->month,	
        ]);
        return redirect()->route('showListBHXH')->with(['message' => "Sửa bảo hiểm thành công",'type' => 'success']);
    }
}
