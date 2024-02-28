@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Vitalitas'])
    
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
            .custom-col-sm-1 { width: 12%; }
            .custom-col-sm-2 { width: 28%; }
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
                <h6 class="m-0 font-weight-bold text-primary">Formulir Input Odontogram</h6>
                </div>

                <div class="card-body">

                    <form class="user" action="{{route('odontogram.store')}}" method="post">
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
                                    <option value="" selected disabled>Pilih Pasien</option>
                                    @foreach ($kartupasiens as $kartupasien)
                                    <option value="{{ $kartupasien->id }}">{{ $kartupasien->no_kartu }} | {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                            <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Vitalitas Gigi</h6></marquee>
                        </div>
                        
                        <div class="row text-center custom-container">
                            
                            <div class="custom-col-sm-1 mb-3">
                                <label for="inspeksi">Inspeksi</label>
                                <select class="form-control @error('inspeksi') is-invalid @enderror" id="inspeksi" name="inspeksi" placeholder="75" value="{{ old('inspeksi') }}">
                                    @error('inspeksi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled></option>
                                <option value="0">-</option>
                                <option value="1">+</option>
                                </select>
                            </div>
                            <div class="custom-col-sm-1 mb-3">
                                <label for="thermis">Thermis</label>
                                <select class="form-control @error('thermis') is-invalid @enderror" id="thermis" name="thermis" placeholder="75" value="{{ old('thermis') }}">
                                    @error('thermis')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled></option>
                                <option value="0">-</option>
                                <option value="1">+</option>
                                </select>
                            </div>
                            <div class="custom-col-sm-1 mb-3">
                                <label for="sondasi">Sondasi</label>
                                <select class="form-control @error('sondasi') is-invalid @enderror" id="sondasi" name="sondasi" placeholder="75" value="{{ old('sondasi') }}">
                                    @error('sondasi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled></option>
                                <option value="0">-</option>
                                <option value="1">+</option>
                                </select>
                            </div>
                            <div class="custom-col-sm-1 mb-3">
                                <label for="perkusi">Perkusi</label>
                                <select class="form-control @error('perkusi') is-invalid @enderror" id="perkusi" name="perkusi" placeholder="75" value="{{ old('perkusi') }}">
                                    @error('perkusi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled></option>
                                <option value="0">-</option>
                                <option value="1">+</option>
                                </select>
                            </div>
                            <div class="custom-col-sm-1 mb-3">
                                <label for="druk">Druk</label>
                                <select class="form-control @error('druk') is-invalid @enderror" id="druk" name="druk" placeholder="75" value="{{ old('druk') }}">
                                    @error('druk')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled></option>
                                <option value="0">-</option>
                                <option value="1">+</option>
                                </select>
                            </div>
                            <div class="custom-col-sm-1 mb-3">
                                <label for="mobility">Mobility</label>
                                <select class="form-control @error('mobility') is-invalid @enderror" id="mobility" name="mobility" placeholder="75" value="{{ old('mobility') }}">
                                    @error('mobility')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled></option>
                                <option value="0">-</option>
                                <option value="1">+</option>
                                </select>
                            </div>
                            <div class="custom-col-sm-2 mb-3">
                                <label for="masalah">Masalah</label>
                                <input type="text" class="form-control text-center" id="masalah" name="masalah" value="" readonly>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                            <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Anomali Gigi</h6></marquee>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="occlusi" class ="form-text">Occlusi :</label>
                                <select class="form-control @error('occlusi') is-invalid @enderror" id="occlusi" name="occlusi" placeholder="pilih" value="{{ old('occlusi') }}" required>
                                        @error('occlusi')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>pilih</option>
                                    <option value="Normal bite">Normal bite</option>
                                    <option value="Cross bite">Cross bite</option>
                                    <option value="Steep bite">Steep bite</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="bentuk" class ="form-text">Bentuk :</label>
                                <select class="form-control @error('bentuk') is-invalid @enderror" id="bentuk" name="bentuk" placeholder="pilih" value="{{ old('bentuk') }}" required>
                                        @error('bentuk')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>pilih</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="warna" class ="form-text">Warna :</label>
                                <select class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" placeholder="pilih" value="{{ old('warna') }}" required>
                                        @error('warna')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>pilih</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="posisi" class ="form-text">Posisi :</label>
                                <select class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" placeholder="pilih" value="{{ old('posisi') }}" required>
                                        @error('posisi')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>pilih</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="ukuran" class ="form-text">Ukuran :</label>
                                <select class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" placeholder="pilih" value="{{ old('ukuran') }}" required>
                                        @error('ukuran')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>pilih</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="struktur" class ="form-text">Struktur :</label>
                                <select class="form-control @error('struktur') is-invalid @enderror" id="struktur" name="struktur" placeholder="pilih" value="{{ old('struktur') }}" required>
                                        @error('struktur')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>pilih</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                            <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Mukosa Mulut</h6></marquee>
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                            {{-- <center> --}}
                            <h6 class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical"> - Lidah - </h6>
                            {{-- </center> --}}
                        </div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3">
                                <label for="warna_l" class ="form-text">Perubahan Warna :</label>
                                <select class="form-control @error('warna_l') is-invalid @enderror" id="warna_l" name="warna_l" placeholder="Pilih" value="{{ old('warna_l') }}" required>
                                        @error('warna_l')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>Perubahan Warna</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                              </div>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="daerah_wl" class ="form-text">Daerah Mana :</label>
                                <input type="text" class="form-control @error('daerah_wl') is-invalid @enderror" id="daerah_wl" name="daerah_wl" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_wl') }}" disabled>
                                    @error('daerah_wl')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3">
                                  <label for="inflamasi_l" class ="form-text">Inflamasi :</label>
                                  <select class="form-control @error('inflamasi_l') is-invalid @enderror" id="inflamasi_l" name="inflamasi_l" placeholder="pilih" value="{{ old('inflamasi_l') }}" required>
                                          @error('inflamasi_l')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      <option value="" selected disabled>Inflamasi</option>
                                      <option value="Ada">Ada</option>
                                      <option value="Tidak Ada">Tidak Ada</option>
                                  </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label for="daerah_il" class ="form-text">Daerah Mana :</label>
                                  <input type="text" class="form-control @error('daerah_il') is-invalid @enderror" id="daerah_il" name="daerah_il" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_il') }}" disabled>
                                      @error('daerah_il')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3">
                                    <label for="ulserasi_l" class ="form-text">Ulserasi :</label>
                                    <select class="form-control @error('ulserasi_l') is-invalid @enderror" id="ulserasi_l" name="ulserasi_l" placeholder="pilih" value="{{ old('ulserasi_l') }}" required>
                                            @error('ulserasi_l')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option value="" selected disabled>Ulserasi</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="daerah_ul" class ="form-text">Daerah Mana :</label>
                                    <input type="text" class="form-control @error('daerah_ul') is-invalid @enderror" id="daerah_ul" name="daerah_ul" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_ul') }}" disabled>
                                        @error('daerah_ul')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                  </div>
                                </div>
                              

                                
                        <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                            {{-- <center> --}}
                            <h6 class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical"> - Lidah - </h6>
                            {{-- </center> --}}
                        </div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3">
                                <label for="warna_l" class ="form-text">Perubahan Warna :</label>
                                <select class="form-control @error('warna_l') is-invalid @enderror" id="warna_l" name="warna_l" placeholder="Pilih" value="{{ old('warna_l') }}" required>
                                        @error('warna_l')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>Perubahan Warna</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                              </div>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="daerah_wl" class ="form-text">Daerah Mana :</label>
                                <input type="text" class="form-control @error('daerah_wl') is-invalid @enderror" id="daerah_wl" name="daerah_wl" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_wl') }}" disabled>
                                    @error('daerah_wl')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3">
                                  <label for="inflamasi_l" class ="form-text">Inflamasi :</label>
                                  <select class="form-control @error('inflamasi_l') is-invalid @enderror" id="inflamasi_l" name="inflamasi_l" placeholder="pilih" value="{{ old('inflamasi_l') }}" required>
                                          @error('inflamasi_l')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      <option value="" selected disabled>Inflamasi</option>
                                      <option value="Ada">Ada</option>
                                      <option value="Tidak Ada">Tidak Ada</option>
                                  </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label for="daerah_il" class ="form-text">Daerah Mana :</label>
                                  <input type="text" class="form-control @error('daerah_il') is-invalid @enderror" id="daerah_il" name="daerah_il" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_il') }}" disabled>
                                      @error('daerah_il')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3">
                                    <label for="ulserasi_l" class ="form-text">Ulserasi :</label>
                                    <select class="form-control @error('ulserasi_l') is-invalid @enderror" id="ulserasi_l" name="ulserasi_l" placeholder="pilih" value="{{ old('ulserasi_l') }}" required>
                                            @error('ulserasi_l')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option value="" selected disabled>Ulserasi</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="daerah_ul" class ="form-text">Daerah Mana :</label>
                                    <input type="text" class="form-control @error('daerah_ul') is-invalid @enderror" id="daerah_ul" name="daerah_ul" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_ul') }}" disabled>
                                        @error('daerah_ul')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                  </div>
                                </div>



                                <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                                    {{-- <center> --}}
                                    <h6 class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical"> - Lidah - </h6>
                                    {{-- </center> --}}
                                </div>
                                    <div class="form-group row">
                                      <div class="col-sm-6 mb-3">
                                        <label for="warna_l" class ="form-text">Perubahan Warna :</label>
                                        <select class="form-control @error('warna_l') is-invalid @enderror" id="warna_l" name="warna_l" placeholder="Pilih" value="{{ old('warna_l') }}" required>
                                                @error('warna_l')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            <option value="" selected disabled>Perubahan Warna</option>
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="daerah_wl" class ="form-text">Daerah Mana :</label>
                                        <input type="text" class="form-control @error('daerah_wl') is-invalid @enderror" id="daerah_wl" name="daerah_wl" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_wl') }}" disabled>
                                            @error('daerah_wl')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3">
                                          <label for="inflamasi_l" class ="form-text">Inflamasi :</label>
                                          <select class="form-control @error('inflamasi_l') is-invalid @enderror" id="inflamasi_l" name="inflamasi_l" placeholder="pilih" value="{{ old('inflamasi_l') }}" required>
                                                  @error('inflamasi_l')
                                                  <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                              <option value="" selected disabled>Inflamasi</option>
                                              <option value="Ada">Ada</option>
                                              <option value="Tidak Ada">Tidak Ada</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                          <label for="daerah_il" class ="form-text">Daerah Mana :</label>
                                          <input type="text" class="form-control @error('daerah_il') is-invalid @enderror" id="daerah_il" name="daerah_il" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_il') }}" disabled>
                                              @error('daerah_il')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                              @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6 mb-3">
                                            <label for="ulserasi_l" class ="form-text">Ulserasi :</label>
                                            <select class="form-control @error('ulserasi_l') is-invalid @enderror" id="ulserasi_l" name="ulserasi_l" placeholder="pilih" value="{{ old('ulserasi_l') }}" required>
                                                    @error('ulserasi_l')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                <option value="" selected disabled>Ulserasi</option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                          </div>
                                          <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="daerah_ul" class ="form-text">Daerah Mana :</label>
                                            <input type="text" class="form-control @error('daerah_ul') is-invalid @enderror" id="daerah_ul" name="daerah_ul" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_ul') }}" disabled>
                                                @error('daerah_ul')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                          </div>
                                        </div>

                                        
                        <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                            {{-- <center> --}}
                            <h6 class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical"> - Lidah - </h6>
                            {{-- </center> --}}
                        </div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3">
                                <label for="warna_l" class ="form-text">Perubahan Warna :</label>
                                <select class="form-control @error('warna_l') is-invalid @enderror" id="warna_l" name="warna_l" placeholder="Pilih" value="{{ old('warna_l') }}" required>
                                        @error('warna_l')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>Perubahan Warna</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                              </div>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="daerah_wl" class ="form-text">Daerah Mana :</label>
                                <input type="text" class="form-control @error('daerah_wl') is-invalid @enderror" id="daerah_wl" name="daerah_wl" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_wl') }}" disabled>
                                    @error('daerah_wl')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3">
                                  <label for="inflamasi_l" class ="form-text">Inflamasi :</label>
                                  <select class="form-control @error('inflamasi_l') is-invalid @enderror" id="inflamasi_l" name="inflamasi_l" placeholder="pilih" value="{{ old('inflamasi_l') }}" required>
                                          @error('inflamasi_l')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      <option value="" selected disabled>Inflamasi</option>
                                      <option value="Ada">Ada</option>
                                      <option value="Tidak Ada">Tidak Ada</option>
                                  </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label for="daerah_il" class ="form-text">Daerah Mana :</label>
                                  <input type="text" class="form-control @error('daerah_il') is-invalid @enderror" id="daerah_il" name="daerah_il" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_il') }}" disabled>
                                      @error('daerah_il')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3">
                                    <label for="ulserasi_l" class ="form-text">Ulserasi :</label>
                                    <select class="form-control @error('ulserasi_l') is-invalid @enderror" id="ulserasi_l" name="ulserasi_l" placeholder="pilih" value="{{ old('ulserasi_l') }}" required>
                                            @error('ulserasi_l')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option value="" selected disabled>Ulserasi</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="daerah_ul" class ="form-text">Daerah Mana :</label>
                                    <input type="text" class="form-control @error('daerah_ul') is-invalid @enderror" id="daerah_ul" name="daerah_ul" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_ul') }}" disabled>
                                        @error('daerah_ul')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                  </div>
                                </div>
                                
                                        
                        <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                            {{-- <center> --}}
                            <h6 class="col-sm-12 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-secondary-vertical"> - Lidah - </h6>
                            {{-- </center> --}}
                        </div>
                            <div class="form-group row">
                              <div class="col-sm-6 mb-3">
                                <label for="warna_l" class ="form-text">Perubahan Warna :</label>
                                <select class="form-control @error('warna_l') is-invalid @enderror" id="warna_l" name="warna_l" placeholder="Pilih" value="{{ old('warna_l') }}" required>
                                        @error('warna_l')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <option value="" selected disabled>Perubahan Warna</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                              </div>
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="daerah_wl" class ="form-text">Daerah Mana :</label>
                                <input type="text" class="form-control @error('daerah_wl') is-invalid @enderror" id="daerah_wl" name="daerah_wl" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_wl') }}" disabled>
                                    @error('daerah_wl')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3">
                                  <label for="inflamasi_l" class ="form-text">Inflamasi :</label>
                                  <select class="form-control @error('inflamasi_l') is-invalid @enderror" id="inflamasi_l" name="inflamasi_l" placeholder="pilih" value="{{ old('inflamasi_l') }}" required>
                                          @error('inflamasi_l')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                      <option value="" selected disabled>Inflamasi</option>
                                      <option value="Ada">Ada</option>
                                      <option value="Tidak Ada">Tidak Ada</option>
                                  </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                  <label for="daerah_il" class ="form-text">Daerah Mana :</label>
                                  <input type="text" class="form-control @error('daerah_il') is-invalid @enderror" id="daerah_il" name="daerah_il" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_il') }}" disabled>
                                      @error('daerah_il')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 mb-3">
                                    <label for="ulserasi_l" class ="form-text">Ulserasi :</label>
                                    <select class="form-control @error('ulserasi_l') is-invalid @enderror" id="ulserasi_l" name="ulserasi_l" placeholder="pilih" value="{{ old('ulserasi_l') }}" required>
                                            @error('ulserasi_l')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <option value="" selected disabled>Ulserasi</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="daerah_ul" class ="form-text">Daerah Mana :</label>
                                    <input type="text" class="form-control @error('daerah_ul') is-invalid @enderror" id="daerah_ul" name="daerah_ul" placeholder="Tuliskan Nama Daerah-nya" value="{{ old('daerah_ul') }}" disabled>
                                        @error('daerah_ul')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                  </div>
                                </div>
                            
                        <div class="form-group row">
                            <div class="col-sm-6 d-grid gap-2">
                                <a href="{{route('odontogram.index')}}" class="btn btn-success btn-block btn">
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
        </div>
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
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
        } 
        else {
            masalahElement.value = "Tidak ditemukan";
            masalahElement.style.backgroundColor = "red";
        }
    }

        // Call the tentukanMasalah function whenever a dropdown changes
    document.querySelectorAll('select').forEach(function (dropdown) {
        dropdown.addEventListener('change', tentukanMasalah);
    });

    // Initial calculation on page load
    tentukanMasalah();
</script>

<script>
$('#warna_l').change(function() {
  if ($(this).val() == "Tidak Ada" ) {
    $('#daerah_wl').attr("disabled", "disabled");
    document.getElementById("daerah_wl").placeholder = "Tidak Perlu Diisi";
  } else {
    $('#daerah_wl').removeAttr("disabled");
    $('#daerah_wl').attr("required", "required");
    document.getElementById("daerah_wl").placeholder = "Tuliskan Nama Daerah-nya";
  }
}).trigger("change");
</script>
@endsection