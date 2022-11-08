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
    
    public function project(){
        return $this->hasMany('App\Models\Project', 'id_siswa');
    }
    
    public function kontak(){
        return $this->belongsToMany('App\Models\Kontak', 'id_siswa')->withPivot('deskripsi');
    }
}
