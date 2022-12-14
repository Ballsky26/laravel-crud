<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = mahasiswa::where('nim', 'like', "%$katakunci%")
                ->orWhere('nama_lengkap', 'like', "%$katakunci%")
                ->orWhere('program_studi', 'like', "%$katakunci%")
                ->orWhere('kelas', 'like', "%$katakunci%")
                ->orWhere('angkatan', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = mahasiswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('program_studi', $request->program_studi);
        Session::flash('kelas', $request->kelas);
        Session::flash('angkatan', $request->angkatan);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama_lengkap' => 'required',
            'program_studi' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required|numeric:mahasiswa,angkatan',
            'alamat' => 'required',
        ], [
            'nim.required' => 'Nim wajib diisi',
            'nim.numeric' => 'Nim harus diisi dengan angka',
            'nim.unique' => 'Nim wajib sudah ada',
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'program_studi.required' => 'Program Studi wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'angkatan.required' => 'Angkatan wajib diisi',
            'angkatan.numeric' => 'Angkatan wajib diisi dengan angka',
            'alamat.required' => 'Alamat wajib diisi',
        ]);
        $data = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'program_studi' => $request->program_studi,
            'kelas' => $request->kelas,
            'angkatan' => $request->angkatan,
            'alamat' => $request->alamat,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'program_studi' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required|numeric:mahasiswa,angkatan',
            'alamat' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'program_studi.required' => 'Program Studi wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'angkatan.required' => 'Angkatan wajib diisi',
            'angkatan.numeric' => 'Angkatan wajib diisi dengan angka',
            'alamat.required' => 'Alamat wajib diisi',
        ]);
        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'program_studi' => $request->program_studi,
            'kelas' => $request->kelas,
            'angkatan' => $request->angkatan,
            'alamat' => $request->alamat,
        ];
        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan Delete Data');
    }
}
