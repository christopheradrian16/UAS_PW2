@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Data Mahasiswa</h3>

    <form action="{{ url('/mahasiswa') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="mhsw_nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="mhsw_nama"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <select name="mhsw_jurusan" style="background-color: #f0f0f0; padding: 4px; border: 1px solid #ccc;">
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->nama_jurusan }}">{{ $j->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="mhsw_alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">SIMPAN</button></td>
            </tr>
        </table>
    </form>
	<a href="{{ url('/mahasiswa') }}">← Kembali ke daftar</a>
</div>
@endsection
