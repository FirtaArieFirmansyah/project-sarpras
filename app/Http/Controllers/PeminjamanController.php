<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

use App\Models\Siswa;
use App\Models\Sarpras;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        $sarprases = Sarpras::all();
        return view('admin.peminjaman.masterpeminjaman', compact('siswas, sarprases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa_id = request()->query('siswa');
        $sarpras_id = request()->query('sarpras');
        $siswa = Siswa::find($siswa_id);
        $sarpras = Sarpras::find($sarpras_id);
        return view('tambahproject', compact('siswa', 'sarpras', 'siswa_id', 'sarpras_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi yaa..',
            'min' => ':attribute minimal :min yaa..',
            'max' => ':attribute maksimal :max yaa..',
            'numeric' => ':attribute harus diisi angka yaa..',
            'mimes' => ':attribute harus bertipe jpg, jpeg, png yaa..',
            'size' => ':file yang diupload harus maksimal size yaa..',
            ];
            $validatedData = $request->validate([
                'nama_siswa' => 'required',
                'nama_sarpras' => 'required',
                'jenis_sarpras' => 'required',
                'jumlah' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_pengambilan' => 'required',
            ], $message );
            
            Peminjaman::create($validatedData);
            return redirect('/admin/peminjaman');
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
        $peminjaman = Peminjaman::findOrFail($id);
        return view('admin.peminjaman.editpeminjaman', ['peminjaman'=>$peminjaman]);

        Peminjaman::find('id');
        $siswas = Siswa::all();
        $sarpras  = Sarpras::all();
        $peminjamanes = Peminjaman::where('id', $id)->firstorfail();
        return view('editpeminjaman', compact('peminjamanes'), compact('siswas'), compact('sarpras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            'nama_sarpras' => 'required',
            'jenis_sarpras' => 'required',
            'jumlah' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_pengambilan' => 'required',
        ]);

        $peminjaman->update($validatedData);

        return redirect()->route('admin/peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect('admin/peminjaman');
    }
}
