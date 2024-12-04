@extends('layouts.main')
@section('title')
@section('navMhs','active')

@section('content')
    <h1>Daftar Mahasiswa Jurusan TI</h1>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ $mahasiswa->id }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama_lengkap }}</td>
            <td>{{ $mahasiswa->email }}</td>
            <td>{{ $mahasiswa->alamat }}</td>
        </tr>
        @endforeach
    </table>

@endsection