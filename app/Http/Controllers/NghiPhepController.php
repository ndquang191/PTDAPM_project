<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;  
use App\Models\NghiPhep;
use App\Models\NhanVien;



class NghiPhepController extends Controller
{
    // public function list(){
    //     $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
    //     $leaves = NghiPhep::with('nhanvien')->where('PheDuyet',0)->get();
    //     return view('LeaveList.leavelist',['user' => $user,'leaves' => $leaves]);
    // }

    public function listApprove(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leaves = NghiPhep::with('nhanvien')->where('PheDuyet',1)->get();
        return view('LeaveList.leavelist',['user' => $user,'leaves' => $leaves]);
    }

    public function listRequest(){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leaves = NghiPhep::with('nhanvien')->where('PheDuyet',0)->get();
        return view('LeaveList.ChoDuyet',['user' => $user,'leaves' => $leaves]);
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

    public function showRequestDetail($requestID){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $requestLeave = NghiPhep::where('MaNP',$requestID)->with('nhanvien')->first();
        return view('LeaveList.DuyetDon',['user' => $user, 'requestLeave' => $requestLeave]);
    }   

    public function approveLeaveRequest($requestID){
        $requestLeave = NghiPhep::where('MaNP',$requestID)->first();
        $approvedLeaves = NghiPhep::where('MaNV',$requestLeave->MaNV)->where('PheDuyet',1)->get();
        if (count($approvedLeaves) == 0){
            $requestLeave->update([
                'PheDuyet' => 1,
            ]);
            return redirect()->route('showListRequestLeave')->with(['message' => 'Đã phê duyệt đơn nghỉ phép (ID: '.$requestID.')']);
        }
        else{
            // return redirect()->route('showListRequestLeave')->with(['message' => 'Đã phê duyệt đơn nghỉ phép (ID: '.$requestID.')']);

            foreach($approvedLeaves as $leave){
                $startA = Carbon::parse($leave->NgayBatDau);
                $endA = Carbon::parse($leave->NgayKetThuc);
                $startB = Carbon::parse($requestLeave->NgayBatDau);
                $endB = Carbon::parse($requestLeave->NgayBatDau);
                /*
                Yêu cầu có khoảng tg nằm trong khoảng đã phê duyệt        
                       ( Start A -> [Start B - End B] -> End A )        
                => Xóa request B
                */
                if ($startA->lte($startB) && $endB->lte($endA)) {
                    $requestLeave->delete();
                    return redirect()->route('showListRequestLeave')->with(['message' => 'Đã phê duyệt đơn nghỉ phép (ID: '.$requestID.')']);
                }


                /*
                Yêu cầu có khoảng tg trùng trước           
                    [Start B -> (Start A ->  End B] -> End A)        
                => Gộp thành Start B -> End A, Xóa Request B, Update lại A
                */

                if ($startB->lte($startA) && $endB->lte($endA)){
                    $leave->update([
                        'NgayBatDau' => $requestLeave->NgayBatDau,
                    ]);
                    $requestLeave->delete();
                    return redirect()->route('showListRequestLeave')->with(['message' => 'Đã phê duyệt đơn nghỉ phép (ID: '.$requestID.')']);
                }

                /*
                Yêu cầu có khoảng tg trùng sau           
                    (Start A -> [Start B  -> End A) -> End B]    
                => Gộp thành Start A -> End B,, Xóa Request B, Update lại A
                */

                if ($startA->lte($startB) && $endA->lte($endB)){
                    $leave->update([
                        'NgayKetThuc' => $requestLeave->NgayKetThuc,
                    ]);
                    $requestLeave->delete();
                    return redirect()->route('showListRequestLeave')->with(['message' => 'Đã phê duyệt đơn nghỉ phép (ID: '.$requestID.')']);
                }

                /*
                Yêu cầu mới có khoảng tg lớn hơn đã phê duyệt
                    [Start B -> (Start A -> End A) -> End B]
                => Xóa A
                */

                if ($startB->lte($startA) && $endA->lte($endB)){
                    $leave->delete();
                    $requestLeave->update([
                        'PheDuyet' => 1,
                    ]);
                    return redirect()->route('showListRequestLeave')->with(['message' => 'Đã phê duyệt đơn nghỉ phép (ID: '.$requestID.')']);
                }
            }
        }
  
    }

    public function showDetail($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leave = NghiPhep::where('MaNP',$id)->with('nhanvien')->first();
        return view('LeaveList.XemDonNghiPhep',['user' => $user,'leave' => $leave]);
    }

    public function showHistory($id){
        $user = DB::table('nhanvien')->where('MaNV',Auth::user()->MaNV)->first();
        $leaves = NghiPhep::where('MaNV',$id)->get();
        $employee = NhanVien::where('MaNV',$id)->first();
        $cophep = 0;
        $khongphep = 0;
        foreach($leaves as $leave){
            if($leave->CoPhep == 0){
                $khongphep += (Carbon::parse($leave->NgayBatDau)->diffInDays(Carbon::parse($leave->NgayKetThuc)));
            }
            else{
                $cophep += (Carbon::parse($leave->NgayBatDau)->diffInDays(Carbon::parse($leave->NgayKetThuc)));
            }
        }
        return view('LeaveList.historyleave',['user' => $user,'leaves' => $leaves,'employee' => $employee,'cophep' => $cophep,'khongphep' => $khongphep]);
    }
}
