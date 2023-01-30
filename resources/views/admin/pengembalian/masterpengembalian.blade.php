@extends('admin.app')
@section('title', 'masterpengembalian')
@section('content-title', 'Master Pengembalian')
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
                            <th width="35%">Nama Siswa</th>
                            <th width="25%">Sarpras</th>
                            <th width="10%">Jumlah</th>
                            <th width="20%">Tanggal Pinjam</th>
                            <th width="20%">Tanggal Kembali</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tbody>
                    
                    {{-- @if($peminjamanes->count() > 0)
                        @foreach ($peminjamanes as $peminjaman) --}}
                        
                        <tr class="text-center text-nowrap">
                            <td>1.</td>
                            <td>FIRTA ARIE FIRMANSYAH</td>
                            <td>Sapu</td>
                            <td>1</td>
                            <td>26-01-2023</td>
                            <td>27-01-2023</td>
                            <td>Dikembalikan</td>
                            <td>
                                <button class="btn btn-success">Setujui</button>
                                <button class="btn btn-danger">Tolak</button>
                            </td>
                        </tr>
                        {{-- @endforeach
                        @else 
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Peminjaman Kosong.
                            </td>
                        </tr>
                    @endif --}}
                </table>
            </div>
        </div>
    </section>
</div>

@endsection