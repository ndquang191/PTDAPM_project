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
        return view('LeaveList/addleave');
    }
}
?>