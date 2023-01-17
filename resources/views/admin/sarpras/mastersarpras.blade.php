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
            <div class="table-responsive">
                <div class="row g-3 justify-content-between align-items-center mb-3">
                    <div class="col-3 position-relative">
                        <i class="fas fa-search position-absolute" style="right: 25px; top:50%; transform:translateY(-50%)"></i>
                        <form action="/admin/sarpras" method="GET">
                            <input type="text" id="" name="search" class="form-control" aria-describedby="" placeholder="Search">
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('sarpras.create')}}" class="btn btn-success">+ Tambah Data</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-stripped"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th width="5%">No.</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Terpakai</th>
                            <th>Rusak</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tbody>
                    {{-- @php $no=0; @endphp --}}
                    @if($sarprases->count() > 0)
                        @foreach ($sarprases as $no => $sarpras)
                        {{-- @php $no++; @endphp --}}
                        <tr class="text-center text-nowrap">
                            {{-- <th>{{$no}}</th> --}}
                            <td>{{$no + $sarprases->firstItem()}}</td>
                            <td>{{$sarpras->nama_sarpras}}</td>
                            <td>{{$sarpras->jenis_sarpras}}</td>
                            <td>{{$sarpras->jumlah_sarpras}}</td>
                            <td>{{$sarpras->jumlah_terpakai}}</td>
                            <td>{{$sarpras->jumlah_rusak}}</td>
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
                            <td colspan="7" class="text-center">
                                Data Sarana Prasarana Kosong.
                            </td>
                        </tr>
                    @endif
                </table>
                {{ $sarprases->links() }}
            </div>
        </div>
    </section>
</div>

@endsection