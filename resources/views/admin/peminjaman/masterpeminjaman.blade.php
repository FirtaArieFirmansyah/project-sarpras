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
                            <th width="20%">Sarpras</th>
                            <th width="10%">Jumlah</th>
                            <th width="20%">Tanggal Pinjam</th>
                            <th width="10%">Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tbody>
                    
                    {{-- @if($peminjamanes->count() > 0)
                        @foreach ($peminjamanes as $peminjaman) --}}
                            {{-- @php
                                {
                                    $statusfrt = "<span style='font-size:10;' class='label label-success'>
                                                  Disetujui</span>";
                                    if ($approve_frt->status_frt=='Belum disetujui')$statusfrt = "
                                    <a href='approve_frt_f/disetujui/$approve_frt->nomor_frt'
                                        class='btn btn-sm btn-success'
                                        data-popup='tooltip' data-placement='top'
                                        title='Disetujui'>
                                        <i class='fas fa-check' aria-hidden='true'></i>
                                    </a>
                                    
                                    <a href='approve_frt_f/ditolak/$approve_frt->nomor_frt'
                                        class='btn btn-sm btn-danger'
                                        data-popup='tooltip' data-placement='top'
                                        title='Ditolak'>
                                        <i class='fas fa-times' aria-hidden='true'></i>
                                    </a>";
                                    elseif ($approve_frt->status_frt=='ditolak')
                                    $statusfrt = "<span style='font-size:10;' class='label label-danger'>
                                                 Ditolak</span>";
                                }
                            @endphp --}}
                        
                        <tr class="text-center text-nowrap">
                            
                            {{-- <td>{{$loop->iteration}}</td>
                            <td>{{$sarpras->nama_sarpras}}</td>
                            <td>{{$sarpras->jenis_sarpras}}</td>
                            <td>{{$sarpras->jumlah_sarpras}}</td>
                            <td>{{$sarpras->jumlah_terpakai}}</td>
                            <td>{{$sarpras->jumlah_rusak}}</td> --}}

                            <td>1.</td>
                            <td>FIRTA ARIE FIRMANSYAH</td>
                            <td>Sapu</td>
                            <td>1</td>
                            <td>26-01-2023</td>
                            <td>Disetujui</td>
                            <td>statusfrt</td>
                                {{-- <button class="btn btn-success">Setujui</button>
                                <button class="btn btn-danger">Tolak</button> --}}
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