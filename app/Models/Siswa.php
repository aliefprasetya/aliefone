<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'jk',
        'email',
        'foto',
        'about',
    ];
    protected $table = 'siswa';
    public function kontak(){
        return $this->belongsToMany('app\models\JenisKontak')->withPivot('deskripsi');
    }

    public function project(){
        return $this->hasMany('app\models\Project' , 'siswa_id');
    }

}
