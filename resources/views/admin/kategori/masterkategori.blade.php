@extends('admin.app')
@section('title', 'masterkategori')
@section('content-title', 'Master Kategori')
@section('content')

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('Kategori') }}</div>

                <div class="card-body text-nowrap">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                                <th style="width: 10px">No.</th>
                                <th>Kode Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                        </thead>
                        <tbody>
                            @if($kategories->count() > 0)
                            @foreach ($kategories as $no => $kategori)
                            <tr>
                                <td>{{$no + $kategories->firstItem()}}</td>
                                <td>{{$kategori->kode}}</td>
                                <td>{{$kategori->name}}</td>
                                <td>
                                    <a href="{{route('kategori.edit', $kategori['id'])}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" onsubmit="return confirm('Apakah anda yakin menghapusnya ?')" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                            @else 
                            <tr>
                                <td colspan="4" class="text-center">
                                     Data Kategori Kosong.
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $kategories->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header font-weight-bold">{{ __('Tambah Kategori') }}</div>

                <div class="card-body">

                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        <form>
                        @csrf
                            <div class="form-group">
                                <label for="kode">Kode Kategori</label>
                                <input class="form-control mb-2" name="kode" id="kode" type="text" value="{{ 'KTGR-'.date('d-m-Y').'-'.$kd }}" readonly="">
                                <label for="name">Nama Kategori</label>
                                <input class="form-control mb-2" name="name" id="name" type="text" value="{{ old('name')}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                                <button class="btn btn-sm btn-danger" type="reset">Batal</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>

@endsection