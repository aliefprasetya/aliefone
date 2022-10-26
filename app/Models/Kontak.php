<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jenis_kontak_id',
        'deskripsi',
    ];
    protected $table = 'kontak';

    public function siswa(){
        return $this->BelongsTo('app\models\Siswa', 'siswa_id');
    }

    public function JenisKontak(){
        return $this->belongsTo('app\models\JenisKontak' , 'jenis_kontak_id');
    }
}