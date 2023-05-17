<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gender';
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'gender_id', 'id_gender');
    }
}
