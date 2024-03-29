<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

        protected $guarded=[]; 
        protected $table = 'laporan';
        
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
