@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Anomali Gigi dan Mukosa Mulut'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Anomali Gigi dan Mukosa Mulut'])


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
                <h6 class="m-0 font-weight-bold text-primary">Detail Anomali Gigi dan Mukosa Mulut</h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Anomali Gigi dan Mukosa Mulut</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $anomalimukosa->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $anomalimukosa->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $anomalimukosa->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $anomalimukosa->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">


                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                        <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Anomali Gigi</h6>
                    </marquee>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="occlusi" class ="form-text">Occlusi :</label>
                        <select class="form-control @error('occlusi') is-invalid @enderror" id="occlusi" name="occlusi"
                            placeholder="pilih" value="{{ old('occlusi') }}" required disabled readonly>
                            @error('occlusi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pilih</option>
                            <option value="Normal bite" {{ $anomalimukosa->occlusi == 'Normal bite' ? 'selected' : '' }}>
                                Normal bite</option>
                            <option value="Cross bite" {{ $anomalimukosa->occlusi == 'Cross bite' ? 'selected' : '' }}>Cross
                                bite</option>
                            <option value="Steep bite" {{ $anomalimukosa->occlusi == 'Steep bite' ? 'selected' : '' }}>Steep
                                bite</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="bentuk" class ="form-text">Bentuk :</label>
                        <select class="form-control @error('bentuk') is-invalid @enderror" id="bentuk" name="bentuk"
                            placeholder="pilih" value="{{ old('bentuk') }}" required disabled readonly>
                            @error('bentuk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pilih</option>
                            <option value="Normal" {{ $anomalimukosa->bentuk == 'Normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="Abnormal" {{ $anomalimukosa->bentuk == 'Abnormal' ? 'selected' : '' }}>Abnormal
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="warna" class ="form-text">Warna :</label>
                        <select class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna"
                            placeholder="pilih" value="{{ old('warna') }}" required disabled readonly>
                            @error('warna')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pilih</option>
                            <option value="Normal" {{ $anomalimukosa->warna == 'Normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="Abnormal" {{ $anomalimukosa->warna == 'Abnormal' ? 'selected' : '' }}>Abnormal
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="posisi" class ="form-text">Posisi :</label>
                        <select class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi"
                            placeholder="pilih" value="{{ old('posisi') }}" required disabled readonly>
                            @error('posisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pilih</option>
                            <option value="Normal" {{ $anomalimukosa->posisi == 'Normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="Abnormal" {{ $anomalimukosa->posisi == 'Abnormal' ? 'selected' : '' }}>Abnormal
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="ukuran" class ="form-text">Ukuran :</label>
                        <select class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran"
                            placeholder="pilih" value="{{ old('ukuran') }}" required disabled readonly>
                            @error('ukuran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pilih</option>
                            <option value="Normal" {{ $anomalimukosa->ukuran == 'Normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="Abnormal" {{ $anomalimukosa->ukuran == 'Abnormal' ? 'selected' : '' }}>Abnormal
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="struktur" class ="form-text">Struktur :</label>
                        <select class="form-control @error('struktur') is-invalid @enderror" id="struktur"
                            name="struktur" placeholder="pilih" value="{{ old('struktur') }}" required disabled
                            readonly>
                            @error('struktur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Pilih</option>
                            <option value="Normal" {{ $anomalimukosa->struktur == 'Normal' ? 'selected' : '' }}>Normal
                            </option>
                            <option value="Abnormal" {{ $anomalimukosa->struktur == 'Abnormal' ? 'selected' : '' }}>
                                Abnormal
                            </option>
                        </select>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                        <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Mukosa Mulut</h6>
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
                        <select class="form-control @error('w_lidah') is-invalid @enderror" id="w_lidah" name="w_lidah"
                            placeholder="Pilih" value="{{ old('w_lidah') }}" required disabled readonly>
                            @error('w_lidah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Perubahan Warna</option>
                            <option value="Ada" {{ $anomalimukosa->w_lidah == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->w_lidah == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="dw_lidah" class ="form-text">Daerah Mana :</label>
                        <input type="text" class="form-control @error('dw_lidah') is-invalid @enderror" id="dw_lidah"
                            name="dw_lidah" placeholder="Tuliskan Nama Daerah-nya"
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
                        <select class="form-control @error('i_lidah') is-invalid @enderror" id="i_lidah" name="i_lidah"
                            placeholder="pilih" value="{{ old('i_lidah') }}" required disabled readonly>
                            @error('i_lidah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Inflamasi</option>
                            <option value="Ada" {{ $anomalimukosa->i_lidah == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->i_lidah == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="di_lidah" class ="form-text">Daerah Mana :</label>
                        <input type="text" class="form-control @error('di_lidah') is-invalid @enderror" id="di_lidah"
                            name="di_lidah" placeholder="Tuliskan Nama Daerah-nya"
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
                            name="u_lidah" placeholder="pilih" value="{{ old('u_lidah') }}" required disabled readonly>
                            @error('u_lidah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Ulserasi</option>
                            <option value="Ada" {{ $anomalimukosa->u_lidah == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->u_lidah == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
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
                        <select class="form-control @error('w_pipi') is-invalid @enderror" id="w_pipi" name="w_pipi"
                            placeholder="Pilih" value="{{ old('w_pipi') }}" required disabled readonly>
                            @error('w_pipi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Perubahan Warna</option>
                            <option value="Ada" {{ $anomalimukosa->w_pipi == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->w_pipi == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="dw_pipi" class ="form-text">Daerah Mana :</label>
                        <input type="text" class="form-control @error('dw_pipi') is-invalid @enderror" id="dw_pipi"
                            name="dw_pipi" placeholder="Tuliskan Nama Daerah-nya"
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
                        <select class="form-control @error('i_pipi') is-invalid @enderror" id="i_pipi" name="i_pipi"
                            placeholder="pilih" value="{{ old('i_pipi') }}" required disabled readonly>
                            @error('i_pipi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Inflamasi</option>
                            <option value="Ada" {{ $anomalimukosa->i_pipi == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->i_pipi == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="di_pipi" class ="form-text">Daerah Mana :</label>
                        <input type="text" class="form-control @error('di_pipi') is-invalid @enderror" id="di_pipi"
                            name="di_pipi" placeholder="Tuliskan Nama Daerah-nya"
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
                        <select class="form-control @error('u_pipi') is-invalid @enderror" id="u_pipi" name="u_pipi"
                            placeholder="pilih" value="{{ old('u_pipi') }}" required disabled readonly>
                            @error('u_pipi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Ulserasi</option>
                            <option value="Ada" {{ $anomalimukosa->u_pipi == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->u_pipi == 'Tidak Ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="du_pipi" class ="form-text">Daerah Mana :</label>
                        <input type="text" class="form-control @error('du_pipi') is-invalid @enderror" id="du_pipi"
                            name="du_pipi" placeholder="Tuliskan Nama Daerah-nya"
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
                            name="w_palatum" placeholder="Pilih" value="{{ old('w_palatum') }}" required disabled
                            readonly>
                            @error('w_palatum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Perubahan Warna</option>
                            <option value="Ada" {{ $anomalimukosa->w_palatum == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->w_palatum == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="i_palatum" placeholder="pilih" value="{{ old('i_palatum') }}" required disabled
                            readonly>
                            @error('i_palatum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Inflamasi</option>
                            <option value="Ada" {{ $anomalimukosa->i_palatum == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->i_palatum == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="u_palatum" placeholder="pilih" value="{{ old('u_palatum') }}" required disabled
                            readonly>
                            @error('u_palatum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Ulserasi</option>
                            <option value="Ada" {{ $anomalimukosa->u_palatum == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->u_palatum == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="w_gingiva" placeholder="Pilih" value="{{ old('w_gingiva') }}" required disabled
                            readonly>
                            @error('w_gingiva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Perubahan Warna</option>
                            <option value="Ada" {{ $anomalimukosa->w_gingiva == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->w_gingiva == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="i_gingiva" placeholder="pilih" value="{{ old('i_gingiva') }}" required disabled
                            readonly>
                            @error('i_gingiva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Inflamasi</option>
                            <option value="Ada" {{ $anomalimukosa->i_gingiva == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->i_gingiva == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="u_gingiva" placeholder="pilih" value="{{ old('u_gingiva') }}" required disabled
                            readonly>
                            @error('u_gingiva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Ulserasi</option>
                            <option value="Ada" {{ $anomalimukosa->u_gingiva == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->u_gingiva == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="w_bibir" placeholder="Pilih" value="{{ old('w_bibir') }}" required disabled readonly>
                            @error('w_bibir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Perubahan Warna</option>
                            <option value="Ada" {{ $anomalimukosa->w_bibir == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->w_bibir == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="i_bibir" placeholder="pilih" value="{{ old('i_bibir') }}" required disabled readonly>
                            @error('i_bibir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Inflamasi</option>
                            <option value="Ada" {{ $anomalimukosa->i_bibir == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->i_bibir == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                            name="u_bibir" placeholder="pilih" value="{{ old('u_bibir') }}" required disabled readonly>
                            @error('u_bibir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <option value="" selected disabled>Ulserasi</option>
                            <option value="Ada" {{ $anomalimukosa->u_bibir == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ $anomalimukosa->u_bibir == 'Tidak Ada' ? 'selected' : '' }}>
                                Tidak
                                Ada</option>
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
                @can('adminmahasiswa')
                    <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                        <div class="ms-auto me-5">
                            <p>Pembimbing,</p>
                            @if ($anomalimukosa->acc == 1)
                                <div id="qrcode" class="mb-2"></div>
                                <!-- Ini adalah elemen yang akan menampilkan QR code -->
                            @else
                                <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                            @endif
                            {{ ucwords(get_v('users', 'nimnip', $anomalimukosa->pembimbing, 'username')[0]->username ?? '') }}
                            <br>
                            NIP. {{ $anomalimukosa->pembimbing }}
                        </div>
                    </div>
                @endcan
            </div>


            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('anomalimukosa.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('anomalimukosa.index') }}" class="btn btn-success btn-block btn">
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
        var qrText = "{{ $anomalimukosa->id }}" + "_" + "{{ $anomalimukosa->user_id }}" + "_" +
            "{{ $anomalimukosa->no_kartu }}" + "_" +
            "{{ $anomalimukosa->pembimbing }}" + "_" +
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
