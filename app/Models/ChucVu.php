<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chucvu';
    protected $primaryKey = 'MaCV';
    protected $fillable = ['TenCV'];

    public function nhanvien(){
        return $this->belongsTo(NhanVien::class,'MaCV');
    }
}
