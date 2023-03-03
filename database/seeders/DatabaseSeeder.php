<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use Hash;
use Str;
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

        // Thêm nhân viên
        // for($i = 0; $i <= 2; $i++){
        //     DB::table('NhanVien')->insert(
        //         [
        //             'TenNV' => Str::random(5),
        //             'HinhAnh' => null,
        //             'NgaySinh' => Carbon::today()->subDays(rand(0, 365)),
        //             'GioiTinh' => floor(rand(0,1)),
        //             'CCCD' => null,
        //             'DiaChi' => null,
        //             'NoiSinh' => null,
        //             'TonGiao' => null,
        //             'SDT' => '0'.strval(rand(100000000,999999999)),
        //             'Email' => Str::random(5).'@gmail.com',
        //             'ChuyenNganh' => null,
        //             'TrinhDoHocVan' => null,
        //             'PhongBan' => null,
        //             'ChucVu' => null,
        //         ],
        //     );
        // }

        // Thêm tài khoản
        // DB::table('TaiKhoan')->insert(['MaNV' => 10000,'MatKhau' => Hash::make('admin1'),'TrangThai' => 1,'QuyenTruyCap' => 'admin1']);
        // DB::table('TaiKhoan')->insert(['MaNV' => 10001,'MatKhau' => Hash::make('admin2'),'TrangThai' => 1,'QuyenTruyCap' => 'admin2']);
        // DB::table('TaiKhoan')->insert(['MaNV' => 10002,'MatKhau' => Hash::make('member'),'TrangThai' => 1,'QuyenTruyCap' => 'member']);
    }
}
