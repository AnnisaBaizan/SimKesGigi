@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Odontogram'])

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
                width: 6.25%;
            }

            .custom-col-sm-2 {
                width: 18.75%;
            }

            .custom-col-sm-3 {
                width: 12%;
            }

            .custom-col-sm-4 {
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
                <h6 class="m-0 font-weight-bold text-primary">Detail Odontogram</h6>
            </div>
            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Odontogram</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $odontogram->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $odontogram->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $odontogram->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $odontogram->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Odontogram</h6>
                        </marquee>
                    </div>
                    <div class="custom-container select-option">
                        <div class="form-group row mt-3">
                            <div class="form-floating custom-col custom-col-sm-2">
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_55') is-invalid @enderror" id="kode_55"
                                    name="kode_55" placeholder="55" value="{{ old('kode_55') }}">
                                    @error('kode_55')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_55) ? '' : ($odontogram->kode_55 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_55">55</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_54') is-invalid @enderror" id="kode_54"
                                    name="kode_54" placeholder="54" value="{{ old('kode_54') }}">
                                    @error('kode_54')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_54) ? '' : ($odontogram->kode_54 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_54">54</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_53') is-invalid @enderror" id="kode_53"
                                    name="kode_53" placeholder="53" value="{{ old('kode_53') }}">
                                    @error('kode_53')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_53) ? '' : ($odontogram->kode_53 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_53">53</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_52') is-invalid @enderror" id="kode_52"
                                    name="kode_52" placeholder="52" value="{{ old('kode_52') }}">
                                    @error('kode_52')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_52) ? '' : ($odontogram->kode_52 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_52">52</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_51') is-invalid @enderror" id="kode_51"
                                    name="kode_51" placeholder="51" value="{{ old('kode_51') }}">
                                    @error('kode_51')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_51) ? '' : ($odontogram->kode_51 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_51">51</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_61') is-invalid @enderror" id="kode_61"
                                    name="kode_61" placeholder="61" value="{{ old('kode_61') }}">
                                    @error('kode_61')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_61) ? '' : ($odontogram->kode_61 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_61">61</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_62') is-invalid @enderror" id="kode_62"
                                    name="kode_62" placeholder="62" value="{{ old('kode_62') }}">
                                    @error('kode_62')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_62) ? '' : ($odontogram->kode_62 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_62">62</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_63') is-invalid @enderror" id="kode_63"
                                    name="kode_63" placeholder="63" value="{{ old('kode_63') }}">
                                    @error('kode_63')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_63) ? '' : ($odontogram->kode_63 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_63">63</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_64') is-invalid @enderror" id="kode_64"
                                    name="kode_64" placeholder="64" value="{{ old('kode_64') }}">
                                    @error('kode_64')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_64) ? '' : ($odontogram->kode_64 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_64">64</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_65') is-invalid @enderror" id="kode_65"
                                    name="kode_65" placeholder="65" value="{{ old('kode_65') }}">
                                    @error('kode_65')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_65) ? '' : ($odontogram->kode_65 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_65">65</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-2">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_18') is-invalid @enderror" id="kode_18"
                                    name="kode_18" placeholder="18" value="{{ old('kode_18') }}">
                                    @error('kode_18')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_18) ? '' : ($odontogram->kode_18 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_18">18</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_17') is-invalid @enderror" id="kode_17"
                                    name="kode_17" placeholder="17" value="{{ old('kode_17') }}">
                                    @error('kode_17')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_17) ? '' : ($odontogram->kode_17 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_17">17</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_16') is-invalid @enderror" id="kode_16"
                                    name="kode_16" placeholder="16" value="{{ old('kode_16') }}">
                                    @error('kode_16')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_16) ? '' : ($odontogram->kode_16 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_16">16</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_15') is-invalid @enderror" id="kode_15"
                                    name="kode_15" placeholder="15" value="{{ old('kode_15') }}">
                                    @error('kode_15')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_15) ? '' : ($odontogram->kode_15 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_15">15</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_14') is-invalid @enderror" id="kode_14"
                                    name="kode_14" placeholder="14" value="{{ old('kode_14') }}">
                                    @error('kode_14')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_14) ? '' : ($odontogram->kode_14 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_14">14</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_13') is-invalid @enderror" id="kode_13"
                                    name="kode_13" placeholder="13" value="{{ old('kode_13') }}">
                                    @error('kode_13')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_13) ? '' : ($odontogram->kode_13 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_13">13</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_12') is-invalid @enderror" id="kode_12"
                                    name="kode_12" placeholder="12" value="{{ old('kode_12') }}">
                                    @error('kode_12')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_12) ? '' : ($odontogram->kode_12 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_12">12</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_11') is-invalid @enderror" id="kode_11"
                                    name="kode_11" placeholder="11" value="{{ old('kode_11') }}">
                                    @error('kode_11')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_11) ? '' : ($odontogram->kode_11 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_11">11</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_21') is-invalid @enderror" id="kode_21"
                                    name="kode_21" placeholder="21" value="{{ old('kode_21') }}">
                                    @error('kode_21')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_21) ? '' : ($odontogram->kode_21 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_21">21</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_22') is-invalid @enderror" id="kode_22"
                                    name="kode_22" placeholder="22" value="{{ old('kode_22') }}">
                                    @error('kode_22')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_22) ? '' : ($odontogram->kode_22 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_22">22</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_23') is-invalid @enderror" id="kode_23"
                                    name="kode_23" placeholder="23" value="{{ old('kode_23') }}">
                                    @error('kode_23')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_23) ? '' : ($odontogram->kode_23 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_23">23</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_24') is-invalid @enderror" id="kode_24"
                                    name="kode_24" placeholder="24" value="{{ old('kode_24') }}">
                                    @error('kode_24')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_24) ? '' : ($odontogram->kode_24 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_24">24</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_25') is-invalid @enderror" id="kode_25"
                                    name="kode_25" placeholder="25" value="{{ old('kode_25') }}">
                                    @error('kode_25')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_25) ? '' : ($odontogram->kode_25 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_25">25</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_26') is-invalid @enderror" id="kode_26"
                                    name="kode_26" placeholder="26" value="{{ old('kode_26') }}">
                                    @error('kode_26')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_26) ? '' : ($odontogram->kode_26 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_26">26</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_27') is-invalid @enderror" id="kode_27"
                                    name="kode_27" placeholder="27" value="{{ old('kode_27') }}">
                                    @error('kode_27')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_27) ? '' : ($odontogram->kode_27 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_27">27</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_28') is-invalid @enderror" id="kode_28"
                                    name="kode_28" placeholder="28" value="{{ old('kode_28') }}">
                                    @error('kode_28')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_28) ? '' : ($odontogram->kode_28 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_28">28</label>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_48') is-invalid @enderror" id="kode_48"
                                    name="kode_48" placeholder="48" value="{{ old('kode_48') }}">
                                    @error('kode_48')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_48) ? '' : ($odontogram->kode_48 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_48">48</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_47') is-invalid @enderror" id="kode_47"
                                    name="kode_47" placeholder="47" value="{{ old('kode_47') }}">
                                    @error('kode_47')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_47) ? '' : ($odontogram->kode_47 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_47">47</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_46') is-invalid @enderror" id="kode_46"
                                    name="kode_46" placeholder="46" value="{{ old('kode_46') }}">
                                    @error('kode_46')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_46) ? '' : ($odontogram->kode_46 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_46">46</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_45') is-invalid @enderror" id="kode_45"
                                    name="kode_45" placeholder="45" value="{{ old('kode_45') }}">
                                    @error('kode_45')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_45) ? '' : ($odontogram->kode_45 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_45">45</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_44') is-invalid @enderror" id="kode_44"
                                    name="kode_44" placeholder="44" value="{{ old('kode_44') }}">
                                    @error('kode_44')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_44) ? '' : ($odontogram->kode_44 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_44">44</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_43') is-invalid @enderror" id="kode_43"
                                    name="kode_43" placeholder="43" value="{{ old('kode_43') }}">
                                    @error('kode_43')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_43) ? '' : ($odontogram->kode_43 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_43">43</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_42') is-invalid @enderror" id="kode_42"
                                    name="kode_42" placeholder="42" value="{{ old('kode_42') }}">
                                    @error('kode_42')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_42) ? '' : ($odontogram->kode_42 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_42">42</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_41') is-invalid @enderror" id="kode_41"
                                    name="kode_41" placeholder="41" value="{{ old('kode_41') }}">
                                    @error('kode_41')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_41) ? '' : ($odontogram->kode_41 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_41">41</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_31') is-invalid @enderror" id="kode_31"
                                    name="kode_31" placeholder="31" value="{{ old('kode_31') }}">
                                    @error('kode_31')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_31) ? '' : ($odontogram->kode_31 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_31">31</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_32') is-invalid @enderror" id="kode_32"
                                    name="kode_32" placeholder="32" value="{{ old('kode_32') }}">
                                    @error('kode_32')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_32) ? '' : ($odontogram->kode_32 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_32">32</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_33') is-invalid @enderror" id="kode_33"
                                    name="kode_33" placeholder="33" value="{{ old('kode_33') }}">
                                    @error('kode_33')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_33) ? '' : ($odontogram->kode_33 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_33">33</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_34') is-invalid @enderror" id="kode_34"
                                    name="kode_34" placeholder="34" value="{{ old('kode_34') }}">
                                    @error('kode_34')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_34) ? '' : ($odontogram->kode_34 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_34">34</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_35') is-invalid @enderror" id="kode_35"
                                    name="kode_35" placeholder="35" value="{{ old('kode_35') }}">
                                    @error('kode_35')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_35) ? '' : ($odontogram->kode_35 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_35">35</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_36') is-invalid @enderror" id="kode_36"
                                    name="kode_36" placeholder="36" value="{{ old('kode_36') }}">
                                    @error('kode_36')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_36) ? '' : ($odontogram->kode_36 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_36">36</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_37') is-invalid @enderror" id="kode_37"
                                    name="kode_37" placeholder="37" value="{{ old('kode_37') }}">
                                    @error('kode_37')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_37) ? '' : ($odontogram->kode_37 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_37">37</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_38') is-invalid @enderror" id="kode_38"
                                    name="kode_38" placeholder="38" value="{{ old('kode_38') }}">
                                    @error('kode_38')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    @for ($i = 0; $i <= 9; $i++)
                                        <option value="{{ $i }}"
                                            {{ is_null($odontogram->kode_38) ? '' : ($odontogram->kode_38 == $i ? 'selected' : '') }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="kode_38">38</label>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-floating custom-col custom-col-sm-2">
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_85') is-invalid @enderror" id="kode_85"
                                    name="kode_85" placeholder="85" value="{{ old('kode_85') }}">
                                    @error('kode_85')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_85) ? '' : ($odontogram->kode_85 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_85">85</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_84') is-invalid @enderror" id="kode_84"
                                    name="kode_84" placeholder="84" value="{{ old('kode_84') }}">
                                    @error('kode_84')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_84) ? '' : ($odontogram->kode_84 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_84">84</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_83') is-invalid @enderror" id="kode_83"
                                    name="kode_83" placeholder="83" value="{{ old('kode_83') }}">
                                    @error('kode_83')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_83) ? '' : ($odontogram->kode_83 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_83">83</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_82') is-invalid @enderror" id="kode_82"
                                    name="kode_82" placeholder="82" value="{{ old('kode_82') }}">
                                    @error('kode_82')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_82) ? '' : ($odontogram->kode_82 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_82">82</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_81') is-invalid @enderror" id="kode_81"
                                    name="kode_81" placeholder="81" value="{{ old('kode_81') }}">
                                    @error('kode_81')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_81) ? '' : ($odontogram->kode_81 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_81">81</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_71') is-invalid @enderror" id="kode_71"
                                    name="kode_71" placeholder="71" value="{{ old('kode_71') }}">
                                    @error('kode_71')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_71) ? '' : ($odontogram->kode_71 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_71">71</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_72') is-invalid @enderror" id="kode_72"
                                    name="kode_72" placeholder="72" value="{{ old('kode_72') }}">
                                    @error('kode_72')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_72) ? '' : ($odontogram->kode_72 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_72">72</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_73') is-invalid @enderror" id="kode_73"
                                    name="kode_73" placeholder="73" value="{{ old('kode_73') }}">
                                    @error('kode_73')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_73) ? '' : ($odontogram->kode_73 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_73">73</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_74') is-invalid @enderror" id="kode_74"
                                    name="kode_74" placeholder="74" value="{{ old('kode_74') }}">
                                    @error('kode_74')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_74) ? '' : ($odontogram->kode_74 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_74">74</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-1">
                                <select class="form-control @error('kode_75') is-invalid @enderror" id="kode_75"
                                    name="kode_75" placeholder="75" value="{{ old('kode_75') }}">
                                    @error('kode_75')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected></option>
                                    <option value="A"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'A' ? 'selected' : '') }}>
                                        A</option>
                                    <option value="B"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'B' ? 'selected' : '') }}>
                                        B</option>
                                    <option value="C"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'C' ? 'selected' : '') }}>
                                        C</option>
                                    <option value="D"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'D' ? 'selected' : '') }}>
                                        D</option>
                                    <option value="E"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'E' ? 'selected' : '') }}>
                                        E</option>
                                    <option value="F"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'F' ? 'selected' : '') }}>
                                        F</option>
                                    <option value="G"
                                        {{ is_null($odontogram->kode_75) ? '' : ($odontogram->kode_75 == 'G' ? 'selected' : '') }}>
                                        G</option>
                                </select>
                                <label for="kode_75">75</label>
                            </div>
                            <div class="form-floating custom-col custom-col-sm-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Gigi Tetap</h6>
                    </div>

                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="jumlah_tetap_d">D</label>
                            <input type="text" name="jumlah_tetap_d" id="jumlah_tetap_d" value="{{ $odontogram->jumlah_tetap_d }}"
                                class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label>+</label>
                            <input value="+" class="form-control text-center bg-gradient-faded-info-vertical"
                                readonly disabled required>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="jumlah_tetap_m">M</label>
                            <input type="text" name="jumlah_tetap_m" id="jumlah_tetap_m" value="{{ $odontogram->jumlah_tetap_m }}"
                                class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label>+</label>
                            <input value="+" class="form-control text-center bg-gradient-faded-info-vertical"
                                readonly disabled required>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="jumlah_tetap_f">F</label>
                            <input type="text" name="jumlah_tetap_f" id="jumlah_tetap_f" value="{{ $odontogram->jumlah_tetap_f }}"
                                class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label>=</label>
                            <input value="=" class="form-control text-center bg-gradient-faded-info-vertical"
                                readonly disabled required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="dmf_t">DMF-T</label>
                            <input type="text" name="dmf_t" id="dmf_t" value="{{ $odontogram->dmf_t }}"
                                class="form-control text-center" readonly required>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Gigi Susu</h6>
                    </div>

                    <div class="row text-center">
                        <div class="col-sm-2 mb-3">
                            <label for="jumlah_susu_d">D</label>
                            <input type="text" name="jumlah_susu_d" id="jumlah_susu_d" value="{{ $odontogram->jumlah_susu_d }}"
                                class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label>+</label>
                            <input value="+" class="form-control text-center bg-gradient-faded-info-vertical"
                                readonly disabled required>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="jumlah_susu_e">E</label>
                            <input type="text" name="jumlah_susu_e" id="jumlah_susu_e" value="{{ $odontogram->jumlah_susu_e }}"
                                class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label>+</label>
                            <input value="+" class="form-control text-center bg-gradient-faded-info-vertical"
                                readonly disabled required>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="jumlah_susu_f">F</label>
                            <input type="text" name="jumlah_susu_f" id="jumlah_susu_f" value="{{ $odontogram->jumlah_susu_f }}"
                                class="form-control text-center" readonly required>
                        </div>
                        <div class="col-sm-1 mb-3">
                            <label>=</label>
                            <input value="=" class="form-control text-center bg-gradient-faded-info-vertical"
                                readonly disabled required>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="def_t">DEF-T</label>
                            <input type="text" name="def_t" id="def_t" value="{{ $odontogram->def_t }}"
                                class="form-control text-center" readonly required>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Gigi Karies</h6>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3">
                        <input type="text" name="gigi_karies" id="gigi_karies" value="{{ $odontogram->gigi_karies }}"
                            class="form-control text-center" readonly required>
                    </div>

                    @can('adminmahasiswa')
                        <div class="col-sm-12 mb-3 mb-sm-0 me-5 d-flex justify-content-end" style="width: 100%;">
                            <div class="ms-auto me-5">
                                <p>Pembimbing,</p>
                                @if ($odontogram->acc == 1)
                                    <div id="qrcode" class="mb-2"></div>
                                    <!-- Ini adalah elemen yang akan menampilkan QR code -->
                                @else
                                    <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                                @endif
                                {{ ucwords(get_v('users', 'nimnip', $odontogram->pembimbing, 'username')[0]->username ?? '') }}
                                <br>
                                NIP. {{ $odontogram->pembimbing }}
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('odontogram.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('odontogram.index') }}" class="btn btn-success btn-block btn">
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
        var qrText = "{{ $odontogram->id }}" + "_" + "{{ $odontogram->user_id }}" + "_" +
            "{{ $odontogram->no_kartu }}" + "_" +
            "{{ $odontogram->pembimbing }}" + "_" +
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
    <script>
        // Function to calculate and update the counts
        function updateCounts() {
            // Reset counts to zero
            let jumlah_tetap_d = 0;
            let jumlah_tetap_m = 0;
            let jumlah_tetap_f = 0;
            let jumlah_susu_d = 0;
            let jumlah_susu_e = 0;
            let jumlah_susu_f = 0;
            let gigi_karies = [];

            // Iterate through Gigi Tetap dropdowns
            ['18', '17', '16', '15', '14', '13', '12', '11', '21', '22', '23', '24', '25', '26', '27', '28', '48', '47',
                '46', '45', '44', '43', '42', '41', '31', '32', '33', '34', '35', '36', '37', '38'
            ].forEach(function(kode) {
                let selectedValue = document.getElementById('kode_' + kode).value;

                if (selectedValue === '1' || selectedValue === '2') {
                    jumlah_tetap_d++;
                } else if (selectedValue === '4') {
                    jumlah_tetap_m++;
                } else if (selectedValue === '3') {
                    jumlah_tetap_f++;
                }

                if (selectedValue === '1' || selectedValue === '2' || selectedValue === 'B' || selectedValue ===
                    'C') {
                    gigi_karies.push(kode);
                }
            });

            // Iterate through Gigi Susu dropdowns
            ['55', '54', '53', '52', '51', '61', '62', '63', '64', '65', '85', '84', '83', '82', '81', '71', '72', '73',
                '74', '75'
            ].forEach(function(kode) {
                let selectedValue = document.getElementById('kode_' + kode).value;

                if (selectedValue === 'B' || selectedValue === 'C') {
                    jumlah_susu_d++;
                } else if (selectedValue === 'E') {
                    jumlah_susu_e++;
                } else if (selectedValue === 'D') {
                    jumlah_susu_f++;
                }

                if (selectedValue === 'B' || selectedValue === 'C' || selectedValue === '1' || selectedValue ===
                    '2') {
                    gigi_karies.push(kode);
                }
            });

            // Calculate DMF-T and DEF-T
            let dmf_t = jumlah_tetap_d + jumlah_tetap_m + jumlah_tetap_f;
            let def_t = jumlah_susu_d + jumlah_susu_e + jumlah_susu_f;

            // Update HTML elements with the calculated counts
            document.getElementById('jumlah_tetap_d').value = jumlah_tetap_d;
            document.getElementById('jumlah_tetap_m').value = jumlah_tetap_m;
            document.getElementById('jumlah_tetap_f').value = jumlah_tetap_f;
            document.getElementById('dmf_t').value = dmf_t;

            document.getElementById('jumlah_susu_d').value = jumlah_susu_d;
            document.getElementById('jumlah_susu_e').value = jumlah_susu_e;
            document.getElementById('jumlah_susu_f').value = jumlah_susu_f;
            document.getElementById('def_t').value = def_t;

            // Display gigi_karies in the HTML element
            document.getElementById('gigi_karies').value = gigi_karies.join(',');

        }

        // Call the updateCounts function whenever a dropdown changes
        document.querySelectorAll('select').forEach(function(dropdown) {
            dropdown.addEventListener('change', updateCounts);
        });

        // Initial calculation on page load
        updateCounts();
    </script>
@endsection
