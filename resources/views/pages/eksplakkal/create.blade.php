@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Eskternal & Internal Oral (Plak & Kalkulus)'])
    
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengetahuan, Keterampilan, Perilaku dan Peran Orang Tua</h6>
            </div>
            <div class="card-body">
                <style>
                    .table-responsive {
                        overflow-x: auto;
                        display: block;
                        max-width: 100%;
                        overflow-y: hidden;
                        -ms-overflow-style: -ms-autohiding-scrollbar;
                        border-collapse: collapse;
                        width: 100%;
                        margin-bottom: 20px;
                    }

                    @media screen and (max-width: 767px) {
                        th, td {
                        display: block;
                        width: 100%;
                        }
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    /* Mengatur lebar kolom pada elemen td secara langsung */
                    td:nth-child(1) {
                        width: 15%; /* Lebar kolom pertama */
                    }
                    td:nth-child(2) {
                        width: 15%; /* Lebar kolom kedua */
                    }
                    td:nth-child(3) {
                        width: 15%; /* Lebar kolom ketiga */
                    }
                    td:nth-child(4) {
                        width: 10%; /* Lebar kolom pertama */
                    }
                    td:nth-child(5) {
                        width: 15%; /* Lebar kolom kedua */
                    }
                    td:nth-child(6) {
                        width: 15%; /* Lebar kolom ketiga */
                    }
                    td:nth-child(7) {
                        width: 15%; /* Lebar kolom ketiga */
                    }
                </style>
    
        <form class="user" action="{{route('eksplakkal.store')}}" method="post">
            @csrf

            <div class="form-group row">
            <div class="col-sm-3">
                <label for="kartupasien_id" class ="form-text">Pilih Pasien :</label>
            </div>
            <div class="col-sm-9">
                <select class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror" data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien" value="{{ old('kartupasien_id') }}" required>
                    @error('kartupasien_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <option value="" selected>Pilih Pasien</option>
                    @foreach ($kartupasiens as $kartupasien)
                    <option value="{{ $kartupasien->id }}">{{ $kartupasien->no_kartu }} | {{ $kartupasien->nama }}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Eksternal Oral</h6></marquee>
            </div>

            <div class="form-group row mt-3">
                <div class="col-sm-3">
                    <label for="muka" class ="form-text">Muka :</label>
                </div>
                <div class="col-sm-9 mb-3">
                  <select class="form-control @error('muka') is-invalid @enderror" id="muka" name="muka" placeholder="pilih" value="{{ old('muka') }}" required>
                          @error('muka')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      <option value="" selected disabled>Pilih</option>
                      <option value="Simetris">Simetris</option>
                      <option value="Tidak Simetris">Tidak Simetris</option>
                  </select>
                </div>
            </div>

            <div class="col-sm-12 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                <h6 class="m-0 font-weight-bold text-dark text-bold">Kelenjar Limpe</h6>
            </div>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="col-sm-12 mb-sm-0 text-center bg-gradient-faded-secondary-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Kanan</h6>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 text-center">
                        <input type="radio" class="@error('limpe_kanan_teraba') is-invalid @enderror" id="limpe_kanan_teraba1" value="{{ old('limpe_kanan_teraba') }}" name="limpe_kanan_teraba" value="Teraba" require>
                        <label for="limpe_kanan_teraba1" class="me-5">Teraba</label>
                        <input type="radio" class="ms-5 @error('limpe_kanan_teraba') is-invalid @enderror" id="limpe_kanan_teraba2" value="{{ old('limpe_kanan_teraba') }}" name="limpe_kanan_teraba" value="Tidak Teraba" require>
                        <label for="limpe_kanan_teraba2">Tidak Teraba</label>
                    </div>
                    <div class="col-sm-12 mb-3 text-center">
                        <input type="radio" class="@error('limpe_kanan_texture') is-invalid @enderror" id="limpe_kanan_texture1" value="{{ old('limpe_kanan_texture') }}" name="limpe_kanan_texture" value="Keras" require>
                        <label for="limpe_kanan_texture1" class="me-5">Keras</label>
                        <input type="radio" class="ms-5 @error('limpe_kanan_texture') is-invalid @enderror" id="limpe_kanan_texture2" value="{{ old('limpe_kanan_texture') }}" name="limpe_kanan_texture" value="Lunak" require>
                        <label for="limpe_kanan_texture2">Lunak</label>
                    </div>
                    <div class="col-sm-12 mb-3 text-center">
                        <input type="radio" class="@error('limpe_kanan_sakit') is-invalid @enderror" id="limpe_kanan_sakit1" value="{{ old('limpe_kanan_sakit') }}" name="limpe_kanan_sakit" value="Sakit" require>
                        <label for="limpe_kanan_sakit1" class="me-5">Sakit</label>
                        <input type="radio" class="ms-5 @error('limpe_kanan_sakit') is-invalid @enderror" id="limpe_kanan_sakit2" value="{{ old('limpe_kanan_sakit') }}" name="limpe_kanan_sakit" value="Tidak Sakit" require>
                        <label for="limpe_kanan_sakit2">Tidak Sakit</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-12 mb-sm-0 text-center bg-gradient-faded-secondary-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Kiri</h6>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 text-center">
                        <input type="radio" class="@error('limpe_kiri_teraba') is-invalid @enderror" id="limpe_kiri_teraba1" value="{{ old('limpe_kiri_teraba') }}" name="limpe_kiri_teraba" value="Teraba" require>
                        <label for="limpe_kiri_teraba1" class="me-5">Teraba</label>
                        <input type="radio" class="ms-5 @error('limpe_kiri_teraba') is-invalid @enderror" id="limpe_kiri_teraba2" value="{{ old('limpe_kiri_teraba') }}" name="limpe_kiri_teraba" value="Tidak Teraba" require>
                        <label for="limpe_kiri_teraba2">Tidak Teraba</label>
                    </div>
                    <div class="col-sm-12 mb-3 text-center">
                        <input type="radio" class="@error('limpe_kiri_texture') is-invalid @enderror" id="limpe_kiri_texture1" value="{{ old('limpe_kiri_texture') }}" name="limpe_kiri_texture" value="Keras" require>
                        <label for="limpe_kiri_texture1" class="me-5">Keras</label>
                        <input type="radio" class="ms-5 @error('limpe_kiri_texture') is-invalid @enderror" id="limpe_kiri_texture2" value="{{ old('limpe_kiri_texture') }}" name="limpe_kiri_texture" value="Lunak" require>
                        <label for="limpe_kiri_texture2">Lunak</label>
                    </div>
                    <div class="col-sm-12 mb-3 text-center">
                        <input type="radio" class="@error('limpe_kiri_sakit') is-invalid @enderror" id="limpe_kiri_sakit1" value="{{ old('limpe_kiri_sakit') }}" name="limpe_kiri_sakit" value="Sakit" require>
                        <label for="limpe_kiri_sakit1" class="me-5">Sakit</label>
                        <input type="radio" class="ms-5 @error('limpe_kiri_sakit') is-invalid @enderror" id="limpe_kiri_sakit2" value="{{ old('limpe_kiri_sakit') }}" name="limpe_kiri_sakit" value="Tidak Sakit" require>
                        <label for="limpe_kiri_sakit2">Tidak Sakit</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
            <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Internal Oral</h6></marquee>
            </div>

            <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                <img class="mb-3 img-fluid max-width: 150%; height: 50%;" src="{!! asset('/img/odontogram.jpeg') !!}">
            </div>

            {{-- <img src="{!! asset('/img/odontogram.jpeg') !!}"  width="2000px" height="500px"> --}}
            {{--  --}}

            <div class="row mt-3 text-center">
                <!-- Kolom Pertama - di_1, di_2, di_3 -->
                <div class="col-sm-12">
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Plak</h6>
                    </div>
                    <!-- Baris Pertama - di_1, di_2, di_3 -->
                    
                  <div class="form-group row">
                    {{-- <div class="col-sm-5 mb-3">
                        <label for="plak[]" class ="form-text">Pilih Pertanyaan yang Berhasil Dijawab dengan Benar :</label>
                    </div> --}}
                    <div class="col-sm-12 mt-3">
                        <select class="js-example-basic-multiple form-control @error('plak') is-invalid @enderror" data-live-search="true" id="plak" name="plak[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('plak[]') }}" multiple="multiple" required>
                            @error('plak[]')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                            @foreach ($permukaangigis as $permukaangigi)
                            <option value="{{ $permukaangigi->id }}">{{ $permukaangigi->kode }} {{ $permukaangigi->lokasi }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                    
                    <div class="row mb-3">
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="jumlah_permukaan" class ="form-text">Jumlah Permukaan yang Diperiksa :</label>
                        <input type="number" class="form-control @error('jumlah_permukaan') is-invalid @enderror" id="jumlah_permukaan" name="jumlah_permukaan" placeholder="Permukaan yang Diperiksa" value="{{ old('jumlah_permukaan') }}">
                            @error('jumlah_permukaan')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="jumlah_tidak_plak" class ="form-text">Jumlah yang Tidak Ada Plak :</label>
                        <input type="text" class="form-control @error('jumlah_tidak_plak') is-invalid @enderror" id="jumlah_tidak_plak" name="jumlah_tidak_plak" placeholder="Tidak Ada Plak" value="{{ old('jumlah_tidak_plak') }}" readonly>
                            @error('jumlah_tidak_plak')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="plaque_score" class ="form-text">Plaque Score :</label>
                        <input type="text" class="form-control @error('plaque_score') is-invalid @enderror" id="plaque_score" name="plaque_score" placeholder="Plaque Score" value="{{ old('plaque_score') }}" readonly>
                            @error('plaque_score')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                      <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="kriteria" class ="form-text">Kriteria :</label>
                        <input type="text" class="form-control @error('kriteria') is-invalid @enderror" id="kriteria" name="kriteria" placeholder="kriteria" value="{{ old('kriteria') }}" readonly>
                            @error('kriteria')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                    </div>
                </div>
            
                <!-- Kolom Kedua - ci_1, ci_2, ci_3 -->
                <div class="col-sm-12">
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <h6 class="m-0 font-weight-bold text-dark text-bold">Kalkulus</h6>
                    </div>
                    <!-- Baris Pertama - ci_1, ci_2, ci_3 -->
                    
                    <div class="row mb-3">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="supragingiva[]" class ="form-text">Supragingiva :</label>
                            <select class="js-example-basic-multiple form-control @error('supragingiva') is-invalid @enderror" data-live-search="true" id="supragingiva" name="supragingiva[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('supragingiva[]') }}" multiple="multiple" required>
                                @error('supragingiva[]')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- <option value="" selected disabled>Pilih Gigi</option> --}}
                                @foreach ($permukaangigis as $permukaangigi)
                                <option value="{{ $permukaangigi->id }}">{{ $permukaangigi->kode }} {{ $permukaangigi->lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="subgingiva[]" class ="form-text">subgingiva :</label>
                            <select class="js-example-basic-multiple form-control @error('subgingiva') is-invalid @enderror" data-live-search="true" id="subgingiva" name="subgingiva[]" placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar" value="{{ old('subgingiva[]') }}" multiple="multiple" required>
                                @error('subgingiva[]')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- <option value="" selected disabled>Pilih Gigi</option> --}}
                                @foreach ($permukaangigis as $permukaangigi)
                                <option value="{{ $permukaangigi->id }}">{{ $permukaangigi->kode }} {{ $permukaangigi->lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="form-group row">
                <div class="col-sm-6 d-grid gap-2">
                    <a href="{{route('eksplakkal.index')}}" class="btn btn-success btn-block btn">
                        <i class="fas fa-arrow-left fa-fw"></i> Kembali
                    </a>
                </div>
                <div class="col-sm-6 d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan" >
                        <i class="fas fa-save fa-fw"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
    
    @include('layouts.footers.auth.footer')

        </div>
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
@endsection