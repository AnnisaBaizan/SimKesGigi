@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Pertanyaan'])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Pertanyaan</h6>
            </div>
            <div class="card-body">
                <form class="user" action="{{ route('pertanyaan.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3">
                            <label for="kode" class ="form-text">Jenis Pertanyaan :</label>
                            <select class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode"
                                placeholder="Jenis Pertanyaan" value="{{ old('kode') }}" required>
                                @error('kode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" selected disabled>Pilih Salah satu</option>
                                <option value="1">Pengetahuan</option>
                                <option value="2">Perilaku</option>
                            </select>
                        </div>
                        <div class="col-sm-9 mb-3 mb-sm-0">
                            <label for="soal" class ="form-text">Tuliskan Pertanyaan :</label>
                            <textarea class="form-control @error('soal') is-invalid @enderror" id="soal" name="soal"
                                placeholder="Masukan Pertanyaan Anda" required>{{ old('soal') }}</textarea>
                            @error('soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

            <div class="form-group row">
                <div class="col-sm-6 d-grid gap-2">
                    <a href="{{ route('pertanyaan.index') }}" class="btn btn-success btn-block btn">
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
    <script></script>
@endsection
