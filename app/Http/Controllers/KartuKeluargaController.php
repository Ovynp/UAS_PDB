<?php

namespace App\Http\Controllers;

use App\Models\jorong;
use App\Models\penduduk;
use App\Models\pekerjaan;
use App\Models\KartuKeluarga;
use App\Models\level_pendidikan;
use App\Models\kewarganegaraan;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kk = KartuKeluarga::orderBy('id', 'DESC')->paginate('10');
        return view('KartuKeluarga.index', compact('kk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $penduduk=penduduk::all;
        $jorong = jorong::all()->pluck('nama', 'id');
        return view('KartuKeluarga.create', compact('jorong'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $kartukeluarga = kartukeluarga::create([
            'no' => $request->input('no'),
            'jorong_id' => $request->input('jorong_id')
        ]);
        $kartukeluarga->save();
        // dd($penduduk);
        return redirect()->route('kartukeluarga.index')->with('status','Kartu Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kartukeluarga = kartukeluarga::where('id', $id)->get();
        $penduduk = penduduk::with('kartu_keluarga','kewarganegaraan')->where('kartu_keluarga_id',$id)->get();
        $kartukeluarga = $kartukeluarga[0];
        return view('kartukeluarga.show', compact('kartukeluarga','penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kartukeluarga $kartukeluarga)
    {
        
        $jorong = jorong::all()->pluck('nama', 'id');
        return view('kartukeluarga.edit', compact('jorong','kartukeluarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kartukeluarga $kartukeluarga)
    {
      
        $kartukeluarga->update([
            'no' => $request->input('no'),
            'jorong_id' => $request->input('jorong_id')
        ]);
        return redirect()->route('kartukeluarga.index')->with('status','Kartu Keluarga Berhasil Diubah');
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

