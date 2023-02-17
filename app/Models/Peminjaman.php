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
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
    ];
        protected $table = 'peminjaman';
        
        public function siswa(){
            return $this->belongsTo(Siswa::class);
        }
        public function sarpras(){
            return $this->belongsTo(Sarpras::class);
        }
}
