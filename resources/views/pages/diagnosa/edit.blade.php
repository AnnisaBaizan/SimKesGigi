@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Diagnosis'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Diagnosa'])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Input Diagnosa</h6>
            </div>

            <div class="card-body">

                <form class="user" action="{{ route('diagnosa.update', $diagnosa->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    @can('admin')
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="user_id" class="form-text">Pilih Mahasiswa :</label>
                            </div>
                            <div class="col-sm-4">
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
                                        {{-- <option value="{{ $user->id }}" {{ $diagnosa->user_id == $user->id ? 'selected' : '' }} data-pembimbing="{{ $user->pembimbing }}"> --}}
                                        <option value="{{ $user->id }}" {{ $diagnosa->user_id == $user->id ? 'selected' : '' }}>
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing"
                                    value="{{ $diagnosa->pembimbing }}" readonly required>
                                @error('pembimbing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="kartupasien_id" class="form-text">Pilih Pasien :</label>
                            </div>
                            <div class="col-sm-8">
                                <select
                                    class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror"
                                    data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien"
                                    value="{{ old('kartupasien_id', $diagnosa->kartupasien_id) }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($kartupasiens as $kartupasien)
                                        <option value="{{ $diagnosa->kartupasien_id }}"
                                            {{ $diagnosa->kartupasien_id == $kartupasien->id ? 'selected' : '' }} data-pembimbing="{{ $kartupasien->pembimbing }}">
                                            {{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
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
                            <div class="col-sm-4">
                                <label for="kartupasien_id" class ="form-text">Pilih Pasien :</label>
                            </div>
                            <div class="col-sm-8">
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
                                            {{ $diagnosa->kartupasien_id == $kartupasien->id ? 'selected' : '' }} data-pembimbing="{{ $kartupasien->pembimbing }}">
                                            {{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Diagnosa Gigi</h6>
                        </marquee>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-1 mb-3 mb-sm-0">
                            <label for="gigi" class="form-text">Gigi :</label>
                            <select class="js-example-basic-single form-control @error('gigi') is-invalid @enderror"
                                data-live-search="true" id="gigi" name="gigi" placeholder="Pilih Gigi"
                                value="{{ old('gigi', $diagnosa->gigi) }}" required>
                                @error('gigi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih Gigi</option>
                                @foreach ($gigis as $gigi)
                                    <option value="{{ $gigi->kode }}"
                                        {{ $diagnosa->gigi == $gigi->kode ? 'selected' : '' }}>
                                        {{ $gigi->kode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-11 mb-3 mb-sm-0">
                            <label for="masalah" class ="form-text">Masalah :</label>
                            <textarea class="form-control @error('masalah') is-invalid @enderror" id="masalah" name="masalah"
                                placeholder="Masukan Masalah" rows="1" required>{{ old('masalah', $diagnosa->masalah) }}</textarea>
                            @error('masalah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div id="diagnosas">
                        @php
                            $a = 0; // inisialisasi variabel a
                        @endphp

                        @foreach (explode('|', $diagnosa->askepgilut) as $id_askep)
                            <div class="diagnosa">
                                <hr class="my-3 w-100 border-top border-dark border-1 d-print-block">
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                                    <div class="col-sm-11 mb-3 mb-sm-0">
                                        <label for="askepgilut_{{ $a }}" class="form-text">Diagnosis
                                            Askepgilut
                                            :</label>
                                        <select class="js-example-basic-single form-control askepgilut-select"
                                            data-live-search="true" id="askepgilut_{{ $a }}"
                                            name="diagnosa[{{ $a }}][askepgilut][]"
                                            placeholder="Pilih askepgilut" required>
                                            <option value="" selected disabled>Pilih Askepgilut</option>
                                            @foreach ($askepgiluts as $askepgilut)
                                                <option value="{{ $askepgilut->id }}"
                                                    {{ $askepgilut->id == $id_askep ? 'selected' : '' }}>
                                                    {{ $askepgilut->askepgilut }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                                    <div class="col-sm-11 mb-6 mb-sm-0">
                                        <label for="penyebab_{{ $a }}" class="form-text">Penyebab
                                            :</label>
                                        <select class="js-example-basic-multiple form-control penyebab-select"
                                            data-live-search="true" id="penyebab_{{ $a }}"
                                            name="diagnosa[{{ $a }}][penyebab][]" placeholder="Pilih Penyebab"
                                            multiple="multiple" required>
                                            <option value="" disabled>Pilih penyebab</option>
                                            @foreach (get_c('penyebabs', 'askepgilut_id', $id_askep) as $penyebabI)
                                                <option value="{{ $penyebabI->id }}"
                                                    {{ in_array($penyebabI->id, explode(',', $penyebab[$a])) ? 'selected' : '' }}>
                                                    {{ $penyebabI->penyebab }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                                    <div class="col-sm-11 mb-6 mb-sm-0">
                                        <label for="gejala_{{ $a }}" class="form-text">Gejala
                                            :</label>
                                        <select class="js-example-basic-multiple form-control gejala-select"
                                            data-live-search="true" id="gejala_{{ $a }}"
                                            name="diagnosa[{{ $a }}][gejala][]" placeholder="Pilih gejala"
                                            multiple="multiple" required>
                                            <option value="" disabled>Pilih gejala</option>
                                            @foreach (get_c('gejalas', 'askepgilut_id', $id_askep) as $gejalaI)
                                                <option value="{{ $gejalaI->id }}"
                                                    {{ in_array($gejalaI->id, explode(',', $gejala[$a])) ? 'selected' : '' }}>
                                                    {{ $gejalaI->gejala }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 d-grid">
                                        <button type="button" class="btn btn-danger btn-block removeDiagnosas"
                                            name="removeDiagnosas" id="removeDiagnosas" value="removeDiagnosas">
                                            <i class="fas fa-minus fa-fw"></i> Hapus Diagnosis
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @php
                                $a++; // menambahkan nilai variabel a
                            @endphp
                        @endforeach
                    </div>

                    <div class="form-group row d-flex justify-content-end">
                        <div class="col-sm-3 d-grid">
                            <button type="button" class="btn btn-warning btn-block" id="addDiagnosas"
                                name="addDiagnosas" value="addDiagnosas">
                                <i class="fas fa-plus fa-fw"></i> Tambah Diagnosis
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('diagnosa.index') }}" class="btn btn-success btn-block btn">
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
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-multiple').select2();

            // Iterate over askepgilutArray and bind change event handlers
            var askepgiluts = "{{ $diagnosa->askepgilut }}";
            var askepgilutArray = askepgiluts.split('|');
            for (var a = 0; a < askepgilutArray.length; a++) {
                (function(a) {
                    $('#askepgilut_' + a).on('change', function() {
                        var askepgilut = $(this).val();
                        var index = $(this).attr('id').split('_')[1];

                        $.ajax({
                            url: '/getPenyebabs',
                            type: 'POST',
                            data: {
                                askepgilut: askepgilut
                            },
                            cache: false,
                            success: function(msg) {
                                $("#penyebab_" + index).html(msg);
                                $("#penyebab_" + index).select2();
                            },
                            error: function(data) {
                                console.log('error:', data);
                            }
                        });

                        $.ajax({
                            url: '/getGejalas',
                            type: 'POST',
                            data: {
                                askepgilut: askepgilut
                            },
                            cache: false,
                            success: function(msg) {
                                $("#gejala_" + index).html(msg);
                                $("#gejala_" + index).select2();
                            },
                            error: function(data) {
                                console.log('error:', data);
                            }
                        });
                    });
                })(a);
            }
        });
    </script>
    <script>
        var askepgiluts = "{{ $diagnosa->askepgilut }}";
        var askepgilutArray = askepgiluts.split('|');
        var a = askepgilutArray.length;
        // console.log(a);
        $(document).ready(function() {
            $('#addDiagnosas').on('click', function() {
                var container = $('#diagnosas');
                var diagnosaDiv = $('<div class="diagnosa"></div>');
                diagnosaDiv.html(`
                <hr class="my-3 w-100 border-top border-dark border-1 d-print-block">
                <div class="form-group row">
                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                    <div class="col-sm-11 mb-3 mb-sm-0">
                        <label for="askepgilut_` + a + `" class="form-text">Diagnosis Askepgilut :</label>
                        <select
                            class="js-example-basic-single form-control askepgilut-select"
                            data-live-search="true" id="askepgilut_` + a + `" name="diagnosa[` + a + `][askepgilut][]"
                            placeholder="Pilih askepgilut" required>
                            <option value="" selected disabled>Pilih Askepgilut</option>
                            @foreach ($askepgiluts as $askepgilut)
                                <option value="{{ $askepgilut->id }}">
                                    {{ $askepgilut->askepgilut }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                    <div class="col-sm-11 mb-6 mb-sm-0">
                        <label for="penyebab_` + a + `" class ="form-text">Penyebab :</label>
                        <select
                            class="js-example-basic-multiple form-control penyebab-select"
                            data-live-search="true" id="penyebab_` + a + `" name="diagnosa[` + a + `][penyebab][]"
                            placeholder="Pilih Penyebab" multiple="multiple" required>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                    <div class="col-sm-11 mb-3 mb-sm-0">
                        <label for="gejala_` + a + `" class ="form-text">Gejala :</label>
                        <select
                            class="js-example-basic-multiple form-control gejala-select"
                            data-live-search="true" id="gejala_` + a + `" name="diagnosa[` + a + `][gejala][]"
                            placeholder="Pilih Gejala" multiple="multiple" required>
                        </select>
                    </div>
                </div>`);

                container.append(diagnosaDiv);

                $('.js-example-basic-single').select2();
                $('.js-example-basic-multiple').select2();

                $('#askepgilut_' + a).on('change', function() {
                    var askepgilut = $(this).val();
                    var index = $(this).attr('id').split('_')[1];

                    $.ajax({
                        url: '/getPenyebabs',
                        type: 'POST',
                        data: {
                            askepgilut: askepgilut
                        },
                        cache: false,

                        success: function(msg) {
                            $("#penyebab_" + index).html(msg);
                            $("#penyebab_" + index).select2();
                        },

                        error: function(data) {
                            console.log('error:', data);
                        }
                    });

                    $.ajax({
                        url: '/getGejalas',
                        type: 'POST',
                        data: {
                            askepgilut: askepgilut
                        },
                        cache: false,

                        success: function(msg) {
                            $("#gejala_" + index).html(msg);
                            $("#gejala_" + index).select2();
                        },

                        error: function(data) {
                            console.log('error:', data);
                        }
                    });
                });

                var deleteButton = $(`<div class="form-group row">
                        <div class="col-sm-2 d-grid">
                            <button type="button" class="btn btn-danger btn-block removeDiagnosas"
                                name="removeDiagnosas" value="removeDiagnosas">
                                <i class="fas fa-minus fa-fw"></i> Hapus Diagnosis
                            </button>
                        </div>
                    </div>`);
                deleteButton.on('click', function() {
                    diagnosaDiv.remove(); // Hapus elemen saat tombol "Hapus" diklik
                });
                diagnosaDiv.append(deleteButton);
                ++a;
            });
        });

        $(document).on('click', '.removeDiagnosas', function() {
            $(this).closest('.diagnosa').remove();
        });
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#user_id').change(function() {
        //         var selectedOption = $(this).find(':selected');
        //         var pembimbingValue = selectedOption.data('pembimbing');
        //         $('#pembimbing').val(pembimbingValue);
        //     });
        // });

        $(document).ready(function() {
            // Fungsi untuk mengupdate nilai pembimbing
            function updatePembimbing() {
                var selectedOption = $('#kartupasien_id').find(':selected');
                var pembimbingValue = selectedOption.data('pembimbing');
                $('#pembimbing').val(pembimbingValue);
            }

            // Jalankan fungsi saat halaman dimuat
            updatePembimbing();

            // Jalankan fungsi saat elemen dengan id "kartupasien_id" diubah
            $('#kartupasien_id').change(function() {
                updatePembimbing();
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
                // var pembimbing = $("#pembimbing").val();

                $.ajax({
                    url: '/getPatients',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        // pembimbing: pembimbing
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

    {{-- <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#askepgilut').on('change', function() {
                var askepgilut = $("#askepgilut").val();

                $.ajax({
                    url: '/getPenyebabs',
                    type: 'POST',
                    data: {
                        askepgilut: askepgilut
                    },
                    cache: false,

                    success: function(msg) {
                        $("#penyebab").html(msg);
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

            $('#askepgilut').on('change', function() {
                var askepgilut = $("#askepgilut").val();

                $.ajax({
                    url: '/getGejalas',
                    type: 'POST',
                    data: {
                        askepgilut: askepgilut
                    },
                    cache: false,

                    success: function(msg) {
                        $("#gejala").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
    </script> --}}
@endsection
