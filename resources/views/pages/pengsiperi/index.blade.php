@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pengetahuan, Keterampilan, Perilaku dan peran orang tua'])
    
    
        <!-- Modal Delete-->
        <div class="modal" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Hapus Pengetahuan, Keterampilan, Perilaku dan peran orang tua </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Apakah kamu yakin menghapus data ?</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" id="deleteForm">
                    @method('DELETE')
                    @csrf
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak, Kembali</button>
                  <button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
                </form>
                </div>
              </div>
            </div>
        </div>
    
    
        <!-- Modal Import -->
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('importpertanyaan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="importpertanyaan">Import File</label>
                        <input type="file" class="form-control-file" name="importpertanyaan" id="importpertanyaan" placeholder="" aria-describedby="fileHelpId" required>
                        <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                        <small id="fileHelpId" class="form-text text-muted">Pastikan file upload sesuai format. <br>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
            </div>
            </div>
        </div>
          
    
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data data</h6>
                            @can('adminmahasiswa')
                            <a href="{{route('pengsiperi.create')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm"></i> Tambah data</a>
                            @endcan
                        </div>
    
                        <div class="card-header d-sm-flex align-items-center">
                            @can('adminpembimbing')
                            <a href="{{route('exportpengsiperi')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
                            <i class="fas fa-file-export fa-sm"></i>  Format Import</a>
    
                            {{-- <a href="javascript:;" data-toggle="modal" onclick="importData()" data-target="#ImportModal" class="d-sm-inline-block btn btn-success btn-sm shadow-sm">
                                <span class="icon">
                                    <i class="fas fa-file-import fa-sm text-white"></i>
                                </span>
                                <span class="text">Import pertanyaan</span>
                            </a> --}}
    
                            <!-- Button trigger modal -->
                            <button type="button" class="d-sm-inline-block btn btn-success btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                                <span class="icon">
                                    <i class="fas fa-file-import fa-sm text-white"></i>
                                </span>
                                <span class="text">Import data</span>
                            </button>
                            @endcan
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive mt-4 ms-5 me-5 mb-4">
                                @can('adminpembimbing')
                                <table class="justify-content-end mb-2">
                                    <tr>
                                    <th><i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10 me-2"></i> <input type="text" id="min" name="min" placeholder="Min Date" class="me-2"></th>
                                    <th><i class="ni ni-calendar-grid-58 text-danger text-sm opacity-10 me-2"></i> <input type="text" id="max" name="max" placeholder="Max Date"></th>
                                    </tr>
                                </table>
                                @endcan
                                
                                
                                <table class="table align-items-center mb-0" id="dataTable">
                                    <thead>
                                    <tr>
                                        <div id="alert">
                                            @include('components.alert')
                                        </div>
                                    </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            {{-- Pengetahuan --}}
                                            <th>Jawaban Benar</th>
                                            <th>Benar</th>
                                            <th>Nilai Pengetahuan</th>
                                            <th>Kriteria</th>
                                            {{-- Keterampilan --}}
                                            <th>Labial/Bukal</th>
                                            <th>Lingual/Palatal</th>
                                            <th>kunyah</th>
                                            <th>interdental</th>
                                            <th>gerakan</th>
                                            <th>Kesimpulan</th>
                                            {{-- Perilaku --}}
                                            <th>Perilaku</th>
                                            <th>Terpilih</th>
                                            <th>Nilai Perilaku</th>
                                            <th>Berperilaku</th>

                                            <th>Peran Orang Tua</th>

                                            <th>Dibuat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            {{-- Pengetahuan --}}
                                            <th>Jawaban Benar</th>
                                            <th>Benar</th>
                                            <th>Nilai Pengetahuan</th>
                                            <th>Kriteria</th>
                                            {{-- Keterampilan --}}
                                            <th>Labial/Bukal</th>
                                            <th>Lingual/Palatal</th>
                                            <th>kunyah</th>
                                            <th>interdental</th>
                                            <th>gerakan</th>
                                            <th>Kesimpulan</th>
                                            {{-- Perilaku --}}
                                            <th>Perilaku</th>
                                            <th>Terpilih</th>
                                            <th>Nilai Perilaku</th>
                                            <th>Berperilaku</th>

                                            <th>Peran Orang Tua</th>

                                            <th>Dibuat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                      </tfoot>
                                    <tbody>
                                        @foreach ($pengsiperis as $pengsiperi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengsiperi->kartupasien->id }}</td>
                                            {{-- pengetahuan --}}
                                            <td>{{ $pengsiperi->pengetahuan }}</td>
                                            <td>{{ $pengsiperi->jawaban_benar_peng }} / {{ $pengsiperi->jumlah_pertanyaan_peng }}</td>
                                            <td>{{ $pengsiperi->nilai_peng }}</td>
                                            <td>{{ $pengsiperi->kriteria }}</td>
                                            {{-- Keterampilan --}}
                                            <td>{{ $pengsiperi->labialbukal }} 
                                                @if ($pengsiperi->hasil_lb == "Benar")
                                                    <span class="badge badge-sm bg-gradient-success">Benar</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Salah</span>
                                                @endif
                                            </td>
                                            <td>{{ $pengsiperi->lingualpalatal }}
                                                @if ($pengsiperi->hasil_lp == "Benar")
                                                    <span class="badge badge-sm bg-gradient-success">Benar</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Salah</span>
                                                @endif
                                            </td>
                                            <td>{{ $pengsiperi->kunyah }} 
                                                @if ($pengsiperi->hasil_k == "Benar")
                                                    <span class="badge badge-sm bg-gradient-success">Benar</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Salah</span>
                                                @endif
                                            </td>
                                            <td>{{ $pengsiperi->interdental }}
                                                @if ($pengsiperi->hasil_i == "Benar")
                                                    <span class="badge badge-sm bg-gradient-success">Benar</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Salah</span>
                                                @endif
                                            </td>
                                            <td>{{ $pengsiperi->gerakan }}
                                                @if ($pengsiperi->hasil_g == "Benar")
                                                    <span class="badge badge-sm bg-gradient-success">Benar</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Salah</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pengsiperi->kesimpulan == "Terampil")
                                                    <span class="badge badge-sm bg-gradient-success">Terampil</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Kurang Terampil</span>
                                                @endif
                                            </td>
                                            {{-- Perilaku --}}
                                            <td>{{ $pengsiperi->perilaku }}</td>
                                            <td>{{ $pengsiperi->jumlah_yang_terpilih }} / {{ $pengsiperi->jumlah_pilihan }}</td>
                                            <td>{{ $pengsiperi->nilai_peri }}</td>
                                            <td>{{ $pengsiperi->berperilaku }}</td>

                                            <td>{{ $pengsiperi->peran_ortu }}</td>
                                            
                                            <td>{{ date_format($pengsiperi->created_at, "d M Y") }}</td>
                                            <td>
                                                
                                                <a href ="{{route('pengsiperi.show', $pengsiperi->id)}}" title="show" class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white" style="padding-top: 4px;"></i></span><span class="text">Lihat</span>
                                                </a>
                                                {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                    data-attr="{{ route('anamripengsiperi.show', $project->id) }}" title="show">
                                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                                </a> --}}
                                                @can('adminmahasiswa')
                                                <a href ="{{route('pengsiperi.edit', $pengsiperi->id)}}" title="Edit" class="btn btn-sm btn-icon-split btn-warning">
                                                    <span class="icon"><i class="fas fa-pen text-white" style="padding-top: 4px;"></i></span><span class="text">Edit</span>
                                                </a>
                                                <a href="javascript:;" data-toggle="modal" onclick="handleDelete({{$pengsiperi->id}})" data-target="#DeleteModal" class="btn btn-sm btn-icon-split btn-danger">
                                                    <span class="icon"><i class="fa fa-trash text-white" style="padding-top: 4px;"></i></span><span class="text">Hapus</span>
                                                </a>
                                                @endcan
                                            </td>
                                          </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
<script>

</script>
@endsection