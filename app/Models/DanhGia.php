<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class DanhGia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'danhgia';
    protected $primaryKey = 'MaDG';
    protected $fillable = ['MaNV','NgayQuyetDinh','NoiDung','GiaTri','PhanLoai'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
