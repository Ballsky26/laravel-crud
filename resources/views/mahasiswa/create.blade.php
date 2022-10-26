@extends('layout.template')
@section('content')

<form action='{{ url('mahasiswa') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nim' value="{{ Session::get('nim') }}" id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_lengkap' value="{{ Session::get('nama_lengkap') }}" id="nama_lengkap">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='program_studi' value="{{ Session::get('program_studi') }}" id="program_studi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kelas' value="{{ Session::get('kelas') }}" id="kelas">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='angkatan' value="{{ Session::get('angkatan') }}" id="angkatan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }}" id="alamat"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="simpan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection