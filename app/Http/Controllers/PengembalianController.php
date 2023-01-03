<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalianes = Pengembalian::all();
        return view('admin.pengembalian.masterpengembalian', compact('pengembalianes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengembalian.tambahpengembalian');
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
