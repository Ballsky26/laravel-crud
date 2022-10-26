@extends('layout.template')
@section('content')

<form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
              {{$data->nim}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_lengkap' value="{{ $data->nama_lengkap }}" id="nama_lengkap">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='program_studi' value="{{ $data->program_studi }}" id="program_studi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kelas' value="{{ $data->kelas }}" id="kelas">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='angkatan' value="{{ $data->angkatan }}" id="angkatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name='alamat'  id="alamat">{{ $data->alamat }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="simpan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            <a href="{{ url('mahasiswa') }}" class="btn btn-secondary">Kembali</a></div>
        </div>
    </div>
</form>
@endsection