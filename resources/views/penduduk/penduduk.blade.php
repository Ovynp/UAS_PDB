@extends('layout/main')

@section('title','Pengelolaan Penduduk')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">            
                 <h1 class="mt-3">Daftar Penduduk</h1>
                 <a href="/penduduk/create" class="btn btn-primary my-3">Tambah Data Penduduk</a>

                 @if(session('status'))
                 <div class="alert alert-success">
                    {{ session('status') }}
                 </div>
                 @endif
                 
                {{ $penduduks->links() }}

                 <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                  @foreach($penduduks as $penduduk)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $penduduk->nik }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->jenis_kelamin }}</td>
                            <td>{{ $penduduk->agama }}</td>
                            <td>
                            <a href="/penduduk/{{ $penduduk->id }}" class="badge-info"><button class="btn btn-info"> Detail </button></a>
                                <!-- <a href="" class="badge-success">Edit</a> -->
                            <form action="{{ route('penduduk.destroy', $penduduk->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                  <!-- @foreach($penduduk as $pddk)
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                     
                        {{ $penduduk->nama }}
                             <a href="/Penduduk/1" class="badge-info">Detail</a>
                        </li>
                        @endforeach -->
                    <!-- </ul> -->
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
@endsection
