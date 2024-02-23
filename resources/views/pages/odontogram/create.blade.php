@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Odontogram'])
    <style>
        .form-floating {
            display: inline-block;
            margin-right: 10px; /* Adjust the margin as needed */
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
                    <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Pengetahuan</h6></marquee>
                  </div>

                  <div class="form-group row mt-3">
                    <div class="form-floating">
                        <select class="form-select" id="kode_55" name="kode_55" aria-label="Floating label select example">
                          <option value="" selected></option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                          <option value="F">F</option>
                          <option value="G">G</option>
                        </select>
                        <label for="kode_55">55</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="kode_54" name="kode_54" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_54">54</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_53" name="kode_53" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_53">53</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_52" name="kode_52" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_52">52</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_51" name="kode_51" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_51">51</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_61" name="kode_61" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_61">61</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_62" name="kode_62" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_62">62</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_63" name="kode_63" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_63">63</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_64" name="kode_64" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_64">64</label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-select" id="kode_65" name="kode_65" aria-label="Floating label select example">
                            <option value="" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                        </select>
                        <label for="kode_65">65</label>
                    </div>
                    
                </div>

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Keterampilan</h6></marquee>
                </div>

                <div class="form-group row mb-3 mt-3">
                    <div class="col-sm-3 mb-sm-0 text-center font-weight-bold">
                        Area
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center font-weight-bold">
                        Vertikal
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center font-weight-bold">
                        Horizontal
                    </div>
                    <div class="col-sm-1 mb-sm-0 text-center font-weight-bold">
                        Roll
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center font-weight-bold">
                        Tidak Disikat
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center font-weight-bold">
                        Hasil
                    </div>
                </div>

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                  <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Perilaku/Kebiasaan</h6></marquee>
                </div>


                  <div class="form-group row">
                    <div class="col-sm-3 mb-3">
                        <label for="jumlah_pilihan" class="form-text">Jumlah Pilihan :</label>
                    </div>
                    <div class="col-sm-9 mb-3">
                        <input type="text" name="jumlah_pilihan" value="" class="form-control" readonly>
                    </div>
                  </div>

                
                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Peran Orang Tua</h6></marquee>
                  </div>
                <div class="form-group row mb-3 mt-3">
                    <div class="col-sm-2 mb-sm-0">
                        Peran Orang Tua
                    </div>
                    <div class="col-sm-3 mb-sm-0 text-center">
                        <input type="checkbox" id="peran_ortu1" name="peran_ortu[]" value="1">
                        <label for="peran_ortu1">Mendampingi menggosok gigi</label>
                    </div>
                    <div class="col-sm-3 mb-sm-0 text-center">
                        <input type="checkbox" id="peran_ortu2" name="peran_ortu[]" value="2">
                        <label for="peran_ortu2">Memerintahkan menggosok gigi</label>
                    </div>
                    <div class="col-sm-4 mb-sm-0 text-center">
                        <input type="checkbox" id="peran_ortu3" name="peran_ortu[]" value="3">
                        <label for="peran_ortu3">Menganjurkan berkumur setiap makan manis-manis</label>
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

</script>
@endsection