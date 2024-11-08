@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Vitalitas'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Vitalitas'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Vitalitas</h6>
            </div>
            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Vitalitas</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $vitalitas->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $vitalitas->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $vitalitas->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-1">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $vitalitas->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-1">
                        <label for="odontogram_id" class="form-text">Odontogram :</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('odontograms', 'id', $vitalitas->odontogram_id, 'created_at')[0]->created_at ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                @foreach ($vitalitass as $vitalitas)
                    <div class="row text-center">
                        <div class="col-sm-3 mb-3">
                            <label for="elemen_gigi">Elemen Gigi</label>
                            <input type="text" class="form-control text-center" id="elemen_gigi" name="elemen_gigi"
                                value="{{ $vitalitas->elemen_gigi }}" readonly disabled>
                        </div>
                        {{-- @foreach ($gigiArray as $gigi)
                        <div class="col-sm-3 mb-3">
                            <label for="elemen_gigi">Elemen Gigi</label>
                            <input type="text" class="form-control text-center" id="elemen_gigi" name="elemen_gigi" value="{{ $gigi }}"
                                readonly>
                        </div>
                        @endforeach --}}
                        <div class="col-sm-9 mb-3">
                            <label for="masalah">Masalah</label>
                            <input type="text" class="form-control text-center" id="masalah" name="masalah"
                                value="{{ $vitalitas->masalah }}" readonly disabled>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-3 mb-3"></div>
                        <div class="col-sm-1 mb-3">
                            <label for="inspeksi">Inspeksi</label>
                            <select class="form-control text-center @error('inspeksi') is-invalid @enderror" id="inspeksi"
                                name="inspeksi" placeholder="75" value="{{ old('inspeksi') }}" disabled readonly>
                                @error('inspeksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $vitalitas->inspeksi == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $vitalitas->inspeksi == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="thermis">Thermis</label>
                            <select class="form-control text-center @error('thermis') is-invalid @enderror" id="thermis"
                                name="thermis" placeholder="75" value="{{ old('thermis') }}" disabled readonly>
                                @error('thermis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $vitalitas->thermis == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $vitalitas->thermis == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="sondasi">Sondasi</label>
                            <select class="form-control text-center @error('sondasi') is-invalid @enderror" id="sondasi"
                                name="sondasi" placeholder="75" value="{{ old('sondasi') }}" disabled readonly>
                                @error('sondasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $vitalitas->sondasi == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $vitalitas->sondasi == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="perkusi">Perkusi</label>
                            <select class="form-control text-center @error('perkusi') is-invalid @enderror" id="perkusi"
                                name="perkusi" placeholder="75" value="{{ old('perkusi') }}" disabled readonly>
                                @error('perkusi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $vitalitas->perkusi == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $vitalitas->perkusi == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="druk">Druk</label>
                            <select class="form-control text-center @error('druk') is-invalid @enderror" id="druk"
                                name="druk" placeholder="75" value="{{ old('druk') }}" disabled readonly>
                                @error('druk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $vitalitas->druk == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $vitalitas->druk == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="mobility">Mobility</label>
                            <select class="form-control text-center @error('mobility') is-invalid @enderror"
                                id="mobility" name="mobility" placeholder="75" value="{{ old('mobility') }}" disabled
                                readonly>
                                @error('mobility')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $vitalitas->mobility == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $vitalitas->mobility == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                    </div>
                    <hr class="my-4 w-100 border-top border-dark border-1 d-print-block">
                @endforeach
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
                            {{ ucwords(get_v('users', 'nimnip', $vitalitas->pembimbing, 'username')[0]->username ?? '') }}
                            <br>
                            NIP. {{ $vitalitas->pembimbing }}
                        </div>
                    </div>
                @endcan


            </div>
            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('vitalitas.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('vitalitas.index') }}" class="btn btn-success btn-block btn">
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
        var qrText = "{{ $vitalitas->id }}" + "_" + "{{ $vitalitas->user_id }}" + "_" +
            "{{ $vitalitas->no_kartu }}" + "_" +
            "{{ $vitalitas->pembimbing }}" + "_" +
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
