@extends('admin.app')
@section('title', 'tambahsiswa')
@section('content-title', 'Tambah Siswa')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('siswa.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="nisn" value="{{ old('nisn')}}">
              @error('nisn')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nama_siswa">Nama</label>
              <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" value="{{ old('nama_siswa')}}">
              @error('nama_siswa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
             <label for="jk">Jenis Kelamin</label><br>
              <select name="jk" class="form-control @error('jk') is-invalid @enderror" id="jk" value="{{ old('jk')}}">
               <option selected disabled>Pilih jenis kelamin</option>
               <option @if("Laki-laki" == old('jk')) selected @endif value="Laki-laki">Laki - laki</option>
               <option @if("Perempuan" == old('jk')) selected @endif value="Perempuan">Perempuan</option>
              </select>
              @error('jk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" value="{{ old('kelas')}}">
              @error('kelas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{ old('jurusan')}}">
              @error('jurusan')
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