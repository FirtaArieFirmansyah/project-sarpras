<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengambilan',
        'foto',
        'status',
    ];
        protected $table = 'pengambilan';
        
        public function siswa(){
            return $this->belongsTo(Siswa::class);
        }
        public function sarpras(){
            return $this->belongsTo(Sarpras::class);
        }
        public function peminjaman(){
            return $this->belongsTo(Peminjaman::class);
        }
}
