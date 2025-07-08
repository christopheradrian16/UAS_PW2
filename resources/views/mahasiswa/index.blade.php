@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Mahasiswa UNDHA</h3>

    <table style="font-family: Arial, sans-serif;">
        <tr>
            <td>
				NIM
			<form method="GET" action="" style="margin-top: 4px;">
				<input type="text" name="keyword" placeholder="Masukkan keyword" value="{{ request('keyword') }}" style="padding: 2px;">
				<button type="submit" style="padding: 2px 6px; background-color: #007bff; color: white; border: none;">Cari</button>
				<a href="{{ url('/mahasiswa') }}" style="margin-left: 10px;">Reset</a>
			</form>
			</td>

            <td>NAMA</td>
            <td>JURUSAN</td>
            <td>ALAMAT</td>
			<td><a href="{{ url('mahasiswa/create') }}" style="float: right; text-decoration: underline;">Tambah Data</a></td>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{ $row->mhsw_nim }}</td>
            <td>{{ $row->mhsw_nama }}</td>
            <td>{{ $row->mhsw_jurusan }}</td>
            <td>{{ $row->mhsw_alamat }}</td>
            <td>
                <a href="{{ url('mahasiswa/' . $row->mhsw_id . '/edit') }}" style="text-decoration: underline;">Edit</a>
            </td>
            <td>
                <a href="{{ url('mahasiswa/' . $row->mhsw_id) }}" style="text-decoration: underline;">Lihat</a>
            </td>
            <td>
                <form action="{{ url('mahasiswa/' . $row->mhsw_id) }}" method="POST" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
