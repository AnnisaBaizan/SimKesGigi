@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Pelaksanaan'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Pelaksanaan'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Input Pelaksanaan</h6>
            </div>

            <div class="card-body">

                <form class="user" action="{{ route('pelaksanaan.store') }}" method="post">
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
                                        {{-- <option value="{{ $user->id }}" data-pembimbing="{{ $user->pembimbing }}"> --}}
                                        <option value="{{ $user->id }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing" readonly required>
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
                                    value="{{ old('kartupasien_id') }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Pasien</option>
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
                                        <option value="{{ $kartupasien->id }}" data-pembimbing="{{ $kartupasien->pembimbing }}">{{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Pelaksanaan Gigi</h6>
                        </marquee>
                    </div>


                    <div class="row text-center mt-2">
                        <div class="col-sm-2 mb-3">
                            <label for="gigi" class="form-text">Gigi :</label>
                            <select class="js-example-basic-single form-control @error('gigi') is-invalid @enderror"
                                data-live-search="true" id="gigi" name="gigi" placeholder="Pilih Gigi"
                                value="{{ old('gigi') }}" required>
                                @error('gigi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih Gigi</option>
                                @foreach ($gigis as $gigi)
                                    <option value="{{ $gigi->kode }}">
                                        {{ $gigi->kode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="diagnosa_id" class ="form-text text-center">Diagnosa_id :</label>
                            <input type="text"
                                class="form-control text-center @error('diagnosa_id') is-invalid_max @enderror"
                                id="diagnosa_id" name="diagnosa_id" placeholder="diagnosa_id"
                                value="{{ old('diagnosa_id') }}" readonly required>
                            @error('diagnosa_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-8 mb-3">
                            <div style="text-align: left; background-color: rgb(219, 219, 219);" id=previewDiagnosa>
                                <center><b>Preview Diagnosa</b></center>
                            </div>
                        </div>

                    </div>

                    <div class="row text-center">

                        <div class="col-sm-4 mb-3">
                            <label for="intervensi" class ="form-text">Intervensi Perawatan:</label>
                            <textarea class="form-control @error('intervensi') is-invalid @enderror" id="intervensi" name="intervensi"
                                placeholder="Masukan intervensi Perawatan Anda">{{ old('intervensi') }}</textarea>
                            @error('intervensi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="hasil" class ="form-text">Hasil Perawatan :</label>
                            <textarea class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil"
                                placeholder="Masukan Hasil Perawatan Anda">{{ old('hasil') }}</textarea>
                            @error('indikator')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="rencana" class ="form-text">Rencana Tindak Lanjut :</label>
                            <textarea class="form-control @error('rencana') is-invalid @enderror" id="rencana" name="rencana"
                                placeholder="Masukan Rencana Tindak Lanjut Anda">{{ old('rencana') }}</textarea>
                            @error('rencana')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('pelaksanaan.index') }}" class="btn btn-success btn-block btn">
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
            $('#kartupasien_id').change(function() {
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
                    url: '/getGigis',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id
                    },
                    cache: false,

                    success: function(msg) {
                        $("#gigi").html(msg);
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

            $('#gigi').on('change', function() {
                var user_id = $("#user_id").val();
                var pembimbing = $("#pembimbing").val();
                var kartupasien_id = $("#kartupasien_id").val();
                var gigi = $("#gigi").val();

                $.ajax({
                    url: '/getPreviewDiagnosas',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id,
                        gigi: gigi
                    },
                    cache: false,

                    success: function(msg) {
                        $("#previewDiagnosa").html(msg);
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

            $('#gigi').on('change', function() {
                var user_id = $("#user_id").val();
                var pembimbing = $("#pembimbing").val();
                var kartupasien_id = $("#kartupasien_id").val();
                var gigi = $("#gigi").val();

                $.ajax({
                    url: '/getDiagnosa',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id,
                        gigi: gigi
                    },
                    cache: false,

                    success: function(msg) {
                        $("#diagnosa_id").val(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
    </script>
    
@endsection
