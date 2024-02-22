@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'OHI-S'])
    
    
        <!-- Modal Delete-->
        <div class="modal" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Hapus OHI-S</h5>
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
                    <form action="{{ route('importohis') }}" method="POST" enctype="multipart/form-data">
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
                            <h6 class="m-0 font-weight-bold text-primary">Data OHI-S</h6>
                            @can('adminmahasiswa')
                            <a href="{{route('ohis.create')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm"></i> Tambah data</a>
                            @endcan
                        </div>
    
                        <div class="card-header d-sm-flex align-items-center">
                            @can('adminpembimbing')
                            <a href="{{route('exportohis')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
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
                                            {{-- DI --}}
                                            <th>DI-1</th>
                                            <th>DI-2</th>
                                            <th>DI-3</th>
                                            <th>DI-4</th>
                                            <th>DI-5</th>
                                            <th>DI-6</th>
                                            <th>Score DI</th>
                                            {{-- CI --}}
                                            <th>CI-1</th>
                                            <th>CI-2</th>
                                            <th>CI-3</th>
                                            <th>CI-4</th>
                                            <th>CI-5</th>
                                            <th>CI-6</th>
                                            <th>Score CI</th>
                                            
                                            <th>Kreteria Ohis</th>
                                            <th>Dibuat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            {{-- DI --}}
                                            <th>DI-1</th>
                                            <th>DI-2</th>
                                            <th>DI-3</th>
                                            <th>DI-4</th>
                                            <th>DI-5</th>
                                            <th>DI-6</th>
                                            <th>Score DI</th>
                                            {{-- CI --}}
                                            <th>CI-1</th>
                                            <th>CI-2</th>
                                            <th>CI-3</th>
                                            <th>CI-4</th>
                                            <th>CI-5</th>
                                            <th>CI-6</th>
                                            <th>Score CI</th>
                                            
                                            <th>Kreteria Ohis</th>
                                            <th>Dibuat</th>
                                            <th>Tindakan</th>
                                        </tr>
                                      </tfoot>
                                    <tbody>
                                        @foreach ($ohiss as $ohis)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ohis->kartupasien->id }}</td>
                                            {{-- pengetahuan --}}
                                            <td>{{ $ohis->di_1 }} {{ $ohis->lokasi_di_1 }}</td>
                                            <td>{{ $ohis->di_2 }} {{ $ohis->lokasi_di_2 }}</td>
                                            <td>{{ $ohis->di_3 }} {{ $ohis->lokasi_di_3 }}</td>
                                            <td>{{ $ohis->di_4 }} {{ $ohis->lokasi_di_4 }}</td>
                                            <td>{{ $ohis->di_5 }} {{ $ohis->lokasi_di_5 }}</td>
                                            <td>{{ $ohis->di_6}} {{ $ohis->lokasi_di_6}}</td>
                                            <td>{{ $ohis->score_di }}</td> 
                                           
                                            
                                            <td>{{ $ohis->ci_1 }} {{ $ohis->lokasi_ci_1 }}</td>
                                            <td>{{ $ohis->ci_2 }} {{ $ohis->lokasi_ci_2 }}</td>
                                            <td>{{ $ohis->ci_3 }} {{ $ohis->lokasi_ci_3 }}</td>
                                            <td>{{ $ohis->ci_4 }} {{ $ohis->lokasi_ci_4 }}</td>
                                            <td>{{ $ohis->ci_5 }} {{ $ohis->lokasi_ci_5 }}</td>
                                            <td>{{ $ohis->ci_6}} {{ $ohis->lokasi_ci_6}}</td>
                                            <td>{{ $ohis->score_ci }}</td> 
                                            <td>{{ $ohis->kriteria_ohis }}</td> 
                                            
                                            <td>{{ date_format($ohis->created_at, "d M Y") }}</td>
                                            <td>
                                                
                                                <a href ="{{route('ohis.show', $ohis->id)}}" title="show" class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white" style="padding-top: 4px;"></i></span><span class="text">Lihat</span>
                                                </a>
                                                {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                    data-attr="{{ route('anamriohis.show', $project->id) }}" title="show">
                                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                                </a> --}}
                                                @can('adminmahasiswa')
                                                <a href ="{{route('ohis.edit', $ohis->id)}}" title="Edit" class="btn btn-sm btn-icon-split btn-warning">
                                                    <span class="icon"><i class="fas fa-pen text-white" style="padding-top: 4px;"></i></span><span class="text">Edit</span>
                                                </a>
                                                <a href="javascript:;" data-toggle="modal" onclick="handleDelete({{$ohis->id}})" data-target="#DeleteModal" class="btn btn-sm btn-icon-split btn-danger">
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
        form.action = `./anamripasien/${id}`
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
@endsection