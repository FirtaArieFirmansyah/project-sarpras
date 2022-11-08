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
              <label for="nama_sarpras">Nama</label>
              <input type="text" class="form-control @error('nama_sarpras') is-invalid @enderror" id="nama_sarpras" value="{{ $sarpras->nama_sarpras }}" placeholder="Masukkan nama sarpras.." name="nama_sarpras">
              @error('nama_sarpras')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
             <label for="jenis_sarpras">Jenis</label><br>
              <select name="jenis_sarpras" class="form-control @error('jenis_sarpras') is-invalid @enderror" id="jenis_sarpras">
               <option @if($sarpras->jenis_sarpras == "Barang") selected @endif value="Barang">Barang</option>
               <option @if($sarpras->jenis_sarpras == "Ruang") selected @endif value="Ruang">Ruang</option>
              </select>
              @error('jenis_sarpras')
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