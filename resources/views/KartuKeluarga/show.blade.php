@extends('layout/main')

@section('title','Pengelolaan Kartu Keluarga')

@section('container')


    <div class="container">
        <div class="row">
            <div class="col-6">
            <div class="container">
                 <h3 class="mt-3">Detail Kartu Keluarga</h6>
                 <h6 class="mt-3">NO KK : {{ $kartukeluarga->no }}</h6>
                 <h6 class="mt-3">Jorong : {{ $kartukeluarga->jorong->nama }}</h6>
                 <h6 class="mt-3">Nagari : {{ $kartukeluarga->jorong->nagari->nama}}</h6>
                 <a href="{{ route('anggotakeluarga.tambah', [$kartukeluarga->id]) }}" class="btn btn-primary my-3">Tambah Anggota Kartu Keluarga</a>

            </div>

            @if(session('status'))
                 <div class="alert alert-success">
                    {{ session('status') }}
                 </div>
            @endif

            <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">agama</th>
                        <th scope="col">Status Keluarga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                  @foreach($penduduk as $pendudukk)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pendudukk->nama }}</td>
                            <td>{{ $pendudukk->nik }}</td>
                            <td>{{ $pendudukk->tempat_lahir }}</td>
                            <td>{{ $pendudukk->tanggal_lahir }}</td>
                            <td>{{ $pendudukk->agama }}</td>
                            <td>{{ $pendudukk->status_keluarga}}</td>
                            <td>
                            <form action="{{ route('anggotakeluarga.destroy', $pendudukk->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                  
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
@endsection
