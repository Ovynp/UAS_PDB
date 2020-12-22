@extends('layout/main')

@section('title','Edit Data Penduduk')

@section('container')


    <div class="container">
        <div class="row">
            <div class="col-8">
            <div class="container">
            {{ Form::model($penduduk, ['route' => ['penduduk.update', $penduduk->id], 'method' => 'patch']) }}
                 <h3 class="mt-3">Edit Data Penduduk</h3>
                 <form method="POST" action="{{ route('penduduk.store') }}">
                 @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        {{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukkan nama']) }}
                    </div>
                    <div class="form-group">
                    <label for="kartu_keluarga_id">No KK</label>
                         {{ Form::select('kartu_keluarga_id',$no_kk, null, ['class' => 'form-control', 'id' => 'kartu_keluarga_id', 'placeholder' => 'No. KK']) }}
                    </div>
                    <div class="form-group"> 
                        <label for="nik">NIK</label>
                        {{ Form::text('nik', null, ['class' => 'form-control', 'id' => 'nik', 'placeholder' => 'Masukkan NIK']) }}
                    </div>
                    <div class="form-group"> 
                        <label for="tempat_lahir">Tempat Lahir</label>
                        {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempat_lahir', 'placeholder' => 'Masukkan Tempat Lahir']) }}
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        {{ Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'placeholder' => 'Tanggal Lahir']) }}
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        {{ Form::select('agama', $agama, null, ['class' => 'form-control', 'id' => 'agama', 'placeholder' => 'Agama']) }}
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        {{ Form::select('jenis_kelamin', $jenkel, null, ['class' => 'form-control', 'id' => 'jenis_kelamin', 'placeholder' => 'Jenis Kelamin']) }}
                    </div>
                    <div class="form-group">
                        <label for="level_pendidikan_id">Level Pendidikan</label>
                        {{ Form::select('level_pendidikan_id', $level, null, ['class' => 'form-control', 'id' => 'level_pendidikan_id', 'placeholder' => 'Level Pendidikan']) }}
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_id">Pekerjaan</label>
                        {{ Form::select('pekerjaan_id', $pekerjaan, null, ['class' => 'form-control', 'id' => 'pekerjaan_id', 'placeholder' => 'Pilih Pekerjaan']) }}
                    </div>
                    <div class="form-group">
                        <label for="status_pernikahan">Status Pernikahan</label>
                        {{ Form::select('status_pernikahan',$pernikahan, null, ['class' => 'form-control', 'id' => 'status_pernikahan', 'placeholder' => 'Status Pernikahan']) }}
                    </div>
                    <div class="form-group">
                        <label for="status_keluarga">Status Keluarga</label>
                        {{ Form::select('status_keluarga',$status, null, ['class' => 'form-control', 'id' => 'status_keluarga', 'placeholder' => 'Status Keluarga']) }}
                    </div>
                    <div class="form-group">
                        <label for="kewarganegaraan_id">Kewarganegaraan</label>
                        {{ Form::select('kewarganegaraan_id',$kewarganegaraan, null, ['class' => 'form-control', 'id' => 'kewarganegaraan_id', 'placeholder' => 'Kewarganegaraan']) }}
                    </div>
                    <div class="form-group">
                        <label for="ayah">Nama Ayah</label>
                        {{ Form::text('ayah', null, ['class' => 'form-control', 'id' => 'ayah', 'placeholder' => 'Nama Ayah']) }}
                    </div>
                    <div class="form-group">
                        <label for="ibu">Nama Ibu</label>
                        {{ Form::text('ibu', null, ['class' => 'form-control', 'id' => 'ibu', 'placeholder' => 'Nama Ibu']) }}
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
