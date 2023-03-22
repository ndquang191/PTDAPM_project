<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class BangCap extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bangcap';
    protected $primaryKey = 'MaBC';
    protected $fillable = ['MaNV','TenBC','NgayCap','LoaiBC'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
