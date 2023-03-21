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
        $employees = NhanVien::with('chucvu')->with('phongban')->get();
        return view('Salary.salary',['employees' => $employees, 'user' => $user]);
    }

    public function showSalaryDetail($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employee = NhanVien::where('MaNV',$id)->first();
        $hopdong = HDLD::where('MaNV' ,$id)->first();

        if ($hopdong == null){
            return redirect()->route('showSalary')->with(['message' => 'Nhân viên không có hợp đồng lao động !','type' => 'error']);
        }

        $luongcoban = $hopdong->LuongCoBan;
        $hesoluong = $hopdong->HeSoLuong;
        $currentMonth = Carbon::now()->month;
        // $dayInMonth = Carbon::now()->month($currentMonth)->daysInMonth;
        $danhgias = DanhGia::where('MaNV',$id)->whereMonth('NgayQuyetDinh',$currentMonth)->get();
        $khenthuong = 0;
        $kiluat = 0;
        $nghipheps = NghiPhep::where('MaNV',$id)->whereMonth('NgayBatDau',$currentMonth)->where('PheDuyet',1)->get();
        $leaveDayCount = 0;
        // return $nghipheps;
        foreach($danhgias as $danhgia){
            if($danhgia->PhanLoai == 1){
                $khenthuong = $khenthuong + $danhgia->Giatri;
            }
            else{
                $kiluat += $danhgia->Giatri;
            }
        };
        foreach($nghipheps as $nghiphep){
            if($nghiphep->LiDo == null){ 
                    $start = Carbon::parse($nghiphep->NgayBatDau);
                    $end = Carbon::parse($nghiphep->NgayKetThuc);
                    if($start->month != $currentMonth){ // Tháng đang chọn khác tháng bắt đầu
                        $dayInMonth = $end->day;
                        $leaveDay = $end->day;
                    }
                    else if($end->month != $currentMonth){
                        $dayInMonth = $start->daysInMonth;
                        $leaveDay = $dayInMonth - $start->day;
                    }
                    else{
                        $leaveDay = $end->day - $start->day;
                    }
                    $leaveDayCount += $leaveDay;
                }
        };

        return view('Salary.detailsalary',
        [
            'user' => $user,
            'employee' => $employee,
            'luongcoban' => $luongcoban,
            'hesoluong' => $hesoluong,
            'khenthuong' => $khenthuong,
            'kiluat' => $kiluat,
            'leaveDayCount' => $leaveDayCount,
            'dayInMonth' => Carbon::now()->month($currentMonth)->daysInMonth,
        ]);
    }
    
}
