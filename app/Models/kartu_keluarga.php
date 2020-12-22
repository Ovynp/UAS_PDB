<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartu_keluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';

    public function jorong(){
        return $this->belongsTo('App\Models\Jorong');
    }
    public function penduduks(){
        return $this->hasMany('App\Models\penduduk');
    }
}
