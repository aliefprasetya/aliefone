@extends('app')
@section('title', 'mastersiswa')
@section('content-title', 'Master Siswa')
@section('content')

<a class="btn btn-success" href="{{ route('mastersiswa.create') }}"> Tambah Data</a>
   <div class ="row">
       <div class ="col-lg-12">
            <div class="card shadow ab-4">
                <div class="card-header py-2">
                   {{-- <h6 class="m-0 font-wight-bold text-primary">Data Siswa</h6> --}}
                   </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $i =>$item)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                <a href="{{ route('mastersiswa.show', $item->id )}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="{{ route('mastersiswa.edit', $item->id )}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                                <a href="{{ route('mastersiswa.hapus', $item->id )}}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
       </div>
   </div>
@endsection