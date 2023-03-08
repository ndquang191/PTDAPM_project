<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NhanVien;

class APIController extends Controller
{
    public function getEmployeeInfo($id){
        return NhanVien::where('MaNV',$id)->first();
    }
}
