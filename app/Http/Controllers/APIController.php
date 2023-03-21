<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;
use App\Models\NghiPhep;


class APIController extends Controller
{
    public function getEmployeeInfo($id){
        return NhanVien::where('MaNV',$id)->first();
    }

    public function getEmployeeLeave($id){
        return NghiPhep::where('ManV',$id)->where('PheDuyet',0)->get();
    }
}
