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
        $peminjamanes = Peminjaman::all();
        return view('admin.peminjaman.masterpeminjaman', compact('siswas', 'sarprases', 'peminjamanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $siswas = Siswa::all();
        $sarprases = Sarpras::all();
        return view('admin.peminjaman.tambahpeminjaman', compact('siswas', 'sarprases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $message = [
            'required' => ':Attribute harus diisi ya !',
            'min' => ':Attribute minimal :min ya !',
            'max' => ':Attribute maksimal :max ya !',
            'numeric' => ':Attribute harus diisi angka ya !',
            'mimes' => ':Attribute harus bertipe jpg, jpeg, png ya !',
            'size' => ':File yang diupload harus maksimal size ya !',
            ];
            $validatedData = $request->validate([
                'siswa_id' => 'required',
                'sarpras_id' => 'required',
                'jumlah' => 'required',
                'tanggal_peminjaman' => 'required',
                'tanggal_pengembalian' => 'required',
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
        // $peminjaman = Peminjaman::findOrFail($id);
        // return view('admin.peminjaman.editpeminjaman', ['peminjaman'=>$peminjaman]);

        // Peminjaman::find('id');
        // $siswas = Siswa::all();
        // $sarpras  = Sarpras::all();
        // $peminjamanes = Peminjaman::where('id', $id)->firstorfail();
        // return view('editpeminjaman', compact('peminjamanes'), compact('siswas'), compact('sarpras'));
        $siswas = Siswa::all();
        $sarprases = Sarpras::findOrFail($id);
        return view('admin.sarpras.editsarpras', ['siswas' => $siswas, 'sarpras'=>$sarprases]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Peminjaman $peminjaman)
    {

        $peminjaman->update(['status'=> 1]);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        // $peminjaman->delete();
        $peminjaman->update(['status'=> 2]);
        return redirect()->route('peminjaman.index');
    }
}
