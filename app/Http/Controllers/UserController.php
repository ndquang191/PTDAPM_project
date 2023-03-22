<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\NhanVien;
use App\Models\DanhGia;
use App\Models\HDLD;
use App\Models\BaoHiem;
use App\Models\NghiPhep;
use App\Models\BangCap;




class UserController extends Controller
{
    public function showEvaluate(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $evaluates = DanhGia::where('MaNV',Auth::user()->MaNV)->get();
        return view('user.danhgia',['user' => $user,'evaluates' => $evaluates]);
    }

    public function showInfo(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employeeInfo = NhanVien::where("MaNV",Auth::user()->MaNV)->first();
        $degrees = BangCap::where('MaNV',Auth::user()->MaNV)->get();
        return view('user.detail',['user' => $user,'employeeInfo' => $employeeInfo,'degrees' => $degrees]);
    }

    public function showContract(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $contract = HDLD::where("MaNV", Auth::user()->MaNV)->where('TrangThai',1)->first();
        return view('user.hdld',['user' => $user,'contract' => $contract]);
    }

    public function showInsurance(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $insurance = BaoHiem::where("MaBH",$user->MaBH)->first();
        return view('user.baohiem',['user' => $user,'insurance' => $insurance]);
    }

    public function showLeave(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leaves = NghiPhep::where("MaNV",Auth::user()->MaNV)->get();
        return view('user.nghiphep',['user' => $user,'leaves' => $leaves]);
    }

    public function storeLeaveRequest(Request $request){
        $leaves = NghiPhep::where('PheDuyet',1)->where('MaNV',Auth::user()->MaNV)->get();
        $count = 0;
        foreach($leaves as $leave){
            $count = $count + (Carbon::parse($leave->NgayBatDau)->diffInDays(Carbon::parse($leave->NgayKetThuc)));
        }
        NghiPhep::create([
            'MaNV' => Auth::user()->MaNV,
            'NgayBatDau' => $request->startDate,
            'NgayKetThuc' => $request->endDate,
            'NoiDung' => $request->reason,
            'PheDuyet' => 0,
            'CoPhep' => $count >= 20 ? 0 : 1,
        ]);
        return redirect()->route('showLeaveUser')->with(['message' => "Gửi yêu cầu thành công !", 'type' => 'success']);
    }

    public function showSalary(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $employee = NhanVien::where('MaNV',Auth::user()->MaNV)->first();
        $hopdong = HDLD::where('MaNV' ,Auth::user()->MaNV)->first();

        if ($hopdong == null){
            return redirect()->route('getHomepage')->with(['message' => 'Không thể xem lương khi chưa có hợp đồng !','type' => 'error']);
        }

        $luongcoban = $hopdong->LuongCoBan;
        $hesoluong = $hopdong->HeSoLuong;
        $currentMonth = Carbon::now()->month;
        // $dayInMonth = Carbon::now()->month($currentMonth)->daysInMonth;
        $danhgias = DanhGia::where('MaNV',Auth::user()->MaNV)->whereMonth('NgayQuyetDinh',$currentMonth)->get();
        $khenthuong = 0;
        $kiluat = 0;
        $nghipheps = NghiPhep::where('MaNV',Auth::user()->MaNV)->whereMonth('NgayBatDau',$currentMonth)->where('PheDuyet',1)->get();
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
                    if($start->month != $currentMonth){ 
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

        return view('Salary.LuongNhanVien',
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
        // return view('Salary.LuongNhanVien',['user' => $user,'salary' => $salary]);
    }

    
}
