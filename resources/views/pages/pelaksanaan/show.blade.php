@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Pelaksanaan'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Pelaksanaan'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">


            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Pelaksanaan</h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Pelaksanaan</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $pelaksanaan->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $pelaksanaan->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $pelaksanaan->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $pelaksanaan->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Pelaksanaan Gigi</h6>
                    </marquee>
                </div>


                @foreach ($pelaksanaans as $pelaksanaan)
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="gigi" class ="form-text">gigi :</label>
                            <input type="text" class="form-control text-center" id="gigi" name="gigi"
                                value="{{ $pelaksanaan->gigi }}" readonly disabled>
                            @error('gigi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-10 mb-3">
                            <label for="diagnosa" class ="form-text">Diagnosa :</label>
                            <textarea class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa"
                                placeholder="Masukan Diagnosa Anda" disabled>{{ old('diagnosa', $pelaksanaan->diagnosa) }}</textarea>
                            @error('diagnosa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row text-center">

                        <div class="col-sm-4 mb-3">
                            <label for="intervensi" class ="form-text">Intervensi Perawatan:</label>
                            <textarea class="form-control @error('intervensi') is-invalid @enderror" id="intervensi" name="intervensi"
                                placeholder="Masukan intervensi Perawatan Anda" disabled>{{ old('intervensi', $pelaksanaan->intervensi) }}</textarea>
                            @error('intervensi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="hasil" class ="form-text">Hasil Perawatan :</label>
                            <textarea class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil"
                                placeholder="Masukan Hasil Perawatan Anda" disabled>{{ old('hasil', $pelaksanaan->hasil) }}</textarea>
                            @error('indikator')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="rencana" class ="form-text">Rencana Tindak Lanjut :</label>
                            <textarea class="form-control @error('rencana') is-invalid @enderror" id="rencana" name="rencana"
                                placeholder="Masukan Rencana Tindak Lanjut Anda" disabled>{{ old('rencana', $pelaksanaan->rencana) }}</textarea>
                            @error('rencana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-4 w-100 border-top border-dark border-1 d-print-block">

                @endforeach


                @can('adminmahasiswa')
                    <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                        <div class="ms-auto me-5">
                            <p>Pembimbing,</p>
                            @if ($pelaksanaan->acc == 1)
                                <div id="qrcode" class="mb-2"></div>
                                <!-- Ini adalah elemen yang akan menampilkan QR code -->
                            @else
                                <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                            @endif
                            {{ ucwords(get_v('users', 'nimnip', $pelaksanaan->pembimbing, 'username')[0]->username ?? '') }}
                            <br>
                            NIP. {{ $pelaksanaan->pembimbing }}
                        </div>
                    </div>
                @endcan
            </div>


            <div class="form-group row">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('pelaksanaan.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('pelaksanaan.index') }}" class="btn btn-success btn-block btn">
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
        </form>
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
        var qrText = "{{ $pelaksanaan->id }}" + "_" + "{{ $pelaksanaan->user_id }}" + "_" +
            "{{ $pelaksanaan->no_kartu }}" + "_" +
            "{{ $pelaksanaan->pembimbing }}" + "_" +
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
