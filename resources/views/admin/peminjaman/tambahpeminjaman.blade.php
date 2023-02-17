@extends('admin.app')
@section('title', 'tambahpeminjaman')
@section('content-title', 'Form Peminjaman')
@section('content')

<div class="row justify-content-center mb-5">
  <div class="col-6">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <form>
            <div class="form-group">
              <label for="siswa_id">Siswa</label>
              <select class="form-control form-select js-example-basic-single-siswa" name="siswa_id" id="">
                <option value=""></option>
                @foreach ($siswas as $siswa)
                    <option value="{{$siswa->id}}">{{ $siswa->nama_siswa }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="sarpras_id">Sarpras</label>
              <select class="form-control form-select js-example-basic-single-sarpras" name="sarpras_id" id="">
                <option value=""></option>
                @foreach ($sarprases as $sarpras)
                    <option value="{{$sarpras->id}}">{{ $sarpras->nama_sarpras }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" value="{{ old('jumlah')}}">
              @error('jumlah')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
              <input type="date" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" value="{{ old('tanggal_peminjaman')}}">
              @error('tanggal_peminjaman')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
              <input type="date" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" id="tanggal_pengembalian" value="{{ old('tanggal_pengembalian')}}">
              @error('tanggal_pengembalian')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-1 mb-1">Ajukan Peminjaman</button>
            </div>
          </form>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('script')
    <script>
      $(document).ready(function(){
        $('.js-example-basic-single-siswa').select2({
          placeholder: 'Pilih Siswa',
          allowClear: true,
        });
        
        $('.js-example-basic-single-sarpras').select2({
          placeholder: 'Pilih Sarpras',
          allowClear: true,
        });
      })
    </script>
@endsection