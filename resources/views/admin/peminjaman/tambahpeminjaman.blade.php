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
              <label for="siswa_id">Siswa</label>
              {{-- <select class="form-control form-select" name="kategori_id" id="">
                <option value=""> Pilih siswa </option>
              </select> --}}
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
              <label for="nama_sarpras">Jumlah</label>
              <input type="text" class="form-control">
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