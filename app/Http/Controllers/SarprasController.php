<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Sarpras;
use Illuminate\Support\Facades\DB;

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

        $fa = DB::table('sarpras')->select(DB::raw('MAX(RIGHT(kode_sarpras,5)) as kode'));
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

        return view('admin.sarpras.tambahsarpras',compact('kategories', 'kd'));
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
                'kode_sarpras' => 'required',
                'kategori_id' => 'required',
                'nama_sarpras' => 'required',
                'jumlah_sarpras' => 'required',
                'jumlah_normal' => 'required',
                'jumlah_rusak' => 'required',
            ], $message );
            
            Sarpras::create($validatedData);
            //return redirect('/admin/sarpras');
            return redirect()->route('sarpras.index')->with('status', 'Sarpras sukses ditambahkan !');
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
            'jumlah_normal' => 'required',
            'jumlah_rusak' => 'required',
        ]);

        $sarprases = Sarpras::find($id)
            ->update($validatedData);

        //return redirect('/admin/sarpras');
        return redirect()->route('sarpras.index')->with('status', 'Sarpras sukes diedit !');
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
        //return redirect('admin/sarpras');
        return redirect()->route('sarpras.index')->with('status', 'Sarpras sukes dihapus !');

    }
}
