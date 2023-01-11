@extends('admin.app')
@section('title', 'tambahpeminjaman')
@section('content-title', 'Form Peminjaman')
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('masterpeminjaman.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group">
              <label for="id_siswa">Nama Siswa</label>
              <select class="form-control form-select" name="id_siswa" id="id_siswa">
                <option disabled selected>Nama Siswa</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" @if($siswa->id == $mimin_id) selected @endif>{{ $siswa->nama }}</option>
                @endforeach
              </select>
              @error('id_siswa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_project">Barang Yang Akan Dipinjam</label>
              <input type="text" name="nama_project" class="form-control @error('nama_project') is-invalid @enderror" id="nama_project" value="{{ old('nama_project')}}">
              @error('nama_project')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="deskripsi">Tanggal Pinjam</label>
              <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" value="{{ old('deskripsi')}}">
              @error('deskripsi')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="tanggal">Tanggal Kembali</label>
              <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="about" value="{{ old('tanggal')}}">
              @error('tanggal')
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