@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12 mb-2">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content">
        <section>
            <div class="page-header min-vh-0">
                <div class="container">
                    <div class="row justify-content-center">
                        
                        <div class="mt-4 col-xl-5 col-lg-5 col-md-5 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <div id="alert">
                                        @include('components.alert')
                                    </div>
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required aria-label="Email">
                                            {{-- value="{{ old('email') ?? 'admin@argon.com' }} --}}
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" required aria-label="Password">
                                            {{-- value="secret" --}}
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="show" type="checkbox" id="show" onclick="ShowPass()">
                                            <label class="form-check-label" for="show">Show Password</label>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-0">
                                        Forgot you password? Reset your password
                                        <a href="{{ route('reset-password') }}" class="text-primary text-gradient font-weight-bold">here</a>
                                    </p>
                                </div>
                                {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div> --}}
                            </div>
                        </div>

                        {{-- <div class="col-xl-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column"> --}}
                        <div class="mt-2 col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                                <span class="mask bg-gradient-primary opacity-7"><img src="{{ asset('/img/GedungGigi.jpg') }}" class="img-fluid position-absolute top-50 start-50 translate-middle"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Visi"</h4>
                                <p class="text-white position-relative">Menjadi Program Studi yang Menghasilkan Ahli Madya Kesehatan Gigi yang Bermartabat dengan Keunggulan di Bidang Pelayanan Asuhan Kesehatan Gigi dan Mulut Berbsis IT Tahun 2025</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
{{-- @section('js') --}}
<script>
    function ShowPass() {
        var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
</script>
{{-- @endsection --}}
