@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'detail User'])
    
    {{-- <div class="col-lg-8 page-header align-items-start start-50 translate-middle-x border-radius-lg"> --}}
    <div class="col-lg-8 container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Formulir detail User</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @method('put')
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
                            <input type="text" class="form-control @error('nimnip') is-invalid @enderror" id="nimnip" name="nimnip" placeholder="Masukan NIM / NIP" value="{{ old('nimnip', $user->nimnip) }}" required disabled readonly>
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
                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukan Nama Lengkap + Gelar" value="{{ old('username', $user->username) }}" required disabled readonly>
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
                              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email" value="{{ old('email', $user->email) }}" required disabled readonly>
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                            </div>
                          </div>

                          {{-- <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="inputName2" class ="form-text">Ganti Password</label>
                            </div>
                            <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputName2" placeholder="Kosongkan jika tidak ingin mengganti password">
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="inputName2" class ="form-text">Konfirmasi Password</label>
                            </div>
                        <div class="col-sm-8 mb-3 mb-sm-0">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputName2" placeholder="Konfirmasi Password">
                                @error('password_confirmation')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="col-sm-4 mb-3">
                              <label for="role" class ="form-text">Sebagai :</label>
                            </div>
                            <div class="col-sm-8 mb-3">
                              <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" placeholder="Peran" value="{{ old('role') }}" required disabled readonly>
                                      @error('role')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  <option value="" selected disabled>Peran</option>
                                  <option value="1" {{$user->role == 1 ? 'selected':''}}>Admin</option>
                                  <option value="2" {{$user->role == 2 ? 'selected':''}}>Pembimbing</option>
                                  <option value="3" {{$user->role == 3 ? 'selected':''}}>Mahasiswa</option>
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
                                <img src="{!! asset('/storage/avatars/'. $user->avatar) !!}" id="frame" class="text-center img-preview mb-3 img-profile rounded-circle" width="200px" height="200px" style="overflow:hidden">
                            </div>
                            {{-- <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar" onchange="previewImage()" disabled readonly>
                            @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>
                    </div>

                    {{-- <div class="form-check form-check-info text-start">
                        <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            Anda yakin data anda sudah <a href="javascript:;" class="text-dark font-weight-bolder">benar</a>
                        </label>
                        @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                    </div> --}}

                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{route('user.index')}}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-block btn">
                                <i class="fas fa-pen text-white"></i></i> Edit
                            </a>
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
@endsection