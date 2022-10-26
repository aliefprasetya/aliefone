<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'deskripsi',
        'jenis_kontak'
    ];
    protected $table = 'jenis_kontak';

    public function kontak(){
        return $this->belongsTo('app\models\kontak' , 'id');
    }
}