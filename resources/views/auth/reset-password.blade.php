@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-50">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="mt-4 col-xl-5 col-lg-5 col-md-5 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Reset your password</h4>
                                    <p class="mb-0">Enter your email and please wait a few seconds</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('reset.perform') }}" class="mb-0">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 ">Send Reset Link</button>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <p class="text-sm mx-0">
                                                Batal! Kembali ke halaman login
                                                <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">here</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div id="alert">
                                    @include('components.alert')
                                </div>
                            </div>
                        </div>
                        {{-- <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
                                        background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p>
                            </div>
                        </div> --}}

                        <div class="mt-2 col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="position-relative bg-gradient-primary h-auto m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
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
