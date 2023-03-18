<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Hash;
use Str;
use App\Models\NhanVien;
use App\Models\PhongBan;
use App\Models\TrinhDoHocVan;
use App\Models\ChucVu;
use App\Models\TaiKhoan;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function (){
            $phongbans = ['Phòng ban 1', 'Phòng ban 2', 'Phòng ban 3'];
            $trinhdos = ['Trình độ 1', 'Trình độ 2', 'Trình độ 3'];
            $chucvus = ['Chức vụ 1', 'Chức vụ 2', 'Chức vụ 3'];
            foreach($phongbans as $phongban){
                $randomStr = Str::random(10);
                PhongBan::create([
                    'TenPhongBan' => $phongban,
                    'DiaChi' => $randomStr,
                    'Email' => $randomStr.'@gmail.com',
                    'SDT' => '0'.floor(rand(100000000,999999999)),
                ]);
            }
    
            foreach($trinhdos as $trinhdo){
                $randomStr = Str::random(10);
                TrinhDoHocVan::create([
                    'TenHeDaoTao' => $trinhdo,
                    'TrinhDoChuyenMon' => $randomStr,
                ]);
            }
    
            foreach($chucvus as $chucvu){
                $randomStr = Str::random(10);
                ChucVu::create([
                    'TenCV' => $chucvu,
                ]);
            }
    
            for($i = 0;$i < 3;$i++){
                NhanVien::create([
                    'TenNV' => Str::random(10),
                    'HinhAnh' => null,
                    'NgaySinh' => Carbon::now(),
                    'GioiTinh' => floor(rand(0,1)),
                    'CCCD' => '0000000000000',
                    'NgayCap' => Carbon::now(),
                    'NoiCap' => Str::random(10),
                    'DiaChi' => Str::random(10),
                    'NoiSinh' => Str::random(10),
                    'TonGiao' => Str::random(10),
                    'DanToc' => Str::random(10),
                    'SDT' => '0000000000',
                    'Email' => Str::random(10).'@gmail.com',
                    'MaTDHV' => 1,
                    'MaPB' => 1,
                    'MaCV' => 1,
                    'MaBH' => null,
                    'TrangThai' => 1,
                ]);   
            }
    
            TaiKhoan::create(['MaNV' => 10000,'MatKhau' => Hash::make('admin1'),'NgayTao' => Carbon::now(),'QuyenTruyCap'=>'admin1', 'TrangThai' => 1]);
            TaiKhoan::create(['MaNV' => 10001,'MatKhau' => Hash::make('admin2'),'NgayTao' => Carbon::now(),'QuyenTruyCap'=>'admin2', 'TrangThai' => 1]);
            TaiKhoan::create(['MaNV' => 10002,'MatKhau' => Hash::make('member'),'NgayTao' => Carbon::now(),'QuyenTruyCap'=>'member', 'TrangThai' => 1]);
        });
    }
}
