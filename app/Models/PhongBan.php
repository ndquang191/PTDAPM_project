<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;


class PhongBan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'phongban';
    protected $primaryKey = 'MaPB';
    protected $fillable = ['TenPhongBan','DiaChi','Email','SDT'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaPB');
    }
}
