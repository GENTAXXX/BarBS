<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama','user_id','alamat','telepon','fax','foto','kab_id'
    ];

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kab_id');
    }

    public function user(){
        return $this->belongsTo(Mitra::class);
    }
}
