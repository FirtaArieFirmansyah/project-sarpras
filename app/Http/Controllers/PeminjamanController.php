<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamanes = Peminjaman::all();
        return view('admin.peminjaman.masterpeminjaman', compact('peminjamanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peminjaman.tambahpeminjaman');
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
                'nama_sarpras' => 'required',
                'jenis_sarpras' => 'required',
                'jumlah_sarpras' => 'required',
                'jumlah_terpakai' => 'required',
                'jumlah_rusak' => 'required',
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

        $peminjamanes = Peminjaman::find($id)
            ->update($validatedData);

        return redirect('/admin/peminjaman');
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
        return redirect('admin/sarpras');
    }
}
