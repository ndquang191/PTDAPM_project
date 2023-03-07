<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;
class TaiKhoan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'TaiKhoan';
    protected $primaryKey = 'MaNV';
    protected $fillable = ['MaNV','MatKhau','TrangThai','QuyenTruyCap','NgayTao'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
