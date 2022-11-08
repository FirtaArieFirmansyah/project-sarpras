@extends('admin.app')
@section('title', 'editsiswa')
@section('content-title', 'Edit Siswa')
@section('content')

<div class="row">
  <div class="col-12">
        <a href="{{ route('siswa.index') }}" class="btn btn-dark mb-2">Kembali</a>
    <div class="card mb-5">
      <div class="card-body">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <form>
            <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" value="{{ $siswa->nisn }}" placeholder="Masukkan nisn siswa.." name="nisn">
              @error('nisn')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama_siswa">Nama</label>
              <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" value="{{ $siswa->nama_siswa }}" placeholder="Masukkan nama siswa.." name="nama_siswa">
              @error('nama_siswa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
             <label for="jk">Jenis Kelamin</label><br>
              <select name="jk" class="form-control @error('jk') is-invalid @enderror" id="jk">
               <option @if($siswa->jk == "Laki-laki") selected @endif value="Laki-laki">Laki - laki</option>
               <option @if($siswa->jk == "Perempuan") selected @endif value="Perempuan">Perempuan</option>
              </select>
              @error('jk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" value="{{ $siswa->kelas }}" placeholder="Masukkan kelas siswa..">
              @error('kelas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{ $siswa->jurusan }}" placeholder="Masukkan jurusan siswa..">
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