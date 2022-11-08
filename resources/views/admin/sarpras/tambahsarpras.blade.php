@extends('admin.app')
@section('title', 'tambahsarpras')
@section('content-title', 'Tambah Sarpras')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('sarpras.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('sarpras.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group">
              <label for="nama_sarpras">Nama</label>
              <input type="text" name="nama_sarpras" class="form-control @error('nama_sarpras') is-invalid @enderror" id="nama_sarpras" value="{{ old('nama_sarpras')}}">
              @error('nama_sarpras')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
             <label for="jenis_sarpras">Jenis</label><br>
              <select name="jenis_sarpras" class="form-control @error('jenis_sarpras') is-invalid @enderror" id="jenis_sarpras" value="{{ old('jenis_sarpras')}}">
               <option selected disabled>Pilih jenis sarpras</option>
               <option value="Barang">Barang</option>
               <option value="Ruang">Ruang</option>
              </select>
              @error('jenis_sarpras')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_sarpras">Jumlah</label>
                <input type="text" name="jumlah_sarpras" class="form-control @error('jumlah_sarpras') is-invalid @enderror" id="jumlah_sarpras" value="{{ old('jumlah_sarpras')}}">
                @error('jumlah_sarpras')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            <div class="form-group">
              <label for="jumlah_terpakai">Terpakai</label>
              <input type="text" name="jumlah_terpakai" class="form-control @error('jumlah_terpakai') is-invalid @enderror" id="jumlah_terpakai" value="{{ old('jumlah_terpakai')}}">
              @error('jumlah_terpakai')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="jumlah_rusak">Rusak</label>
              <input type="text" name="jumlah_rusak" class="form-control @error('jumlah_rusak') is-invalid @enderror" id="jumlah_rusak" value="{{ old('jumlah_rusak')}}">
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