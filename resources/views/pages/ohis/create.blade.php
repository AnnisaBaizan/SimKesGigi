@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Data OHI-S'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengetahuan, Keterampilan, Perilaku dan Peran Orang Tua</h6>
            </div>
            <div class="card-body">
                <style>
                    .table-responsive {
                        overflow-x: auto;
                        display: block;
                        max-width: 100%;
                        overflow-y: hidden;
                        -ms-overflow-style: -ms-autohiding-scrollbar;
                        border-collapse: collapse;
                        width: 100%;
                        margin-bottom: 20px;
                    }

                    @media screen and (max-width: 767px) {
                        th, td {
                        display: block;
                        width: 100%;
                        }
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    /* Mengatur lebar kolom pada elemen td secara langsung */
                    td:nth-child(1) {
                        width: 15%; /* Lebar kolom pertama */
                    }
                    td:nth-child(2) {
                        width: 15%; /* Lebar kolom kedua */
                    }
                    td:nth-child(3) {
                        width: 15%; /* Lebar kolom ketiga */
                    }
                    td:nth-child(4) {
                        width: 10%; /* Lebar kolom pertama */
                    }
                    td:nth-child(5) {
                        width: 15%; /* Lebar kolom kedua */
                    }
                    td:nth-child(6) {
                        width: 15%; /* Lebar kolom ketiga */
                    }
                    td:nth-child(7) {
                        width: 15%; /* Lebar kolom ketiga */
                    }
                </style>
    
    <form class="user" action="{{route('ohis.store')}}" method="post">
        @csrf

        <div class="form-group row">
          <div class="col-sm-3">
              <label for="kartupasien_id" class ="form-text">Pilih Pasien :</label>
          </div>
          <div class="col-sm-9">
              <select class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror" data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien" value="{{ old('kartupasien_id') }}" required>
                  @error('kartupasien_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <option value="" selected disabled>Pilih Pasien</option>
                  @foreach ($kartupasiens as $kartupasien)
                  <option value="{{ $kartupasien->id }}">{{ $kartupasien->no_kartu }} | {{ $kartupasien->nama }}</option>
                  @endforeach
              </select>
          </div>
        </div>

        <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
          <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">DI (Debris Index) & CI (Calculus Index)</h6></marquee>
        </div>
        <table border="1" class="table-responsive">
            <tr>
                <th colspan=3>
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <h6 class="m-0 font-weight-bold text-dark text-bold">DI (Debris Index)</h6>
                </div> 
                </th>
                <th></th>
                <th colspan=3>
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">CI (Calculus Index)</h6>
                    </div>
                    </th>  
            </tr>
            <tr>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_di_1') is-invalid @enderror" data-live-search="true" id="lokasi_di_1" name="lokasi_di_1[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_di_1[]') }}" multiple="multiple" required>
                        @error('lokasi_di_1[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_di_2') is-invalid @enderror" data-live-search="true" id="lokasi_di_2" name="lokasi_di_2[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_di_2[]') }}" multiple="multiple" required>
                        @error('lokasi_di_2[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_di_3') is-invalid @enderror" data-live-search="true" id="lokasi_di_3" name="lokasi_di_3[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_di_3[]') }}" multiple="multiple" required>
                        @error('lokasi_di_3[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td></td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_ci_1') is-invalid @enderror" data-live-search="true" id="lokasi_ci_1" name="lokasi_ci_1[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_ci_1[]') }}" multiple="multiple" required>
                        @error('lokasi_ci_1[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_ci_2') is-invalid @enderror" data-live-search="true" id="lokasi_ci_2" name="lokasi_ci_2[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_ci_2[]') }}" multiple="multiple" required>
                        @error('lokasi_ci_2[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_ci_3') is-invalid @enderror" data-live-search="true" id="lokasi_ci_3" name="lokasi_ci_3[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_ci_3[]') }}" multiple="multiple" required>
                        @error('lokasi_ci_3[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="di_1" name="di_1" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="di_2" name="di_2" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="di_3" name="di_3" readonly>
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="ci_1" name="ci_1" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="ci_2" name="ci_2" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="ci_3" name="ci_3" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_di_4') is-invalid @enderror" data-live-search="true" id="lokasi_di_4" name="lokasi_di_4[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_di_4[]') }}" multiple="multiple" required>
                        @error('lokasi_di_4[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_di_5') is-invalid @enderror" data-live-search="true" id="lokasi_di_5" name="lokasi_di_5[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_di_5[]') }}" multiple="multiple" required>
                        @error('lokasi_di_5[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_di_6') is-invalid @enderror" data-live-search="true" id="lokasi_di_6" name="lokasi_di_6[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_di_6[]') }}" multiple="multiple" required>
                        @error('lokasi_di_6[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td></td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_ci_4') is-invalid @enderror" data-live-search="true" id="lokasi_ci_4" name="lokasi_ci_4[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_ci_4[]') }}" multiple="multiple" required>
                        @error('lokasi_ci_4[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_ci_5') is-invalid @enderror" data-live-search="true" id="lokasi_ci_5" name="lokasi_ci_5[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_ci_5[]') }}" multiple="multiple" required>
                        @error('lokasi_ci_5[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="col-sm-4">
                    <select class="js-example-basic-multiple form-control @error('lokasi_ci_6') is-invalid @enderror" data-live-search="true" id="lokasi_ci_6" name="lokasi_ci_6[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('lokasi_ci_6[]') }}" multiple="multiple" required>
                        @error('lokasi_ci_6[]')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                        @foreach ($gigis as $gigi)
                        <option value="{{ $gigi->id }}">{{ $gigi->kode }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="di_4" name="di_4" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="di_5" name="di_5" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="di_6" name="di_6" readonly>
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="ci_4" name="ci_4" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="ci_5" name="ci_5" readonly>
                    </div>
                </td>
                <td>
                    <div class="col-sm-7 mb-3">
                        <input type="text" class="form-control" value="0" id="ci_6" name="ci_6" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan=3>
                    <input type="text" class="form-control text-center" value="0" id="score_di" name="score_di" readonly>
                </div> 
                </th>
                <th></th>
                <th colspan=3>
                    <input type="text" class="form-control text-center" value="0" id="score_ci" name="score_ci" readonly>
                </th>  
            </tr>
            <tr>
                <th colspan=7>
                    <input type="text" class="form-control text-center" value="0" id="kriteria_ohis" name="kriteria_ohis" readonly>
                </div> 
                </th>
            </tr>
        </table>

          <div class="form-group row">
              <div class="col-sm-6 d-grid gap-2">
                  <a href="{{route('ohis.index')}}" class="btn btn-success btn-block btn">
                      <i class="fas fa-arrow-left fa-fw"></i> Kembali
                  </a>
              </div>
              <div class="col-sm-6 d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan" >
                      <i class="fas fa-save fa-fw"></i> Save
                  </button>
              </div>
          </div>
  </form>
</div>
</div>


</div>
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')

<script>
$(document).ready(function() {
    // Fungsi untuk menghitung nilai perilaku dan mengatur kriteria perilaku
    function hitungci1() {
        var jumlahTerpilih = $('#lokasi_ci_1').val().length;
        $('#ci_1').val(jumlahTerpilih);
    }

    function hitungci2() {
        var jumlahTerpilih = $('#lokasi_ci_2').val().length;
        $('#ci_2').val(jumlahTerpilih);
    }

    function hitungci3() {
        var jumlahTerpilih = $('#lokasi_ci_3').val().length;
        $('#ci_3').val(jumlahTerpilih);
    }

    function hitungci4() {
        var jumlahTerpilih = $('#lokasi_ci_4').val().length;
        $('#ci_4').val(jumlahTerpilih);
    }

    function hitungci5() {
        var jumlahTerpilih = $('#lokasi_ci_5').val().length;
        $('#ci_5').val(jumlahTerpilih);
    }

    function hitungci6() {
        var jumlahTerpilih = $('#lokasi_ci_6').val().length;
        $('#ci_6').val(jumlahTerpilih);
    }

    // Tambahkan event listener untuk perubahan nilai pada dropdown perilaku
    $('#lokasi_ci_1').on('change', function() {
        hitungci1();
    });

    $('#lokasi_ci_2').on('change', function() {
        hitungci2();
    });

    $('#lokasi_ci_3').on('change', function() {
        hitungci3();
    });

    $('#lokasi_ci_4').on('change', function() {
        hitungci4();
    });

    $('#lokasi_ci_5').on('change', function() {
        hitungci5();
    });

    $('#lokasi_ci_6').on('change', function() {
        hitungci6();
    });

    // Panggil fungsi hitungPerilaku saat halaman dimuat
    hitungci1();
    hitungci2();
    hitungci3();
    hitungci4();
    hitungci5();
    hitungci6();
});
$(document).ready(function() {
    // Fungsi untuk menghitung nilai perilaku dan mengatur kriteria perilaku
    function hitungdi1() {
        var jumlahTerpilih = $('#lokasi_di_1').val().length;
        $('#di_1').val(jumlahTerpilih);
    }

    function hitungdi2() {
        var jumlahTerpilih = $('#lokasi_di_2').val().length;
        $('#di_2').val(jumlahTerpilih);
    }

    function hitungdi3() {
        var jumlahTerpilih = $('#lokasi_di_3').val().length;
        $('#di_3').val(jumlahTerpilih);
    }

    function hitungdi4() {
        var jumlahTerpilih = $('#lokasi_di_4').val().length;
        $('#di_4').val(jumlahTerpilih);
    }

    function hitungdi5() {
        var jumlahTerpilih = $('#lokasi_di_5').val().length;
        $('#di_5').val(jumlahTerpilih);
    }

    function hitungdi6() {
        var jumlahTerpilih = $('#lokasi_di_6').val().length;
        $('#di_6').val(jumlahTerpilih);
    }

    // Tambahkan event listener untuk perubahan nilai pada dropdown perilaku
    $('#lokasi_di_1').on('change', function() {
        hitungdi1();
    });

    $('#lokasi_di_2').on('change', function() {
        hitungdi2();
    });

    $('#lokasi_di_3').on('change', function() {
        hitungdi3();
    });

    $('#lokasi_di_4').on('change', function() {
        hitungdi4();
    });

    $('#lokasi_di_5').on('change', function() {
        hitungdi5();
    });

    $('#lokasi_di_6').on('change', function() {
        hitungdi6();
    });

    // Panggil fungsi hitungPerilaku saat halaman dimuat
    hitungdi1();
    hitungdi2();
    hitungdi3();
    hitungdi4();
    hitungdi5();
    hitungdi6();
});

</script>

{{-- <script>
    // Fungsi untuk menghitung jumlah opsi terpilih
    function hitungJumlahTerpilih(idSelect, idOutput) {
        // Mendapatkan elemen <select> berdasarkan ID
        var selectElement = document.getElementById(idSelect);

        // Mendapatkan elemen <input> untuk menampilkan hasil
        var outputElement = document.getElementById(idOutput);

        // Menghitung jumlah opsi terpilih
        var jumlahTerpilih = selectElement.selectedOptions.length;

        // Menampilkan hasil pada elemen <input>
        outputElement.value = jumlahTerpilih;
    }

    // Pemanggilan fungsi untuk DI
    document.getElementById('lokasi_di_1').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_di_1', 'di_1');
    });

    document.getElementById('lokasi_di_2').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_di_2', 'di_2');
    });

    document.getElementById('lokasi_di_3').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_di_3', 'di_3');
    });

    document.getElementById('lokasi_di_4').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_di_4', 'di_4');
    });

    document.getElementById('lokasi_di_5').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_di_5', 'di_5');
    });

    document.getElementById('lokasi_di_6').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_di_6', 'di_6');
    });

    // Pemanggilan fungsi untuk CI
    document.getElementById('lokasi_ci_1').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_ci_1', 'ci_1');
    });

    document.getElementById('lokasi_ci_2').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_ci_2', 'ci_2');
    });

    document.getElementById('lokasi_ci_3').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_ci_3', 'ci_3');
    });

    document.getElementById('lokasi_ci_4').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_ci_4', 'ci_4');
    });

    document.getElementById('lokasi_ci_5').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_ci_5', 'ci_5');
    });

    document.getElementById('lokasi_ci_6').addEventListener('change', function() {
        hitungJumlahTerpilih('lokasi_ci_6', 'ci_6');
    });
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection