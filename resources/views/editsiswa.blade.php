@extends('app')
@section('title', 'editsiswa')
@section('content-title', 'Edit Siswa')
@section('content')

<div class ="row">
    <div class ="col-lg-12">
         <div class="card shadow ab-4">
             <div class="card-body">
                @if (count($errors) > 0)
                   <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('mastersiswa.update', $data->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class ="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name='nama' value="{{ $data->nama }}">
                    </div>
                    <div class ="form-group">
                        <label for="Nisn">Nisn</label>
                        <input type="text" class="form-control" id="nisn" name='nisn' value="{{ $data->nisn }}">
                    </div>
                    <div class ="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-select form-control" id="jk" name='jk' value="{{ $data->jk }}">
                            <option value="Laki-Laki" @if( $data->jk == 'laki-laki') selected @endif >Laki-Laki</option>
                            <option value="Perempuan" @if( $data->jk == 'perempuan') selected @endif >Perempuan</option>
                        </select>
                    </div>
                    <div class ="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="email" name='email' value="{{ $data->email }}">
                    </div>
                    <div class ="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name='alamat' value="{{ $data->alamat }}">
                    </div>
                    <div class ="form-group">
                        <label for="About">About</label>
                        <input type="text" class="form-control" id="about" name='about' value="{{ $data->about }}">
                    </div>
                    <div class ="form-group">
                        <label for="Foto">Foto Siswa</label>
                        <input type="file" class="form-control-file" id='foto' name='foto' value="{{ $data->foto }}">
                        <img src="{{ asset('template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                         <input type="submit" class="btn btn-success" value="Simpan">
                         <a href="{{route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection