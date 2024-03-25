
    @can('adminmahasiswa')
        {{-- <div class="col-sm-12 mb-sm-0 text-center"> --}}
            <img src="{!! asset('/img/KOP.png') !!}">
        {{-- </div> --}}
    @endcan
    <div >
        <h3>Pengetahuan, Keterampilan, Perilaku dan peran orang
            tua</h3>
    </div>
    <div>
        {{-- <center> --}}
        <table>
            <tr>
                <td>Mahasiswa</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td>{{ $pengsiperi->user->username }}</td>
                <td>Nama Pasien</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td>{{ $pengsiperi->kartupasien->nama }}</td>
            </tr>
            <tr>
                <td> Pembimbing</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td>
                    {{ ucwords(get_v('users', 'nimnip', $pengsiperi->user->pembimbing, 'username')[0]->username ?? '') }}
                </td>
                <td>Nomor Kartu</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td>{{ $pengsiperi->kartupasien->no_kartu }}</td>
            </tr>
            <tr>
                <th colspan="6"><br>Pengetahuan
                    <hr>
                </th>
            </tr>
            <tr>
                <td>Jawaban yang Benar</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td colspan="4">
                    @foreach (explode(',', $pengsiperi->pengetahuan) as $id)
                        @foreach ($pengetahuans as $pengetahuan)
                            @if ($id == $pengetahuan->id)
                                {{ $pengetahuan->soal }} <br>
                            @endif
                        @endforeach
                    @endforeach
                </td>
            </tr>
            <tr>
                <th colspan="2">Score</th>
                <th colspan="2">Nilai</th>
                <th colspan="2">Kriteria</th>
            </tr>
            <tr>
                <td colspan="2">{{ $pengsiperi->jawaban_benar_peng }} /
                    {{ $pengsiperi->jumlah_pertanyaan_peng }}</td>
                <td colspan="2">{{ $pengsiperi->nilai_peng }}</td>
                <td colspan="2">{{ $pengsiperi->kriteria }}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <th colspan="6">
                    <br>Keterampilan
                    <hr>
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <th>Area</th>
                <th>Vertikal </th>
                <th>Horizontal</th>
                <th>Roll </th>
                <th>Tidak Disikat</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <th>Permukaan Labial/Buccal</th>
                <td>
                    @if ($pengsiperi->labialbukal == '1')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->labialbukal == '2')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->labialbukal == '3')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->labialbukal == '4')
                        <span>✔</span>
                    @endif
                </td>
                <th>{{ $pengsiperi->hasil_lb }}</th>
            </tr>
            <tr>
                <th>Permukaan Lingual/Palatal</th>
                <td>
                    @if ($pengsiperi->lingualpalatal == '1')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->lingualpalatal == '2')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->lingualpalatal == '3')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->lingualpalatal == '4')
                        <span>✔</span>
                    @endif
                </td>
                <th>{{ $pengsiperi->hasil_lp }}</th>
            </tr>
            <tr>
                <th>Permukaan Kunyah</th>
                <td>
                    @if ($pengsiperi->kunyah == '1')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->kunyah == '2')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->kunyah == '3')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->kunyah == '4')
                        <span>✔</span>
                    @endif
                </td>
                <th>{{ $pengsiperi->hasil_k }}</th>
            </tr>
            <tr>
                <th>Interdental</th>
                <td>
                    @if ($pengsiperi->interdental == '1')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->interdental == '2')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->interdental == '3')
                        <span>✔</span>
                    @endif
                </td>
                <td>
                    @if ($pengsiperi->interdental == '4')
                        <span>✔</span>
                    @endif
                </td>
                <th>{{ $pengsiperi->hasil_i }}</th>
            </tr>
            <tr>
                <th style="width: 36%;" colspan="2">Gerakan Menggosok Gigi</th>
                <td class=" text-center">
                    @if ($pengsiperi->gerakan == '1')
                        <span>✔</span>
                    @endif
                    Cepat
                </td>
                <td class=" text-center">
                    @if ($pengsiperi->gerakan == '2')
                        <span>✔</span>
                    @endif
                    Lambat
                </td>
                <td class=" text-center">
                    @if ($pengsiperi->gerakan == '3')
                        <span>✔</span>
                    @endif
                    Cukup
                </td>
                <th>
                    {{ $pengsiperi->hasil_g }}
                </th>
            </tr>
            <tr>
                <th colspan="5">Kesimpulan</th>
                <th colspan="1">{{ $pengsiperi->kesimpulan }}</th>
            </tr>
        </table>
        <table>

            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>

            <tr>
                <th colspan="6"><br>Perilaku/Kebiasaan
                    <hr>
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
            <tr>
                <th colspan="2">Score</th>
                <th colspan="2">Nilai</th>
                <th colspan="2">Kesimpulan</th>
            </tr>
            <tr>
                <td colspan="2">{{ $pengsiperi->jumlah_yang_terpilih }} /
                    {{ $pengsiperi->jumlah_pilihan }}</td>
                <td colspan="2">{{ $pengsiperi->nilai_peri }}</td>
                <td colspan="2">{{ $pengsiperi->berperilaku }}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <th colspan="6"><br>Peran Orang Tua
                    <hr class="my-4 w-100 border-top border-dark d-print-block">
                </th>
            </tr>
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
                                    $peran_ortu_combined .= 'Menganjurkan berkumur setiap makan manis-manis ';
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
    {{-- @can('adminmahasiswa')
                <div class="ms-3 me-3 mt-4">
                    <table>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td></td>
                            <td></td>
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
            @endcan --}}
