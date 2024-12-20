@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Kartu Pasien'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Kartu Pasien'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Kartu Pasien</h6>
            </div>
            <div class="card-body">
                <form class="user" action="{{ route('kartupasien.update', $kartupasien->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div id="alert">
                        @include('components.alert')
                    </div>

                    @can('admin')
                        <div class="form-group row justify-content-center">
                            <label for="user_id" class="form-text text-center">Pilih Mahasiswa dan Pembimbing :</label>
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
                                        <option value="{{ $user->id }}"
                                            {{ $kartupasien->user_id == $user->id ? 'selected' : '' }}
                                            data-pembimbing="{{ $user->pembimbing }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="js-example-basic-single form-control @error('pembimbing') is-invalid @enderror"
                                    data-live-search="true" id="pembimbing" name="pembimbing" placeholder="Pilih Pembimbing"
                                    value="{{ old('pembimbing') }}" required>
                                    @error('pembimbing')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Pembimbing</option>
                                    @foreach ($pembimbings as $pembimbing)
                                        <option value="{{ $pembimbing->nimnip }}"
                                            {{ $kartupasien->pembimbing == $pembimbing->nimnip ? 'selected' : '' }}>
                                            {{ $pembimbing->nimnip }} | {{ $pembimbing->username }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing" value="{{ $kartupasien->pembimbing }}" readonly required>
                                @error('pembimbing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                    @endcan

                    @can('mahasiswa')
                        <div class="col-sm-">
                            <input type="hidden" class="form-control @error('user_id') is-invalid_max @enderror" id="user_id"
                                name="user_id" placeholder="user_id" value="{{ auth()->user()->id }}" required>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Pembimbing --}}
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-2">
                                <label for="pembimbing" class="form-text text-center">Pilih Pembimbing :</label>
                            </div>
                            <div class="col-sm-4">
                                <select class="js-example-basic-single form-control @error('pembimbing') is-invalid @enderror"
                                    data-live-search="true" id="pembimbing" name="pembimbing" placeholder="Pilih Pembimbing"
                                    value="{{ old('pembimbing') }}" required>
                                    @error('pembimbing')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <option value="" selected disabled>Pilih Pembimbing</option>
                                    @foreach ($pembimbings as $pembimbing)
                                        <option value="{{ $pembimbing->nimnip }}"
                                            {{ $kartupasien->pembimbing == $pembimbing->nimnip ? 'selected' : '' }}>
                                            {{ $pembimbing->nimnip }} | {{ $pembimbing->username }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="hidden" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                id="pembimbing" name="pembimbing" placeholder="pembimbing"
                                value="{{ auth()->user()->pembimbing }}" required>
                            @error('pembimbing')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                            </div>
                        </div>
                    @endcan

                    <div class="form-group row justify-content-center">
                        <div class="col-sm-4">
                            <center><label for="no_kartu" class ="form-text text-center">No kartu Pasien :</label></center>
                            <input type="text" class="form-control text-center @error('no_kartu') is-invalid @enderror"
                                id="no_kartu" name="no_kartu" placeholder="Nomor Kartu Pasien"
                                value="{{ old('no_kartu', $kartupasien->no_kartu) }}" required readonly>
                            @error('no_kartu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nama" class ="form-text">Nama Lengkap :</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Nama Lengkap" value="{{ old('nama', $kartupasien->nama) }}"
                                required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="no_iden" class ="form-text">Nomor Identitas :</label>
                            <input type="text" class="form-control @error('no_iden') is-invalid @enderror" id="no_iden"
                                name="no_iden" placeholder="Nomor Identitas"
                                value="{{ old('no_iden', $kartupasien->no_iden) }}" required>
                            @error('no_iden')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 p-2 mb-sm-1">
                            <label for="tgl_lhr" class ="form-text">Tanggal lahir :</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control @error('tgl_lhr') is-invalid @enderror"
                                id="tgl_lhr" name="tgl_lhr" placeholder="Tanggal lahir"
                                value="{{ old('tgl_lhr', $kartupasien->tgl_lhr) }}" required>
                            @error('tgl_lhr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                                name="umur" placeholder="Umur" value="{{ old('umur', $kartupasien->umur) }}" readonly
                                required>
                            @error('umur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-2 p-2 mb-sm-1">
                            <label align="center" for="umur" class ="form-text">Tahun</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="jk" class ="form-text">Jenis Kelamin :</label>
                            <select class="form-control @error('jk') is-invalid @enderror" id="jk" name="jk"
                                placeholder="Jenis Kelamin" value="{{ old('jk', $kartupasien->jk) }}" required>
                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <option value="" disabled>Jenis Kelamin</option>
                                <option value="1" {{ $kartupasien->jk == 1 ? 'selected' : '' }}>Laki-laki</option>
                                <option value="2" {{ $kartupasien->jk == 2 ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="suku" class ="form-text">Suku/Ras :</label>
                            <input type="text" class="form-control @error('suku') is-invalid @enderror"
                                id="suku" name="suku" placeholder="Suku/Ras"
                                value="{{ old('suku', $kartupasien->suku) }}" required>
                            @error('suku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="pekerjaan" class ="form-text">Pekerjaan :</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan"
                                value="{{ old('pekerjaan', $kartupasien->pekerjaan) }}" required>
                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="hub" class ="form-text">Keluarga yang Dapat Dihubungi :</label>
                            <input type="text" class="form-control @error('hub') is-invalid @enderror" id="hub"
                                name="hub" placeholder="Keluarga yang Dapat Dihubungi"
                                value="{{ old('hub', $kartupasien->hub) }}" required>
                            @error('hub')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="no_hp" class ="form-text">Nomor Handphone :</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" name="no_hp" placeholder="Nomor Handphone"
                                value="{{ old('no_hp', $kartupasien->no_hp) }}" required>
                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="no_tlpn" class ="form-text">Nomor Telepon :</label>
                            <input type="text" class="form-control @error('no_tlpn') is-invalid @enderror"
                                id="no_tlpn" name="no_tlpn" placeholder="Nomor Telepon"
                                value="{{ old('no_tlpn', $kartupasien->no_tlpn) }}" required>
                            @error('no_tlpn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="alamat" class ="form-text">Alamat :</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                placeholder="Masukan Alamat Anda">{{ old('alamat', $kartupasien->alamat) }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('kartupasien.index') }}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                        <div class="col-sm-6 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                                <i class="fas fa-save fa-fw"></i> Save
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control @error('id_max') is-invalid_max @enderror"
                            id="id_max" name="id_max" placeholder="id_max" value="{{ old('id_max', $id_max) }}"
                            required>
                        @error('id_max')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth.footer')
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tgl_lhr').change(function() {
                console.log("change");
                var dob = new Date(document.getElementById('tgl_lhr').value);
                var today = new Date();
                var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                document.getElementById('umur').value = age;
            });
        });
        $(document).ready(function() {
            $('#jk').change(function() {
                function sort_year(dt) {
                    return ('' + dt.getFullYear()).substr(2);
                }

                dt = new Date();

                console.log("change");
                var tahun = sort_year(dt);
                var jk = document.getElementById('jk').value;
                var id_max = document.getElementById('id_max').value;
                var nokartu = tahun + '0' + jk + id_max;
                document.getElementById('no_kartu').value = nokartu;
            });
        });
    </script>
@endsection
