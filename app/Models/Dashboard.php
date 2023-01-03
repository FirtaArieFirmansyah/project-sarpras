<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'id_sarpras',
        'tanggal_pinjam',
        'tanggal_pengambilan',
        'status',
    ];
        protected $table = 'peminjaman';
        protected $guarded=[];
        public function nama_siswa(){
            return $this->belongsTo('App\Models\Siswa', 'id_siswa');
        }
}
