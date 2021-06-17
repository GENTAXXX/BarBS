<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $table = 'logbook';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal', 'kegiatan', 'deskripsi_log', 'saran', 'magang_id', 'spv_id', 'mhs_id'
    ];

    public function magang(){
        return $this->belongsTo(Magang::class, 'magang_id');
    }
    
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }

    public function spv(){
        return $this->belongsTo(Supervisor::class, 'spv_id');
    }
}
