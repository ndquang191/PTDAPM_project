<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BangCap;
use App\Models\TaiKhoan;
use App\Models\DanhGia;
use App\Models\NghiPhep;
use App\Models\HDLD;
use App\Models\BaoHiem;


class NhanVien extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    protected $fillable = 
    ['TenNV','HinhAnh','NgaySinh','GioiTinh','CCCD','DiaChi','NoiSinh','TonGiao','SDT','Email','ChuyenNganh','TrinhDoHocVan'
    ,'DanToc','PhongBan','ChucVu','TrangThai'];
    
    public function bangcap(){
        return $this->hasMany(BangCap::class,'MaNV');
    }

    public function taikhoan(){
        return $this->hasOne(TaiKhoan::class,'MaNV');
    }

    public function danhgia(){
        return $this->hasMany(DanhGia::class,'MaNV');
    }

    public function nghiphep(){
        return $this->hasMany(NghiPhep::class,'MaNV');
    }

    public function hdld(){
        return $this->hasMany(HDLD::class,'MaNV');
    }

    public function baohiem(){
        return $this->hasMany(BaoHiem::class,'MaNV');
    }
}
