@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Diagnosa'])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail diagnosa</h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Diagnosis</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $diagnosa->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $diagnosa->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $diagnosa->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $diagnosa->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                        <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Diagnosa Gigi</h6>
                    </marquee>
                </div>

                <div id="diagnosas">
                    @foreach ($results as $gigi => $problems)
                        <div class="form-group row">
                            <div class="col-sm-1 mb-3 mb-sm-0">
                                <label for="gigi" class="text-center">Gigi</label>
                                <input type="text" class="form-control text-center" id="gigi" name="gigi"
                                    value="{{ $gigi }}" readonly disabled>
                            </div>
                            @foreach ($problems as $masalah => $details)
                                <div class="col-sm-11 mb-sm-0">
                                    <label for="masalah">Masalah</label>
                                    <input type="text" class="form-control" id="masalah" name="masalah"
                                        value="{{ $masalah }}" readonly disabled>
                                </div>
                        </div>
                        <div class="diagnosa">
                            @foreach ($details as $detail)
                            <hr class="w-100 border-top border-dark border-1 d-print-block">
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-sm-0"></div>
                                    <div class="col-sm-11 mb-3 mb-sm-0">
                                        {{-- <hr class="w-100 border-top border-primary border-1 d-print-block"> --}}
                                        <label for="askepgilut" class="form-text">Diagnosis Askepgilut :</label><br>
                                        @foreach ($askepgiluts as $askepgilut)
                                        @if ($askepgilut->id == $detail['askepgilut'])
                                            {{ $askepgilut->askepgilut }}
                                        @endif
                                    @endforeach
                                    
                                        {{-- <input type="text" class="form-control" value="{{ $detail['askepgilut'] }}"
                                            readonly> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-sm-0"></div>
                                    <div class="col-sm-11 mb-sm-0">
                                        <label for="penyebab" class="form-text">penyebab :</label><br>
                                        <ol>
                                            @foreach ($detail['penyebab'] as $penyebab)
                                                @foreach (get_c('penyebabs', 'askepgilut_id', $detail['askepgilut']) as $penyebabI)
                                                    @if ($penyebab == $penyebabI->id)
                                                        <li>{{ $penyebabI->penyebab }}</li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-sm-0"></div>
                                    <div class="col-sm-11 mb-sm-0">
                                        <label for="gejala" class="form-text">Gejala :</label><br>
                                        <ol>
                                            @foreach ($detail['gejala'] as $gejala)
                                                @foreach (get_c('gejalas', 'askepgilut_id', $detail['askepgilut']) as $gejalaI)
                                                    @if ($gejala == $gejalaI->id)
                                                        <li>{{ $gejalaI->gejala }}</li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
                                
                            @endforeach
                    @endforeach
                </div>
                @endforeach
            </div>



            @can('adminmahasiswa')
                <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                    <div class="ms-auto me-5">
                        <p>Pembimbing,</p>
                        @if (in_array(0, explode(',', $accs)))
                            <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                        @else
                            <div id="qrcode" class="mb-2"></div>
                            <!-- Ini adalah elemen yang akan menampilkan QR code -->
                        @endif
                        {{ ucwords(get_v('users', 'nimnip', $diagnosa->pembimbing, 'username')[0]->username ?? '') }}
                        <br>
                        NIP. {{ $diagnosa->pembimbing }}
                    </div>
                </div>
            @endcan

        </div>

        <div class="card-body">
            @can('pembimbing')
                <div class="form-group row">
                    <div class="col-sm-12 d-grid gap-2">
                        <a href="{{ route('diagnosa.index') }}" class="btn btn-success btn-block btn">
                            <i class="fas fa-arrow-left fa-fw"></i> Kembali
                        </a>
                    </div>
                </div>
            @endcan
            @can('adminmahasiswa')
                <div class="form-group row">
                    <div class="col-sm-6 d-grid gap-2">
                        <a href="{{ route('diagnosa.index') }}" class="btn btn-success btn-block btn">
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
        var qrText = "{{ $diagnosa->id }}" + "_" + "{{ $diagnosa->user_id }}" + "_" +
            "{{ $diagnosa->no_kartu }}" + "_" +
            "{{ $diagnosa->pembimbing }}" + "_" +
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
