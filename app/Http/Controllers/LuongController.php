<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\HDLD;
use App\Models\DanhGia;
use App\Models\NhanVien;
use App\Models\NghiPhep;
use Carbon\Carbon;
class LuongController extends Controller
{
    public function showSalary(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        return view('Salary.salary',['user' => $user]);
    }

    public function showSalaryDetail($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employee = NhanVien::where('MaNV',$id)->first();
        $hopdong = HDLD::where('MaNV' ,$id)->first();
        $luongcoban = $hopdong->LuongCoBan;
        $hesoluong = $hopdong->HeSoLuong;
        $currentMonth = Carbon::now()->month;
        $danhgias = DanhGia::where('MaNV',$id)->whereMonth('NgayQuyetDinh',$currentMonth)->get();
        $khenthuong = 0;
        $kiluat = 0;
        $nghipheps = NghiPhep::where('MaNV',$id)->whereMonth('NgayBatDau',$currentMonth)->get();
        // return $nghipheps;
        foreach($danhgias as $danhgia){
            if($danhgia->PhanLoai == 1){
                $khenthuong = $khenthuong + $danhgia->Giatri;
            }
            else{
                $kiluat += $danhgia->Giatri;
            }
        };
        // foreach($nghipheps as $nghiphep){
        //     if($nghiphep->LiDo == null){ 
        //         return $nghiphep->NgayBatDau;
        //         $S_Month = date('m', strtotime($nghiphep->NgayBatDau));
        //         $E_Month = date('m', strtotime($nghiphep->NgayKetThuc));
        //         if ($S_Month != $E_Month){
        //         }
        //         // return round((strtotime($nghiphep->NgayBatDau) - strtotime($nghiphep->NgayKetThuc))/ (60 * 60 * 24));
        //         // if(date('M', $nghiphep->NgayBatDau) != date('M', $nghiphep->NgayKetThuc)){
        //         //     return $nghiphep->NgayBatDau;
        //         // };
        //         }
        // };

        return view('Salary.detailsalary',
        [
            'user' => $user,
            'employee' => $employee,
            'luongcoban' => $luongcoban,
            'hesoluong' => $hesoluong,
            'khenthuong' => $khenthuong,
            'kiluat' => $kiluat,
        ]);
    }
    
}
