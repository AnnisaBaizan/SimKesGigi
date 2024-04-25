@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100','titlePage' => 'Anamnesa dan Riwayat'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Anamnesa dan Riwayat'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Anamnesa dan Riwayat</h6>
            </div>
            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Anamnesa dan Riwayat</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $anamripasien->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $anamripasien->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $anamripasien->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $anamripasien->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">


                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Anamnesa</h6>
                    </marquee>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-sm-0">
                        <label for="klhn_utama" class ="form-text">Keluhan Utama :</label>
                        <textarea class="form-control @error('klhn_utama') is-invalid @enderror" id="klhn_utama" name="klhn_utama" disabled
                            readonly placeholder="Masukan Keluhan Utama Anda">{{ old('klhn_utama', $anamripasien->klhn_utama) }}</textarea>
                        @error('klhn_utama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-12 mb-sm-0">
                        <label for="klhn_tmbhn" class ="form-text">Keluhan Tambahan :</label>
                        <textarea class="form-control @error('klhn_tmbhn') is-invalid @enderror" id="klhn_tmbhn" name="klhn_tmbhn" disabled
                            readonly placeholder="Masukan Keluhan Tambahan Anda">{{ old('klhn_tmbhn', $anamripasien->klhn_tmbhn) }}</textarea>
                        @error('klhn_tmbhn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Riwayat Kesehatan Umum</h6>
                    </marquee>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3">
                        <label for="goldar" class ="form-text">Golongan Darah :</label>
                        <select class="form-control @error('goldar') is-invalid @enderror" id="goldar" name="goldar"
                            disabled readonly placeholder="Golongan Darah" value="{{ old('goldar') }}" required>
                            @error('goldar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Golongan Darah</option>
                            <option value="A" {{ $anamripasien->goldar == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $anamripasien->goldar == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ $anamripasien->goldar == 'AB' ? 'selected' : '' }}>AB
                            </option>
                            <option value="O" {{ $anamripasien->goldar == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="nadi" class ="form-text">Denyut Nadi :</label>
                        <input type="text" class="form-control @error('nadi') is-invalid @enderror" id="nadi"
                            name="nadi" placeholder="Denyut Nadi" value="{{ old('nadi', $anamripasien->nadi) }}"
                            required disabled readonly>
                        @error('nadi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-2 mt-4 mb-3 p-3 mb-sm-0">
                        <label class ="form-text text-primary">/Menit</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="tknn_drh" class ="form-text">Tekanan Darah :</label>
                        <input type="text" class="form-control @error('tknn_drh') is-invalid @enderror" id="tknn_drh"
                            name="tknn_drh" placeholder="00/00" value="{{ old('tknn_drh', $anamripasien->tknn_drh) }}"
                            required disabled readonly>
                        @error('tknn_drh')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-2 mt-4 mb-3 p-3 mb-sm-0">
                        <label class ="form-text text-primary">mmHg</label>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="ktrgn_drh" class ="form-text">Keterangan</label>
                        <select class="form-control @error('ktrgn_drh') is-invalid @enderror" id="ktrgn_drh"
                            name="ktrgn_drh" placeholder="Keterangan" value="{{ old('ktrgn_drh') }}" required disabled
                            readonly>
                            @error('ktrgn_drh')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Keterangan</option>
                            <option value="Normal" {{ $anamripasien->ktrgn_drh == 'Normal' ? 'selected' : '' }}>
                                Normal</option>
                            <option value="Hypotensi" {{ $anamripasien->ktrgn_drh == 'Hypotensi' ? 'selected' : '' }}>
                                Hypotensi</option>
                            <option value="Hypertensi" {{ $anamripasien->ktrgn_drh == 'Hypertensi' ? 'selected' : '' }}>
                                Hypertensi
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="suhu" class ="form-text">Suhu Tubuh :</label>
                        <input type="text" class="form-control @error('suhu') is-invalid @enderror" id="suhu"
                            name="suhu" placeholder="Suhu Tubuh" value="{{ old('suhu', $anamripasien->suhu) }}"
                            required disabled readonly>
                        @error('suhu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-2 mt-4 mb-3 p-3 mb-sm-0">
                        <label class ="form-text text-primary">Celsius</label>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="pernafasan" class ="form-text">Pernafasan</label>
                        <select class="form-control @error('pernafasan') is-invalid @enderror" id="pernafasan"
                            name="pernafasan" placeholder="Pernafasan" value="{{ old('pernafasan') }}" required disabled
                            readonly>
                            @error('pernafasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pernafasan</option>
                            <option value="Normal" {{ $anamripasien->pernafasan == 'Normal' ? 'selected' : '' }}>
                                Normal</option>
                            <option value="Sesak" {{ $anamripasien->pernafasan == 'Sesak' ? 'selected' : '' }}>
                                Sesak</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                    <center>
                        <h6
                            class="col-sm-4 mb-3 font-weight-bold text-dark text-bold bg-gradient-faded-info-vertical text-center">
                            - Penyakit - </h6>
                    </center>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3">
                        <label for="jantung" class ="form-text">Jantung</label>
                        <select class="form-control @error('jantung') is-invalid @enderror" id="jantung" name="jantung"
                            placeholder="Jantung" value="{{ old('jantung') }}" required disabled readonly>
                            @error('jantung')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Jantung</option>
                            <option value="Ada" {{ $anamripasien->jantung == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->jantung == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="diabetes" class ="form-text">Diabetes</label>
                        <select class="form-control @error('diabetes') is-invalid @enderror" id="diabetes"
                            name="diabetes" placeholder="Diabetes" value="{{ old('diabetes') }}" required disabled
                            readonly>
                            @error('diabetes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Diabetes</option>
                            <option value="Ada" {{ $anamripasien->diabetes == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->diabetes == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <label for="haemophilia" class ="form-text">Haemophilia</label>
                        <select class="form-control @error('haemophilia') is-invalid @enderror" id="haemophilia"
                            name="haemophilia" placeholder="Haemophilia" value="{{ old('haemophilia') }}" required
                            disabled readonly>
                            @error('haemophilia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Haemophilia</option>
                            <option value="Ada" {{ $anamripasien->haemophilia == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->haemophilia == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak Ada
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label for="hepatitis" class ="form-text">Hepatitis</label>
                        <select class="form-control @error('hepatitis') is-invalid @enderror" id="hepatitis"
                            name="hepatitis" placeholder="Hepatitis" value="{{ old('hepatitis') }}" required disabled
                            readonly>
                            @error('hepatitis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Hepatitis</option>
                            <option value="Ada" {{ $anamripasien->hepatitis == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->hepatitis == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="lambung" class ="form-text">Lambung/Maag</label>
                        <select class="form-control @error('lambung') is-invalid @enderror" id="lambung"
                            name="lambung" placeholder="Lambung/Maag" value="{{ old('lambung') }}" required disabled
                            readonly>
                            @error('lambung')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Lambung/Maag</option>
                            <option value="Ada" {{ $anamripasien->lambung == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->lambung == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak Ada</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label for="pnykt_ln" class ="form-text">Penyakit Lainnya :</label>
                        <select class="form-control @error('pnykt_ln') is-invalid @enderror" id="pnykt_ln"
                            name="pnykt_ln" placeholder="Penyakit Lainnya" value="{{ old('pnykt_ln') }}" required
                            disabled readonly>
                            @error('pnykt_ln')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Penyakit Lainnya</option>
                            <option value="Ada" {{ $anamripasien->pnykt_ln == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->pnykt_ln == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nm_pnykt_ln" class ="form-text">Penyakit Apa :</label>
                        <input type="text" class="form-control @error('nm_pnykt_ln') is-invalid @enderror"
                            id="nm_pnykt_ln" name="nm_pnykt_ln" disabled readonly placeholder="Tuliskan Nama Penyakitnya"
                            value="{{ old('nm_pnykt_ln', $anamripasien->nm_pnykt_ln) }}">
                        @error('nm_pnykt_ln')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                    <center>
                        <h6
                            class="col-sm-4 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-info-vertical text-center">
                            - Alergi - </h6>
                    </center>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label for="alergi_obat" class ="form-text">Alergi Obat :</label>
                        <select class="form-control @error('alergi_obat') is-invalid @enderror" id="alergi_obat"
                            name="alergi_obat" placeholder="Masukan Nama Obat" value="{{ old('alergi_obat') }}" required
                            disabled readonly>
                            @error('alergi_obat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Alergi Obat</option>
                            <option value="Ada" {{ $anamripasien->alergi_obat == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->alergi_obat == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak Ada
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nm_obat" class ="form-text">Obat Apa :</label>
                        <input type="text" class="form-control @error('nm_obat') is-invalid @enderror" id="nm_obat"
                            name="nm_obat" disabled readonly placeholder="Tuliskan Nama Obat nya"
                            value="{{ old('nm_obat', $anamripasien->nm_obat) }}">
                        @error('nm_obat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label for="alergi_mkn" class ="form-text">Alergi Makanan :</label>
                        <select class="form-control @error('alergi_mkn') is-invalid @enderror" id="alergi_mkn"
                            name="alergi_mkn" disabled readonly placeholder="Alergi Makanan"
                            value="{{ old('alergi_mkn') }}" required>
                            @error('alergi_mkn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Alergi Makanan</option>
                            <option value="Ada" {{ $anamripasien->alergi_mkn == 'Ada' ? 'selected' : '' }}>Ada
                            </option>
                            <option value="Tidak Ada" {{ $anamripasien->alergi_mkn == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nm_mkn" class ="form-text">Makanan Apa :</label>
                        <input type="text" class="form-control @error('nm_mkn') is-invalid @enderror" id="nm_mkn"
                            name="nm_mkn" disabled readonly placeholder="Tuliskan Nama Makanannya"
                            value="{{ old('nm_mkn', $anamripasien->nm_mkn) }}">
                        @error('nm_mkn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @can('adminmahasiswa')
                        <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                            <div class="ms-auto me-5">
                                <p>Pembimbing,</p>
                                @if ($anamripasien->acc == 1)
                                    <div id="qrcode" class="mb-2"></div>
                                    <!-- Ini adalah elemen yang akan menampilkan QR code -->
                                @else
                                    <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                                @endif
                                {{ ucwords(get_v('users', 'nimnip', $anamripasien->pembimbing, 'username')[0]->username ?? '') }}
                                <br>
                                NIP. {{ $anamripasien->pembimbing }}
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('anamripasien.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('anamripasien.index') }}" class="btn btn-success btn-block btn">
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
        var qrText = "{{ $anamripasien->id }}" + "_" + "{{ $anamripasien->user_id }}" + "_" + "{{ $anamripasien->no_kartu }}" + "_" +
            "{{ $anamripasien->pembimbing }}" + "_" +
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
@endsection
