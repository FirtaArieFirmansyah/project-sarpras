<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarpras extends Model
{
    use HasFactory;
    protected $fillable = [
    'kode_sarpras',
    'kategori_id',
    'nama_sarpras',
    'jumlah_sarpras',
    'jumlah_normal',
    'jumlah_rusak',
];
    protected $table = 'sarpras';

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'sarpras_id');
    }
    
    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'siswa_id');
    }
}
