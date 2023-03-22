<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TestController extends Controller{
    public function homePage(){
        return view('homepage');
    }
    public function listaccemployee(){
        return view('ListAccEmployee/listaccemployee');
    }
    public function changepw(){
        return view('ListAccEmployee/changepw');
    }
        public function leavelist(){
            return view('LeaveList/leavelist');
    }
    public function addleave(){
        return view('LeaveList/XemDonNghiPhep');
    }    public function editleave(){
        return view('LeaveList/editleave');
    } public function Duyetleave(){
        return view('LeaveList/DuyetDon');
    }
    public function chodon(){
        return view('LeaveList/ChoDuyet');
    }
    public function historyleave(){
        return view('LeaveList/historyleave');
    }
    public function salary(){
        return view('Salary/salary');
    } public function detailsalary(){
        return view('Salary/LuongNhanVien');
    }
    public function addhdld(){
        return view('hdlds/hdld_add');
    }    public function luong(){
        return view('Salary/Luong');
    } 
}
?>