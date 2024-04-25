@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Periodontal'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Periodontal'])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Periodontal</h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Periodontal</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $periodontal->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $periodontal->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $periodontal->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $periodontal->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                        <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Kalkulus Subgingiva</h6>
                    </marquee>
                </div>

                @foreach ($periodontalSubs as $periodontalSub)
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="elemen_permukaan_gigi">Permukaan Gigi</label>
                            <input type="text" class="form-control text-center" id="elemen_permukaan_gigi"
                                name="elemen_permukaan_gigi" value="{{ $periodontalSub->elemen_permukaan_gigi }}"
                                readonly disabled>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="dll" class ="form-text">Lain-lain :</label>
                            <textarea class="form-control @error('dll') is-invalid @enderror" id="dll" name="dll" rows="1" readonly disabled>{{ old('dll', $periodontalSub->dll) }}</textarea>
                            @error('dll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="masalah" class ="form-text">Masalah :</label>
                            <textarea class="form-control @error('masalah') is-invalid @enderror" id="masalah" name="masalah" rows="1" readonly disabled>{{ old('masalah', $periodontalSub->masalah) }}</textarea>
                            @error('masalah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-2 mb-3">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="pocket_depth" class ="form-text">Pocket Depth :</label>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control @error('pocket_depth') is-invalid @enderror"
                                        id="pocket_depth" name="pocket_depth" placeholder="pocket_depth"
                                        value="{{ old('pocket_depth', $periodontalSub->pocket_depth) }}" readonly
                                        disabled>
                                    <span class="input-group-text">mm</span>
                                </div>
                                @error('pocket_depth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3"></div>
                        <div class="col-sm-1 mb-3">
                            <label for="pocket_sakit">Pocket</label>
                            <select class="form-control @error('pocket_sakit') is-invalid @enderror" id="pocket_sakit"
                                name="pocket_sakit" placeholder="Sakit" value="{{ old('pocket_sakit') }}" readonly
                                disabled>
                                @error('pocket_sakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->pocket_sakit == 0 ? 'selected' : '' }}>-
                                </option>
                                <option value="1" {{ $periodontalSub->pocket_sakit == 1 ? 'selected' : '' }}>+
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="rubor">Rubor</label>
                            <select class="form-control @error('rubor') is-invalid @enderror" id="rubor"
                                name="rubor" placeholder="Rubor" value="{{ old('rubor') }}" readonly disabled>
                                @error('rubor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->rubor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSub->rubor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="tumor">Tumor</label>
                            <select class="form-control @error('tumor') is-invalid @enderror" id="tumor"
                                name="tumor" placeholder="Tumor" value="{{ old('tumor') }}" readonly disabled>
                                @error('tumor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->tumor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSub->tumor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="kolor">Kolor</label>
                            <select class="form-control @error('kolor') is-invalid @enderror" id="kolor"
                                name="kolor" placeholder="Kolor" value="{{ old('kolor') }}" readonly disabled>
                                @error('kolor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->kolor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSub->kolor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="dolor">Dolor</label>
                            <select class="form-control @error('dolor') is-invalid @enderror" id="dolor"
                                name="dolor" placeholder="Dolor" value="{{ old('dolor') }}" readonly disabled>
                                @error('dolor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->dolor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSub->dolor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="fungsio">Fungsio Laesa</label>
                            <select class="form-control @error('fungsio') is-invalid @enderror" id="fungsio"
                                name="fungsio" placeholder="Fungsio Laesa" value="{{ old('fungsio') }}" readonly
                                disabled>
                                @error('fungsio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->fungsio == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSub->fungsio == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="attachment">Attachment</label>
                            <select class="form-control @error('attachment') is-invalid @enderror" id="attachment"
                                name="attachment" placeholder="Attachment" value="{{ old('attachment') }}" readonly
                                disabled>
                                @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->attachment == 0 ? 'selected' : '' }}>-
                                </option>
                                <option value="1" {{ $periodontalSub->attachment == 1 ? 'selected' : '' }}>+
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="pus">PUS</label>
                            <select class="form-control @error('pus') is-invalid @enderror" id="pus"
                                name="pus" placeholder="PUS" value="{{ old('pus') }}" readonly disabled>
                                @error('pus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSub->pus == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSub->pus == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        {{-- <div class="col-sm-1 mb-3"></div> --}}
                    </div>
                @endforeach

                <hr class="my-3 w-100 border-top border-dark border-1 d-print-block">


                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                        <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Kalkulus Supragingiva</h6>
                    </marquee>
                </div>

                @foreach ($periodontalSupras as $periodontalSupra)
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="elemen_permukaan_gigi">Permukaan Gigi</label>
                            <input type="text" class="form-control text-center" id="elemen_permukaan_gigi"
                                name="elemen_permukaan_gigi" value="{{ $periodontalSupra->elemen_permukaan_gigi }}"
                                readonly disabled>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="dll" class ="form-text">Lain-lain :</label>
                            <textarea class="form-control @error('dll') is-invalid @enderror" id="dll" name="dll"  rows="1" readonly disabled>{{ old('dll', $periodontalSupra->dll) }}</textarea>
                            @error('dll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="masalah" class ="form-text">Masalah :</label>
                            <textarea class="form-control @error('masalah') is-invalid @enderror" id="masalah" name="masalah" rows="1" readonly disabled>{{ old('masalah', $periodontalSupra->masalah) }}</textarea>
                            @error('masalah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-2 mb-3">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="pocket_depth" class ="form-text">Pocket Depth :</label>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control @error('pocket_depth') is-invalid @enderror"
                                        id="pocket_depth" name="pocket_depth" placeholder="pocket_depth"
                                        value="{{ old('pocket_depth', $periodontalSupra->pocket_depth) }}" readonly
                                        disabled>
                                    <span class="input-group-text">mm</span>
                                </div>
                                @error('pocket_depth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3"></div>
                        <div class="col-sm-1 mb-3">
                            <label for="pocket_sakit">Pocket</label>
                            <select class="form-control @error('pocket_sakit') is-invalid @enderror" id="pocket_sakit"
                                name="pocket_sakit" placeholder="Sakit" value="{{ old('pocket_sakit') }}" readonly
                                disabled>
                                @error('pocket_sakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->pocket_sakit == 0 ? 'selected' : '' }}>-
                                </option>
                                <option value="1" {{ $periodontalSupra->pocket_sakit == 1 ? 'selected' : '' }}>+
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="rubor">Rubor</label>
                            <select class="form-control @error('rubor') is-invalid @enderror" id="rubor"
                                name="rubor" placeholder="Rubor" value="{{ old('rubor') }}" readonly disabled>
                                @error('rubor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->rubor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSupra->rubor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="tumor">Tumor</label>
                            <select class="form-control @error('tumor') is-invalid @enderror" id="tumor"
                                name="tumor" placeholder="Tumor" value="{{ old('tumor') }}" readonly disabled>
                                @error('tumor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->tumor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSupra->tumor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="kolor">Kolor</label>
                            <select class="form-control @error('kolor') is-invalid @enderror" id="kolor"
                                name="kolor" placeholder="Kolor" value="{{ old('kolor') }}" readonly disabled>
                                @error('kolor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->kolor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSupra->kolor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="dolor">Dolor</label>
                            <select class="form-control @error('dolor') is-invalid @enderror" id="dolor"
                                name="dolor" placeholder="Dolor" value="{{ old('dolor') }}" readonly disabled>
                                @error('dolor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->dolor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSupra->dolor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="fungsio">Fungsio Laesa</label>
                            <select class="form-control @error('fungsio') is-invalid @enderror" id="fungsio"
                                name="fungsio" placeholder="Fungsio Laesa" value="{{ old('fungsio') }}" readonly
                                disabled>
                                @error('fungsio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->fungsio == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSupra->fungsio == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="attachment">Attachment</label>
                            <select class="form-control @error('attachment') is-invalid @enderror" id="attachment"
                                name="attachment" placeholder="Attachment" value="{{ old('attachment') }}" readonly
                                disabled>
                                @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->attachment == 0 ? 'selected' : '' }}>-
                                </option>
                                <option value="1" {{ $periodontalSupra->attachment == 1 ? 'selected' : '' }}>+
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="pus">PUS</label>
                            <select class="form-control @error('pus') is-invalid @enderror" id="pus"
                                name="pus" placeholder="PUS" value="{{ old('pus') }}" readonly disabled>
                                @error('pus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontalSupra->pus == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontalSupra->pus == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        {{-- <div class="col-sm-1 mb-3"></div> --}}
                    </div>
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
                            {{ ucwords(get_v('users', 'nimnip', $periodontal->pembimbing, 'username')[0]->username ?? '') }}
                            <br>
                            NIP. {{ $periodontal->pembimbing }}
                        </div>
                    </div>
                @endcan

            </div>

            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('periodontal.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('periodontal.index') }}" class="btn btn-success btn-block btn">
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
        var qrText = "{{ $periodontal->id }}" + "_" + "{{ $periodontal->user_id }}" + "_" +
            "{{ $periodontal->no_kartu }}" + "_" +
            "{{ $periodontal->pembimbing }}" + "_" +
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
