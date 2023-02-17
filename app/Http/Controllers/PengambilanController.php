<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Sarpras;
use App\Models\Peminjaman;
use App\Models\Pengambilan;
use Illuminate\Support\Facades\DB;

class PengambilanController extends Controller
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
        $peminjamanes = Peminjaman::where('status', '=', '1')->get(['id','siswa_id']);
        $pengambilanes = Pengambilan::all();

        $arr = [];
        foreach($peminjamanes as $key => $p) {
            if(!in_array($p['siswa_id'], $arr)) {
                $arr[] = $p['siswa_id'];
            } else {
                unset($peminjamanes[$key]);
            }
        }

        return view('admin.pengambilan.masterpengambilan', compact('siswas', 'sarprases', 'peminjamanes', 'pengambilanes'));
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
        $peminjamanes = Peminjaman::all();
        return view('admin.pengambilan.masterpengambilan', compact('siswas', 'sarprases', 'peminjamanes'));
        //$pengambilan->update(['status'=> 1]);
        //return redirect()->route('peminjaman.index');
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
                'peminjaman_id' => 'required',
                'tanggal_pengambilan' => 'required',
                'foto' => 'required',
                'status'=> 'required',
            ], $message );
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $foto = time() . "_" . $file->getClientOriginalName();
                $save_db_foto = 'masterpengambilan/' . $foto;
    
                $dir = public_path('img/admin/masterpengambilan');
                if (!file_exists($dir)) mkdir($dir);
    
                $file->move($dir, $foto);
            }else{
                $save_db_foto = 'default.jpg';
            }
    
            $validatedData['foto'] = $save_db_foto;
            
            Pengambilan::create($validatedData);
            return redirect('/admin/pengambilan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($siswa_id)
    {
        $siswa = Siswa::where('id', $siswa_id)->with('peminjaman','peminjaman.sarpras')->get()[0];
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswas = Siswa::all();
        $sarprases = Sarpras::all();
        $peminjamanes = Peminjaman::findOrFail($id);
        return view('admin.sarpras.editsarpras', ['siswas' => $siswas, 'sarpras'=>$sarprases, 'peminjamanes'=>$peminjamanes]);
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
        // $pengambilan->update(['status'=> 1]);
        // return redirect()->route('pengambilan.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$peminjaman->update(['status'=> 2]);
        //return redirect()->route('peminjaman.index');
    }

    public function getJumlahPeminjaman($peminjaman_id) {
        return response()->json(Peminjaman::find($peminjaman_id));
    }
}
