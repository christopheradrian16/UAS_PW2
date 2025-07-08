@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Mahasiswa</h3>
    <p><strong>NIM</strong> : {{ $row->mhsw_nim }}</p>
    <p><strong>Nama</strong> : {{ $row->mhsw_nama }}</p>
    <p><strong>Jurusan</strong> : {{ $row->mhsw_jurusan }}</p>
    <p><strong>Alamat</strong> : {{ $row->mhsw_alamat }}</p>

    <a href="{{ url('/mahasiswa') }}">← Kembali ke daftar</a>
</div>
@endsection
