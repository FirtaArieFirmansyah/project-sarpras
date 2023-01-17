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
            $siswas = Siswa::where('nisn','LIKE','%' .$request->search. '%')
                           ->orWhere('nama_siswa','LIKE','%' .$request->search. '%')
                           ->orWhere('jk','LIKE','%' .$request->search. '%')
                           ->orWhere('kelas','LIKE','%' .$request->search. '%')
                           ->orWhere('jurusan','LIKE','%' .$request->search. '%')
                           ->paginate(5);
        }else{
            $siswas = Siswa::paginate(5);
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
            'required' => ':attribute harus diisi yaa..',
            'min' => ':attribute minimal :min yaa..',
            'max' => ':attribute maksimal :max yaa..',
            'numeric' => ':attribute harus diisi angka yaa..',
            'mimes' => ':attribute harus bertipe jpg, jpeg, png yaa..',
            'size' => ':file yang diupload harus maksimal size yaa..',
            ];
            $validatedData = $request->validate([
                'nisn' => 'required|numeric',
                'nama_siswa' => 'required|min:5',
                'jk' => 'required',
                'kelas' => 'required',
                'jurusan' => 'required',
            ], $message );
            
            Siswa::create($validatedData);
            return redirect('/admin/siswa');
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
            'nisn' => 'required|numeric',
            'nama_siswa' => 'required|min:5',
            'jk' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $siswas=Siswa::find($id)
            ->update($validatedData);

        //return redirect()->route('admin.siswa.mastersiswa.index')->with('success', 'Data Updated Successfully');
        return redirect('/admin/siswa');
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
        return redirect('admin/siswa');
    }
}
