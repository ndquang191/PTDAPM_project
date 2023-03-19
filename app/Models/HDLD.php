<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HDLD extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hopdonglaodong';
    protected $primaryKey = 'MaHDLD';
    protected $fillable = ['MaNV','SoHD','LoaiHopDong','NgayKi','NgayBatDau','NgayKetThuc','DiaDiem','ChuyenMon', 'PhapNhan'
    ,'LuongCoBan','HeSoLuong','TrangThai'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
