<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
protected $fillable = [
    'niuj',
    'nama_siswa',
    'kelas',
    'jurusan',
];
    protected $table = 'siswa';
    
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class, 'siswa_id');
    }
    
    public function pengembalian(){
        return $this->hasMany(Pengembalian::class, 'siswa_id');
    }
}
