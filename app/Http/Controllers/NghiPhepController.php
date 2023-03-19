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

    public function approveLeaveRequest($requestID){
        $requestLeave = NghiPhep::where('MaNV',$requestID)->first();
        $approvedLeaves = NghiPhep::where('MaNV',$requestLeave->MaNV)->where('PheDuyet',1)->get();
        foreach($approvedLeaves as $leave){

            /*
                Kiểm tra số ngày nghỉ còn lại
                - Nếu khoảng tg nghỉ có số ngày <= Số ngày nghỉ phép còn lại, bỏ qua
                - Nếu khoảng tg nghỉ có số ngày > Số ngày nghỉ phép
                    Tách 2 khoảng có phép, ko phép
            */

            /*
            Yêu cầu có khoảng tg nằm trong khoảng đã phê duyệt        
                   ( Start A -> [Start B - End B] -> End A )        
            => Xóa request B

            Yêu cầu có khoảng tg trùng trước           
                [Start B -> (Start A ->  End B] -> End A)        
            => Gộp thành Start B -> End A, Xóa Request B, Update lại A

            Yêu cầu có khoảng tg trùng sau           
                (Start A -> [Start B  -> End A) -> End B]    
            => Gộp thành Start A -> End B,, Xóa Request B, Update lại A

            Yêu cầu mới có khoảng tg lớn hơn đã phê duyệt
                [Start B -> (Start A -> End A) -> End B]
            => Xóa A
            */

        }
    }
}
