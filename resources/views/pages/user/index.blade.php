@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User'])
    <!-- Modal Delete-->
    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Hapus User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah kamu yakin menghapus User ?</p>
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

    
<!-- Modal import-->
{{-- <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Import Data Publikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('importuser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="importdatpub">Import File</label>
                  <input type="file" class="form-control-file" name="importdatpub" id="importdatpub" placeholder="" aria-describedby="fileHelpId" required>
                  <small id="fileHelpId" class="form-text text-muted">Tipe file : xls, xlsx</small>
                  <small id="fileHelpId" class="form-text text-muted">Pastikan file upload sesuai format. <br>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>
</div> --}}


<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="importModalLabel">Import User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('importuser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="importuser">Import File</label>
                  <input type="file" class="form-control-file" name="importuser" id="importuser" placeholder="" aria-describedby="fileHelpId" required>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        <a href="{{route('user.create')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                        <i class="fas fa-plus fa-sm"></i> Tambah User</a>
                    </div>

                    <div class="card-header d-sm-flex align-items-center">
                        <a href="{{route('exportuser')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
                        <i class="fas fa-file-export fa-sm"></i>  Format Import</a>

                        {{-- <a href="javascript:;" data-toggle="modal" onclick="importData()" data-target="#ImportModal" class="d-sm-inline-block btn btn-success btn-sm shadow-sm">
                            <span class="icon">
                                <i class="fas fa-file-import fa-sm text-white"></i>
                            </span>
                            <span class="text">Import User</span>
                        </a> --}}

                        <!-- Button trigger modal -->
                        <button type="button" class="d-sm-inline-block btn btn-success btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                            <span class="icon">
                                <i class="fas fa-file-import fa-sm text-white"></i>
                            </span>
                            <span class="text">Import User</span>
                        </button>

                        {{-- <a href="" class="d-sm-inline-block btn btn-success btn-sm shadow-sm" data-toggle="modal" data-target="#importModal" title="import Excel">
                            <span class="icon">
                                <i class="fas fa-file-import fa-sm text-white"></i>
                            </span>
                            <span class="text">Import User</span>
                        </a> --}}

                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive mt-4 ms-5 me-5 mb-4">
                            <table class="justify-content-end mb-2">
                                <tr>
                                <th><i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10 me-2"></i> <input type="text" id="min" name="min" placeholder="Min Date" class="me-2"></th>
                                <th><i class="ni ni-calendar-grid-58 text-danger text-sm opacity-10 me-2"></i> <input type="text" id="max" name="max" placeholder="Max Date"></th>
                                </tr>
                            </table>
                            
                            
                            <table class="table align-items-center mb-0" id="dataTable">
                                <thead>
                                <tr>
                                    <div id="alert">
                                        @include('components.alert')
                                    </div>
                                </tr>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM / NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Sebagai</th>
                                        <th>Pembimbing</th>
                                        <th>Foto</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM / NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Sebagai</th>
                                        <th>Pembimbing</th>
                                        <th>Foto</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                  </tfoot>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nimnip }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role == 1)
                                                <span class="badge badge-sm bg-gradient-success">Admin</span>
                                            @elseif($user->role == 2)
                                                <span class="badge badge-sm bg-gradient-dark">Pembimbing</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-light text-dark">Mahasiswa</span>
                                            @endif
                                        </td>
                                        <td>{{ ucwords(get_v('users', 'nimnip', $user->pembimbing, 'username')[0]->username ?? "") }}</td>
                                        {{-- <td>{{ $user->role }}</td> --}}
                                        <td><img src="{!! asset('/storage/avatars/'. $user->avatar) !!}" id="frame" class="text-center img-preview mb-3 img-profile rounded-circle" width="80px" height="80px" style="overflow:hidden"></td>
                                        <td>{{ date_format($user->created_at, "d M Y") }}</td>
                                        <td>
                                            <a href ="{{route('user.show', $user->id)}}" title="show" class="btn btn-sm btn-icon-split btn-primary">
                                                <span class="icon"><i class="fas fa-eye text-white" style="padding-top: 4px;"></i></span><span class="text">Lihat</span>
                                            </a>
                                            {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                data-attr="{{ route('anamriUser.show', $project->id) }}" title="show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a> --}}
                                            <a href ="{{route('user.edit', $user->id)}}" title="Edit" class="btn btn-sm btn-icon-split btn-warning">
                                                <span class="icon"><i class="fas fa-pen text-white" style="padding-top: 4px;"></i></span><span class="text">Edit</span>
                                            </a>
                                            <a href="javascript:;" data-toggle="modal" onclick="handleDelete({{$user->id}})" data-target="#DeleteModal" class="btn btn-sm btn-icon-split btn-danger">
                                                <span class="icon"><i class="fa fa-trash text-white" style="padding-top: 4px;"></i></span><span class="text">Hapus</span>
                                            </a>
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
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@section('js')
    <script type="text/javascript">
    function importData()
     {
         var url = '{{ route("importuser") }}';
         $("#importForm").attr('action', url);
     }

     function uploadSubmit()
     {
         $("#importForm").submit();
     }

    function updatepassword() {
        $('#updatepassword').modal('show')
        $('#password-confirm').val('');
        $('#password').val('');
    }
    function handleDelete(id) {
        let form = document.getElementById('deleteForm')
        form.action = `./user/${id}`
        console.log(form)
        $('#deleteModal').modal('show')
    }

    $(document).ready( function () {
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[6] );
                
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
                        columns: [ 0, 1, 2, 3, 4, 6 ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 6 ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 6 ]
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 6 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 6 ]
                    }
                },
                'colvis'
            ]
            } );
        } );
  </script>
@endsection