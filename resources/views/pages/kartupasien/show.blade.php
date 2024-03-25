@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Detail Kartu Pasien'])
    
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Kartu Pasien</h6>
            </div>

            <div class="card-body" id="printableArea">
                @can('adminmahasiswa')
                    <div class="col-sm-12 mb-sm-0 text-center">
                        <img class="img-fluid max-width: 150%; height: 50%;" src="{!! asset('/img/KOP.png') !!}">
                    </div>
                @endcan
                <div class="col-sm-12 mb-sm-0 text-center mt-3 mb-5">
                    <h3 class="font-weight-bold text-dark text-center">Kartu Pasien</h3>
                </div>
                <div class="ms-3 me-3 mt-4">
                    <center>
                        <table>
                            <tr>
                                <td>No kartu Pasien </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->no_kartu }}</td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->nama }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Identitas </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->no_iden }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->tgl_lhr }}</td>
                            </tr>
                            <tr>
                                <td>Umur </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->umur }} Tahun</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->jk == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td>Suku/Ras </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->suku }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td>Keluarga yang Dapat Dihubungi </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->hub }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Handphone </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->no_tlpn }}</td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                <td> {{ $kartupasien->alamat }}</td>
                            </tr>
                        </table>
                    </center>
                </div>
                @can('adminmahasiswa')
                    <div class="ms-3 me-3 mt-4">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 35%;"> </td>
                                <td style="width: 35%;"> </td>
                                <td style="width: 30%;">
                                    <p>Pembimbing,
                                        @if ($kartupasien->alamat == 1)
                                            <center>
                                                <div id="qrcode" class="mb-2"></div>
                                                <!-- Ini adalah elemen yang akan menampilkan QR code -->
                                            </center>
                                        @else
                                            <center>
                                                <div class="mb-2 text-danger fw-bolder">Belum di-ACC</div>
                                            </center>
                                        @endif
                                        {{ ucwords(get_v('users', 'nimnip', $kartupasien->pembimbing, 'username')[0]->username ?? '') }}
                                        <br>
                                        NIP. {{ $kartupasien->pembimbing }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endcan
            </div>

            <div class="form-group row mt-3">
                <div class="col-sm-6 d-grid gap-2">
                    <a href="{{ route('kartupasien.index') }}" class="btn btn-success btn-block btn">
                        <i class="fas fa-arrow-left fa-fw"></i> Kembali
                    </a>
                </div>
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
        var qrText = "{{ $kartupasien->user_id }}" + "_" + "{{ $kartupasien->no_kartu }}" + "_" +
            "{{ $kartupasien->pembimbing }}" + "_" +
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
