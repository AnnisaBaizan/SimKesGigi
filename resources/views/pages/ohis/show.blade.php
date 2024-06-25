@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'OHI-S'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Data OHI-S'])

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

            th,
            td {
                display: block;
                width: 100%;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /* Mengatur lebar kolom pada elemen td secara langsung */
        td:nth-child(1) {
            width: 15%;
            /* Lebar kolom pertama */
        }

        td:nth-child(2) {
            width: 15%;
            /* Lebar kolom kedua */
        }

        td:nth-child(3) {
            width: 15%;
            /* Lebar kolom ketiga */
        }

        td:nth-child(4) {
            width: 10%;
            /* Lebar kolom pertama */
        }

        td:nth-child(5) {
            width: 15%;
            /* Lebar kolom kedua */
        }

        td:nth-child(6) {
            width: 15%;
            /* Lebar kolom ketiga */
        }

        td:nth-child(7) {
            width: 15%;
            /* Lebar kolom ketiga */
        }
    </style>
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data OHI-S</h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">OHI-S</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $ohis->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $ohis->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $ohis->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $ohis->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold text-center">DI (Debris Index) & CI (Calculus Index)
                    </h6>
                    </marquee>
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
                                <select class="form-control @error('di_1') is-invalid @enderror" id="di_1"
                                    name="di_1" placeholder="Tidak Ada" value="{{ old('di_1') }}" disabled readonly>
                                    @error('di_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->di_1) ? '' : ($ohis->di_1 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="di_2">DI 2</label>
                                <select class="form-control @error('di_2') is-invalid @enderror" id="di_2"
                                    name="di_2" placeholder="Tidak Ada" value="{{ old('di_2') }}" disabled readonly>
                                    @error('di_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->di_2) ? '' : ($ohis->di_2 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="di_3">DI 3</label>
                                <select class="form-control @error('di_3') is-invalid @enderror" id="di_3"
                                    name="di_3" placeholder="Tidak Ada" value="{{ old('di_3') }}" disabled readonly>
                                    @error('di_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->di_3) ? '' : ($ohis->di_3 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Baris Kedua - di_4, di_5, di_6 -->
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="di_4">DI 4</label>
                                <select class="form-control @error('di_4') is-invalid @enderror" id="di_4"
                                    name="di_4" placeholder="Tidak Ada" value="{{ old('di_4') }}" disabled readonly>
                                    @error('di_4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->di_4) ? '' : ($ohis->di_4 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="di_5">DI 5</label>
                                <select class="form-control @error('di_5') is-invalid @enderror" id="di_5"
                                    name="di_5" placeholder="Tidak Ada" value="{{ old('di_5') }}" disabled readonly>
                                    @error('di_5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->di_5) ? '' : ($ohis->di_5 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="di_6">DI 6</label>
                                <select class="form-control @error('di_6') is-invalid @enderror" id="di_6"
                                    name="di_6" placeholder="Tidak Ada" value="{{ old('di_6') }}" disabled
                                    readonly>
                                    @error('di_6')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->di_6) ? '' : ($ohis->di_6 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label for="jumlah_nilai_di">Jumlah Nilai DI</label>
                                <input type="text" name="jumlah_nilai_di" id="jumlah_nilai_di"
                                    value="{{ $ohis->jumlah_nilai_di }}" class="form-control text-center" readonly
                                    required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="jumlah_gigi_di">Jumlah Gigi DI</label>
                                <input type="text" name="jumlah_gigi_di" id="jumlah_gigi_di"
                                    value="{{ $ohis->jumlah_gigi_di }}" class="form-control text-center" readonly
                                    required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="score_di">Score DI</label>
                                <input type="text" name="score_di" id="score_di" value="{{ $ohis->score_di }}"
                                    class="form-control text-center" readonly required>
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
                                <select class="form-control @error('ci_1') is-invalid @enderror" id="ci_1"
                                    name="ci_1" placeholder="Tidak Ada" value="{{ old('ci_1') }}" disabled
                                    readonly>
                                    @error('ci_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->ci_1) ? '' : ($ohis->ci_1 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="ci_2">CI 2</label>
                                <select class="form-control @error('ci_2') is-invalid @enderror" id="ci_2"
                                    name="ci_2" placeholder="Tidak Ada" value="{{ old('ci_2') }}" disabled
                                    readonly>
                                    @error('ci_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->ci_2) ? '' : ($ohis->ci_2 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="ci_3">CI 3</label>
                                <select class="form-control @error('ci_3') is-invalid @enderror" id="ci_3"
                                    name="ci_3" placeholder="Tidak Ada" value="{{ old('ci_3') }}" disabled
                                    readonly>
                                    @error('ci_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->ci_3) ? '' : ($ohis->ci_3 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Baris Kedua - ci_4, ci_5, ci_6 -->
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="ci_4">CI 4</label>
                                <select class="form-control @error('ci_4') is-invalid @enderror" id="ci_4"
                                    name="ci_4" placeholder="Tidak Ada" value="{{ old('ci_4') }}" disabled
                                    readonly>
                                    @error('ci_4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->ci_4) ? '' : ($ohis->ci_4 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="ci_5">CI 5</label>
                                <select class="form-control @error('ci_5') is-invalid @enderror" id="ci_5"
                                    name="ci_5" placeholder="Tidak Ada" value="{{ old('ci_5') }}" disabled
                                    readonly>
                                    @error('ci_5')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->ci_5) ? '' : ($ohis->ci_5 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="ci_6">CI 6</label>
                                <select class="form-control @error('ci_6') is-invalid @enderror" id="ci_6"
                                    name="ci_6" placeholder="Tidak Ada" value="{{ old('ci_6') }}" disabled
                                    readonly>
                                    @error('ci_6')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected>Tidak Ada</option>
                                    @for ($j = 0; $j < 4; $j++)
                                        <option value="{{ $j }}"
                                            {{ is_null($ohis->ci_6) ? '' : ($ohis->ci_6 == $j ? 'selected' : '') }}>
                                            {{ $j }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label for="jumlah_nilai_ci">Jumlah Nilai CI</label>
                                <input type="text" name="jumlah_nilai_ci" id="jumlah_nilai_ci"
                                    value="{{ $ohis->jumlah_nilai_ci }}" class="form-control text-center" readonly
                                    required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="jumlah_gigi_ci">Jumlah Gigi CI</label>
                                <input type="text" name="jumlah_gigi_ci" id="jumlah_gigi_ci"
                                    value="{{ $ohis->jumlah_gigi_ci }}" class="form-control text-center" readonly
                                    required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="score_ci">Score CI</label>
                                <input type="text" name="score_ci" id="score_ci" value="{{ $ohis->score_ci }}"
                                    class="form-control text-center" readonly required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="kriteria_ohis" class="text-center">Kriteria OHI-S</label>
                    <div class="col-sm-6 mb-3">
                        <input type="text" name="nilai_kriteria_ohis" id="nilai_kriteria_ohis"
                            value="{{ $ohis->nilai_kriteria_ohis }}" class="form-control text-center" readonly required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <input type="text" name="kriteria_ohis" id="kriteria_ohis"
                            value="{{ $ohis->kriteria_ohis }}"
                            class="form-control text-center {{ $ohis->kriteria_ohis == 'Buruk' ? 'bg-danger' : ($ohis->kriteria_ohis == 'Sedang' ? 'bg-warning' : 'bg-success') }}"
                            readonly required>
                    </div>
                </div>

                @can('adminmahasiswa')
                    <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                        <div class="ms-auto me-5">
                            <p>Pembimbing,</p>
                            @if ($ohis->acc == 1)
                                <div id="qrcode" class="mb-2"></div>
                                <!-- Ini adalah elemen yang akan menampilkan QR code -->
                            @else
                                <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                            @endif
                            {{ ucwords(get_v('users', 'nimnip', $ohis->pembimbing, 'username')[0]->username ?? '') }}
                            <br>
                            NIP. {{ $ohis->pembimbing }}
                        </div>
                    </div>
                @endcan
            </div>

            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('ohis.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('ohis.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                        <div class="col-sm-6 d-grid gap-2">
                            <button class="btn btn-primary btn-block" onclick="printDiv('printableArea')">
                                <i class="fas fa-print text-white"></i></i> Cetak
                                </a>
                        </div>
                    </div>
                @endcan
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
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <!-- Include QRCode.js library -->
    <script src="{{ asset('assets/js/qrcode.min.js') }}"></script>

    <!-- Script to generate QR code -->
    <script type="text/javascript">
        // Mendapatkan waktu saat ini dalam zona waktu Indonesia (WIB) dan mengonversinya ke format ISO string
        var currentDateTime = new Date(new Date().getTime() + (7 * 60 * 60 * 1000)).toISOString();

        // Function to generate a random string of specified length
        function generateRandomString(length) {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var result = '';
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return result;
        }

        // Mendapatkan nilai dari variabel dan menyusunnya menjadi teks QR code
        var qrText = "{{ $ohis->id }}" + "_" + "{{ $ohis->user_id }}" + "_" +
            "{{ $ohis->no_kartu }}" + "_" +
            "{{ $ohis->pembimbing }}" + "_" +
            currentDateTime + "_" + generateRandomString(25);

        // Membuat QR code dengan teks yang diperoleh
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: qrText,
            width: 110,
            height: 110,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
@endsection
