@extends('layout/main')

@section('title','Pengelolaan Kartu Keluarga')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">            
                 <h1 class="mt-3">Daftar NO Kartu Keluarga</h1>
                 <a href="/kartukeluarga/create" class="btn btn-primary my-3">Tambah Kartu Keluarga</a>

                 @if(session('status'))
                 <div class="alert alert-success">
                    {{ session('status') }}
                 </div>
                 @endif
                 
                {{ $kk->links() }}

                 <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No.KK</th>
                        <th scope="col">Jorong</th>
                        <th scope="col">Nagari</th>
                        <th scope="col">Tanggal Pencatatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                  @foreach($kk as $kartukeluarga)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kartukeluarga->no }}</td>
                            <td>{{ $kartukeluarga->jorong->nama }}</td>
                            <td>{{ $kartukeluarga->jorong->nagari->nama }}</td>
                            <td>{{ $kartukeluarga->created_at }}</td>
                            <td>
                            <a href="/kartukeluarga/{{ $kartukeluarga->id }}" class="badge-info"><button class="btn btn-info"> Detail </button></a>
                            <a href="/kartukeluarga/{{ $kartukeluarga->id }}/edit" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                  
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
@endsection
