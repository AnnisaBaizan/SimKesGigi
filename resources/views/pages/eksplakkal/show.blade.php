@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Show Eskternal & Internal Oral (Plak & Kalkulus)'])
    
    <div class="container">
        <h2>Detail Eksplorasi Karies Lesi</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>Pilih Mahasiswa</th>
                    <td>{{ $eksplakkal->user->username }}</td>
                </tr>
                <tr>
                    <th>Pilih Pasien</th>
                    <td>{{ $eksplakkal->kartupasien->no_kartu }} | {{ $eksplakkal->kartupasien->nama }}</td>
                </tr>
                <tr>
                    <th>Muka</th>
                    <td>{{ $eksplakkal->muka }}</td>
                </tr>
                <!-- Informasi Kelenjar Limpe -->
                <tr>
                    <th>Kanan - Teraba</th>
                    <td>{{ $eksplakkal->limpe_kanan_teraba }}</td>
                </tr>
                <tr>
                    <th>Kanan - Texture</th>
                    <td>{{ $eksplakkal->limpe_kanan_texture }}</td>
                </tr>
                <tr>
                    <th>Kanan - Sakit</th>
                    <td>{{ $eksplakkal->limpe_kanan_sakit }}</td>
                </tr>
                <tr>
                    <th>Kiri - Teraba</th>
                    <td>{{ $eksplakkal->limpe_kiri_teraba }}</td>
                </tr>
                <tr>
                    <th>Kiri - Texture</th>
                    <td>{{ $eksplakkal->limpe_kiri_texture }}</td>
                </tr>
                <tr>
                    <th>Kiri - Sakit</th>
                    <td>{{ $eksplakkal->limpe_kiri_sakit }}</td>
                </tr>
                <!-- Informasi Plak -->
                <tr>
                    <th>Plak</th>
                    <td>{{ explode(', ', $eksplakkal->plak) }}</td>
                </tr>
                <tr>
                    <th>Jumlah Permukaan yang Diperiksa</th>
                    <td>{{ $eksplakkal->jumlah_permukaan }}</td>
                </tr>
                <!-- Informasi Kalkulus -->
                <tr>
                    <th>Supragingiva</th>
                    <td>{{ explode(', ', $eksplakkal->supragingiva) }}</td>
                </tr>
                <tr>
                    <th>Subgingiva</th>
                    <td>{{ explode(', ', $eksplakkal->subgingiva) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
<script>

</script>
@endsection