@extends('admin.app')
@section('title', 'masterpeminjaman')
@section('content-title', 'Master Peminjaman')
@section('content')


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
                            <th width="40%">Nama Siswa</th>
                            <th>Sarpras</th>
                            <th>Jumlah</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="peminjaman">

                        @if($peminjamanes->count() > 0)
                        @foreach ($peminjamanes as $no => $peminjaman)

                        <tr class="text-center text-nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peminjaman->siswa->nama_siswa}}</td>
                            <td>{{ $peminjaman->sarpras->nama_sarpras}}</td>
                            <td>{{ $peminjaman->jumlah }}</td>
                            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                            <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                            <td>
                                @if ($peminjaman->status == 1)
                                    <span class="text-success">Disetujui</span>
                                @elseif($peminjaman->status == 2)
                                    <span class="text-danger">Ditolak</span>
                                @else
                                    <span class="text-warning">Belum Disetujui</span>
                                @endif
                            </td>
                            <td>
                                @if(!$peminjaman->status)
                                    <form action="{{route('peminjaman.update', $peminjaman->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Setujui</button>
                                    </form>
                                    <form action="{{route('peminjaman.destroy', $peminjaman->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                    </form>
                                @else 
                                    -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Peminjaman Sarana Prasarana Kosong.
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