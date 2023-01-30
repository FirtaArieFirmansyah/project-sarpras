@extends('admin.app')
@section('title', 'editsarpras')
@section('content-title', 'Edit Sarpras')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('sarpras.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('sarpras.update', $sarpras->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <form>
            <div class="form-group">
              <label for="kode_sarpras">Kode Sarpras</label>
              <input type="text" class="form-control @error('kode_sarpras') is-invalid @enderror" id="kode_sarpras" value="{{ $sarpras->kode_sarpras }}" placeholder="Masukkan nama sarpras.." name="kode_sarpras">
              @error('kode_sarpras')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="kategori_id">Kategori</label>
              <select class="form-control form-select" name="kategori_id" id="kategori_id">
                <option value="{{ $sarpras->kategori_id }}">- Pilih Kategori -</option>
                @foreach ($kategories as $kategori)
                    <option value="{{$kategori->id}}" @if($sarpras->kategori->id == $kategori->id) selected @endif>{{ $kategori->name }}</option>
                @endforeach
              </select>
              @error('kategori_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nama_sarpras">Nama</label>
              <input type="text" class="form-control @error('nama_sarpras') is-invalid @enderror" id="nama_sarpras" value="{{ $sarpras->nama_sarpras }}" placeholder="Masukkan nama sarpras.." name="nama_sarpras">
              @error('nama_sarpras')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>


            <div class="form-group">
                <label for="jumlah_sarpras">Jumlah</label>
                <input type="text" class="form-control @error('jumlah_sarpras') is-invalid @enderror" id="jumlah_sarpras" value="{{ $sarpras->jumlah_sarpras }}" placeholder="Masukkan jumlah sarpras.." name="jumlah_sarpras">
                @error('jumlah_sarpras')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            <div class="form-group">
              <label for="jumlah_terpakai">Terpakai</label>
              <input type="text" class="form-control @error('jumlah_terpakai') is-invalid @enderror" id="jumlah_terpakai" value="{{ $sarpras->jumlah_terpakai }}" placeholder="Masukkan jumlah terpakai.." name="jumlah_terpakai">
              @error('jumlah_terpakai')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jumlah_rusak">Rusak</label>
              <input type="text" class="form-control @error('jumlah_rusak') is-invalid @enderror" id="jumlah_rusak" value="{{ $sarpras->jumlah_rusak }}" placeholder="Masukkan jumlah rusak.." name="jumlah_rusak">
              @error('jumlah_rusak')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection