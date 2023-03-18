<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class TrinhDoHocVan extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $table = 'trinhdohocvan';
    protected $primaryKey = 'MaPB';
    protected $fillable = ['TenHeDaoTao','TrinhDoChuyenMon','XepLoai'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaTDHV');
    }
}
