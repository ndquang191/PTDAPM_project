<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Hash;
use Str;
use App\Models\NhanVien;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Thêm tk admin
        for($i = 0; $i < 2; $i++){
            DB::table('NhanVien')->insert(
                [
                    'TenNV' => Str::random(5),
                    'HinhAnh' => null,
                    'NgaySinh' => Carbon::today()->subDays(rand(0, 365)),
                    'GioiTinh' => floor(rand(0,1)),
                    'CCCD' => '0'.strval(rand(10000000000,99999999999)),
                    'DiaChi' => Str::random(20),
                    'NoiSinh' => Str::random(8),
                    'TonGiao' => Str::random(8),
                    'DanToc' => Str::random(8),
                    'SDT' => '0'.strval(rand(100000000,999999999)),
                    'Email' => Str::random(5).'@gmail.com',
                    'ChuyenNganh' => Str::random(8),
                    'TrinhDoHocVan' => Str::random(8),
                    'PhongBan' => Str::random(8),
                    'ChucVu' => Str::random(8),
                ],
            );
        }
        DB::table('TaiKhoan')->insert(['MaNV' => 10000,'MatKhau' => Hash::make('admin1'),'TrangThai' => 1,'QuyenTruyCap' => 'admin1','NgayTao' => Carbon::now()]);
        DB::table('TaiKhoan')->insert(['MaNV' => 10001,'MatKhau' => Hash::make('admin2'),'TrangThai' => 1,'QuyenTruyCap' => 'admin2','NgayTao' => Carbon::now()]);
        
        // Thêm nhân viên
        // for($i = 0; $i <= 10; $i++){
        //     DB::table('NhanVien')->insert(
        //         [
        //             'TenNV' => Str::random(5),
        //             'HinhAnh' => null,
        //             'NgaySinh' => Carbon::today()->subDays(rand(0, 365)),
        //             'GioiTinh' => floor(rand(0,1)),
        //             'CCCD' => '0'.strval(rand(10000000000,99999999999)),
        //             'DiaChi' => Str::random(20),
        //             'NoiSinh' => Str::random(8),
        //             'TonGiao' => Str::random(8),
        //             'DanToc' => Str::random(8),
        //             'SDT' => '0'.strval(rand(100000000,999999999)),
        //             'Email' => Str::random(5).'@gmail.com',
        //             'ChuyenNganh' => Str::random(8),
        //             'TrinhDoHocVan' => Str::random(8),
        //             'PhongBan' => Str::random(8),
        //             'ChucVu' => Str::random(8),
        //         ],
        //     );
        //     $manv = NhanVien::orderBy('MaNV','desc')->first()->MaNV;
        //     $SoBC = floor(rand(1,4));
        //     DB::table('TaiKhoan')->insert(
        //         [
        //             'MaNV' => $manv,
        //             'MatKhau' => Hash::make('member'),
        //             'TrangThai' => floor(rand(0,1)),
        //             'QuyenTruyCap' => 'member',
        //             'NgayTao' => Carbon::now()
        //         ]);
        //     for($i = 0; $i < $SoBC; $i++){
        //         DB::table('BangCap')->insert([
        //             'MaNV' => $manv,
        //             'TenBC' => Str::random(20),
        //             'NgayCap' => Carbon::today()->subDays(rand(0, 365)),
        //         ]);
        //     }

        //     $SoDG = floor(rand(0,3));
        //     for($i=0;$i<$SoDG;$i++){
        //         $giatri = floor(rand(-99999999,9999999));
        //         DB::table('DanhGia')->insert([
        //             'MaNV' => $manv,
        //             'NgayQuyetDinh' => Carbon::today()->subDays(rand(0, 365)),
        //             'NoiDung' => Str::random(20),
        //             'GiaTri' => $giatri,
        //             'PhanLoai' => $giatri > 0 ? 1 : 0,
        //         ]);
        //     }

        //     DB::table('hopdonglaodong')->insert(
        //         [
        //             'MaNV' => $manv,
        //             'SoHD' => floor(rand(1000000,9999999)),
        //             'LoaiHopDong' => 'Loại '.floor(rand(1,3)),
        //             'NgayKi' => Carbon::today()->subDays(rand(0, 365)),
        //             'NgayBatDau' => Carbon::today()->subDays(rand(0, 365)),
        //             'NgayKetThuc' => Carbon::today()->subDays(rand(0, 365)),
        //             'DiaDiem' => Str::random(20),
        //             'ChuyenMon' => Str::random(20),
        //             'PhapNhan' => Str::random(20),
        //             'LuongCoBan' => floor(rand(10000000,99999999)),
        //             'HeSoLuong' => floor(rand(1,8)),
        //         ]);
        // }
    }
}
