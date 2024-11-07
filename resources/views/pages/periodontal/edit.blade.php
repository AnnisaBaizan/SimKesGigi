@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Periodontal'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Periodontal'])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Input periodontal</h6>
            </div>

            <div class="card-body">

                <form class="user" action="{{ route('periodontal.update', $periodontal->id) }}" method="post">
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
                                            {{ $periodontal->user_id == $user->id ? 'selected' : '' }}
                                            data-pembimbing="{{ $user->pembimbing }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing"
                                    value="{{ $periodontal->pembimbing }}" readonly required>
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
                                    value="{{ old('kartupasien_id', $periodontal->kartupasien_id) }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($kartupasiens as $kartupasien)
                                        <option value="{{ $periodontal->kartupasien_id }}"
                                            {{ $periodontal->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>
                                            {{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-sm-2">
                                <label for="eksplakkal_id" class="form-text">Pemeriksaan Eksplakkal :</label>
                            </div>
                            <div class="col-sm-4">
                                <select
                                    class="js-example-basic-single form-control @error('eksplakkal_id') is-invalid @enderror"
                                    data-live-search="true" id="eksplakkal_id" name="eksplakkal_id" placeholder="Pemeriksaan Eksplakkal"
                                    value="{{ old('eksplakkal_id', $periodontal->eksplakkal_id) }}" required>
                                    @error('eksplakkal_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($eksplakkals as $eksplakkal)
                                        <option value="{{ $periodontal->eksplakkal_id }}"
                                            {{ $periodontal->eksplakkal_id == $eksplakkal->id ? 'selected' : '' }}>
                                            {{ date_format($eksplakkal->created_at, 'd M Y') }}</option>
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
                                            {{ $periodontal->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>
                                            {{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Periodontal Gigi</h6>
                        </marquee>
                    </div>

                    <div class="row text-center">
                        <div class="col-sm-3 mb-3">
                            <label for="elemen_permukaan_gigi">Elemen Gigi</label>
                            <select class="js-example-basic-single form-control @error('elemen_permukaan_gigi') is-invalid @enderror"
                                data-live-search="true" id="elemen_permukaan_gigi" name="elemen_permukaan_gigi" placeholder="Pilih Elemen Permukaan Gigi"
                                value="{{ old('elemen_permukaan_gigi') }}" required>
                                @error('elemen_permukaan_gigi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih Elemen Permukaan Gigi</option>
                                @foreach ($permukaan_gigis as $permukaan_gigi)
                                    <option value="{{ $permukaan_gigi }}" {{ $periodontal->elemen_permukaan_gigi == $permukaan_gigi ? 'selected' : '' }}>{{ $permukaan_gigi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="kalkulus">kalkulus</label>
                            <input type="text" class="form-control text-center" id="kalkulus" name="kalkulus" value="{{ $periodontal->kalkulus }}" readonly>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="pocket_depth" class ="form-text">Pocket Depth :</label>
                                <div class="input-group">
                                <input type="text" class="form-control @error('pocket_depth') is-invalid @enderror"
                                    id="pocket_depth" name="pocket_depth" placeholder="pocket_depth"
                                    value="{{ old('pocket_depth', $periodontal->pocket_depth ) }}" required>
                                    <span class="input-group-text">mm</span>
                                </div>
                                @error('pocket_depth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="pocket_sakit">Pocket</label>
                            <select class="form-control @error('pocket_sakit') is-invalid @enderror" id="pocket_sakit"
                                name="pocket_sakit" placeholder="Sakit" value="{{ old('pocket_sakit') }}">
                                @error('pocket_sakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->pocket_sakit == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->pocket_sakit == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="rubor">Rubor</label>
                            <select class="form-control @error('rubor') is-invalid @enderror" id="rubor"
                                name="rubor" placeholder="Rubor" value="{{ old('rubor') }}">
                                @error('rubor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->rubor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->rubor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="tumor">Tumor</label>
                            <select class="form-control @error('tumor') is-invalid @enderror" id="tumor"
                                name="tumor" placeholder="Tumor" value="{{ old('tumor') }}">
                                @error('tumor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->tumor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->tumor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="kolor">Kolor</label>
                            <select class="form-control @error('kolor') is-invalid @enderror" id="kolor"
                                name="kolor" placeholder="Kolor" value="{{ old('kolor') }}">
                                @error('kolor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->kolor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->kolor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="dolor">Dolor</label>
                            <select class="form-control @error('dolor') is-invalid @enderror" id="dolor"
                                name="dolor" placeholder="Dolor" value="{{ old('dolor') }}">
                                @error('dolor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->dolor == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->dolor == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="fungsio">Fungsio Laesa</label>
                            <select class="form-control @error('fungsio') is-invalid @enderror" id="fungsio"
                                name="fungsio" placeholder="Fungsio Laesa" value="{{ old('fungsio') }}">
                                @error('fungsio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->fungsio == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->fungsio == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-1 mb-3">
                            <label for="attachment">Attachment</label>
                            <select class="form-control @error('attachment') is-invalid @enderror" id="attachment"
                                name="attachment" placeholder="Attachment" value="{{ old('attachment') }}">
                                @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->attachment == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->attachment == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label for="pus">PUS</label>
                            <select class="form-control @error('pus') is-invalid @enderror" id="pus"
                                name="pus" placeholder="PUS" value="{{ old('pus') }}">
                                @error('pus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled></option>
                                <option value="0" {{ $periodontal->pus == 0 ? 'selected' : '' }}>-</option>
                                <option value="1" {{ $periodontal->pus == 1 ? 'selected' : '' }}>+</option>
                            </select>
                        </div>
                        <div class="col-sm-5 mb-3 mb-sm-0">
                            <label for="dll" class ="form-text">Lain-lain :</label>
                            <textarea class="form-control @error('dll') is-invalid @enderror" id="dll" name="dll"
                                placeholder="Masukan Lain-lain" rows="1">{{ old('dll', $periodontal->dll ) }}</textarea>
                            @error('dll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-5 mb-3 mb-sm-0">
                            <label for="masalah" class ="form-text">Masalah :</label>
                            <textarea class="form-control @error('masalah') is-invalid @enderror" id="masalah" name="masalah"
                                placeholder="Masukan Masalah" rows="1">{{ old('masalah', $periodontal->masalah ) }}</textarea>
                            @error('masalah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('periodontal.index') }}" class="btn btn-success btn-block btn">
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
                    url: '/getEksplakkal',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id
                    },
                    cache: false,

                    success: function(msg) {
                        $("#eksplakkal_id").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
        
        $(document).ready(function() {
            $('#elemen_permukaan_gigi').change(function() {
                var selectedOption = $(this).find(':selected');
                var kalkulusValue = selectedOption.data('kalkulus');
                $('#kalkulus').val(kalkulusValue);
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

            $('#eksplakkal_id').on('change', function() {
                var user_id = $("#user_id").val();
                var pembimbing = $("#pembimbing").val();
                var kartupasien_id = $("#kartupasien_id").val();
                var eksplakkal_id = $("#eksplakkal_id").val();

                $.ajax({
                    url: '/getElemenPermukaanGigis',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        pembimbing: pembimbing,
                        kartupasien_id: kartupasien_id,
                        eksplakkal_id: eksplakkal_id
                    },
                    cache: false,

                    success: function(msg) {
                        $("#elemen_permukaan_gigi").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
        
        $(document).ready(function() {
            $('#elemen_permukaan_gigi').change(function() {
                var selectedOption = $(this).find(':selected');
                var kalkulusValue = selectedOption.data('kalkulus');
                $('#kalkulus').val(kalkulusValue);
            });
        });
    </script>
@endsection
