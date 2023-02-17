<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.kategori.masterkategori');
        $kategories = Kategori::paginate(5);

        $fa = DB::table('kategori')->select(DB::raw('MAX(RIGHT(kode,5)) as kode'));
        $kd = "";
        if($fa->count()>0)
        {
            foreach($fa->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }

        return view('admin.kategori.masterkategori', compact('kategories', 'kd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.tambahkategori');
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
                'kode' => 'required',
                'name' => 'required',
            ], $message );
            
            Kategori::create($validatedData);
            //return redirect('/admin/kategori');
            return redirect()->route('kategori.index')->with('status', 'Kategori sukses ditambahkan !');
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
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.editkategori', ['kategori'=>$kategori]);
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
            'kode' => 'required',
            'name' => 'required',
        ]);

        $kategories = Kategori::find($id)
            ->update($validatedData);
            //return redirect('/admin/kategori');
            return redirect()->route('kategori.index')->with('status', 'Kategori sukes diedit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::destroy($id);
        //return redirect('/admin/kategori');
        return redirect()->route('kategori.index')->with('status', 'Kategori sukes dihapus !');
    }
}
