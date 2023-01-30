<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'sarpras_id',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_pengambilan',
        'status',
    ];
        protected $table = 'peminjaman';
        protected $guarded=[];
        
        public function nama_siswa(){
            return $this->belongsTo(Siswa::class, 'siswa_id');
        }
}
