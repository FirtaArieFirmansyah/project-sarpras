@extends('admin.app')
@section('title', 'masterpengambilan')
@section('content-title', 'Master Pengambilan')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">DATA PENGAMBILAN</h4>
    </div>
    <section>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-stripped">
                    <!-- Awal button Modal -->
                    <div class="row g-3 justify-content-between align-items-center mb-3">
                        <div class="col-auto">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ambil Peminjaman</button>
                        </div>
                    </div>
                    <!-- Akhir button Modal -->
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th width="5%">No.</th>
                            <th>Nama Siswa</th>
                            <th>Sarpras</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pengambilan</th>
                            <th>Foto</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pengambilanes->count() > 0)
                        @foreach ($pengambilanes as $no => $pengambilan)
                        <tr class="text-center text-nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengambilan->peminjaman->siswa->nama_siswa }}</td>
                            <td>{{ $pengambilan->peminjaman->sarpras->nama_sarpras }}</td>
                            <td>{{ $pengambilan->peminjaman->jumlah }}</td>
                            <td>{{ $pengambilan->tanggal_pengambilan }}</td>
                            <td><img src="{{asset('img/admin/'. $pengambilan->foto)}}" alt="" style="width: 100px"></td>
                            <td>
                                @if ($pengambilan->status == 1)
                                    <span class="text-success">Diambil</span>
                                @else
                                    <span class="text-danger">Tidak Jadi Ambil</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    @else 
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Pengambilan Sarana Prasarana Kosong.
                            </td>
                        </tr>
                    @endif
                </table>
                
                <!-- Awal Modal Pengambilan -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title fs-5" id="staticBackdropLabel">Form Pengambilan</h4>
                          
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('pengambilan.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Awal Nama Siswa Pengambilan -->
                                <div class="form-group">
                                <label for="peminjaman_id">Siswa</label>
                                    <select class="form-control form-select js-example-basic-single-siswa" name="peminjaman_id" id="select_siswa">
                                        <option selected disabled>Pilih Siswa</option>
                                        @foreach ($peminjamanes as $peminjaman)
                                            <option value="{{$peminjaman->siswa_id}}">{{ $peminjaman->siswa->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                              </div>
                            <!-- Akhir Nama Siswa Pengambilan -->

                            <!-- Awal Nama Sarpras Pengambilan -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sarpras_id">Sarpras</label>
                                            <select class="form-control form-select js-example-basic-single-siswa" name="sarpras_id" id="sarpras_id" disabled>
                                                <option selected disabled>Pilih Siswa terlebih dahulu</option>
                                            </select>
                                        </div>
                                    </div>
                            <!-- Akhir Nama Sarpras Pengambilan -->

                            <!-- Awal Jumlah Pengambilan -->
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" name="jumlah" class="form-control" id="jumlah_sarpras" placeholder="Pilih Sarpras terlebih dahulu" disabled>
                                        </div>
                                    </div>
                                </div>
                            <!-- Akhir Jumlah Pengambilan -->

                            <!-- Awal Input Tanggal Pengambilan -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal_pengambilan">Tanggal Pengambilan</label>
                                        <input type="date" name="tanggal_pengambilan" class="form-control @error('tanggal_pengambilan') is-invalid @enderror" id="tanggal_pengambilan" value="">
                                            @error('tanggal_pengambilan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            <!-- Akhir Input Tanggal Pengambilan -->

                            <!-- Awal Input Foto Pengambilan -->
                                <div class="col">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="foto" onchange="previewImage()"><br>
                                            <img src="" class="img-preview" style="width:170px">
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div><br><br><br>
                            <!-- Akhir Input Foto Pengambilan -->

                            <!-- Awal Status Pengambilan -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status" value="status">
                                        <option class="text-warning" selected disabled>Belum Diambil</option>
                                        <option class="text-success" value="1">Diambil</option>
                                        <option class="text-danger" value="0">Tidak Jadi Ambil</option>
                                    </select>
                                </div>
                            <!-- Akhir StatusPengambilan -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Akhir Modal Pengambilan -->

            </div>
        </div>
    </section>
</div>

@endsection
<!-- Awal Scricpt | Pengambilan data peminjaman untuk pengambilan -->
@section('script')
    <script>
        $(document).ready(function(){

            $('#select_siswa').change(function(){

                const siswa_id = $(this).val()
                $.ajax({
                    url: "/admin/pengambilan/"+siswa_id,
                    method: "GET",
                    success: function(res) {
                        $('#sarpras_id').attr('disabled', false);
                        $('#sarpras_id').empty();
                        $('#sarpras_id').append('<option selected disabled>Pilih Siswa</option>');
                       res.peminjaman.forEach(el => {
                            $('#sarpras_id').append(`<option value="${el.id}">${el.sarpras.nama_sarpras} - ${el.tanggal_peminjaman}
                            s.d ${el.tanggal_pengembalian} </option>`)
                       });
                    }
                })

            })

            $('#sarpras_id').change(function(){

                const peminjaman_id = $(this).val()

                $.ajax({
                    url: "/admin/pengambilan/getJumlah/"+peminjaman_id,
                    method: "GET",
                    success: function(res) {
                        $('#jumlah_sarpras').attr('disabled', false)
                        $('#jumlah_sarpras').val(res.jumlah)

                    }
                })

            })


        })
        
        function previewImage(){
        const image = document.querySelector("#foto");
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
        }

    </script>
@endsection
<!-- Akhir Script -->