@extends('admin.app')
@section('title', 'mastersarpras')
@section('content-title', 'Master Sarpras')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">DATA SARANA PRASARANA</h6>
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
                        <a href="{{route('sarpras.create')}}" class="btn btn-success">+ Tambah Data</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-stripped" id="dt"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th width="5%">No.</th>
                            <th>Kode Sarpras</th>
                            <th>Kategori</th>
                            <th>Nama Sarpras</th>
                            <th>Jumlah</th>
                            <th>Normal</th>
                            <th>Rusak</th>
                            <th>Terpakai</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="sarpras">
                    {{-- @php $no=0; @endphp --}}
                    @if($sarprases->count() > 0)
                        @foreach ($sarprases as $no => $sarpras)
                        {{-- @php $no++; @endphp --}}
                        <tr class="text-center text-nowrap">
                            {{-- <th>{{$no}}</th> --}}
                            <td></td>
                            <td>{{$sarpras->kode_sarpras}}</td>
                            <td>{{$sarpras->kategori->name}}</td>
                            <td>{{$sarpras->nama_sarpras}}</td>
                            <td>{{$sarpras->jumlah_sarpras}}</td>
                            <td>{{$sarpras->jumlah_normal}}</td>
                            <td>{{$sarpras->jumlah_rusak}}</td>
                            <td>{{$sarpras->jumlah_sarpras - $sarpras->jumlah_normal }}</td>             
                            <td>
                                <a href="{{route('sarpras.edit', $sarpras['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbspEdit</a>
                                <form action="{{ route('sarpras.destroy', $sarpras->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="9" class="text-center">
                                Data Sarana Prasarana Kosong.
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