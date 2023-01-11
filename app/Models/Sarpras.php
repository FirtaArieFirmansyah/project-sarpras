<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarpras extends Model
{
    use HasFactory;
protected $fillable = [
    'nama_sarpras',
    'jenis_sarpras',
    'jumlah_sarpras',
    'jumlah_terpakai',
    'jumlah_rusak',
];
    protected $table = 'sarpras';
    
    public function peminjaman(){
        return $this->hasMany('App\Models\Peminjaman', 'id_siswa');
    }
    
    public function pengembalian(){
        return $this->hasMany('App\Models\Pengembalian', 'id_siswa');
    }
}
