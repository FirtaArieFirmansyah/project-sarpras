@extends('admin.app')
@section('title', 'masterpengembalian')
@section('content-title', 'Master Pengembalian')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA PENGEMBALIAN</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive table-bordered table-hover table-stripped"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th width="5%">No.</th>
                            <th>Nama Siswa</th>
                            <th>Sarpras</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tbody>
                    
                    @if($pengembalianes->count() > 0)
                        {{-- @foreach ($peminjamanes as $peminjaman) --}}
                        
                        <tr class="text-center text-nowrap">
                            <td>1.</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td> Belum Dikembalikan</td>
                            <td>
                                <button class="btn btn-success">Dikembalikan</button>
                                <button class="btn btn-primary">Normal</button>
                                <button class="btn btn-danger">Rusak</button>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                        @else 
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Pengembalian Kosong.
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section>
</div>

@endsection