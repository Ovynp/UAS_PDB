@extends('layout/main')

@section('title','Edit Kartu Keluarga')

@section('container')


    <div class="container">
        <div class="row">
            <div class="col-8">
            <div class="container">
            {{ Form::model($kartukeluarga, ['route' => ['kartukeluarga.update', $kartukeluarga->id], 'method' => 'patch']) }}
                 <h3 class="mt-3">Edit Kartu Keluarga</h3>
                 <form method="POST" action="{{ route('kartukeluarga.store') }}">
                 @csrf
                    <div class="form-group">
                        <label for="N0kk">No.KK</label>
                        {{ Form::text('no', null, ['class' => 'form-control', 'id' => 'no', 'placeholder' => 'Masukkan nama']) }}
                    </div>
                    <div class="form-group">
                    <label for="kartu_keluarga_id">Jorong</label>
                         {{ Form::select('jorong_id',$jorong, null, ['class' => 'form-control', 'id' => 'jorong_id', 'placeholder' => 'jorong']) }}
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Simpan Data</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
