<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nhanvien;


class NghiPhep extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nghiphep';
    protected $primaryKey = 'MaNP';
    protected $fillable = ['MaNV','NgayBatDau','NgayKetThuc','NoiDung','PheDuyet','CoPhep'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
