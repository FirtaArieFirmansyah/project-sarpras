@extends('admin.app')
@section('title', 'laporan')
@section('content-title', 'Laporan')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">RIWAYAT PEMINJAMAN SARANA PRASARANA</h6>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive table-bordered table-hover table-stripped"> 
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th width="5%">No.</th>
                            <th width="40%">Nama Siswa</th>
                            <th width="40%">Sarpras</th>
                            <th width="10%">Jumlah</th>
                            <th width="15%">Status</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </tbody>
                    
                    {{-- @if($peminjamanes->count() > 0)
                        @foreach ($peminjamanes as $peminjaman) --}}
                        
                        <tr class="text-center text-nowrap">
                            <td>1.</td>
                            <td>FIRTA ARIE FIRMANSYAH</td>
                            <td>Sapu</td>
                            <td>1</td>
                            <td>Dikembalikan</td>
                            <td>
                                <button class="btn btn-info">Detail</button>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection