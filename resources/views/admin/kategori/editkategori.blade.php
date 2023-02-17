@extends('admin.app')
@section('title', 'editkategori')
@section('content-title', 'Edit Kategori')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Edit Kategori') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form>
                            <div class="form-group">
                                <label for="kode">Kode Kategori</label>
                                <input class="form-control mb-2" type="text" name="kode" id="kode" value="{{ $kategori->kode }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input class="form-control mb-2" type="text" name="name" id="name" value="{{ $kategori->name }}">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-sm btn-success" type="submit" value="Simpan">
                                <a class="btn btn-sm btn-danger" type="button" href="/admin/kategori">Batal</a>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection