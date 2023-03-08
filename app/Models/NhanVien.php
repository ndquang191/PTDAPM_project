<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BangCap;
use App\Models\TaiKhoan;
use App\Models\DanhGia;




class NhanVien extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    protected $fillable = ['TenNV','HinhAnh','NgaySinh','GioiTinh','CCCD','DiaChi','NoiSinh','TonGiao','SDT','Email','ChuyenNganh','TrinhDoHocVan','PhongBan','ChucVu','TrangThai'];
    
    public function bangcap(){
        return $this->hasMany(BangCap::class,'MaNV');
    }

    public function taikhoan(){
        return $this->hasOne(TaiKhoan::class,'MaNV');
    }

    public function danhgia(){
        return $this->hasMany(TaiKhoan::class,'MaNV');
    }
}
