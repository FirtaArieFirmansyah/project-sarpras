<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengambilan_id',
        'tanggal_pengembalian',
        'kondisi',
        'status',
    ];
        protected $table = 'pengembalian';
        
        public function siswa(){
            return $this->belongsTo(Siswa::class);
        }
        public function sarpras(){
            return $this->belongsTo(Sarpras::class);
        }
        public function peminjaman(){
            return $this->belongsTo(Peminjaman::class);
        }
        public function pengambilan(){
            return $this->belongsTo(Pengambilan::class);
        }
        public function pengembalian(){
            return $this->belongsTo(Pengembalian::class);
        }
}
