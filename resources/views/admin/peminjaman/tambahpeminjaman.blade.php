@extends('admin.app')
@section('title', 'tambahpeminjaman')
@section('content-title', 'Form Peminjaman')
@section('content')

<div class="row justify-content-center mt-5">
  <div class="col-6">
    <div class="card mb-5">
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group mt-1">
              <label for="kode_sarpras">Siswa</label>
              <select class="form-control form-select" name="kategori_id" id="">
                <option value=""> Pilih siswa </option>
              </select>
            </div>

            <div class="form-group">
              <label for="kategori_id">Sarpras</label>
              <select class="form-control form-select" name="kategori_id" id="">
                <option value=""> Pilih sarpras </option>
              </select>
              
            </div>

            <div class="form-group">
              <label for="nama_sarpras">Jumlah</label>
              <input type="text" class="form-control">
            </div>
          
            <button type="submit" class="btn btn-primary mt-1 mb-1">Simpan</button>
          </form>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection