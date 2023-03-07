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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
        for($i = 0; $i <= 100; $i++){
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
            DB::table('TaiKhoan')->insert(
                [
                    'MaNV' => NhanVien::orderBy('MaNV','desc')->first()->MaNV,
                    'MatKhau' => Hash::make('member'),
                    'TrangThai' => 1,'QuyenTruyCap' => 'member',
                    'NgayTao' => Carbon::now()
                ]);
        }
    }
}
