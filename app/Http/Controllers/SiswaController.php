<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $siswas = Siswa::where('niuj','LIKE','%' .$request->search. '%')
                           ->orWhere('nama_siswa','LIKE','%' .$request->search. '%')
                           ->orWhere('kelas','LIKE','%' .$request->search. '%')
                           ->orWhere('jurusan','LIKE','%' .$request->search. '%')
                           ->orderBy('nama_siswa', 'asc')
                           ->get();
        }else{
            $siswas = Siswa::orderBy('nama_siswa', 'asc')->get();
        }
        
        return view('admin.siswa.mastersiswa', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.tambahsiswa');
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
                'niuj' => 'required',
                'nama_siswa' => 'required|min:5',
                'kelas' => 'required',
                'jurusan' => 'required',
            ], $message );
            
            Siswa::create($validatedData);
            //return redirect('/admin/siswa');
            return redirect()->route('siswa.index')->with('status', 'Siswa sukses ditambahkan !');
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
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.editsiswa', ['siswa'=>$siswa]);
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
            'niuj' => 'required',
            'nama_siswa' => 'required|min:5',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $siswas=Siswa::find($id)
            ->update($validatedData);

        //return redirect('/admin/siswa');
        return redirect()->route('siswa.index')->with('status', 'Siswa sukes diedit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);
        //return redirect('admin/siswa');
        return redirect()->route('siswa.index')->with('status', 'Siswa sukses dihapus !');
    }
}
