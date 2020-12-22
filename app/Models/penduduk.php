<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penduduk extends Model
{
    use HasFactory;

    protected $table= 'penduduk';
    public $timestamps = false;
    protected $guarded = ['id'];
    

    public function kartu_keluarga(){
        return $this->belongsTo('App\Models\KartuKeluarga');
    }
    public function level_pendidikan(){
        return $this->belongsTo('App\Models\level_pendidikan');
    }
    public function pekerjaan(){
        return $this->belongsTo('App\Models\pekerjaan');
    }
    public function kewarganegaraan(){
        return $this->belongsTo('App\Models\kewarganegaraan');
    }
}
