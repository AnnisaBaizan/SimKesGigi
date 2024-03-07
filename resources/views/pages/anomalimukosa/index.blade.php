@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Anomali Gigi dan Mukosa Mulut'])
    
    
        <!-- Modal Delete-->
        <div class="modal" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Hapus Anomali Gigi dan Mukosa Mulut</h5>
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
                    <form action="{{ route('importanomalimukosa') }}" method="POST" enctype="multipart/form-data">
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Anomali Gigi dan Mukosa Mulut</h6>
                            @can('adminmahasiswa')
                            <a href="{{route('anomalimukosa.create')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm"></i> Tambah data</a>
                            @endcan
                        </div>
    
                        {{-- <div class="card-header d-sm-flex align-items-center">
                            @can('adminpembimbing')
                            <a href="{{route('exportanomalimukosa')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
                            <i class="fas fa-file-export fa-sm"></i>  Format Import</a>
                            <button type="button" class="d-sm-inline-block btn btn-success btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                                <span class="icon">
                                    <i class="fas fa-file-import fa-sm text-white"></i>
                                </span>
                                <span class="text">Import data</span>
                            </button>
                            @endcan
                        </div> --}}

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
                                            @can('admin')
                                              <th>Mahasiswa</th>
                                              <th>Pembimbing</th>
                                            @endcan
                                            @can('mahasiswa')
                                              <th>Pembimbing</th>
                                            @endcan
                                            @can('pembimbing')
                                              <th>Mahasiswa</th>
                                            @endcan
                                            <th>No_Kartu & Nama Pasien</th>
                                            {{-- Anomali --}}
                                            <th>Occlusi</th>
                                            <th>bentuk</th>
                                            <th>warna</th>
                                            <th>ukuran</th>
                                            <th>struktur</th>
                                            {{-- Mukosa --}}
                                            {{-- Lidah --}}
                                            <th>Warna lidah</th>
                                            <th>lidah Inflamasi</th>
                                            <th>lidah Ulserasi</th>
                                            {{-- Pipi --}}
                                            <th>Warna Pipi</th>
                                            <th>Pipi Inflamasi</th>
                                            <th>Pipi Ulserasi</th>
                                            {{-- Palatum --}}
                                            <th>Warna Palatum</th>
                                            <th>Palatum Inflamasi</th>
                                            <th>Palatum Ulserasi</th>
                                            {{-- Gingiva --}}
                                            <th>Warna Gingiva</th>
                                            <th>Gingiva Inflamasi</th>
                                            <th>Gingiva Ulserasi</th>
                                            {{-- Bibir --}}
                                            <th>Warna Bibir</th>
                                            <th>Bibir Inflamasi</th>
                                            <th>Bibir Ulserasi</th>
                                            <th>Dibuat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                            <th>No</th>
                                            @can('admin')
                                              <th>Mahasiswa</th>
                                              <th>Pembimbing</th>
                                            @endcan
                                            @can('mahasiswa')
                                              <th>Pembimbing</th>
                                            @endcan
                                            @can('pembimbing')
                                              <th>Mahasiswa</th>
                                            @endcan
                                            <th>No_Kartu & Nama Pasien</th>
                                            {{-- Anomali --}}
                                            <th>Occlusi</th>
                                            <th>bentuk</th>
                                            <th>warna</th>
                                            <th>ukuran</th>
                                            <th>struktur</th>
                                            {{-- Mukosa --}}
                                            {{-- Lidah --}}
                                            <th>Warna lidah</th>
                                            <th>lidah Inflamasi</th>
                                            <th>lidah Ulserasi</th>
                                            {{-- Pipi --}}
                                            <th>Warna Pipi</th>
                                            <th>Pipi Inflamasi</th>
                                            <th>Pipi Ulserasi</th>
                                            {{-- Palatum --}}
                                            <th>Warna Palatum</th>
                                            <th>Palatum Inflamasi</th>
                                            <th>Palatum Ulserasi</th>
                                            {{-- Gingiva --}}
                                            <th>Warna Gingiva</th>
                                            <th>Gingiva Inflamasi</th>
                                            <th>Gingiva Ulserasi</th>
                                            {{-- Bibir --}}
                                            <th>Warna Bibir</th>
                                            <th>Bibir Inflamasi</th>
                                            <th>Bibir Ulserasi</th>
                                            <th>Dibuat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                      </tfoot>
                                    <tbody>
                                        @foreach ($anomalimukosas as $anomalimukosa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @can('admin')
                                                <td>{{ $anomalimukosa->user->username }}</td>
                                                <td>{{ ucwords(get_v('users', 'nimnip', $anomalimukosa->user->pembimbing, 'username')[0]->username ?? "") }}</td>
                                            @endcan
                                            @can('mahasiswa')
                                                <td>{{ ucwords(get_v('users', 'nimnip', $anomalimukosa->user->pembimbing, 'username')[0]->username ?? "") }}</td>
                                            @endcan
                                            @can('pembimbing')
                                                <td>{{ $anomalimukosa->user->username }}</td>
                                            @endcan
                                            <td>{{ $anomalimukosa->kartupasien->no_kartu }} | {{ $anomalimukosa->kartupasien->nama }}</td>
                                            {{-- Anomali --}}
                                            <td>{{ $anomalimukosa->occlusi }} </td>
                                            <td>{{ $anomalimukosa->bentuk }} </td>
                                            <td>{{ $anomalimukosa->warna }} </td>
                                            <td>{{ $anomalimukosa->posisi }} </td>
                                            <td>{{ $anomalimukosa->ukuran }}</td>
                                            <td>{{ $anomalimukosa->struktur}}</td>
                                            {{-- Mukosa --}}
                                            {{-- Lidah --}}
                                            <td>{{ $anomalimukosa->w_lidah}} ( {{ $anomalimukosa->dw_lidah}} )</td>
                                            <td>{{ $anomalimukosa->i_lidah}} ( {{ $anomalimukosa->di_lidah}} )</td>
                                            <td>{{ $anomalimukosa->u_lidah}} ( {{ $anomalimukosa->du_lidah}} )</td>
                                            {{-- pipi --}}
                                            <td>{{ $anomalimukosa->w_pipi}} ( {{ $anomalimukosa->dw_pipi}} )</td>
                                            <td>{{ $anomalimukosa->i_pipi}} ( {{ $anomalimukosa->di_pipi}} )</td>
                                            <td>{{ $anomalimukosa->u_pipi}} ( {{ $anomalimukosa->du_pipi}} )</td>
                                            {{-- palatum --}}
                                            <td>{{ $anomalimukosa->w_palatum}} ( {{ $anomalimukosa->dw_palatum}} )</td>
                                            <td>{{ $anomalimukosa->i_palatum}} ( {{ $anomalimukosa->di_palatum}} )</td>
                                            <td>{{ $anomalimukosa->u_palatum}} ( {{ $anomalimukosa->du_palatum}} )</td>
                                            {{-- gingiva --}}
                                            <td>{{ $anomalimukosa->w_gingiva}} ( {{ $anomalimukosa->dw_gingiva}} )</td>
                                            <td>{{ $anomalimukosa->i_gingiva}} ( {{ $anomalimukosa->di_gingiva}} )</td>
                                            <td>{{ $anomalimukosa->u_gingiva}} ( {{ $anomalimukosa->du_gingiva}} )</td>
                                            {{-- gigir --}}
                                            <td>{{ $anomalimukosa->w_gigir}} ( {{ $anomalimukosa->dw_gigir}} )</td>
                                            <td>{{ $anomalimukosa->i_gigir}} ( {{ $anomalimukosa->di_gigir}} )</td>
                                            <td>{{ $anomalimukosa->u_gigir}} ( {{ $anomalimukosa->du_gigir}} )</td>
                                            
                                            <td>{{ date_format($anomalimukosa->created_at, "d M Y") }}</td>
                                            <td>
                                                
                                                <a href ="{{route('anomalimukosa.show', $anomalimukosa->id)}}" title="show" class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white" style="padding-top: 4px;"></i></span><span class="text">Lihat</span>
                                                </a>
                                                {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                    data-attr="{{ route('anamrianomalimukosa.show', $project->id) }}" title="show">
                                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                                </a> --}}
                                                @can('adminmahasiswa')
                                                <a href ="{{route('anomalimukosa.edit', $anomalimukosa->id)}}" title="Edit" class="btn btn-sm btn-icon-split btn-warning">
                                                    <span class="icon"><i class="fas fa-pen text-white" style="padding-top: 4px;"></i></span><span class="text">Edit</span>
                                                </a>
                                                <a href="javascript:;" data-toggle="modal" onclick="handleDelete({{$anomalimukosa->id}})" data-target="#DeleteModal" class="btn btn-sm btn-icon-split btn-danger">
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
@can('mahasiswa')
<script type="text/javascript">
function handleDelete(id) {
    let form = document.getElementById('deleteForm')
    form.action = `./anomalimukosa/${id}`
    console.log(form)
    $('#deleteModal').modal('show')
}
</script>
@endcan

@can('mahasiswa')
<script type="text/javascript">
    $(document).ready( function () {
    $('#dataTable').DataTable();
    } );
</script>
@endcan

@can('adminpembimbing')
<script type="text/javascript">
$(document).ready( function () {
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            // data[1] is the date column
            var date = new Date( data[17] );

            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date  && max === null ) ||
                ( min <= date  && date <= max )
            ) 
            {
                return true;
            }
                return false;
            }
        );

        // Refilter the table
        $('#min, #max').on('change', function () {
            table.draw();
        });

        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'DD MMM YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'DD MMM YYYY'
        });

        var table = $('#dataTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
                }
            },
            'colvis'
        ]
        } );
    } );
</script>
@endcan
<script>

</script>
@endsection