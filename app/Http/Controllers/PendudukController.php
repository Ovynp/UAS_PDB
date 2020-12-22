<?php

namespace App\Http\Controllers;

use App\Models\penduduk;
use App\Models\pekerjaan;
use App\Models\KartuKeluarga;
use App\Models\level_pendidikan;
use App\Models\kewarganegaraan;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduks = Penduduk::orderBy('id', 'DESC')->paginate('10');
        return view('penduduk\penduduk', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $penduduk=penduduk::all;
        $no_kk = KartuKeluarga::all()->pluck('no', 'id');
        $level = level_pendidikan::all()->pluck('nama', 'id');
        $pekerjaan = pekerjaan::all()->pluck('nama', 'id');
        $kewarganegaraan= kewarganegaraan::all()->pluck('nama', 'id');
        $agama= penduduk::groupby('agama')->pluck('agama','agama');
        $jenkel = penduduk::groupby('jenis_kelamin')->pluck('jenis_kelamin','jenis_kelamin');
        $pernikahan = penduduk::groupby('status_pernikahan')->pluck('status_pernikahan','status_pernikahan');
        $status= penduduk::groupby('status_keluarga')->pluck('status_keluarga','status_keluarga');
        return view('penduduk.create', compact('no_kk','level','pekerjaan','kewarganegaraan','agama','jenkel','pernikahan','pernikahan','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $penduduk= penduduk::create($request->all());
        // $request->validate([
        //     'keluarga_id' => 'required',
        //     'nama' => 'required',
        //     'nik' => 'numeric|digits:16',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'agama' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'level_pendidikan_id' => 'required',
        //     'pekerjaan_id' => 'required',
        //     'status_pernikahan' => 'required',
        //     'status_keluarga' => 'required',
        //     'kewarganegaraan_id' => 'required',
        //     'ayah' => 'required',
        //     'ibu' => 'required',
        // ]);
        $penduduk = penduduk::create([
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
        $penduduk->save();
        // dd($penduduk);
        return redirect()->route('penduduk.index')->with('status','Data Penduduk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penduduk = penduduk::where('id', $id)->get();
        // $penduduk = penduduk::with('kartu_keluarga','kewarganegaraan')->where('id',$id)->get();
        $penduduk = $penduduk[0];
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(penduduk $penduduk)
    {
        
        $no_kk = KartuKeluarga::all()->pluck('no', 'id');
        $level = level_pendidikan::all()->pluck('nama', 'id');
        $pekerjaan = pekerjaan::all()->pluck('nama', 'id');
        $kewarganegaraan= kewarganegaraan::all()->pluck('nama', 'id');
        $agama= penduduk::groupby('agama')->pluck('agama','agama');
        $jenkel = penduduk::groupby('jenis_kelamin')->pluck('jenis_kelamin','jenis_kelamin');
        $pernikahan = penduduk::groupby('status_pernikahan')->pluck('status_pernikahan','status_pernikahan');
        $status= penduduk::groupby('status_keluarga')->pluck('status_keluarga','status_keluarga');
        return view('penduduk.edit', compact('no_kk','level','pekerjaan','kewarganegaraan','agama','jenkel','pernikahan','pernikahan','status','penduduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penduduk $penduduk)
    {
      
        $penduduk->update([
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
        //penduduk::where('id'->$penduduk);
        // dd($penduduk);
        return redirect()->route('penduduk.index')->with('status','Data Penduduk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // penduduk::destroy($penduduk->id);
        // return redirect()->route('penduduk.index')->with('status', 'Data penduduk berhasil dihapus');
        $delete = penduduk::find($id);
        $delete->delete();
        return redirect()->route('penduduk.index')->with('status','Data penduduk berhasil dihapus');
     }
}
