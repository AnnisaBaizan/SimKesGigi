@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'User'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah User'])
    
    {{-- <div class="col-lg-8 page-header align-items-start start-50 translate-middle-x border-radius-lg"> --}}
    <div class="col-lg-8 container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Formulir User Baru</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    <div class="flex flex-col mb-3">
                        <div class="form-group row">
                          <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="nimnip" class ="form-text">NIM / NIP :</label>
                          </div>
                          <div class="col-sm-8 mb-3 mb-sm-0">
                            <input type="text" class="form-control @error('nimnip') is-invalid @enderror" id="nimnip" name="nimnip" placeholder="Masukan NIM / NIP" value="{{ old('nimnip') }}" required>
                                @error('nimnip')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                              <label for="username" class ="form-text">Nama Lengkap + Gelar :</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan Nama Lengkap + Gelar" value="{{ old('username') }}" required>
                                  @error('username')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                              <label for="email" class ="form-text">Email :</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email" value="{{ old('email') }}" required>
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="password" class ="form-text">Password :</label>
                              </div>
                              <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan Password" value="{{ old('password') }}" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3">
                              <label for="role" class ="form-text">Sebagai :</label>
                            </div>
                            <div class="col-sm-8 mb-3">
                              <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="Peran" value="{{ old('role') }}" required>
                                      @error('role')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  <option value="" selected disabled>Peran</option>
                                  <option value="1">Admin</option>
                                  <option value="2">Pembimbing</option>
                                  <option value="3">Mahasiswa</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group row" id="pembimbingContainer" style="display: none;">
                          <div class="col-sm-4">
                              <label for="pembimbing" class ="form-text">Pilih Pembimbing :</label>
                          </div>
                          <div class="col-sm-8">
                              <select class="js-example-basic-single form-control @error('pembimbing') is-invalid @enderror" data-live-search="true" id="pembimbing" name="pembimbing" placeholder="Pilih Pasien" value="{{ old('pembimbing') }}" required>
                                  @error('pembimbing')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                  <option value="" selected disabled>Pilih Pembimbing</option>
                                  @foreach ($pembimbings as $pembimbing)
                                  <option value="{{ $pembimbing->nimnip }}">{{ $pembimbing->nimnip }} | {{ $pembimbing->username }}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="avatar" class ="form-text">Foto Profil :</label>
                        </div>
                        <div class="col-sm-8 mb-3 mb-sm-0">
                            <div class="text-center">
                                <img src="{{ asset('/img/default.jpg') }}" id="frame" class="text-center img-preview mb-3 img-profile rounded-circle" width="200px" height="200px" style="overflow:hidden">
                            </div>
                            <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewImage()">
                            @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check form-check-info text-start">
                        <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            Anda yakin data anda sudah <a href="javascript:;" class="text-dark font-weight-bolder">benar</a>
                        </label>
                        @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{route('user.index')}}" class="btn btn-success btn-block btn">
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
  <script type="text/javascript">
    function previewImage(){
            frame.src=URL.createObjectURL(event.target.files[0])
        }
</script>
<script>
  $(document).ready(function () {
      // Menangani perubahan nilai pada select dengan id "role"
      $("#role").change(function () {
          // Mendapatkan nilai yang dipilih pada select "role"
          var selectedRole = $(this).val();

          // Menampilkan atau menyembunyikan select "pembimbingContainer" berdasarkan nilai "role"
          if (selectedRole === "3") {
              $("#pembimbingContainer").show();
              $("#pembimbing").attr('required', 'required'); // menambahkan atribut required jika pembimbing ditampilkan
          } else {
              $("#pembimbingContainer").hide();
              $("#pembimbing").removeAttr('required'); // menghapus atribut required jika pembimbing disembunyikan
          }
      });
  });
</script>
@endsection