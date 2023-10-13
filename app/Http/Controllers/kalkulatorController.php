<?php

namespace App\Http\Controllers;

use App\Models\kalkulator;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Session;

class kalkulatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kalkulator::orderBy('nama', 'desc')->paginate(5);
        return view('kalkulator.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kalkulator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('nama', $request->nama);
        Session::flash('jenisSampah', $request->jenisSampah);
        Session::flash('jumlahSampah', $request->jumlahSampah);
        Session::flash('harga', $request->harga);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'jenisSampah' => 'required',
            'jumlahSampah' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama Wajib diisi',
            'deskripsi.required' => 'Deskripsi Wajib diisi',
            'foto.required' => 'Foto Wajib diisi',
            'jenisSampah.required' => 'Jenis Sampah Wajib diisi',
            'jumlahSampah.required' => 'Jumlah Sampah Wajib diisi',
            'harga.required' => 'Harga Wajib diisi',
        ]);

        $newName = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->name . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('foto', $newName);
        }

        $request['foto'] = $newName;

        $name = $request->input('nama');
        $jenisSmph = $request->input('jenisSampah');
        $jumlahSmph = $request->input('jumlahSampah');
        $harga = $request->input('harga');
        $result = 0;

        if ($jenisSmph == 'kertas' && $harga == 'kertas') {
            $result = $jumlahSmph * 2000;
        } else if ($jenisSmph == 'plastik' && $harga == 'plastik') {
            $result = $jumlahSmph * 3500;
        } else if ($jenisSmph == 'logam' && $harga == 'logam') {
            $result = $jumlahSmph * 10000;
        } else if ($jenisSmph == 'kaca' && $harga == 'kaca') {
            $result = $jumlahSmph * 8000;
        } else {
            $result = 0;
        }

        $data = [
            'id' => $request->id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'jenisSampah' => $request->jenisSampah,
            'jumlahSampah' => $request->jumlahSampah,
            'harga' => $result,
        ];
        kalkulator::create($data);
        return redirect()->to('kalkulator/create')->with('info', $name . ' mendapatkan uang dengan harga = Rp' . $result . ' (Jenis dan Harga Sampah harus sama! Jika tidak harganya 0.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kalkulator::where('id', $id)->delete();
        return redirect()->to('kalkulator')->with('danger', 'Data berhasil dihapus');
    }
}
