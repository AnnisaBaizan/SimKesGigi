@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Vitalitas'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Vitalitas'])

    <style>
        .custom-container {
            max-width: 100%;
            padding-right: 1px;
            padding-left: 1px;
            margin-right: 0;
            margin-left: 0;
        }

        .custom-row::before,
        .custom-row::after {
            content: "";
            display: table;
            clear: both;
        }

        .custom-col {
            float: left;
            width: 100%;
        }

        @media (min-width: 576px) {
            .custom-col-sm-1 {
                width: 12%;
            }

            .custom-col-sm-2 {
                width: 28%;
            }

            /* .custom-col-sm-3 { width: 6.25%; }
                            .custom-col-sm-4 { width: 6.25%; }
                            .custom-col-sm-5 { width: 6.25%; }
                            .custom-col-sm-6 { width: 6.25%; }
                            .custom-col-sm-7 { width: 6.25%; }
                            .custom-col-sm-8 { width: 6.25%; }
                            .custom-col-sm-9 { width: 6.25%; }
                            .custom-col-sm-10 { width: 6.25%; }
                            .custom-col-sm-11 { width: 6.25%; }
                            .custom-col-sm-12 { width: 6.25%; }
                            .custom-col-sm-13 { width: 6.25%; }
                            .custom-col-sm-14 { width: 6.25%; }
                            .custom-col-sm-15 { width: 6.25%; }
                            .custom-col-sm-16 { width: 6.25%; } */
        }
    </style>

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Input Vitalitas</h6>
            </div>

            <div class="card-body">

                <form class="user" action="{{ route('vitalitas.update', $vitalitas->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    @can('admin')
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="user_id" class="form-text">Pilih Mahasiswa :</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="js-example-basic-single form-control @error('user_id') is-invalid @enderror"
                                    data-live-search="true" id="user_id" name="user_id" placeholder="Pilih Mahasiswa"
                                    value="{{ old('user_id') }}" required>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Mahasiswa</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $vitalitas->user_id == $user->id ? 'selected' : '' }}
                                            data-pembimbing="{{ $user->pembimbing }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing"
                                    value="{{ $vitalitas->pembimbing }}" readonly required>
                                @error('pembimbing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="kartupasien_id" class="form-text">Pilih Pasien :</label>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror"
                                    data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien"
                                    value="{{ old('kartupasien_id', $vitalitas->kartupasien_id) }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($kartupasiens as $kartupasien)
                                        <option value="{{ $vitalitas->kartupasien_id }}"
                                            {{ $vitalitas->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>
                                            {{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                            <div class="col-sm-2">
                                <label for="odontogram_id" class="form-text">Pilih Odontogram :</label>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="js-example-basic-single form-control @error('odontogram_id') is-invalid @enderror"
                                    data-live-search="true" id="odontogram_id" name="odontogram_id" placeholder="Pilih Odontogram"
                                    value="{{ old('odontogram_id', $vitalitas->odontogram_id) }}" required>
                                    @error('odontogram_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($odontograms as $odontogram)
                                        <option value="{{ $vitalitas->odontogram_id }}"
                                            {{ $vitalitas->odontogram_id == $odontogram->id ? 'selected' : '' }}>
                                            {{ date_format($odontogram->created_at, 'd M Y') }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                    @can('mahasiswa')
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('user_id') is-invalid_max @enderror" id="user_id"
                                name="user_id" placeholder="user_id" value="{{ auth()->user()->id }}" required>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                id="pembimbing" name="pembimbing" placeholder="pembimbing"
                                value="{{ auth()->user()->pembimbing }}" required>
                            @error('pembimbing')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="kartupasien_id" class ="form-text">Pilih Pasien :</label>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror"
                                    data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien"
                                    value="{{ old('kartupasien_id') }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Pasien</option>
                                    @foreach ($kartupasiens as $kartupasien)
                                        <option value="{{ $kartupasien->id }}"
                                            {{ $vitalitas->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>
                                            {{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <label for="odontogram_id" class="form-text">Pilih Odontogram :</label>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="js-example-basic-single form-control @error('odontogram_id') is-invalid @enderror"
                                    data-live-search="true" id="odontogram_id" name="odontogram_id" placeholder="Pilih Odontogram"
                                    value="{{ old('odontogram_id', $vitalitas->odontogram_id) }}" required>
                                    @error('odontogram_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($odontograms as $odontogram)
                                        <option value="{{ $vitalitas->odontogram_id }}"
                                            {{ $vitalitas->odontogram_id == $odontogram->id ? 'selected' : '' }}>
                                            {{ date_format($odontogram->created_at, 'd M Y') }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Vitalitas Gigi</h6>
                        </marquee>
                    </div>

                    <div class="row text-center">
                        <div class="col-sm-3 mb-3">
                            <label for="elemen_gigi">Elemen Gigi</label>
                            <select class="js-example-basic-single form-control @error('elemen_gigi') is-invalid @enderror"
                                data-live-search="true" id="elemen_gigi" name="elemen_gigi" placeholder="Pilih Elemen Gigi"
                                value="{{ old('elemen_gigi') }}" required>
                                @error('elemen_gigi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih Elemen Gigi</option>
                                @foreach ($gigis as $gigi)
                                    <option value="{{ $gigi }}"
                                        {{ $vitalitas->elemen_gigi == $gigi ? 'selected' : '' }}>{{ $gigi }}
                                    </option>
                                @endforeach
                            </select>
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
                                value="{{ $vitalitas->masalah }}" readonly>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="inspeksi">Inspeksi</label>
                            <select class="form-control @error('inspeksi') is-invalid @enderror" id="inspeksi"
                                name="inspeksi" placeholder="75" value="{{ old('inspeksi') }}">
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
                            <select class="form-control @error('thermis') is-invalid @enderror" id="thermis"
                                name="thermis" placeholder="75" value="{{ old('thermis') }}">
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
                        <div class="col-sm-2 mb-3">
                            <label for="sondasi">Sondasi</label>
                            <select class="form-control @error('sondasi') is-invalid @enderror" id="sondasi"
                                name="sondasi" placeholder="75" value="{{ old('sondasi') }}">
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
                            <select class="form-control @error('perkusi') is-invalid @enderror" id="perkusi"
                                name="perkusi" placeholder="75" value="{{ old('perkusi') }}">
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
                        <div class="col-sm-2 mb-3">
                            <label for="druk">Druk</label>
                            <select class="form-control @error('druk') is-invalid @enderror" id="druk"
                                name="druk" placeholder="75" value="{{ old('druk') }}">
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
                            <select class="form-control @error('mobility') is-invalid @enderror" id="mobility"
                                name="mobility" placeholder="75" value="{{ old('mobility') }}">
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


                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('vitalitas.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                        <div class="col-sm-6 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
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
        // Fungsi untuk menentukan masalah
        function tentukanMasalah() {
            // Mendapatkan nilai dari elemen-elemen select
            var inspeksi = document.getElementById("inspeksi").value;
            var thermis = document.getElementById("thermis").value;
            var sondasi = document.getElementById("sondasi").value;
            var perkusi = document.getElementById("perkusi").value;
            var druk = document.getElementById("druk").value;
            var mobility = document.getElementById("mobility").value;

            // Mendapatkan elemen dengan id "masalah" untuk menampilkan hasil
            var masalahElement = document.getElementById("masalah");

            // Logika untuk menentukan masalah
            if (inspeksi == 1 && thermis == 0 && sondasi == 1 && perkusi == 0 && druk == 0 && mobility == 0) {
                masalahElement.value = "Karies Mencapai Email (KME)";
                masalahElement.style.backgroundColor = "";
            } else if (inspeksi == 1 && thermis == 1 && sondasi == 1 && perkusi == 0 && druk == 0 && mobility == 0) {
                masalahElement.value = "Karies Mencapai Dentin (KMD)";
                masalahElement.style.backgroundColor = "";
            } else if (inspeksi == 1 && thermis == 1 && sondasi == 1 && perkusi == 1 && druk == 0 && mobility == 0) {
                masalahElement.value = "Karies Mencapai Pulpa (KMP)";
                masalahElement.style.backgroundColor = "";
            } else if ((inspeksi == 1 && thermis == 1 && sondasi == 1 && perkusi == 1 && druk == 1 && mobility == 0) ||
                (inspeksi == 1 && thermis == 1 && sondasi == 1 && perkusi == 1 && druk == 0 && mobility == 1) ||
                (inspeksi == 1 && thermis == 1 && sondasi == 1 && perkusi == 1 && druk == 1 && mobility == 1)) {
                masalahElement.value = "Karies Mencapai Pulpa Vital (KMP Vital)";
                masalahElement.style.backgroundColor = "";
            } else if ((inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 0 && druk == 0 && mobility == 0) ||
                (inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 0 && druk == 0 && mobility == 1) ||
                (inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 0 && druk == 1 && mobility == 0) ||
                (inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 0 && druk == 1 && mobility == 1) ||
                (inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 1 && druk == 0 && mobility == 1) ||
                (inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 1 && druk == 1 && mobility == 1)) {
                masalahElement.value = "Sisa Akar";
                masalahElement.style.backgroundColor = "";
            } else if ((inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 1 && druk == 0 && mobility == 0) ||
                (inspeksi == 1 && thermis == 0 && sondasi == 0 && perkusi == 1 && druk == 1 && mobility == 0)) {
                masalahElement.value = "Karies Mencapai Pulpa Non Vital (KMP Non Vital)";
                masalahElement.style.backgroundColor = "";
            } else if (inspeksi == 0 && thermis == 0 && sondasi == 0 && perkusi == 0 && druk == 0 && mobility == 1) {
                masalahElement.value = "Peradangan";
                masalahElement.style.backgroundColor = "";
            } else {
                masalahElement.value = "Tidak ditemukan";
                masalahElement.style.backgroundColor = "red";
            }
        }

        // Call the tentukanMasalah function whenever a dropdown changes
        document.querySelectorAll('select').forEach(function(dropdown) {
            dropdown.addEventListener('change', tentukanMasalah);
        });

        // Initial calculation on page load
        tentukanMasalah();
    </script>
    <script>
        $(document).ready(function() {
            $('#user_id').change(function() {
                var selectedOption = $(this).find(':selected');
                var pembimbingValue = selectedOption.data('pembimbing');
                $('#pembimbing').val(pembimbingValue);
            });
        });
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#user_id').on('change', function() {
                var user_id = $("#user_id").val();
                var pembimbing = $("#pembimbing").val();

                $.ajax({
                    url: '/getPatients',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing
                    },
                    cache: false,

                    success: function(msg) {
                        $("#kartupasien_id").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#kartupasien_id').on('change', function() {
                var user_id = $("#user_id").val();
                var pembimbing = $("#pembimbing").val();
                var kartupasien_id = $("#kartupasien_id").val();

                $.ajax({
                    url: '/getOdontogram',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id
                    },
                    cache: false,

                    success: function(msg) {
                        $("#odontogram_id").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#odontogram_id').on('change', function() {
                var user_id = $("#user_id").val();
                var pembimbing = $("#pembimbing").val();
                var kartupasien_id = $("#kartupasien_id").val();
                var odontogram_id = $("#odontogram_id").val();

                $.ajax({
                    url: '/getElemenGigis',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id,
                        odontogram_id: odontogram_id
                    },
                    cache: false,

                    success: function(msg) {
                        $("#elemen_gigi").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
    </script>
@endsection
