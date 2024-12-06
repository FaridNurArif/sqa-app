@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Mahasiswa</h1>
    <form action="{{ route('datamahasiswa.update', $datamahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $datamahasiswa->nim) }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $datamahasiswa->nama_lengkap) }}" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan', $datamahasiswa->jurusan) }}" required>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $datamahasiswa->tempat_lahir) }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $datamahasiswa->tanggal_lahir) }}" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $datamahasiswa->no_hp) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $datamahasiswa->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat_tinggal" class="form-label">Alamat Tinggal</label>
            <textarea class="form-control" id="alamat_tinggal" name="alamat_tinggal" required>{{ old('alamat_tinggal', $datamahasiswa->alamat_tinggal) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            @if($datamahasiswa->foto)
                <img src="{{ asset('storage/' . $datamahasiswa->foto) }}" alt="Foto Mahasiswa" class="mt-3" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('datamahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
