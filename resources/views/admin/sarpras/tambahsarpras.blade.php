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
              <label for="kode_sarpras">Kode Sarpras</label>
              <input type="text" name="kode_sarpras" class="form-control @error('kode_sarpras') is-invalid @enderror" readonly="" id="kode_sarpras" value="{{ 'SMKN1-'.date('d-m-Y').'-'.$kd }}">
              @error('kode_sarpras')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="kategori_id">Kategori</label>
              <select class="form-control form-select" name="kategori_id" id="">
                <option value="">Pilih Kategori</option>
                @foreach ($kategories as $kategori)
                    <option value="{{$kategori->id}}">{{ $kategori->name }}</option>
                @endforeach
              </select>
              @error('kategori_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nama_sarpras">Nama Sarpras</label>
              <input type="text" name="nama_sarpras" class="form-control @error('nama_sarpras') is-invalid @enderror" id="nama_sarpras" value="{{ old('nama_sarpras')}}">
              @error('nama_sarpras')
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
                <label for="jumlah_normal">Normal</label>
                <input type="text" name="jumlah_normal" class="form-control @error('jumlah_normal') is-invalid @enderror" id="jumlah_normal" value="{{ old('jumlah_normal')}}">
                @error('jumlah_normal')
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