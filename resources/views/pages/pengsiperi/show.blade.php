@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => 'Detail Pengetahuan, Keterampilan, Perilaku dan Peran Orang Tua',
    ])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Pengetahuan, Keterampilan, Perilaku dan Peran Orang Tua
                </h6>
            </div>
            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="text-center mb-3">
                        <img class="img-fluid max-width: 200%; height: 100%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 text-center mb-3">
                    <h3 class="font-weight-bold text-dark text-center">Pengetahuan, Keterampilan, Perilaku dan Peran Orang
                        Tua</h3>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Mahasiswa:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'id', $pengsiperi->user_id, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="user_id" class="form-text">Pembimbing:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('users', 'nimnip', $pengsiperi->pembimbing, 'username')[0]->username ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">No Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $pengsiperi->kartupasien_id, 'no_kartu')[0]->no_kartu ?? '') }}"
                            disabled readonly required>
                    </div>
                    <div class="col-sm-2">
                        <label for="kartupasien_id" class="form-text">Nama Pasien :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"
                            value="{{ ucwords(get_v('kartupasiens', 'id', $pengsiperi->kartupasien_id, 'nama')[0]->nama ?? '') }}"
                            disabled readonly required>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Pengetahuan</h6>
                    </marquee>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-12 mb-3">
                        @php
                            $no = 1;
                        @endphp
                        @foreach (explode(',', $pengsiperi->pengetahuan) as $id)
                            @foreach ($pengetahuans as $pengetahuan)
                                @if ($id == $pengetahuan->id)
                                    <input type="text" class="form-control"
                                        value="{{ $no }}. {{ $pengetahuan->soal }} " readonly disabled>
                                    @php
                                        $no++;
                                    @endphp
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-text">Score</label><br>
                        <input type="text" class="form-control text-center"
                            value="{{ $pengsiperi->jawaban_benar_peng }} / {{ $pengsiperi->jumlah_pertanyaan_peng }}"
                            readonly disabled>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-text">Nilai</label><br>
                        <input type="text" class="form-control text-center" value="{{ $pengsiperi->nilai_peng }}"
                            readonly disabled>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-text">Kriteria</label><br>
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->kriteria == 'Buruk' ? 'bg-danger' : ($pengsiperi->kriteria == 'Sedang' ? 'bg-warning' : 'bg-success') }}"
                            value="{{ $pengsiperi->kriteria }}" readonly disabled>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Keterampilan</h6>
                    </marquee>
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
                <div class="form-group row mb-3">
                    <div class="col-sm-3 mb-sm-0 text-center">
                        Permukaan Labial/Buccal
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->labialbukal == '1')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->labialbukal == '2')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-1 mb-sm-0 text-center">
                        @if ($pengsiperi->labialbukal == '3')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->labialbukal == '4')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->hasil_lb == 'Salah' ? 'bg-danger' : 'bg-success' }}"
                            value="{{ $pengsiperi->hasil_lb }}" disabled readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-3 mb-sm-0 text-center">
                        Permukaan Lingual/Palatal
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->lingualpalatal == '1')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->lingualpalatal == '2')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-1 mb-sm-0 text-center">
                        @if ($pengsiperi->lingualpalatal == '3')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->lingualpalatal == '4')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->hasil_lp == 'Salah' ? 'bg-danger' : 'bg-success' }}"
                            value="{{ $pengsiperi->hasil_lp }}" disabled readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-3 mb-sm-0 text-center">
                        Permukaan Kunyah
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->kunyah == '1')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->kunyah == '2')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-1 mb-sm-0 text-center">
                        @if ($pengsiperi->kunyah == '3')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->kunyah == '4')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->hasil_k == 'Salah' ? 'bg-danger' : 'bg-success' }}"
                            value="{{ $pengsiperi->hasil_k }}" disabled readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-3 mb-sm-0 text-center">
                        Interdental
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->interdental == '1')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->interdental == '2')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-1 mb-sm-0 text-center">
                        @if ($pengsiperi->interdental == '3')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->interdental == '4')
                            <span>✔</span>
                        @endif
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->hasil_i == 'Salah' ? 'bg-danger' : 'bg-success' }}"
                            value="{{ $pengsiperi->hasil_i }}" disabled readonly>
                    </div>
                </div>
                <hr>
                <div class="form-group row mb-3">
                    <div class="col-sm-3 mb-sm-0 text-center">
                        Gerakan Menggosok Gigi
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->gerakan == '1')
                            <span>✔</span>
                        @endif
                        <label for="gerakan1">Cepat</label>
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->gerakan == '2')
                            <span>✔</span>
                        @endif
                        <label for="gerakan2">Lambat</label>
                    </div>
                    <div class="col-sm-2 mb-sm-0 text-center">
                        @if ($pengsiperi->gerakan == '3')
                            <span>✔</span>
                        @endif
                        <label for="gerakan3">Cukup</label>
                    </div>
                    <div class="col-sm-3 mb-sm-0 text-center">
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->hasil_g == 'Salah' ? 'bg-danger' : 'bg-success' }}"
                            value="{{ $pengsiperi->hasil_g }}" disabled readonly>
                    </div>
                </div>

                <div class="form-group row font-weight-bold">
                    <div class="col-sm-12 text-center font-weight-bold">
                        <label for="kesimpulan" class="form-text font-weight-bold">kesimpulan :</label>
                    </div><br>
                    <div class="col-sm-12 mb-3">
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->kesimpulan == 'Terampil' ? 'bg-success' : 'bg-danger' }}"
                            value="{{ $pengsiperi->kesimpulan }}" disabled readonly>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">


                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold text-center">Perilaku/Kebiasaan</h6>
                    </marquee>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-12 mb-3">
                        @php
                            $no = 1;
                        @endphp
                        @foreach (explode(',', $pengsiperi->perilaku) as $id)
                            @foreach ($perilakus as $perilaku)
                                @if ($id == $perilaku->id)
                                    <input type="text" class="form-control"
                                        value="{{ $no }}. {{ $perilaku->soal }} " readonly disabled>
                                    @php
                                        $no++;
                                    @endphp
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-text">Score</label><br>
                        <input type="text" class="form-control text-center"
                            value="{{ $pengsiperi->jumlah_yang_terpilih }} / {{ $pengsiperi->jumlah_pilihan }}" readonly
                            disabled>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-text">Nilai</label><br>
                        <input type="text" class="form-control text-center" value="{{ $pengsiperi->nilai_peri }}"
                            readonly disabled>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-text">Berperilaku</label><br>
                        <input type="text"
                            class="form-control text-center {{ $pengsiperi->berperilaku == 'Negatif' ? 'bg-danger' : 'bg-success' }}"
                            value="{{ $pengsiperi->berperilaku }}" readonly disabled>
                    </div>
                </div>

                <hr class="my-4 w-100 border-top border-dark border-4 d-print-block">

                <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee>
                    <h6 class="m-0 font-weight-bold text-dark text-bold">Peran Orang Tua</h6>
                    </marquee>
                </div>
                <div class="form-group row mb-3 mt-3">
                    <div class="col-sm-12 mb-sm-0">
                        @if (in_array(1, explode(',', $pengsiperi->peran_ortu)))
                            <span>✔</span>
                        @else
                            <span>❌</span>
                        @endif
                        <label for="peran_ortu1">Mendampingi menggosok gigi</label><br>
                        @if (in_array(2, explode(',', $pengsiperi->peran_ortu)))
                            <span>✔</span>
                        @else
                            <span>❌</span>
                        @endif
                        <label for="peran_ortu2">Memerintahkan menggosok gigi</label><br>
                        @if (in_array(3, explode(',', $pengsiperi->peran_ortu)))
                            <span>✔</span>
                        @else
                            <span>❌</span>
                        @endif
                        <label for="peran_ortu3">Menganjurkan berkumur setiap makan manis-manis</label>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @can('pembimbing')
                    <div class="form-group row">
                        <div class="col-sm-12 d-grid gap-2">
                            <a href="{{ route('pengsiperi.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                    </div>
                @endcan
                @can('adminmahasiswa')
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('pengsiperi.index') }}" class="btn btn-success btn-block btn">
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
@endsection
