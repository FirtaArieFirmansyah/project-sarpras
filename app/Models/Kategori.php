<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Sarpras;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori',
    ];
    
    protected $table = 'kategori';
    protected $guarded = [];
    
    public function kontak(){

        return $this->hasMany('App\Models\Sarpras', 'sarpras_id');
            }
}
