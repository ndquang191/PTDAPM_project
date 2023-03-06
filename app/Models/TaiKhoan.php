<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;
class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'TaiKhoan';
    protected $primaryKey = 'MaNV';
    protected $fillable = ['MatKhau','TrangThai','QuyenTruyCap'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
