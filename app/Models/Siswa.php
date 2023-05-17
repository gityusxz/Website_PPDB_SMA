<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id','id_jurusan');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class,'agama_id','id_agama');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id_gender');
    }

   
}
