<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sarpras;
use App\Models\Peminjaman;
use App\Models\Pengambilan;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //return view('admin.pengembalian.masterpengembalian');
        $siswas = Siswa::all();
        $sarprases = Sarpras::all();
        $peminjamanes = Peminjaman::all();
        $pengambilanes = Pengambilan::all();
        $pengembalianes = Pengembalian::all();
  
        return view('admin.pengembalian.masterpengembalian', compact('siswas', 'sarprases', 'peminjamanes', 'pengambilanes', 'pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.pengembalian.tambahpengembalian');
        $siswas = Siswa::all();
        $sarprases = Sarpras::all();
        $pengambilanes = Pengambilan::all();
        return view('admin.pengembalian.masterpengembalian', compact('siswas', 'sarprases', 'pengambilanes'));
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
            'required' => ':Attribute harus diisi ya !',
            'min' => ':Attribute minimal :min ya !',
            'max' => ':Attribute maksimal :max ya !',
            'numeric' => ':Attribute harus diisi angka ya !',
            'mimes' => ':Attribute harus bertipe jpg, jpeg, png ya !',
            'size' => ':File yang diupload harus maksimal size ya !',
            ];
            $validatedData = $request->validate([
                'nama_sarpras' => 'required',
                'jenis_sarpras' => 'required',
                'jumlah_sarpras' => 'required',
                'jumlah_terpakai' => 'required',
                'jumlah_rusak' => 'required',
            ], $message );
            
            Pengembalian::create($validatedData);
            return redirect('/admin/pengembalian');
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
        $pengembalian = Pengembalian::findOrFail($id);
        return view('admin.pengembalian.editpengembalian', ['pengembalian'=>$pengembalian]);
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
        $validatedData = $request->validate([
            'nama_sarpras' => 'required',
            'jenis_sarpras' => 'required',
            'jumlah_sarpras' => 'required',
            'jumlah_terpakai' => 'required',
            'jumlah_rusak' => 'required',
        ]);

        $pengembalianes = Pengembalian::find($id)
            ->update($validatedData);

        return redirect('/admin/pengembalian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengembalian::destroy($id);
        return redirect('admin/pengembalian');
    }
}
