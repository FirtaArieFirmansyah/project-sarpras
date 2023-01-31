<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Sarpras;

class SarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $sarprases = Sarpras::where('kode_sarpras','LIKE','%' .$request->search. '%')
                           ->orWhere('nama_sarpras','LIKE','%' .$request->search. '%')
                           ->orWhere('kategori_id','LIKE','%' .$request->search. '%')
                           ->get();
        }else{
            $sarprases = Sarpras::all();
        }
        
        return view('admin.sarpras.mastersarpras', compact('sarprases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategories = Kategori::all(['id','kode','name']);
        return view('admin.sarpras.tambahsarpras',compact('kategories'));
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
                'kode_sarpras' => 'required',
                'kategori_id' => 'required',
                'nama_sarpras' => 'required',
                'jumlah_sarpras' => 'required',
                'jumlah_terpakai' => 'required',
                'jumlah_rusak' => 'required',
            ], $message );
            
            Sarpras::create($validatedData);
            return redirect('/admin/sarpras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sarpras = Sarpras::findOrFail($id);
        $kategories = Kategori::all(['id','kode','name']);
        return view('admin.sarpras.editsarpras', ['sarpras'=>$sarpras, 'kategories' => $kategories]);
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
            'kode_sarpras' => 'required',
            'kategori_id' => 'required',
            'nama_sarpras' => 'required',
            'jumlah_sarpras' => 'required',
            'jumlah_terpakai' => 'required',
            'jumlah_rusak' => 'required',
        ]);

        $sarprases = Sarpras::find($id)
            ->update($validatedData);

        return redirect('/admin/sarpras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sarpras::destroy($id);
        return redirect('admin/sarpras');
    }
}
