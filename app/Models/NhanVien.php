<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BangCap;


class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    protected $fillable = ['TenNV','HinhAnh','NgaySinh','GioiTinh','CCCD','DiaChi','NoiSinh','TonGiao','SDT','Email','ChuyenNganh','TrinhDoHocVan','PhongBan','ChucVu','TrangThai'];
    
    public function bangcap(){
        return $this->hasOne(BangCap::class,'MaNV');
    }
}
