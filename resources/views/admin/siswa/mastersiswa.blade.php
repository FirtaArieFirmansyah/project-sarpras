@extends('admin.app')
@section('title', 'mastersiswa')
@section('content-title', 'Master Siswa')
@section('content')
{{-- <section>
    <ul>
        @foreach($siswas as $siswa)
                <li>NISN : {{ $siswa->nisn }}</li>
                <li>Nama : {{ $siswa->nama_siswa }}</li>
                <li>Jenis Kelamin : {{ $siswa->jk }}</li>
                <li>Kelas : {{ $siswa->kelas }}</li>
                <li>Jurusan : {{ $siswa->jurusan }}</li>
                <br>
        @endforeach
    </ul>
</section> --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA SISWA</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('siswa.create')}}" class="btn btn-success mb-4">+ Tambah Data</a>
                <table class="table table-responsive table-bordered table-hover table-stripped"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th>No.</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tbody>
                    {{-- @php $no=0; @endphp --}}
                    @if($siswas->count() > 0)
                        @foreach ($siswas as $siswa)
                        {{-- @php $no++; @endphp --}}
                        <tr class="text-center text-nowrap">
                            {{-- <th>{{$no}}</th> --}}
                            <td>{{$loop->iteration}}</td>
                            <td>{{$siswa->nisn}}</td>
                            <td>{{$siswa->nama_siswa}}</td>
                            <td>{{$siswa->jk}}</td>
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
</div>

@endsection