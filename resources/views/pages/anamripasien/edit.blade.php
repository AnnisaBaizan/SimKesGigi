@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Anamnesa dan Riwayat Pasien'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Anamnesa dan Riwayat Pasien</h6>
            </div>
            <div class="card-body">
                <form class="user" action="{{route('anamripasien.update', $anamripasien->id) }}" method="post">
                  @method('put')
                  @csrf
                <div id="alert">
                    @include('components.alert')
                </div>

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
                                        <option value="{{ $user->id }}" {{ $anamripasien->user_id == $user->id ? 'selected' : '' }} data-pembimbing="{{ $user->pembimbing }}">
                                            {{ ucwords($user->username) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('pembimbing') is-invalid_max @enderror"
                                    id="pembimbing" name="pembimbing" placeholder="pembimbing" value="{{ $anamripasien->pembimbing }}" readonly required>
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
                                    value="{{ old('kartupasien_id', $anamripasien->kartupasien_id) }}" required>
                                    @error('kartupasien_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @foreach ($kartupasiens as $kartupasien)
                                    <option value="{{ $anamripasien->kartupasien_id }}" {{ $anamripasien->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>{{ $kartupasien->no_kartu }} |
                                        {{ $kartupasien->nama }}</option>
                                    @endforeach
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
                                        <option value="{{ $kartupasien->id }}" {{ $anamripasien->kartupasien_id == $kartupasien->id ? 'selected' : '' }}>{{ $kartupasien->no_kartu }} |
                                            {{ $kartupasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endcan

                  <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Anamnesa</h6></marquee>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                    <label for="klhn_utama" class ="form-text">Keluhan Utama :</label>
                    <textarea class="form-control @error('klhn_utama') is-invalid @enderror" id="klhn_utama" name="klhn_utama" placeholder="Masukan Keluhan Utama Anda">{{ old('klhn_utama', $anamripasien->klhn_utama) }}</textarea>
                        @error('klhn_utama')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-12 mb-3 mb-sm-0">
                      <label for="klhn_tmbhn" class ="form-text">Keluhan Tambahan :</label>
                      <textarea class="form-control @error('klhn_tmbhn') is-invalid @enderror" id="klhn_tmbhn" name="klhn_tmbhn" placeholder="Masukan Keluhan Tambahan Anda">{{ old('klhn_tmbhn', $anamripasien->klhn_tmbhn) }}</textarea>
                          @error('klhn_tmbhn')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>

                  <div class="col-sm-12 mb-3 mb-sm-0 text-center bg-gradient-faded-info-vertical">
                    <marquee><h6 class="m-0 font-weight-bold text-dark text-bold">Riwayat Kesehatan Umum</h6></marquee>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                      <label for="goldar" class ="form-text">Golongan Darah :</label>
                      <select class="form-control @error('goldar') is-invalid @enderror" id="goldar" name="goldar" placeholder="Golongan Darah" value="{{ old('goldar') }}" required>
                              @error('goldar')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          <option value="" selected disabled>Golongan Darah</option>
                          <option value="A" {{$anamripasien->goldar == "A" ? 'selected':''}}>A</option>
                          <option value="B" {{$anamripasien->goldar == "B" ? 'selected':''}}>B</option>
                          <option value="AB" {{$anamripasien->goldar == "AB" ? 'selected':''}}>AB</option>
                          <option value="O" {{$anamripasien->goldar == "O" ? 'selected':''}}>O</option>
                      </select>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                      <label for="nadi" class ="form-text">Denyut Nadi :</label>
                      <input type="text" class="form-control @error('nadi') is-invalid @enderror" id="nadi" name="nadi" placeholder="Denyut Nadi" value="{{ old('nadi', $anamripasien->nadi) }}" required>
                          @error('nadi')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-sm-2 mt-4 mb-3 p-3 mb-sm-0">
                      <label class ="form-text text-primary">/Menit</label>
                    </div>
                  </div>
                    <div class="form-group row">
                      <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="tknn_drh" class ="form-text">Tekanan Darah :</label>
                          <input type="text" class="form-control @error('tknn_drh') is-invalid @enderror" id="tknn_drh" name="tknn_drh" placeholder="00/00" value="{{ old('tknn_drh', $anamripasien->tknn_drh) }}" required>
                              @error('tknn_drh')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                      </div>
                      <div class="col-sm-2 mt-4 mb-3 p-3 mb-sm-0">
                        <label class ="form-text text-primary">mmHg</label>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label for="ktrgn_drh" class ="form-text">Keterangan</label>
                        <select class="form-control @error('ktrgn_drh') is-invalid @enderror" id="ktrgn_drh" name="ktrgn_drh" placeholder="Keterangan" value="{{ old('ktrgn_drh') }}" required>
                                @error('ktrgn_drh')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Keterangan</option>
                            <option value="Normal" {{$anamripasien->ktrgn_drh == "Normal" ? 'selected':''}}>Normal</option>
                            <option value="Hypotensi" {{$anamripasien->ktrgn_drh == "Hypotensi" ? 'selected':''}}>Hypotensi</option>
                            <option value="Hypertensi" {{$anamripasien->ktrgn_drh == "Hypertensi" ? 'selected':''}}>Hypertensi</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="suhu" class ="form-text">Suhu Tubuh :</label>
                          <input type="text" class="form-control @error('suhu') is-invalid @enderror" id="suhu" name="suhu" placeholder="Suhu Tubuh" value="{{ old('suhu', $anamripasien->suhu) }}" required>
                              @error('suhu')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                      </div>
                      <div class="col-sm-2 mt-4 mb-3 p-3 mb-sm-0">
                        <label class ="form-text text-primary">Celsius</label>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label for="pernafasan" class ="form-text">Pernafasan</label>
                        <select class="form-control @error('pernafasan') is-invalid @enderror" id="pernafasan" name="pernafasan" placeholder="Pernafasan" value="{{ old('pernafasan') }}" required>
                                @error('pernafasan')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Pernafasan</option>
                            <option value="Normal" {{$anamripasien->pernafasan == "Normal" ? 'selected':''}}>Normal</option>
                            <option value="Sesak" {{$anamripasien->pernafasan == "Sesak" ? 'selected':''}}>Sesak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                      <center>
                      <h6 class="col-sm-4 mb-3 font-weight-bold text-dark text-bold bg-gradient-faded-info-vertical text-center"> - Penyakit - </h6>
                      </center>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-4 mb-3">
                        <label for="jantung" class ="form-text">Jantung</label>
                        <select class="form-control @error('jantung') is-invalid @enderror" id="jantung" name="jantung" placeholder="Jantung" value="{{ old('jantung') }}" required>
                                @error('jantung')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Jantung</option>
                            <option value="Ada" {{$anamripasien->jantung == "Ada" ? 'selected':''}}>Ada</option>
                            <option value="Tidak Ada" {{$anamripasien->jantung == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                        </select>
                      </div>
                      <div class="col-sm-4 mb-3">
                        <label for="diabetes" class ="form-text">Diabetes</label>
                        <select class="form-control @error('diabetes') is-invalid @enderror" id="diabetes" name="diabetes" placeholder="Diabetes" value="{{ old('diabetes') }}" required>
                                @error('diabetes')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Diabetes</option>
                            <option value="Ada" {{$anamripasien->diabetes == "Ada" ? 'selected':''}}>Ada</option>
                            <option value="Tidak Ada" {{$anamripasien->diabetes == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                        </select>
                      </div>
                      <div class="col-sm-4 mb-3">
                        <label for="haemophilia" class ="form-text">Haemophilia</label>
                        <select class="form-control @error('haemophilia') is-invalid @enderror" id="haemophilia" name="haemophilia" placeholder="Haemophilia" value="{{ old('haemophilia') }}" required>
                                @error('haemophilia')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Haemophilia</option>
                            <option value="Ada" {{$anamripasien->haemophilia == "Ada" ? 'selected':''}}>Ada</option>
                            <option value="Tidak Ada" {{$anamripasien->haemophilia == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3">
                        <label for="hepatitis" class ="form-text">Hepatitis</label>
                        <select class="form-control @error('hepatitis') is-invalid @enderror" id="hepatitis" name="hepatitis" placeholder="Hepatitis" value="{{ old('hepatitis') }}" required>
                                @error('hepatitis')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Hepatitis</option>
                            <option value="Ada" {{$anamripasien->hepatitis == "Ada" ? 'selected':''}}>Ada</option>
                            <option value="Tidak Ada" {{$anamripasien->hepatitis == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                        </select>
                      </div>
                      <div class="col-sm-6 mb-3">
                        <label for="lambung" class ="form-text">Lambung/Maag</label>
                        <select class="form-control @error('lambung') is-invalid @enderror" id="lambung" name="lambung" placeholder="Lambung/Maag" value="{{ old('lambung') }}" required>
                                @error('lambung')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Lambung/Maag</option>
                            <option value="Ada" {{$anamripasien->lambung == "Ada" ? 'selected':''}}>Ada</option>
                            <option value="Tidak Ada" {{$anamripasien->lambung == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3">
                        <label for="pnykt_ln" class ="form-text">Penyakit Lainnya :</label>
                        <select class="form-control @error('pnykt_ln') is-invalid @enderror" id="pnykt_ln" name="pnykt_ln" placeholder="Penyakit Lainnya" value="{{ old('pnykt_ln') }}" required>
                                @error('pnykt_ln')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <option value="" selected disabled>Penyakit Lainnya</option>
                            <option value="Ada" {{$anamripasien->pnykt_ln == "Ada" ? 'selected':''}}>Ada</option>
                            <option value="Tidak Ada" {{$anamripasien->pnykt_ln == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                        </select>
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nm_pnykt_ln" class ="form-text">Penyakit Apa :</label>
                        <input type="text" class="form-control @error('nm_pnykt_ln') is-invalid @enderror" id="nm_pnykt_ln" name="nm_pnykt_ln" placeholder="Tuliskan Nama Penyakitnya" value="{{ old('nm_pnykt_ln', $anamripasien->nm_pnykt_ln) }}">
                            @error('nm_pnykt_ln')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      </div>
                    </div>
                    <div class="col-sm-12 mb-3 mb-sm-0 text-center">
                      <center>
                      <h6 class="col-sm-4 mb-3 m-0 font-weight-bold text-dark text-bold bg-gradient-faded-info-vertical text-center"> - Alergi - </h6>
                      </center>
                    </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                          <label for="alergi_obat" class ="form-text">Alergi Obat :</label>
                          <select class="form-control @error('alergi_obat') is-invalid @enderror" id="alergi_obat" name="alergi_obat" placeholder="Masukan Nama Obat" value="{{ old('alergi_obat') }}" required>
                                  @error('alergi_obat')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              <option value="" selected disabled>Alergi Obat</option>
                              <option value="Ada" {{$anamripasien->alergi_obat == "Ada" ? 'selected':''}}>Ada</option>
                              <option value="Tidak Ada" {{$anamripasien->alergi_obat == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                          </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="nm_obat" class ="form-text">Obat Apa :</label>
                          <input type="text" class="form-control @error('nm_obat') is-invalid @enderror" id="nm_obat" name="nm_obat" placeholder="Tuliskan Nama Obat nya" value="{{ old('nm_obat', $anamripasien->nm_obat) }}">
                              @error('nm_obat')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        </div>
                      </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3">
                            <label for="alergi_mkn" class ="form-text">Alergi Makanan :</label>
                            <select class="form-control @error('alergi_mkn') is-invalid @enderror" id="alergi_mkn" name="alergi_mkn" placeholder="Alergi Makanan" value="{{ old('alergi_mkn') }}" required>
                                    @error('alergi_mkn')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled>Alergi Makanan</option>
                                <option value="Ada" {{$anamripasien->alergi_mkn == "Ada" ? 'selected':''}}>Ada</option>
                                <option value="Tidak Ada" {{$anamripasien->alergi_mkn == "Tidak Ada" ? 'selected':''}}>Tidak Ada</option>
                            </select>
                          </div>
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nm_mkn" class ="form-text">Makanan Apa :</label>
                            <input type="text" class="form-control @error('nm_mkn') is-invalid @enderror" id="nm_mkn" name="nm_mkn" placeholder="Tuliskan Nama Makanannya" value="{{ old('nm_mkn', $anamripasien->nm_mkn) }}">
                                @error('nm_mkn')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                          </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{route('anamripasien.index')}}" class="btn btn-success btn-block btn">
                                <i class="fas fa-arrow-left fa-fw"></i> Kembali
                            </a>
                        </div>
                        <div class="col-sm-6 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan" >
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script type="text/javascript">
// $('#kartupasien_id').selectpicker();
// $("#kartupasien_id").select2();
  $(function() {
  var opts = $('#kartupasien_id option').map(function(){
    return [[this.value, $(this).text()]];
  });

  $('#search').keyup(function(){
    var rxp = new RegExp($('#search').val(), 'i');
    var kartupasien_id = $('#kartupasien_id').empty();
    opts.each(function(){
      if (rxp.test(this[1])) {
        kartupasien_id.append($('<option/>').attr('value', this[0]).text(this[1]));
      }
    });
  });
});

$('#pnykt_ln').change(function() {
  if ($(this).val() == "Tidak Ada" ) {
    $('#nm_pnykt_ln').attr("readonly", "readonly");
    document.getElementById("nm_pnykt_ln").value = "";
    document.getElementById("nm_pnykt_ln").placeholder = "Tidak Perlu diisi";
  } else {
    $('#nm_pnykt_ln').removeAttr("readonly");
    $('#nm_pnykt_ln').attr("required", "required");
    document.getElementById("nm_pnykt_ln").placeholder = "Tuliskan Nama Penyakitnya";
  }
}).trigger("change");

$('#alergi_obat').change(function() {
  if ($(this).val() == "Tidak Ada" ) {
    $('#nm_obat').attr("readonly", "readonly");
    document.getElementById("nm_obat").value = "";
    document.getElementById("nm_obat").placeholder = "Tidak Perlu diisi";
  } else {
    $('#nm_obat').removeAttr("readonly");
    $('#nm_pnykt_ln').attr("required", "required");
    document.getElementById("nm_obat").placeholder = "Masukan Nama Obat";
  }
}).trigger("change");

$('#alergi_mkn').change(function() {
  if ($(this).val() == "Tidak Ada" ) {
    $('#nm_mkn').attr("readonly", "readonly");
    document.getElementById("nm_mkn").value = "";
    document.getElementById("nm_mkn").placeholder = "Tidak Perlu diisi";
  } else {
    $('#nm_mkn').removeAttr("readonly");
    $('#nm_pnykt_ln').attr("required", "required");
    document.getElementById("nm_mkn").placeholder = "Tuliskan Nama Makanannya";
  }
}).trigger("change");

</script>
<script>
  $(document).ready(function() {
      $('#user_id').change(function() {
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
          var pembimbing = $("#pembimbing").val();

          $.ajax({
              url: '/getPatients',
              type: 'POST',
              data: {
                  user_id: user_id,
                  pembimbing: pembimbing
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

