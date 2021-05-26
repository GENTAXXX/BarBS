<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $table = 'bimbingan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'catatan','tgl_bimbingan','mhs_id','dosen_id', 'magang_id'
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function magang(){
        return $this->belongsTo(Magang::class, 'magang_id');
    }
}
