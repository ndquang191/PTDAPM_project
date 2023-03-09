<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;


class BaoHiem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'baohiem';
    protected $primaryKey = 'MaBHXH';
    protected $fillable = 
    ['MaNV','TenCheDo','MucDong'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class);
    }
}