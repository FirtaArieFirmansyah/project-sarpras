@extends('admin.app')
@section('title', 'masterpeminjaman')
@section('content-title', 'Master Peminjaman')
@section('content')

{{-- 
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA PEMINJAMAN</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive table-bordered table-hover table-stripped"> 
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
                    
                    @if($peminjamanes->count() > 0)
                        @foreach ($peminjamanes as $peminjaman)
                        
                        <tr class="text-center text-nowrap">
                            
                            <td>{{$loop->iteration}}</td>
                            <td>{{$sarpras->nama_sarpras}}</td>
                            <td>{{$sarpras->jenis_sarpras}}</td>
                            <td>{{$sarpras->jumlah_sarpras}}</td>
                            <td>{{$sarpras->jumlah_terpakai}}</td>
                            <td>{{$sarpras->jumlah_rusak}}</td>
                            <td>
                                <a href="{{route('peminjaman.edit', $sarpras['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i>&nbspEdit</a>
                                <form action="{{ route('peminjaman.destroy', $sarpras->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya??')" method="POST" class="d-inline">
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
                                Data Peminjaman Kosong.
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section>
</div> --}}

@endsection