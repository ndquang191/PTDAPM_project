<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class BangCap extends Model
{

    use HasFactory;
    protected $table = 'bangcap';
    protected $primaryKey = 'MaBC';
    protected $fillable = ['MaNV','TenBC','NgayCap'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaNV');
    }
}
