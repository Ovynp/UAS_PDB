<?php

namespace App\Http\Controllers;

use App\Models\jorong;
use App\Models\penduduk;
use App\Models\pekerjaan;
use App\Models\KartuKeluarga;
use App\Models\level_pendidikan;
use App\Models\kewarganegaraan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
   public function index()
   {
    $penduduk = Penduduk::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 15 AND 64')->get();
    return view('laporan.index', compact('penduduk'));
   }
}
