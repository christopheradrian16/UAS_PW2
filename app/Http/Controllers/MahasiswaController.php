<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; 
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->keyword;

    if (!empty($keyword)) {
        $rows = Mahasiswa::where('mhsw_nim', 'like', "%$keyword%")
                ->orWhere('mhsw_nama', 'like', "%$keyword%")
                ->orWhere('mhsw_jurusan', 'like', "%$keyword%")
                ->orWhere('mhsw_alamat', 'like', "%$keyword%")
                ->get();
    } else {
        $rows = Mahasiswa::all();
    }

    return view('mahasiswa.index', compact('rows'));
}



    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.add', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mhsw_nim' => 'required|unique:tb_mhsw',
            'mhsw_nama' => 'required',
            'mhsw_jurusan' => 'required',
            'mhsw_alamat' => 'required'
        ]);

        Mahasiswa::create([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_jurusan' => $request->mhsw_jurusan,
            'mhsw_alamat' => $request->mhsw_alamat
        ]);

        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $row = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', compact('row', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mhsw_nim' => 'required',
            'mhsw_nama' => 'required',
            'mhsw_jurusan' => 'required',
            'mhsw_alamat' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'mhsw_nim' => $request->mhsw_nim,
            'mhsw_nama' => $request->mhsw_nama,
            'mhsw_jurusan' => $request->mhsw_jurusan,
            'mhsw_alamat' => $request->mhsw_alamat
        ]);

        return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        $row = Mahasiswa::findOrFail($id);
        $row->delete();

        return redirect('/mahasiswa');
    }
	
	public function show($id)
	{
	$row = Mahasiswa::findOrFail($id);
    return view('mahasiswa.show', compact('row'));
	}

}
