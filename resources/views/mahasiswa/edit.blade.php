@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Data Mahasiswa</h3>

    <form action="{{ url('/mahasiswa/' . $row->mhsw_id) }}" method="POST">
        @method('PATCH')
        @csrf
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="mhsw_nim" value="{{ $row->mhsw_nim }}"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="mhsw_nama" value="{{ $row->mhsw_nama }}"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <select name="mhsw_jurusan" style="background-color: #f0f0f0; padding: 4px; border: 1px solid #ccc;">
                        @foreach ($jurusan as $j)
                            <option value="{{ $j->nama_jurusan }}" {{ $row->mhsw_jurusan == $j->nama_jurusan ? 'selected' : '' }}>
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="mhsw_alamat" value="{{ $row->mhsw_alamat }}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
	<a href="{{ url('/mahasiswa') }}">← Kembali ke daftar</a>
</div>
@endsection
