@extends('admin.app')
@section('title', 'mastersiswa')
@section('content-title', 'Master Siswa')
@section('content')

{{-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">DATA SISWA</h6>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <div class="row g-3 justify-content-between align-items-center mb-3">
                    
                    <div class="col-auto">
                        <a href="{{route('siswa.create')}}" class="btn btn-success">+ Tambah Data</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-stripped" id="dt"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th>No.</th>
                            <th>Nisn</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tbody>
                    @if($siswas->count() > 0)
                        @foreach ($siswas as $no => $siswa)
                        <tr class="text-center text-nowrap">
                            <td></td>
                            <td>{{$siswa->nisn}}</td>
                            <td>{{$siswa->nama_siswa}}</td>
                            <td>{{$siswa->}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>{{$siswa->jurusan}}</td>
                            <td>
                                <a href="{{route('siswa.edit', $siswa['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbspEdit</a>
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Siswa Kosong.
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section>
</div> --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">DATA SISWA</h6>
    </div>
    <section>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <div class="row g-3 justify-content-between align-items-center mb-3">
                    <div class="col-auto">
                        <a href="{{route('siswa.create')}}" class="btn btn-success">+ Tambah Data</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-stripped" id="dt"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th width="5%">No.</th>
                            <th>NIU / J</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="siswa">
                    {{-- @php $no=0; @endphp --}}
                    @if($siswas->count() > 0)
                        @foreach ($siswas as $no => $siswa)
                        {{-- @php $no++; @endphp --}}
                        <tr class="text-center text-nowrap">
                            {{-- <th>{{$no}}</th> --}}
                            <td></td>
                            <td>{{$siswa->niuj}}</td>
                            <td>{{$siswa->nama_siswa}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>{{$siswa->jurusan}}</td>
                            <td>
                                <a href="{{route('siswa.edit', $siswa['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbspEdit</a>
                                <form action="{{ route('siswa.destroy', $siswa->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Siswa Kosong.
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection