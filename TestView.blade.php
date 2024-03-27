@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => 'Detail Pengetahuan, Keterampilan, Perilaku dan peran orang tua',
    ])


    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Pengetahuan, Keterampilan, Perilaku dan peran orang tua
                </h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="col-sm-12 mb-sm-0 text-center">
                        <img class="img-fluid max-width: 150%; height: 50%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 mb-sm-0 text-center mt-3 mb-5">
                    <h3 class="font-weight-bold text-dark text-center">Pengetahuan, Keterampilan, Perilaku dan peran orang
                        tua</h3>
                </div>
                <div class="ms-3 me-3 mt-4">
                    {{-- <center> --}}
                    <table class="d-flex justify-content-center align-items-center">
                        <tr style="width: 100%;">
                            <td style="width: 22.5%;">Mahasiswa</td>
                            <td style="width: 5%;">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 22.5%;">{{ $pengsiperi->user->username }}</td>
                            <td style="width: 22.5%;">Nama Pasien</td>
                            <td style="width: 5%;">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 22.5%;">{{ $pengsiperi->kartupasien->nama }}</td>
                        </tr>
                        <tr style="width: 100%;">
                            <td style="width: 22.5%;"> Pembimbing</td>
                            <td style="width: 5%;">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 22.5%;">
                                {{ ucwords(get_v('users', 'nimnip', $pengsiperi->user->pembimbing, 'username')[0]->username ?? '') }}
                            </td>
                            <td style="width: 22.5%;">Nomor Kartu</td>
                            <td style="width: 5%;">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 22.5%;">{{ $pengsiperi->kartupasien->no_kartu }}</td>
                        </tr>
                        <tr>
                            <th colspan="6" class="text-center"><br>Pengetahuan
                            </th>
                        </tr>
                        <tr>
                            {{-- <td>Jawaban yang Benar</td>
                            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td> --}}
                            <td colspan="6">
                                @foreach (explode(',', $pengsiperi->pengetahuan) as $id)
                                    @foreach ($pengetahuans as $pengetahuan)
                                        @if ($id == $pengetahuan->id)
                                            {{ $pengetahuan->soal }} <br>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th colspan="2" class="text-center">Score</th>
                            <th colspan="2" class="text-center">Nilai</th>
                            <th colspan="2" class="text-center">Kriteria</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2" class="text-center">{{ $pengsiperi->jawaban_benar_peng }} /
                                {{ $pengsiperi->jumlah_pertanyaan_peng }}</td>
                            <td colspan="2" class="text-center">{{ $pengsiperi->nilai_peng }}</td>
                            <td colspan="2" class="text-center">{{ $pengsiperi->kriteria }}</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="6" class="text-center">
                                <br>Keterampilan
                            </th>
                        </tr>
                    </table>
                    <table class="table table-bordered border-dark d-flex justify-content-center align-items-center">
                        <tr style="width: 100%;">
                            <th style="width: 25%;" class="text-center">Area</th>
                            <th style="width: 16%;" class="text-center ">Vertikal </th>
                            <th style="width: 16%;" class="text-center ">Horizontal</th>
                            <th style="width: 8%;" class="text-center ">Roll </th>
                            <th style="width: 16%;" class="text-center ">Tidak Disikat</th>
                            <th style="width: 16%;" class="text-center ">Hasil</th>
                        </tr>
                        <tr style="width: 100%;">
                            <th style="width: 25%;" class="">Permukaan Labial/Buccal</th>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->labialbukal == '1')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 8%;" class="text-center ">
                                @if ($pengsiperi->labialbukal == '2')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->labialbukal == '3')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->labialbukal == '4')
                                    <span>✔</span>
                                @endif
                            </td>
                            <th style="width: 16%;" class="">{{ $pengsiperi->hasil_lb }}</th>
                        </tr>
                        <tr style="width: 100%;">
                            <th style="width: 25%;" class="">Permukaan Lingual/Palatal</th>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->lingualpalatal == '1')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 8%;" class="text-center ">
                                @if ($pengsiperi->lingualpalatal == '2')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->lingualpalatal == '3')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->lingualpalatal == '4')
                                    <span>✔</span>
                                @endif
                            </td>
                            <th style="width: 16%;" class="">{{ $pengsiperi->hasil_lp }}</th>
                        </tr>
                        <tr style="width: 100%;">
                            <th style="width: 25%;" class="">Permukaan Kunyah</th>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->kunyah == '1')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 8%;" class="text-center ">
                                @if ($pengsiperi->kunyah == '2')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->kunyah == '3')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->kunyah == '4')
                                    <span>✔</span>
                                @endif
                            </td>
                            <th style="width: 16%;" class="">{{ $pengsiperi->hasil_k }}</th>
                        </tr>
                        <tr style="width: 100%;">
                            <th style="width: 25%;" class="">Interdental</th>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->interdental == '1')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 8%;" class="text-center ">
                                @if ($pengsiperi->interdental == '2')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->interdental == '3')
                                    <span>✔</span>
                                @endif
                            </td>
                            <td style="width: 16%;" class="text-center ">
                                @if ($pengsiperi->interdental == '4')
                                    <span>✔</span>
                                @endif
                            </td>
                            <th style="width: 16%;" class="">{{ $pengsiperi->hasil_i }}</th>
                        </tr>
                        <tr style="width: 100%;">
                            <th style="width: 36%;" class="" colspan="2">Gerakan Menggosok Gigi</th>
                            <td style="width: 16%;" class=" text-center">
                                @if ($pengsiperi->gerakan == '1')
                                    <span>✔</span>
                                @endif
                                Cepat
                            </td>
                            <td style="width: 8%;" class=" text-center">
                                @if ($pengsiperi->gerakan == '2')
                                    <span>✔</span>
                                @endif
                                Lambat
                            </td>
                            <td style="width: 16%;" class=" text-center">
                                @if ($pengsiperi->gerakan == '3')
                                    <span>✔</span>
                                @endif
                                Cukup
                            </td>
                            <th style="width: 16%;" class="">
                                {{ $pengsiperi->hasil_g }}
                            </th>
                        </tr>
                        <tr class="">
                            <th colspan="5" class="">Kesimpulan</th>
                            <th colspan="1" class="">{{ $pengsiperi->kesimpulan }}</th>
                        </tr>
                    
                    
                        <tr>
                            <th colspan="6" class="text-center"><br>Perilaku/Kebiasaan
                            </th>
                        </tr>
                        <tr>
                            <td colspan="6">
                                @foreach (explode(',', $pengsiperi->perilaku) as $id)
                                    @foreach ($perilakus as $perilaku)
                                        @if ($id == $perilaku->id)
                                            {{ $perilaku->soal }} <br>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    </table>
                        <table class="table table-bordered border-dark d-flex justify-content-center align-items-center">
                        <tr class="text-center">
                            <th colspan="2" class="text-center">Score</th>
                            <th colspan="2" class="text-center">Nilai</th>
                            <th colspan="2" class="text-center">Kesimpulan</th>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2" class="text-center">{{ $pengsiperi->jumlah_yang_terpilih }} /
                                {{ $pengsiperi->jumlah_pilihan }}</td>
                            <td colspan="2" class="text-center">{{ $pengsiperi->nilai_peri }}</td>
                            <td colspan="2" class="text-center">{{ $pengsiperi->berperilaku }}</td>
                        </tr>
                    </table>

                        <tr>
                            <th colspan="6" class="text-center"><br>Peran Orang Tua
                                {{-- <hr class="my-4 w-100 border-top border-dark d-print-block"> --}}
                            </th>
                        </tr>
                        <table class="table table-bordered border-dark d-flex justify-content-center align-items-center">
                        <tr>
                            <td colspan="6">
                                @php
                                    $peran_ortu_combined = '';
                                    $peran_ortu_array = explode(',', $pengsiperi->peran_ortu);

                                    foreach ($peran_ortu_array as $index => $peran_ortu) {
                                        switch ($peran_ortu) {
                                            case 1:
                                                $peran_ortu_combined .= 'Mendampingi menggosok gigi ';
                                                break;
                                            case 2:
                                                $peran_ortu_combined .= 'Memerintahkan menggosok gigi ';
                                                break;
                                            case 3:
                                                $peran_ortu_combined .=
                                                    'Menganjurkan berkumur setiap makan manis-manis ';
                                                break;
                                        }

                                        if ($index < count($peran_ortu_array) - 1 && count($peran_ortu_array) > 1) {
                                            $peran_ortu_combined .= '<br>';
                                        }
                                    }

                                    echo $peran_ortu_combined;
                                @endphp
                            </td>
                        </tr>
                    </table>
                    {{-- </center> --}}
                </div>
                @can('adminmahasiswa')
                    <div class="ms-3 me-3 mt-4">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 16%;"> </td>
                                <td style="width: 16%;"> </td>
                                <td style="width: 16%;"></td>
                                <td style="width: 16%;"></td>
                                <td style="width: 32%;">
                                    <p>Pembimbing,
                                        @if ($pengsiperi->acc == 1)
                                            <center>
                                                <div id="qrcode" class="mb-2"></div>
                                                <!-- Ini adalah elemen yang akan menampilkan QR code -->
                                            </center>
                                        @else
                                            <center>
                                                <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                                            </center>
                                        @endif
                                        {{ ucwords(get_v('users', 'nimnip', $pengsiperi->pembimbing, 'username')[0]->username ?? '') }}
                                        <br>
                                        NIP. {{ $pengsiperi->pembimbing }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endcan
            </div>

            <div class="form-group row mt-3">
                <div class="col-sm-6 d-grid gap-2">
                    <a href="{{ route('pengsiperi.index') }}" class="btn btn-success btn-block btn">
                        <i class="fas fa-arrow-left fa-fw"></i> Kembali
                    </a>
                </div>
                
                {{-- <div class="col-sm-6 d-grid gap-2">
                    <a href="{{ route('generatePDF', $pengsiperi->id) }}" class="btn btn-success btn-block btn">
                        <i class="fas fa-arrow-left fa-fw"></i> Cetak
                    </a>
                </div> --}}
                <div class="col-sm-6 d-grid gap-2">
                    <button class="btn btn-primary btn-block" onclick="printDiv('printableArea')">
                        <i class="fas fa-print text-white"></i></i> Cetak
                        </a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
@endsection
@section('js')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <!-- Include QRCode.js library -->
    <script src="{{ asset('assets/js/qrcode.min.js') }}"></script>

    <!-- Script to generate QR code -->
    <script type="text/javascript">
        // Mendapatkan waktu saat ini dalam zona waktu Indonesia (WIB) dan mengonversinya ke format ISO string
        var currentDateTime = new Date(new Date().getTime() + (7 * 60 * 60 * 1000)).toISOString();

        // Mendapatkan nilai dari variabel dan menyusunnya menjadi teks QR code
        var qrText = "{{ $pengsiperi->user_id }}" + "_" + "{{ $pengsiperi->no_kartu }}" + "_" +
            "{{ $pengsiperi->pembimbing }}" + "_" +
            currentDateTime;

        // Membuat QR code dengan teks yang diperoleh
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: qrText,
            width: 110,
            height: 110,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
@endsection
