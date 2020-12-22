<?php

namespace App\Http\Controllers;

use App\Models\penduduk;
use App\Models\pekerjaan;
use App\Models\KartuKeluarga;
use App\Models\level_pendidikan;
use App\Models\kewarganegaraan;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $no_kk = KartuKeluarga::select('no')->where('id', $id)->value('no');
        $level = level_pendidikan::all()->pluck('nama', 'id');
        $pekerjaan = pekerjaan::all()->pluck('nama', 'id');
        $kewarganegaraan= kewarganegaraan::all()->pluck('nama', 'id');
        $agama= penduduk::groupby('agama')->pluck('agama','agama');
        $jenkel = penduduk::groupby('jenis_kelamin')->pluck('jenis_kelamin','jenis_kelamin');
        $pernikahan = penduduk::groupby('status_pernikahan')->pluck('status_pernikahan','status_pernikahan');
        $status= penduduk::groupby('status_keluarga')->pluck('status_keluarga','status_keluarga');
        return view('KartuKeluarga.tambah', compact('no_kk','level','pekerjaan','kewarganegaraan','agama','jenkel','pernikahan','pernikahan','status','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggotakeluarga = penduduk::create([
            'kartu_keluarga_id' => $request->input('kartu_keluarga_id'),
            'nama' => $request->input('nama'),
            'nik' => $request->input('nik'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'agama' => $request->input('agama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'level_pendidikan_id' => $request->input('level_pendidikan_id'),
            'pekerjaan_id' => $request->input('pekerjaan_id'),
            'status_pernikahan' => $request->input('status_pernikahan'),
            'status_keluarga' => $request->input('status_keluarga'),
            'kewarganegaraan_id' => $request->input('kewarganegaraan_id'),
            'ayah' => $request->input('ayah'),
            'ibu' => $request->input('ibu')
        ]);
        $anggotakeluarga->save();
        // dd($penduduk);
        return redirect()->route('kartukeluarga.show', [$anggotakeluarga->kartu_keluarga_id])->with('status','Anggota Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Penduduk::find($id);
        $delete->delete();
        return redirect()->route('kartukeluarga.show', [$delete->kartu_keluarga_id])->with('status','Anggota Keluarga Berhasil Dihapus');
    }
}
