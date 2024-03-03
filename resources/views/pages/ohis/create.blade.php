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
                    <option value="" selected>Pilih Pasien</option>
                    @foreach ($kartupasiens as $kartupasien)
                    <option value="{{ $kartupasien->id }}">{{ $kartupasien->no_kartu }} | {{ $kartupasien->nama }}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
            <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">DI (Debris Index) & CI (Calculus Index)</h6></marquee>
            </div>
            {{--  --}}

            <div class="row mt-3 text-center">
                <!-- Kolom Pertama - di_1, di_2, di_3 -->
                <div class="col-sm-6">
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">DI (Debris Index)</h6>
                    </div>
                    <!-- Baris Pertama - di_1, di_2, di_3 -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="di_1">DI 1</label>
                            <select class="form-control @error('di_1') is-invalid @enderror" id="di_1" name="di_1" placeholder="Tidak Ada" value="{{ old('di_1') }}">
                                @error('di_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="di_2">DI 2</label>
                            <select class="form-control @error('di_2') is-invalid @enderror" id="di_2" name="di_2" placeholder="Tidak Ada" value="{{ old('di_2') }}">
                                @error('di_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="di_3">DI 3</label>
                            <select class="form-control @error('di_3') is-invalid @enderror" id="di_3" name="di_3" placeholder="Tidak Ada" value="{{ old('di_3') }}">
                                @error('di_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
            
                    <!-- Baris Kedua - di_4, di_5, di_6 -->
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="di_4">DI 4</label>
                            <select class="form-control @error('di_4') is-invalid @enderror" id="di_4" name="di_4" placeholder="Tidak Ada" value="{{ old('di_4') }}">
                                @error('di_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="di_5">DI 5</label>
                            <select class="form-control @error('di_5') is-invalid @enderror" id="di_5" name="di_5" placeholder="Tidak Ada" value="{{ old('di_5') }}">
                                @error('di_5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="di_6">DI 6</label>
                            <select class="form-control @error('di_6') is-invalid @enderror" id="di_6" name="di_6" placeholder="Tidak Ada" value="{{ old('di_6') }}">
                                @error('di_6')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="jumlah_nilai_di">Jumlah Nilai DI</label>
                            <input type="text" name="jumlah_nilai_di" id="jumlah_nilai_di" value="0" class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="jumlah_gigi_di">Jumlah Gigi DI</label>
                            <input type="text" name="jumlah_gigi_di" id="jumlah_gigi_di" value="0" class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="score_di">Score DI</label>
                            <input type="text" name="score_di" id="score_di" value="0" class="form-control text-center" readonly required>
                        </div>
                    </div>
                </div>
            
                <!-- Kolom Kedua - ci_1, ci_2, ci_3 -->
                <div class="col-sm-6">
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">CI (Calculus Index)</h6>
                    </div>
                    <!-- Baris Pertama - ci_1, ci_2, ci_3 -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="ci_1">CI 1</label>
                            <select class="form-control @error('ci_1') is-invalid @enderror" id="ci_1" name="ci_1" placeholder="Tidak Ada" value="{{ old('ci_1') }}">
                                @error('ci_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="ci_2">CI 2</label>
                            <select class="form-control @error('ci_2') is-invalid @enderror" id="ci_2" name="ci_2" placeholder="Tidak Ada" value="{{ old('ci_2') }}">
                                @error('ci_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="ci_3">CI 3</label>
                            <select class="form-control @error('ci_3') is-invalid @enderror" id="ci_3" name="ci_3" placeholder="Tidak Ada" value="{{ old('ci_3') }}">
                                @error('ci_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
            
                    <!-- Baris Kedua - ci_4, ci_5, ci_6 -->
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="ci_4">CI 4</label>
                            <select class="form-control @error('ci_4') is-invalid @enderror" id="ci_4" name="ci_4" placeholder="Tidak Ada" value="{{ old('ci_4') }}">
                                @error('ci_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="ci_5">CI 5</label>
                            <select class="form-control @error('ci_5') is-invalid @enderror" id="ci_5" name="ci_5" placeholder="Tidak Ada" value="{{ old('ci_5') }}">
                                @error('ci_5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="ci_6">CI 6</label>
                            <select class="form-control @error('ci_6') is-invalid @enderror" id="ci_6" name="ci_6" placeholder="Tidak Ada" value="{{ old('ci_6') }}">
                                @error('ci_6')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected>Tidak Ada</option>
                                @for ($j = 0; $j < 4; $j++)
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="jumlah_nilai_ci">Jumlah Nilai CI</label>
                            <input type="text" name="jumlah_nilai_ci" id="jumlah_nilai_ci" value="0" class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="jumlah_gigi_ci">Jumlah Gigi CI</label>
                            <input type="text" name="jumlah_gigi_ci" id="jumlah_gigi_ci" value="0" class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="score_ci">Score CI</label>
                            <input type="text" name="score_ci" id="score_ci" value="0" class="form-control text-center" readonly required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="kriteria_ohis" class="text-center">Kriteria OHI-S</label>
                <div class="col-sm-6 mb-3">
                    <input type="text" name="nilai_kriteria_ohis" id="nilai_kriteria_ohis" value="0" class="form-control text-center" readonly required>
                </div>
                <div class="col-sm-6 mb-3">
                    <input type="text" name="kriteria_ohis" id="kriteria_ohis" value="Buruk" class="form-control text-center" readonly required>
                </div>
            </div>
            

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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script>
    function calculateDI() {
        let jumlahNilaiDI = 0;
        let jumlahGigiDI = 0;

        for (let i = 1; i <= 6; i++) {
            let diValue = document.getElementById('di_' + i).value;
            if (diValue !== "") {
                jumlahNilaiDI += parseInt(diValue);
                jumlahGigiDI++;
            }
        }

        let scoreDI = (jumlahGigiDI !== 0) ? (jumlahNilaiDI / jumlahGigiDI) : 0;

        document.getElementById('jumlah_nilai_di').value = jumlahNilaiDI;
        document.getElementById('jumlah_gigi_di').value = jumlahGigiDI;
        document.getElementById('score_di').value = scoreDI.toFixed(2);

        calculateOHIS();
    }

    function calculateCI() {
        let jumlahNilaiCI = 0;
        let jumlahGigiCI = 0;

        for (let i = 1; i <= 6; i++) {
            let ciValue = document.getElementById('ci_' + i).value;
            if (ciValue !== "") {
                jumlahNilaiCI += parseInt(ciValue);
                jumlahGigiCI++;
            }
        }

        let scoreCI = (jumlahGigiCI !== 0) ? (jumlahNilaiCI / jumlahGigiCI) : 0;

        document.getElementById('jumlah_nilai_ci').value = jumlahNilaiCI;
        document.getElementById('jumlah_gigi_ci').value = jumlahGigiCI;
        document.getElementById('score_ci').value = scoreCI.toFixed(2);

        calculateOHIS();
    }

    function calculateOHIS() {
        let scoreDI = parseFloat(document.getElementById('score_di').value);
        let scoreCI = parseFloat(document.getElementById('score_ci').value);

        let kriteriaOHIS = scoreDI + scoreCI;

        document.getElementById('nilai_kriteria_ohis').value = kriteriaOHIS.toFixed(2);

        // Additional Functionality
        let kriteriaOHISElement = document.getElementById('kriteria_ohis');

        if (kriteriaOHIS >= 0 && kriteriaOHIS <= 1.2) {
            kriteriaOHISElement.value = 'Baik';
            kriteriaOHISElement.style.backgroundColor = 'green';
        } else if (kriteriaOHIS > 1.2 && kriteriaOHIS <= 3.0) {
            kriteriaOHISElement.value = 'Sedang';
            kriteriaOHISElement.style.backgroundColor = 'yellow';
        } else if (kriteriaOHIS > 3.0 && kriteriaOHIS <= 6.0) {
            kriteriaOHISElement.value = 'Buruk';
            kriteriaOHISElement.style.backgroundColor = 'red';
        }
    }

    // Attach the functions to the change event of the select elements
    for (let i = 1; i <= 6; i++) {
        document.getElementById('di_' + i).addEventListener('change', calculateDI);
        document.getElementById('ci_' + i).addEventListener('change', calculateCI);
    }

    // Call the initial calculations
    calculateDI();
    calculateCI();
</script>



@endsection