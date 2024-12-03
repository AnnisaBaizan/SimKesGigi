@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => 'Tambahan Pengetahuan, Keterampilan, Perilaku dan Peran Orang Tua',
    ])

    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengetahuan, Keterampilan, Perilaku dan Peran Orang Tua</h6>
            </div>
            <div class="card-body">
                <form class="user" action="{{ route('pengsiperi.store') }}" method="post">
                    @csrf

                    @can('admin')
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="user_id" class="form-text">Pilih Mahasiswa :</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="js-example-basic-single form-control @error('user_id') is-invalid @enderror"
                                    data-live-search="true" id="user_id" name="user_id" placeholder="Pilih Mahasiswa"
                                    value="{{ old('user_id') }}" required>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Mahasiswa</option>
                                    @foreach ($users as $user)
                                        {{-- <option value="{{ $user->id }}" data-pembimbing="{{ $user->pembimbing }}"> --}}
                                        <option value="{{ $user->id }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing" readonly required>
                                @error('pembimbing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="kartupasien_id" class="form-text">Pilih Pasien :</label>
                            </div>
                            <div class="col-sm-8">
                                <select
                                    class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror"
                                    data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien"
                                    value="{{ old('kartupasien_id') }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Pasien</option>
                                </select>
                            </div>
                        </div>
                    @endcan

                    @can('mahasiswa')
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('user_id') is-invalid_max @enderror" id="user_id"
                                name="user_id" placeholder="user_id" value="{{ auth()->user()->id }}" required>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                id="pembimbing" name="pembimbing" placeholder="pembimbing"
                                value="{{ auth()->user()->pembimbing }}" required>
                            @error('pembimbing')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="kartupasien_id" class ="form-text">Pilih Pasien :</label>
                            </div>
                            <div class="col-sm-8">
                                <select
                                    class="js-example-basic-single form-control @error('kartupasien_id') is-invalid @enderror"
                                    data-live-search="true" id="kartupasien_id" name="kartupasien_id" placeholder="Pilih Pasien"
                                    value="{{ old('kartupasien_id') }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Pasien</option>
                                    @foreach ($kartupasiens as $kartupasien)
                                        <option value="{{ $kartupasien->id }}" data-pembimbing="{{ $kartupasien->pembimbing }}">{{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Pengetahuan</h6>
                        </marquee>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-sm-5 mb-3">
                            <label for="pengetahuan" class ="form-text">Pilih Pertanyaan yang Berhasil Dijawab dengan
                                Benar :</label>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <select
                                class="js-example-basic-multiple form-control @error('pengetahuan') is-invalid @enderror"
                                data-live-search="true" id="pengetahuan" name="pengetahuan[]"
                                placeholder="Pilih Pertanyaan yang berhasil dijawab dengan Benar"
                                value="{{ old('pengetahuan[]') }}" multiple="multiple" required>
                                @error('pengetahuan[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <option value="" selected disabled>Pilih Pertanyaan yang berhasil dijawab dengan Benar</option> --}}
                                @foreach ($pengetahuans as $pengetahuan)
                                    <option value="{{ $pengetahuan->id }}">{{ $pengetahuan->soal }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-5 mb-3">
                            <label for="jumlah_pertanyaan_peng" class="form-text">Jumlah Pertanyaan :</label>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <input type="text" class="form-control" id="jumlah_pertanyaan_peng"
                                name="jumlah_pertanyaan_peng" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-5 mb-3">
                            <label for="jawaban_benar_peng" class="form-text">Jawaban yang Benar :</label>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <input type="text" class="form-control" id="jawaban_benar_peng" name="jawaban_benar_peng"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-5 mb-3">
                            <label for="nilai_peng" class="form-text">Nilai Pengetahuan :</label>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <input type="text" class="form-control" id="nilai_peng" name="nilai_peng" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-5 mb-3">
                            <label for="kriteria" class="form-text">Kriteria :</label>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <input type="text" class="form-control" id="kriteria" name="kriteria" readonly>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Keterampilan</h6>
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
                            <input type="radio" id="labialbukal1" name="labialbukal" value="1">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="labialbukal2" name="labialbukal" value="2">
                        </div>
                        <div class="col-sm-1 mb-sm-0 text-center">
                            <input type="radio" id="labialbukal3" name="labialbukal" value="3">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="labialbukal4" name="labialbukal" value="4">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="text" class="form-control" id="hasil_lb" name="hasil_lb" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-3 mb-sm-0 text-center">
                            Permukaan Lingual/Palatal
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="lingualpalatal1" name="lingualpalatal" value="1">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="lingualpalatal2" name="lingualpalatal" value="2">
                        </div>
                        <div class="col-sm-1 mb-sm-0 text-center">
                            <input type="radio" id="lingualpalatal3" name="lingualpalatal" value="3">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="lingualpalatal4" name="lingualpalatal" value="4">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="text" class="form-control" id="hasil_lp" name="hasil_lp" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-3 mb-sm-0 text-center">
                            Permukaan Kunyah
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="kunyah1" name="kunyah" value="1">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="kunyah2" name="kunyah" value="2">
                        </div>
                        <div class="col-sm-1 mb-sm-0 text-center">
                            <input type="radio" id="kunyah3" name="kunyah" value="3">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="kunyah4" name="kunyah" value="4">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="text" class="form-control" id="hasil_k" name="hasil_k" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-3 mb-sm-0 text-center">
                            Interdental
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="interdental1" name="interdental" value="1">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="interdental2" name="interdental" value="2">
                        </div>
                        <div class="col-sm-1 mb-sm-0 text-center">
                            <input type="radio" id="interdental3" name="interdental" value="3">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="interdental4" name="interdental" value="4">
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="text" class="form-control" id="hasil_i" name="hasil_i" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-3">
                        <div class="col-sm-3 mb-sm-0 text-center">
                            Gerakan Menggosok Gigi
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="gerakan1" name="gerakan" value="1">
                            <label for="gerakan1">Cepat</label>
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="gerakan2" name="gerakan" value="2">
                            <label for="gerakan2">Lambat</label>
                        </div>
                        <div class="col-sm-2 mb-sm-0 text-center">
                            <input type="radio" id="gerakan3" name="gerakan" value="3">
                            <label for="gerakan3">Cukup</label>
                        </div>
                        <div class="col-sm-3 mb-sm-0 text-center">
                            <input type="text" class="form-control" id="hasil_g" name="hasil_g" readonly>
                        </div>
                    </div>

                    <div class="form-group row font-weight-bold">
                        <div class="col-sm-12 text-center font-weight-bold">
                            <label for="kesimpulan" class="form-text font-weight-bold">kesimpulan :</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3">
                            <input type="text" class="form-control text-center" id="kesimpulan" name="kesimpulan"
                                readonly>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Perilaku/Kebiasaan</h6>
                        </marquee>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-sm-3 mb-3">
                            <label for="perilaku" class ="form-text">Pilih Perilaku/Kebiasaan Pasien :</label>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <select class="js-example-basic-multiple form-control @error('perilaku') is-invalid @enderror"
                                data-live-search="true" id="perilaku" name="perilaku[]"
                                placeholder="Pilih Perilaku/Kebiasaan Pasien" value="{{ old('perilaku[]') }}"
                                multiple="multiple" required>
                                @error('perilaku[]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <option value="" selected disabled>Pilih Perilaku/Kebiasaan Pasien</option> --}}
                                @foreach ($perilakus as $perilaku)
                                    <option value="{{ $perilaku->id }}">{{ $perilaku->soal }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3">
                            <label for="jumlah_pilihan" class="form-text">Jumlah Pilihan :</label>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <input type="text" id="jumlah_pilihan" name="jumlah_pilihan" value=""
                                class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3">
                            <label for="jumlah_yang_terpilih" class="form-text">Jumlah yang Terpilih :</label>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <input type="text" id="jumlah_yang_terpilih" name="jumlah_yang_terpilih" value=""
                                class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3">
                            <label for="nilai_peri" class="form-text">Nilai Perilaku :</label>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <input type="text" id="nilai_peri" name="nilai_peri" value="" class="form-control"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3">
                            <label for="berperilaku" class="form-text">Pasien Berperilaku :</label>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <input type="text" id="berperilaku" name="berperilaku" value=""
                                class="form-control bg-success" readonly>
                        </div>
                    </div>


                    <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                        <marquee>
                            <h6 class="m-0 font-weight-bold text-dark text-bold">Peran Orang Tua</h6>
                        </marquee>
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
                            <a href="{{ route('pengsiperi.index') }}" class="btn btn-success btn-block btn">
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
    <script>
        $(document).ready(function() {
            // Fungsi untuk menghitung nilai dan mengatur kriteria
            function hitungNilai() {
                var jumlahPertanyaan = $('#pengetahuan option').length;
                var jawabanBenar = $('#pengetahuan').val().length;
                var nilai = (jawabanBenar / jumlahPertanyaan) * 100;

                // Set nilai pada input dengan name="jumlah_pertanyaan_peng" dan name="jawaban_benar_peng"
                $('input[name="jumlah_pertanyaan_peng"]').val(jumlahPertanyaan);
                $('input[name="jawaban_benar_peng"]').val(jawabanBenar);
                $('input[name="nilai_peng"]').val(nilai.toFixed(2));

                // Tentukan kriteria
                var kriteria = '';
                var bgColor = '';

                if (nilai > 75) {
                    kriteria = 'Baik';
                    bgColor = 'success';
                } else if (nilai >= 56 && nilai <= 75) {
                    kriteria = 'Sedang';
                    bgColor = 'warning';
                } else {
                    kriteria = 'Buruk';
                    bgColor = 'danger';
                }

                // Set nilai dan background color pada input dengan name="kriteria"
                $('input[name="kriteria"]').val(kriteria);
                $('input[name="kriteria"]').removeClass(
                    'bg-success bg-warning bg-danger'); // Hapus kelas background color sebelum mengganti
                $('input[name="kriteria"]').addClass('bg-' + bgColor); // Tambahkan kelas background color
            }

            // Tambahkan event listener untuk perubahan nilai pada dropdown pertanyaan
            $('#pengetahuan').on('change', function() {
                hitungNilai();
            });

            // Panggil fungsi hitungNilai saat halaman dimuat
            hitungNilai();
        });
    </script>
    <script>
        function labialbukal() {
            var selectedValue = $("input[name='labialbukal']:checked").val();
            var hasilLbInput = $("#hasil_lb");

            if (selectedValue === "1" || selectedValue === "3") {
                hasilLbInput.val("Benar");
                hasilLbInput.removeClass("bg-danger");
                hasilLbInput.addClass("bg-success");
            } else {
                hasilLbInput.val("Salah");
                hasilLbInput.removeClass("bg-success");
                hasilLbInput.addClass("bg-danger");
            }
        }
        $("[name='labialbukal']").on('change', function() {
            labialbukal()
        });

        function lingualpalatal() {
            var selectedValue = $("input[name='lingualpalatal']:checked").val();
            var hasilLbInput = $("#hasil_lp");

            if (selectedValue === "1") {
                hasilLbInput.val("Benar");
                hasilLbInput.removeClass("bg-danger");
                hasilLbInput.addClass("bg-success");
            } else {
                hasilLbInput.val("Salah");
                hasilLbInput.removeClass("bg-success");
                hasilLbInput.addClass("bg-danger");
            }
        }
        $("[name='lingualpalatal']").on('change', function() {
            lingualpalatal()
        });

        function kunyah() {
            var selectedValue = $("input[name='kunyah']:checked").val();
            var hasilLbInput = $("#hasil_k");

            if (selectedValue === "2") {
                hasilLbInput.val("Benar");
                hasilLbInput.removeClass("bg-danger");
                hasilLbInput.addClass("bg-success");
            } else {
                hasilLbInput.val("Salah");
                hasilLbInput.removeClass("bg-success");
                hasilLbInput.addClass("bg-danger");
            }
        }
        $("[name='kunyah']").on('change', function() {
            kunyah()
        });

        function interdental() {
            var selectedValue = $("input[name='interdental']:checked").val();
            var hasilLbInput = $("#hasil_i");

            if (selectedValue === "3") {
                hasilLbInput.val("Benar");
                hasilLbInput.removeClass("bg-danger");
                hasilLbInput.addClass("bg-success");
            } else {
                hasilLbInput.val("Salah");
                hasilLbInput.removeClass("bg-success");
                hasilLbInput.addClass("bg-danger");
            }
        }
        $("[name='interdental']").on('change', function() {
            interdental()
        });

        function gerakan() {
            var selectedValue = $("input[name='gerakan']:checked").val();
            var hasilLbInput = $("#hasil_g");

            if (selectedValue === "3") {
                hasilLbInput.val("Benar");
                hasilLbInput.removeClass("bg-danger");
                hasilLbInput.addClass("bg-success");
            } else {
                hasilLbInput.val("Salah");
                hasilLbInput.removeClass("bg-success");
                hasilLbInput.addClass("bg-danger");
            }
        }
        $("[name='gerakan']").on('change', function() {
            gerakan()
        });

        function updateKesimpulan() {
            var hasilLb = $("#hasil_lb").val();
            var hasilLp = $("#hasil_lp").val();
            var hasilK = $("#hasil_k").val();
            var hasilI = $("#hasil_i").val();
            var hasilG = $("#hasil_g").val();
            var kesimpulanInput = $("#kesimpulan");

            // Hitung jumlah hasil yang bernilai "Benar"
            var jumlahBenar = [hasilLb, hasilLp, hasilK, hasilI, hasilG].filter(function(hasil) {
                return hasil === "Benar";
            }).length;

            // Atur nilai dan tampilan Kesimpulan
            if (jumlahBenar > 2) {
                kesimpulanInput.val("Terampil");
                kesimpulanInput.removeClass("bg-danger");
                kesimpulanInput.addClass("bg-success");
            } else {
                kesimpulanInput.val("Kurang Terampil");
                kesimpulanInput.removeClass("bg-success");
                kesimpulanInput.addClass("bg-danger");
            }
        }

        // Membuat event listener untuk setiap hasil yang dapat berubah
        $("[name='labialbukal'], [name='lingualpalatal'], [name='kunyah'], [name='interdental'], [name='gerakan']").on(
            'change',
            function() {
                updateKesimpulan();
            });
    </script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk menghitung nilai perilaku dan mengatur kriteria perilaku
            function hitungPerilaku() {
                var jumlahPilihan = $('#perilaku option').length;
                var jumlahTerpilih = $('#perilaku').val().length;
                var jumlahHitung = jumlahPilihan - jumlahTerpilih;
                var nilaiPeri = (jumlahHitung / jumlahPilihan) * 100;

                // Set nilai pada input dengan name="jumlah_pilihan" dan name="jumlah_yang_terpilih"
                $('input[name="jumlah_pilihan"]').val(jumlahPilihan);
                $('input[name="jumlah_yang_terpilih"]').val(jumlahTerpilih);
                $('input[name="nilai_peri"]').val(nilaiPeri.toFixed(2));

                // Tentukan kriteria perilaku
                var kriteriaPeri = '';
                var bgColorPeri = '';

                if (nilaiPeri > 50) {
                    kriteriaPeri = 'Positif';
                    bgColorPeri = 'success';
                } else {
                    kriteriaPeri = 'Negatif';
                    bgColorPeri = 'danger';
                }

                // Set nilai dan background color pada input dengan name="berperilaku"
                $('input[name="berperilaku"]').val(kriteriaPeri);
                $('input[name="berperilaku"]').removeClass(
                    'bg-success bg-danger'); // Hapus kelas background color sebelum mengganti
                $('input[name="berperilaku"]').addClass('bg-' + bgColorPeri); // Tambahkan kelas background color
            }

            // Tambahkan event listener untuk perubahan nilai pada dropdown perilaku
            $('#perilaku').on('change', function() {
                hitungPerilaku();
            });

            // Panggil fungsi hitungPerilaku saat halaman dimuat
            hitungPerilaku();
        });
    </script>
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
        // $('#kartupasien_id').selectpicker();
        // $("#kartupasien_id").select2();

        //   $(function() {
        //   var opts = $('#kartupasien_id option').map(function(){
        //     return [[this.value, $(this).text()]];
        //   });

        //   $('#search').keyup(function(){
        //     var rxp = new RegExp($('#search').val(), 'i');
        //     var kartupasien_id = $('#kartupasien_id').empty();
        //     opts.each(function(){
        //       if (rxp.test(this[1])) {
        //         kartupasien_id.append($('<option/>').attr('value', this[0]).text(this[1]));
        //       }
        //     });
        //   });
        // });

        $('#pnykt_ln').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#nm_pnykt_ln').attr("disabled", "disabled");
                document.getElementById("nm_pnykt_ln").placeholder = "Tidak Perlu diisi";
            } else {
                $('#nm_pnykt_ln').removeAttr("disabled");
                $('#nm_pnykt_ln').attr("required", "required");
                document.getElementById("nm_pnykt_ln").placeholder = "Tuliskan Nama Penyakitnya";
            }
        }).trigger("change");

        $('#alergi_obat').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#nm_obat').attr("disabled", "disabled");
                document.getElementById("nm_obat").placeholder = "Tidak Perlu diisi";
            } else {
                $('#nm_obat').removeAttr("disabled");
                $('#nm_obat').attr("required", "required");
                document.getElementById("nm_obat").placeholder = "Masukan Nama Obat";
            }
        }).trigger("change");

        $('#alergi_mkn').change(function() {
            if ($(this).val() == "Tidak Ada") {
                $('#nm_mkn').attr("disabled", "disabled");
                document.getElementById("nm_mkn").placeholder = "Tidak Perlu diisi";
            } else {
                $('#nm_mkn').removeAttr("disabled");
                $('#nm_mkn').attr("required", "required");
                document.getElementById("nm_mkn").placeholder = "Tuliskan Nama Makanannya";
            }
        }).trigger("change");
    </script>
    <script>
        $(document).ready(function() {
            $('#kartupasien_id').change(function() {
                var selectedOption = $(this).find(':selected');
                var pembimbingValue = selectedOption.data('pembimbing');
                $('#pembimbing').val(pembimbingValue);
            });
        });
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#user_id').on('change', function() {
                var user_id = $("#user_id").val();
                // var pembimbing = $("#pembimbing").val();

                $.ajax({
                    url: '/getPatients',
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        // pembimbing: pembimbing
                    },
                    cache: false,

                    success: function(msg) {
                        $("#kartupasien_id").html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    }
                });
            });
        });
    </script>
@endsection
