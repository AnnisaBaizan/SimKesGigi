@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Anomali Gigi dan Mukosa Mulut'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Anomali Gigi dan Mukosa Mulut'])
    
    
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
                <h6 class="m-0 font-weight-bold text-primary">Formulir Input Anomali Gigi dan Mukosa Mulut</h6>
            </div>

            <div class="card-body">

                <form class="user" action="{{ route('anomalimukosa.update', $anomalimukosa->id) }}}" method="post">
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
                                        <option value="{{ $user->id }}" {{ $anomalimukosa->user_id == $user->id ? 'selected' : '' }} data-pembimbing="{{ $user->pembimbing }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing" value="{{ $anomalimukosa->pembimbing }}" readonly required>
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
                                    value="{{ old('kartupasien_id', $anomalimukosa->kartupasien_id) }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($kartupasiens as $kartupasien)
                                    <option value="{{ $anomalimukosa->kartupasien_id }}" {{ $anomalimukosa->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>{{ $kartupasien->no_kartu }} |
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
                                        <option value="{{ $kartupasien->id }}" {{ $anomalimukosa->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>{{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan


                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Anomali Gigi</h6>
                        </marquee>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="occlusi" class ="form-text">Occlusi :</label>
                            <select class="form-control @error('occlusi') is-invalid @enderror" id="occlusi"
                                name="occlusi" placeholder="pilih" value="{{ old('occlusi') }}" required>
                                @error('occlusi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Normal bite" {{$anomalimukosa->occlusi == "Normal bite" ? 'selected':''}}>Normal bite</option>
                                <option value="Cross bite" {{$anomalimukosa->occlusi == "Cross bite" ? 'selected':''}}>Cross bite</option>
                                <option value="Steep bite" {{$anomalimukosa->occlusi == "Steep bite" ? 'selected':''}}>Steep bite</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="bentuk" class ="form-text">Bentuk :</label>
                            <select class="form-control @error('bentuk') is-invalid @enderror" id="bentuk"
                                name="bentuk" placeholder="pilih" value="{{ old('bentuk') }}" required>
                                @error('bentuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Normal" {{$anomalimukosa->bentuk == "Normal" ? 'selected':''}}>Normal</option>
                                <option value="Abnormal" {{$anomalimukosa->bentuk == "Abnormal" ? 'selected':''}}>Abnormal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="warna" class ="form-text">Warna :</label>
                            <select class="form-control @error('warna') is-invalid @enderror" id="warna"
                                name="warna" placeholder="pilih" value="{{ old('warna') }}" required>
                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Normal" {{$anomalimukosa->warna == "Normal" ? 'selected':''}}>Normal</option>
                                <option value="Abnormal" {{$anomalimukosa->warna == "Abnormal" ? 'selected':''}}>Abnormal</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="posisi" class ="form-text">Posisi :</label>
                            <select class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                name="posisi" placeholder="pilih" value="{{ old('posisi') }}" required>
                                @error('posisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Normal" {{$anomalimukosa->posisi == "Normal" ? 'selected':''}}>Normal</option>
                                <option value="Abnormal" {{$anomalimukosa->posisi == "Abnormal" ? 'selected':''}}>Abnormal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="ukuran" class ="form-text">Ukuran :</label>
                            <select class="form-control @error('ukuran') is-invalid @enderror" id="ukuran"
                                name="ukuran" placeholder="pilih" value="{{ old('ukuran') }}" required>
                                @error('ukuran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Normal" {{$anomalimukosa->ukuran == "Normal" ? 'selected':''}}>Normal</option>
                                <option value="Abnormal" {{$anomalimukosa->ukuran == "Abnormal" ? 'selected':''}}>Abnormal</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="struktur" class ="form-text">Struktur :</label>
                            <select class="form-control @error('struktur') is-invalid @enderror" id="struktur"
                                name="struktur" placeholder="pilih" value="{{ old('struktur') }}" required>
                                @error('struktur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih</option>
                                <option value="Normal" {{$anomalimukosa->struktur == "Normal" ? 'selected':''}}>Normal</option>
                                <option value="Abnormal" {{$anomalimukosa->struktur == "Abnormal" ? 'selected':''}}>Abnormal</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Mukosa Mulut</h6>
                        </marquee>
                    </div>
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        {{-- <center> --}}
                        <h6
                            class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical">
                            - Lidah - </h6>
                        {{-- </center> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="w_lidah" class ="form-text">Perubahan Warna :</label>
                            <select class="form-control @error('w_lidah') is-invalid @enderror" id="w_lidah"
                                name="w_lidah" placeholder="Pilih" value="{{ old('w_lidah') }}" required>
                                @error('w_lidah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Perubahan Warna</option>
                                <option value="Ada" {{$anomalimukosa->w_lidah == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->w_lidah == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="dw_lidah" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('dw_lidah') is-invalid @enderror"
                                id="dw_lidah" name="dw_lidah" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('dw_lidah', $anomalimukosa->dw_lidah) }}" disabled>
                            @error('dw_lidah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="i_lidah" class ="form-text">Inflamasi :</label>
                            <select class="form-control @error('i_lidah') is-invalid @enderror" id="i_lidah"
                                name="i_lidah" placeholder="pilih" value="{{ old('i_lidah') }}" required>
                                @error('i_lidah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Inflamasi</option>
                                <option value="Ada" {{$anomalimukosa->i_lidah == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->i_lidah == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="di_lidah" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('di_lidah') is-invalid @enderror"
                                id="di_lidah" name="di_lidah" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('di_lidah', $anomalimukosa->di_lidah) }}" disabled>
                            @error('di_lidah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="u_lidah" class ="form-text">Ulserasi :</label>
                            <select class="form-control @error('u_lidah') is-invalid @enderror" id="u_lidah"
                                name="u_lidah" placeholder="pilih" value="{{ old('u_lidah') }}" required>
                                @error('u_lidah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Ulserasi</option>
                                <option value="Ada" {{$anomalimukosa->u_lidah == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->u_lidah == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="du_lidah" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('du_lidah') is-invalid @enderror"
                                id="du_lidah" name="du_lidah" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('du_lidah', $anomalimukosa->du_lidah) }}" disabled>
                            @error('du_lidah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        {{-- <center> --}}
                        <h6
                            class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical">
                            - Pipi - </h6>
                        {{-- </center> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="w_pipi" class ="form-text">Perubahan Warna :</label>
                            <select class="form-control @error('w_pipi') is-invalid @enderror" id="w_pipi"
                                name="w_pipi" placeholder="Pilih" value="{{ old('w_pipi') }}" required>
                                @error('w_pipi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Perubahan Warna</option>
                                <option value="Ada" {{$anomalimukosa->w_pipi == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->w_pipi == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="dw_pipi" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('dw_pipi') is-invalid @enderror"
                                id="dw_pipi" name="dw_pipi" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('dw_pipi', $anomalimukosa->dw_pipi) }}" disabled>
                            @error('dw_pipi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="i_pipi" class ="form-text">Inflamasi :</label>
                            <select class="form-control @error('i_pipi') is-invalid @enderror" id="i_pipi"
                                name="i_pipi" placeholder="pilih" value="{{ old('i_pipi') }}" required>
                                @error('i_pipi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Inflamasi</option>
                                <option value="Ada" {{$anomalimukosa->i_pipi == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->i_pipi == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="di_pipi" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('di_pipi') is-invalid @enderror"
                                id="di_pipi" name="di_pipi" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('di_pipi', $anomalimukosa->di_pipi) }}" disabled>
                            @error('di_pipi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="u_pipi" class ="form-text">Ulserasi :</label>
                            <select class="form-control @error('u_pipi') is-invalid @enderror" id="u_pipi"
                                name="u_pipi" placeholder="pilih" value="{{ old('u_pipi') }}" required>
                                @error('u_pipi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Ulserasi</option>
                                <option value="Ada" {{$anomalimukosa->u_pipi == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->u_pipi == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="du_pipi" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('du_pipi') is-invalid @enderror"
                                id="du_pipi" name="du_pipi" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('du_pipi', $anomalimukosa->du_pipi) }}" disabled>
                            @error('du_pipi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        {{-- <center> --}}
                        <h6
                            class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical">
                            - Palatum - </h6>
                        {{-- </center> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="w_palatum" class ="form-text">Perubahan Warna :</label>
                            <select class="form-control @error('w_palatum') is-invalid @enderror" id="w_palatum"
                                name="w_palatum" placeholder="Pilih" value="{{ old('w_palatum') }}" required>
                                @error('w_palatum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Perubahan Warna</option>
                                <option value="Ada" {{$anomalimukosa->w_palatum == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->w_palatum == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="dw_palatum" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('dw_palatum') is-invalid @enderror"
                                id="dw_palatum" name="dw_palatum" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('dw_palatum', $anomalimukosa->dw_palatum) }}" disabled>
                            @error('dw_palatum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="i_palatum" class ="form-text">Inflamasi :</label>
                            <select class="form-control @error('i_palatum') is-invalid @enderror" id="i_palatum"
                                name="i_palatum" placeholder="pilih" value="{{ old('i_palatum') }}" required>
                                @error('i_palatum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Inflamasi</option>
                                <option value="Ada" {{$anomalimukosa->i_palatum == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->i_palatum == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="di_palatum" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('di_palatum') is-invalid @enderror"
                                id="di_palatum" name="di_palatum" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('di_palatum', $anomalimukosa->di_palatum) }}" disabled>
                            @error('di_palatum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="u_palatum" class ="form-text">Ulserasi :</label>
                            <select class="form-control @error('u_palatum') is-invalid @enderror" id="u_palatum"
                                name="u_palatum" placeholder="pilih" value="{{ old('u_palatum') }}" required>
                                @error('u_palatum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Ulserasi</option>
                                <option value="Ada" {{$anomalimukosa->u_palatum == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->u_palatum == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="du_palatum" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('du_palatum') is-invalid @enderror"
                                id="du_palatum" name="du_palatum" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('du_palatum', $anomalimukosa->du_palatum) }}" disabled>
                            @error('du_palatum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        {{-- <center> --}}
                        <h6
                            class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical">
                            - Gingiva - </h6>
                        {{-- </center> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="w_gingiva" class ="form-text">Perubahan Warna :</label>
                            <select class="form-control @error('w_gingiva') is-invalid @enderror" id="w_gingiva"
                                name="w_gingiva" placeholder="Pilih" value="{{ old('w_gingiva') }}" required>
                                @error('w_gingiva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Perubahan Warna</option>
                                <option value="Ada" {{$anomalimukosa->w_gingiva == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->w_gingiva == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="dw_gingiva" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('dw_gingiva') is-invalid @enderror"
                                id="dw_gingiva" name="dw_gingiva" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('dw_gingiva', $anomalimukosa->dw_gingiva) }}" disabled>
                            @error('dw_gingiva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="i_gingiva" class ="form-text">Inflamasi :</label>
                            <select class="form-control @error('i_gingiva') is-invalid @enderror" id="i_gingiva"
                                name="i_gingiva" placeholder="pilih" value="{{ old('i_gingiva') }}" required>
                                @error('i_gingiva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Inflamasi</option>
                                <option value="Ada" {{$anomalimukosa->i_gingiva == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->i_gingiva == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="di_gingiva" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('di_gingiva') is-invalid @enderror"
                                id="di_gingiva" name="di_gingiva" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('di_gingiva', $anomalimukosa->di_gingiva) }}" disabled>
                            @error('di_gingiva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="u_gingiva" class ="form-text">Ulserasi :</label>
                            <select class="form-control @error('u_gingiva') is-invalid @enderror" id="u_gingiva"
                                name="u_gingiva" placeholder="pilih" value="{{ old('u_gingiva') }}" required>
                                @error('u_gingiva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Ulserasi</option>
                                <option value="Ada" {{$anomalimukosa->u_gingiva == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->u_gingiva == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="du_gingiva" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('du_gingiva') is-invalid @enderror"
                                id="du_gingiva" name="du_gingiva" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('du_gingiva', $anomalimukosa->du_gingiva) }}" disabled>
                            @error('du_gingiva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                        {{-- <center> --}}
                        <h6
                            class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical">
                            - Bibir - </h6>
                        {{-- </center> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="w_bibir" class ="form-text">Perubahan Warna :</label>
                            <select class="form-control @error('w_bibir') is-invalid @enderror" id="w_bibir"
                                name="w_bibir" placeholder="Pilih" value="{{ old('w_bibir') }}" required>
                                @error('w_bibir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Perubahan Warna</option>
                                <option value="Ada" {{$anomalimukosa->w_bibir == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->w_bibir == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="dw_bibir" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('dw_bibir') is-invalid @enderror"
                                id="dw_bibir" name="dw_bibir" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('dw_bibir', $anomalimukosa->dw_bibir) }}" disabled>
                            @error('dw_bibir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="i_bibir" class ="form-text">Inflamasi :</label>
                            <select class="form-control @error('i_bibir') is-invalid @enderror" id="i_bibir"
                                name="i_bibir" placeholder="pilih" value="{{ old('i_bibir') }}" required>
                                @error('i_bibir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Inflamasi</option>
                                <option value="Ada" {{$anomalimukosa->i_bibir == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->i_bibir == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="di_bibir" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('di_bibir') is-invalid @enderror"
                                id="di_bibir" name="di_bibir" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('di_bibir', $anomalimukosa->di_bibir) }}" disabled>
                            @error('di_bibir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="u_bibir" class ="form-text">Ulserasi :</label>
                            <select class="form-control @error('u_bibir') is-invalid @enderror" id="u_bibir"
                                name="u_bibir" placeholder="pilih" value="{{ old('u_bibir') }}" required>
                                @error('u_bibir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Ulserasi</option>
                                <option value="Ada" {{$anomalimukosa->u_bibir == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anomalimukosa->u_bibir == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="du_bibir" class ="form-text">Daerah Mana :</label>
                            <input type="text" class="form-control @error('du_bibir') is-invalid @enderror"
                                id="du_bibir" name="du_bibir" placeholder="Tuliskan Nama Daerah-nya"
                                value="{{ old('du_bibir', $anomalimukosa->du_bibir) }}" disabled>
                            @error('du_bibir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('anomalimukosa.index') }}" class="btn btn-success btn-block btn">
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
        $('#w_gingiva').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#dw_gingiva').attr("disabled", "disabled");
                document.getElementById("dw_gingiva").placeholder = "Tidak Perlu Diisi";
                document.getElementById("dw_gingiva").value = null;
            } else {
                $('#dw_gingiva').removeAttr("disabled");
                $('#dw_gingiva').attr("required", "required");
                document.getElementById("dw_gingiva").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#i_gingiva').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#di_gingiva').attr("disabled", "disabled");
                document.getElementById("di_gingiva").placeholder = "Tidak Perlu Diisi";
                document.getElementById("di_gingiva").value = null;
            } else {
                $('#di_gingiva').removeAttr("disabled");
                $('#di_gingiva').attr("required", "required");
                document.getElementById("di_gingiva").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#u_gingiva').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#du_gingiva').attr("disabled", "disabled");
                document.getElementById("du_gingiva").placeholder = "Tidak Perlu Diisi";
                document.getElementById("du_gingiva").value = null;
            } else {
                $('#du_gingiva').removeAttr("disabled");
                $('#du_gingiva').attr("required", "required");
                document.getElementById("du_gingiva").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");



        $('#w_palatum').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#dw_palatum').attr("disabled", "disabled");
                document.getElementById("dw_palatum").placeholder = "Tidak Perlu Diisi";
                document.getElementById("dw_palatum").value = null;
            } else {
                $('#dw_palatum').removeAttr("disabled");
                $('#dw_palatum').attr("required", "required");
                document.getElementById("dw_palatum").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#i_palatum').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#di_palatum').attr("disabled", "disabled");
                document.getElementById("di_palatum").placeholder = "Tidak Perlu Diisi";
                document.getElementById("di_palatum").value = null;
            } else {
                $('#di_palatum').removeAttr("disabled");
                $('#di_palatum').attr("required", "required");
                document.getElementById("di_palatum").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#u_palatum').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#du_palatum').attr("disabled", "disabled");
                document.getElementById("du_palatum").placeholder = "Tidak Perlu Diisi";
                document.getElementById("du_palatum").value = null;
            } else {
                $('#du_palatum').removeAttr("disabled");
                $('#du_palatum').attr("required", "required");
                document.getElementById("du_palatum").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");



        $('#w_pipi').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#dw_pipi').attr("disabled", "disabled");
                document.getElementById("dw_pipi").placeholder = "Tidak Perlu Diisi";
                document.getElementById("dw_pipi").value = null;
            } else {
                $('#dw_pipi').removeAttr("disabled");
                $('#dw_pipi').attr("required", "required");
                document.getElementById("dw_pipi").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#i_pipi').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#di_pipi').attr("disabled", "disabled");
                document.getElementById("di_pipi").placeholder = "Tidak Perlu Diisi";
                document.getElementById("di_pipi").value = null;
            } else {
                $('#di_pipi').removeAttr("disabled");
                $('#di_pipi').attr("required", "required");
                document.getElementById("di_pipi").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#u_pipi').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#du_pipi').attr("disabled", "disabled");
                document.getElementById("du_pipi").placeholder = "Tidak Perlu Diisi";
                document.getElementById("du_pipi").value = null;
            } else {
                $('#du_pipi').removeAttr("disabled");
                $('#du_pipi').attr("required", "required");
                document.getElementById("du_pipi").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");



        $('#w_lidah').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#dw_lidah').attr("disabled", "disabled");
                document.getElementById("dw_lidah").placeholder = "Tidak Perlu Diisi";
                document.getElementById("dw_lidah").value = null;
            } else {
                $('#dw_lidah').removeAttr("disabled");
                $('#dw_lidah').attr("required", "required");
                document.getElementById("dw_lidah").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#i_lidah').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#di_lidah').attr("disabled", "disabled");
                document.getElementById("di_lidah").placeholder = "Tidak Perlu Diisi";
                document.getElementById("di_lidah").value = null;
            } else {
                $('#di_lidah').removeAttr("disabled");
                $('#di_lidah').attr("required", "required");
                document.getElementById("di_lidah").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#u_lidah').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#du_lidah').attr("disabled", "disabled");
                document.getElementById("du_lidah").placeholder = "Tidak Perlu Diisi";
                document.getElementById("du_lidah").value = null;
            } else {
                $('#du_lidah').removeAttr("disabled");
                $('#du_lidah').attr("required", "required");
                document.getElementById("du_lidah").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");



        $('#w_bibir').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#dw_bibir').attr("disabled", "disabled");
                document.getElementById("dw_bibir").placeholder = "Tidak Perlu Diisi";
                document.getElementById("dw_bibir").value = null;
            } else {
                $('#dw_bibir').removeAttr("disabled");
                $('#dw_bibir').attr("required", "required");
                document.getElementById("dw_bibir").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#i_bibir').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#di_bibir').attr("disabled", "disabled");
                document.getElementById("di_bibir").placeholder = "Tidak Perlu Diisi";
                document.getElementById("di_bibir").value = null;
            } else {
                $('#di_bibir').removeAttr("disabled");
                $('#di_bibir').attr("required", "required");
                document.getElementById("di_bibir").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");

        $('#u_bibir').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#du_bibir').attr("disabled", "disabled");
                document.getElementById("du_bibir").placeholder = "Tidak Perlu Diisi";
                document.getElementById("du_bibir").value = null;
            } else {
                $('#du_bibir').removeAttr("disabled");
                $('#du_bibir').attr("required", "required");
                document.getElementById("du_bibir").placeholder = "Tuliskan Nama Daerah-nya";
            }
        }).trigger("change");
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
@endsection
