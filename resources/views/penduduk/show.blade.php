@extends('layout/main')

@section('title','Pengelolaan Penduduk')

@section('container')


    <div class="container">
        <div class="row">
            <div class="col-6">
            <div class="container">
            <a href="{{ $penduduk->id }}/edit" class="btn btn-primary">Edit </a>
                 <h3 class="mt-3">Detail Penduduk</h3>
                 <h3 class="mt-3">NO KK : {{ $penduduk->kartu_keluarga->no }}</h3>
            </div>
                    <tbody>
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Nama : {{ $penduduk->nama }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">NIK : {{ $penduduk->nik }}</h6>
                        <p class="card-text">Tempat Lahir : {{ $penduduk->tempat_lahir }}</p>
                        <p class="card-text">Tanggal Lahir : {{ $penduduk->tanggal_lahir }}</p>
                        <p class="card-text">Agama : {{ $penduduk->agama}}</p>
                        <p class="card-text">Jenis Kelamin : {{ $penduduk->jenis_kelamin }}</p>
                        <p class="card-text">Agama : {{ $penduduk->agama }}</p>
                        <p class="card-text">Pendidikan Terakhir : {{ $penduduk->level_pendidikan->nama }}</p>
                        <p class="card-text">Pekerjaan : {{ $penduduk->pekerjaan->nama }}</p>
                        <p class="card-text">Status Pernikahan : {{ $penduduk->status_pernikahan }}</p>
                        <p class="card-text">Keawarganegaraan : {{ $penduduk->kewarganegaraan->nama }}</p>
                        <p class="card-text">Ayah : {{ $penduduk->ayah }}</p>
                        <p class="card-text">Ibu : {{ $penduduk->ibu }}</p>
                       
                          
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
