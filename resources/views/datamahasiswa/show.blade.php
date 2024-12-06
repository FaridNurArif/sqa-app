@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Data Mahasiswa</h1>
    <table class="table">
        <tr>
            <th>NIM</th>
            <td>{{ $datamahasiswa->nim }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $datamahasiswa->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $datamahasiswa->jurusan }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $datamahasiswa->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $datamahasiswa->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $datamahasiswa->no_hp }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $datamahasiswa->email }}</td>
        </tr>
        <tr>
            <th>Alamat Tinggal</th>
            <td>{{ $datamahasiswa->alamat_tinggal }}</td>
        </tr>
        <tr>
            <th>Foto</th>
            <td>
                @if($datamahasiswa->foto)
                    <img src="{{ asset('storage/' . $datamahasiswa->foto) }}" alt="Foto Mahasiswa" width="150">
                @else
                    Tidak ada foto
                @endif
            </td>
        </tr>
    </table>
    <a href="{{ route('datamahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
