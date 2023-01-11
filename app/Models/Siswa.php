<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
protected $fillable = [
    'nisn',
    'nama_siswa',
    'jk',
    'kelas',
    'jurusan',
];
    protected $table = 'siswa';
    
    public function peminjaman(){
        return $this->hasMany('App\Models\Peminjaman', 'id_siswa');
    }
    
    public function pengembalian(){
        return $this->hasMany('App\Models\Pengembalian', 'id_siswa');
    }
}
