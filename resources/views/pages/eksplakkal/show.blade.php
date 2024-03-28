@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Eskternal & Internal Oral (Plak & Kalkulus)'])
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
                <h6 class="m-0 font-weight-bold text-primary">Detail Eskternal & Internal Oral (Plak & Kalkulus)</h6>
            </div>
            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Eskternal & Internal Oral (Plak & Kalkulus)</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $eksplakkal->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $eksplakkal->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $eksplakkal->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $eksplakkal->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Eksternal Oral</h6>
                        </marquee>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-sm-3">
                            <label for="muka" class ="form-text">Muka :</label>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <select class="form-control @error('muka') is-invalid @enderror" id="muka" name="muka"
                                placeholder="pilih" value="{{ old('muka') }}" required>
                                @error('muka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Simetris" {{ $eksplakkal->muka == 'Simetris' ? 'selected' : '' }}>Simetris</option>
                                <option value="Tidak Simetris" {{ $eksplakkal->muka == 'Tidak Simetris' ? 'selected' : '' }}>Tidak Simetris</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Kelenjar Limpe</h6>
                    </div>
                    <div class="row mt-2">
                        <!-- Bagian Kanan -->
                        <div class="col-sm-6">
                            <div class="col-sm-12 mb-sm-0 text-center bg-gradient-faded-secondary-vertical">
                                <h6 class="m-0 font-weight-bold text-dark text-bold">Kanan</h6>
                            </div>
                            <div class="col-sm-12 mb-3 mt-3 text-center">
                                <input type="radio" class="@error('limpe_kanan_teraba') is-invalid @enderror"
                                    id="limpe_kanan_teraba1" value="Teraba" name="limpe_kanan_teraba"
                                    {{ $eksplakkal->limpe_kanan_teraba == 'Teraba' ? 'checked' : '' }} required>
                                <label for="limpe_kanan_teraba1" class="me-5">Teraba</label>
                                <input type="radio" class="ms-5 @error('limpe_kanan_teraba') is-invalid @enderror"
                                    id="limpe_kanan_teraba2" value="Tidak Teraba" name="limpe_kanan_teraba"
                                    {{ $eksplakkal->limpe_kanan_teraba == 'Tidak Teraba' ? 'checked' : '' }} required>
                                <label for="limpe_kanan_teraba2">Tidak Teraba</label>
                            </div>
                    
                            <div class="col-sm-12 mb-3 text-center">
                                <input type="radio" class="@error('limpe_kanan_texture') is-invalid @enderror"
                                    id="limpe_kanan_texture1" value="Keras" name="limpe_kanan_texture"
                                    {{ $eksplakkal->limpe_kanan_texture == 'Keras' ? 'checked' : '' }} required>
                                <label for="limpe_kanan_texture1" class="me-5">Keras</label>
                                <input type="radio" class="ms-5 @error('limpe_kanan_texture') is-invalid @enderror"
                                    id="limpe_kanan_texture2" value="Lunak" name="limpe_kanan_texture"
                                    {{ $eksplakkal->limpe_kanan_texture == 'Lunak' ? 'checked' : '' }} required>
                                <label for="limpe_kanan_texture2">Lunak</label>
                            </div>
                    
                            <div class="col-sm-12 mb-3 text-center">
                                <input type="radio" class="@error('limpe_kanan_sakit') is-invalid @enderror"
                                    id="limpe_kanan_sakit1" value="Sakit" name="limpe_kanan_sakit"
                                    {{ $eksplakkal->limpe_kanan_sakit == 'Sakit' ? 'checked' : '' }} required>
                                <label for="limpe_kanan_sakit1" class="me-5">Sakit</label>
                                <input type="radio" class="ms-5 @error('limpe_kanan_sakit') is-invalid @enderror"
                                    id="limpe_kanan_sakit2" value="Tidak Sakit" name="limpe_kanan_sakit"
                                    {{ $eksplakkal->limpe_kanan_sakit == 'Tidak Sakit' ? 'checked' : '' }} required>
                                <label for="limpe_kanan_sakit2">Tidak Sakit</label>
                            </div>
                        </div>
                    
                        <!-- Bagian Kiri -->
                        <div class="col-sm-6">
                            <div class="col-sm-12 mb-sm-0 text-center bg-gradient-faded-secondary-vertical">
                                <h6 class="m-0 font-weight-bold text-dark text-bold">Kiri</h6>
                            </div>
                            <div class="col-sm-12 mb-3 mt-3 text-center">
                                <input type="radio" class="@error('limpe_kiri_teraba') is-invalid @enderror"
                                    id="limpe_kiri_teraba1" value="Teraba" name="limpe_kiri_teraba"
                                    {{ $eksplakkal->limpe_kiri_teraba == 'Teraba' ? 'checked' : '' }} required>
                                <label for="limpe_kiri_teraba1" class="me-5">Teraba</label>
                                <input type="radio" class="ms-5 @error('limpe_kiri_teraba') is-invalid @enderror"
                                    id="limpe_kiri_teraba2" value="Tidak Teraba" name="limpe_kiri_teraba"
                                    {{ $eksplakkal->limpe_kiri_teraba == 'Tidak Teraba' ? 'checked' : '' }} required>
                                <label for="limpe_kiri_teraba2">Tidak Teraba</label>
                            </div>
                    
                            <div class="col-sm-12 mb-3 text-center">
                                <input type="radio" class="@error('limpe_kiri_texture') is-invalid @enderror"
                                    id="limpe_kiri_texture1" value="Keras" name="limpe_kiri_texture"
                                    {{ $eksplakkal->limpe_kiri_texture == 'Keras' ? 'checked' : '' }} required>
                                <label for="limpe_kiri_texture1" class="me-5">Keras</label>
                                <input type="radio" class="ms-5 @error('limpe_kiri_texture') is-invalid @enderror"
                                    id="limpe_kiri_texture2" value="Lunak" name="limpe_kiri_texture"
                                    {{ $eksplakkal->limpe_kiri_texture == 'Lunak' ? 'checked' : '' }} required>
                                <label for="limpe_kiri_texture2">Lunak</label>
                            </div>
                    
                            <div class="col-sm-12 mb-3 text-center">
                                <input type="radio" class="@error('limpe_kiri_sakit') is-invalid @enderror"
                                    id="limpe_kiri_sakit1" value="Sakit" name="limpe_kiri_sakit"
                                    {{ $eksplakkal->limpe_kiri_sakit == 'Sakit' ? 'checked' : '' }} required>
                                <label for="limpe_kiri_sakit1" class="me-5">Sakit</label>
                                <input type="radio" class="ms-5 @error('limpe_kiri_sakit') is-invalid @enderror"
                                    id="limpe_kiri_sakit2" value="Tidak Sakit" name="limpe_kiri_sakit"
                                    {{ $eksplakkal->limpe_kiri_sakit == 'Tidak Sakit' ? 'checked' : '' }} required>
                                <label for="limpe_kiri_sakit2">Tidak Sakit</label>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Internal Oral</h6>
                        </marquee>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        <img class="mb-3 img-fluid max-width: 150%; height: 50%;" src="{!! asset('/img/odontogram.jpeg') !!}">
                    </div>

                    {{-- <img src="{!! asset('/img/odontogram.jpeg') !!}"  width="2000px" height="500px"> --}}
                    {{--  --}}

                    <div class="row mt-3 text-center">
                        <!-- Kolom Pertama - di_1, di_2, di_3 -->
                        <div class="col-sm-12">
                            <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                                <h6 class="m-0 font-weight-bold text-dark text-bold">Plak</h6>
                            </div>
                            <!-- Baris Pertama - di_1, di_2, di_3 -->

                            <div class="form-group row">
                                {{-- <div class="col-sm-5 mb-3">
                        <label for="plak[]" class ="form-text">Pilih Pertanyaan yang Berhasil Dijawab dengan Benar :</label>
                    </div> --}}
                                <div class="col-sm-12 mt-3">
                                    <select
                                        class="js-example-basic-multiple form-control @error('plak') is-invalid @enderror"
                                        data-live-search="true" id="plak" name="plak[]"
                                        placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar"
                                        value="{{ old('plak[]') }}" multiple="multiple" required>
                                        @error('plak[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                                        @foreach ($permukaangigis as $permukaangigi)
                                            <option value="{{ $permukaangigi->kode }} {{ ucfirst($permukaangigi->lokasi) }}" {{ in_array($permukaangigi->kode .' '. ucfirst($permukaangigi->lokasi), explode(',', $eksplakkal->plak)) ? 'selected' : '' }}>
                                            {{ $permukaangigi->kode }} {{ ucfirst($permukaangigi->lokasi) }}
                                            </option>
                                    
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="jumlah_plak" class ="form-text">Jumlah yang Ada Plak :</label>
                                    <input type="text" class="form-control @error('jumlah_plak') is-invalid @enderror"
                                        id="jumlah_plak" name="jumlah_plak" placeholder="Ada Plak"
                                        value="{{ old('jumlah_plak') }}" readonly>
                                    @error('jumlah_plak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="jumlah_permukaan" class ="form-text">Jumlah Permukaan Diperiksa :</label>
                                    <input type="number"
                                        class="form-control @error('jumlah_permukaan') is-invalid @enderror"
                                        id="jumlah_permukaan" name="jumlah_permukaan" placeholder="Permukaan Diperiksa"
                                        value="{{ old('jumlah_permukaan', $eksplakkal->jumlah_permukaan) }}">
                                    @error('jumlah_permukaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="jumlah_tidak_plak" class ="form-text">Jumlah yang Tidak Ada Plak :</label>
                                    <input type="text"
                                        class="form-control @error('jumlah_tidak_plak') is-invalid @enderror"
                                        id="jumlah_tidak_plak" name="jumlah_tidak_plak" placeholder="Tidak Ada Plak"
                                        value="{{ old('jumlah_tidak_plak', $eksplakkal->jumlah_tidak_plak) }}" readonly>
                                    @error('jumlah_tidak_plak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="plaque_score" class ="form-text">Plaque Score :</label>
                                    <input type="text"
                                        class="form-control @error('plaque_score') is-invalid @enderror"
                                        id="plaque_score" name="plaque_score" placeholder="Plaque Score"
                                        value="{{ old('plaque_score', $eksplakkal->plaque_score) }}" readonly>
                                    @error('plaque_score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="kriteria" class ="form-text">Kriteria :</label>
                                    <input type="text" class="form-control @error('kriteria') is-invalid @enderror"
                                        id="kriteria" name="kriteria" placeholder="kriteria"
                                        value="{{ old('kriteria', $eksplakkal->kriteria) }}" readonly>
                                    @error('kriteria')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kedua - ci_1, ci_2, ci_3 -->
                        <div class="col-sm-12">
                            <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                                <h6 class="m-0 font-weight-bold text-dark text-bold">Kalkulus</h6>
                            </div>
                            <!-- Baris Pertama - ci_1, ci_2, ci_3 -->

                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="supragingiva[]" class ="form-text">Supragingiva :</label>
                                    <select
                                        class="js-example-basic-multiple form-control @error('supragingiva') is-invalid @enderror"
                                        data-live-search="true" id="supragingiva" name="supragingiva[]"
                                        placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar"
                                        value="{{ old('supragingiva[]', $eksplakkal->supragingiva) }}" multiple="multiple" required>
                                        @error('supragingiva[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <option value="" selected disabled>Pilih Gigi</option> --}}
                                        @foreach ($permukaangigis as $permukaangigi)
                                            <option
                                                value="{{ $permukaangigi->kode }} {{ ucfirst($permukaangigi->lokasi) }}" {{ in_array($permukaangigi->kode .' '. ucfirst($permukaangigi->lokasi), explode(',', $eksplakkal->supragingiva)) ? 'selected' : '' }}>
                                                {{ $permukaangigi->kode }} {{ ucfirst($permukaangigi->lokasi) }}</p>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="subgingiva[]" class ="form-text">subgingiva :</label>
                                    <select
                                        class="js-example-basic-multiple form-control @error('subgingiva') is-invalid @enderror"
                                        data-live-search="true" id="subgingiva" name="subgingiva[]"
                                        placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar"
                                        value="{{ old('subgingiva[]', $eksplakkal->subgingiva) }}" multiple="multiple" required>
                                        @error('subgingiva[]')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <option value="" selected disabled>Pilih Gigi</option> --}}
                                        @foreach ($permukaangigis as $permukaangigi)
                                            <option
                                                value="{{ $permukaangigi->kode }} {{ ucfirst($permukaangigi->lokasi) }}" {{ in_array($permukaangigi->kode .' '. ucfirst($permukaangigi->lokasi), explode(',', $eksplakkal->subgingiva)) ? 'selected' : '' }}>
                                                {{ $permukaangigi->kode }} {{ ucfirst($permukaangigi->lokasi) }}</p>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    @can('adminmahasiswa')
                        <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                            <div class="ms-auto me-5">
                                <p>Pembimbing,</p>
                                @if ($eksplakkal->acc == 1)
                                    <div id="qrcode" class="mb-2"></div>
                                    <!-- Ini adalah elemen yang akan menampilkan QR code -->
                                @else
                                    <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                                @endif
                                {{ ucwords(get_v('users', 'nimnip', $eksplakkal->pembimbing, 'username')[0]->username ?? '') }}
                                <br>
                                NIP. {{ $eksplakkal->pembimbing }}
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('eksplakkal.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('eksplakkal.index') }}" class="btn btn-success btn-block btn">
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

    // Mendapatkan nilai dari variabel dan menyusunnya menjadi teks QR code
    var qrText = "{{ $eksplakkal->id }}" + "_" + "{{ $eksplakkal->user_id }}" + "_" + "{{ $eksplakkal->no_kartu }}" + "_" +
        "{{ $eksplakkal->pembimbing }}" + "_" +
        currentDateTime;

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
<script>
    $(document).ready(function() {
        function hitungPlak() {
            var selectPlak = $("#plak");
            var inputJumlahPermukaan = $("#jumlah_permukaan");
            var outputJumlahPlak = $("#jumlah_plak");
            var outputJumlahTidakPlak = $("#jumlah_tidak_plak");
            var outputPlaqueScore = $("#plaque_score");
            var outputKriteria = $("#kriteria");

            var jumlahPlak = selectPlak.val().length;
            var jumlahPermukaan = parseInt(inputJumlahPermukaan.val()) || 0;
            var jumlahTidakPlak = jumlahPermukaan - jumlahPlak;
            var plaqueScore = (jumlahTidakPlak / jumlahPermukaan) * 100 || 0;

            outputJumlahPlak.val(jumlahPlak);
            outputJumlahTidakPlak.val(jumlahTidakPlak);
            outputPlaqueScore.val(plaqueScore.toFixed(2));

            if (plaqueScore >= 85) {
                outputKriteria.val('Baik').removeClass('bg-danger').addClass('bg-success');
            } else {
                outputKriteria.val('Buruk').removeClass('bg-success').addClass('bg-danger');
            }
        }

        // Add change event listener for the 'plak' select
        $("#plak").on('change', function() {
            hitungPlak();
        });

        // Add input event listener for the 'jumlah_permukaan' input
        $("#jumlah_permukaan").on('input', function() {
            hitungPlak();
        });

        // Trigger initial calculation
        hitungPlak();
    });
</script>

@endsection
