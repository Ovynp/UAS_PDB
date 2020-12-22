@extends('layout/main')

@section('title','Form Tambah Data Penduduk')

@section('container')


    <div class="container">
        <div class="row">
            <div class="col-8">
            <div class="container">
                 <h3 class="mt-3">Form Tambah Data Penduduk</h3>
                 <form method="POST" action="{{ route('kartukeluarga.store') }}">
                 @csrf
                    <div class="form-group">
                        <label for="No_kk">No.KK</label>
                        {{ Form::text('no', null, ['class' => 'form-control', 'id' => 'no', 'placeholder' => 'Masukkan nomor KK']) }}
                    </div>
                    <div class="form-group">
                    <label for="kartu_keluarga_id">jorong</label>
                         {{ Form::select('jorong_id',$jorong, null, ['class' => 'form-control', 'id' => 'jorong_id', 'placeholder' => 'Pilih Jorong']) }}
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Tambah Data</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
