@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Mahasiswa</h1>
    <a href="{{ route('datamahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datamahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama_lengkap }}</td>
                <td>{{ $mahasiswa->jurusan }}</td>
                <td>
                    <a href="{{ route('datamahasiswa.show', $mahasiswa->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('datamahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('datamahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
