@extends('layouts.main')

@section('title', 'Data Dosen')

@section('navDosen', 'active')

@section('content')
    <h1>Daftar Dosen</h1>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Alamat</th>
        </tr>
        @if(isset($dosens) && count($dosens) > 0)
            @foreach ($dosens as $dosen)
            <tr>
                <td>{{ $dosen->id }}</td>
                <td>{{ $dosen->nik }}</td>
                <td>{{ $dosen->nama }}</td>
                <td>{{ $dosen->email }}</td>
                <td>{{ $dosen->prodi }}</td>
                <td>{{ $dosen->alamat }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Tidak ada data dosen</td>
            </tr>
        @endif
    </table>
@endsection




