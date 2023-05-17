<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_agama';

    public function siswa()
    {
        return $this->hasMany(Siswa::class,'agama_id','id_agama');
    }
    
}
