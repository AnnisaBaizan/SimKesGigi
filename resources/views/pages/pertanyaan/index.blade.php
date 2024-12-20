@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Pertanyaan'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pertanyaan'])

    <!-- Modal Delete-->
    {{-- <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin menghapus pertanyaan ?</p>
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
                    <form action="{{ route('importpertanyaan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="importpertanyaan">Import File</label>
                            <input type="file" class="form-control-file" name="importpertanyaan" id="importpertanyaan"
                                placeholder="" aria-describedby="fileHelpId" required>
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


    {{-- status --}}
    <div class="modal" id="statusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Status Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengubah status?</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" id="statusForm">
                        @method('put')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak, Kembali</button>
                        <button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data pertanyaan</h6>
                        @can('adminmahasiswa')
                            <a href="{{ route('pertanyaan.create') }}"
                                class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah pertanyaan</a>
                        @endcan
                    </div>

                    {{-- <div class="card-header d-sm-flex align-items-center">
                            @can('adminpembimbing')
                            <a href="{{route('exportpertanyaan')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
                            <i class="fas fa-file-export fa-sm"></i>  Format Import</a>
                            <button type="button" class="d-sm-inline-block btn btn-success btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                                <span class="icon">
                                    <i class="fas fa-file-import fa-sm text-white"></i>
                                </span>
                                <span class="text">Import Kartu pertanyaan</span>
                            </button>
                            @endcan
                        </div> --}}

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive mt-4 ms-5 me-5 mb-4">
                            @can('adminpembimbing')
                                <table class="justify-content-end mb-2">
                                    <tr>
                                        <th><i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10 me-2"></i> <input
                                                type="text" id="min" name="min" placeholder="Min Date"
                                                class="me-2"></th>
                                        <th><i class="ni ni-calendar-grid-58 text-danger text-sm opacity-10 me-2"></i> <input
                                                type="text" id="max" name="max" placeholder="Max Date"></th>
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
                                        <th>Jenis</th>
                                        <th>Pertanyaan</th>
                                        <th style="display: none;">Aktif</th>
                                        <th>Aktif</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Pertanyaan</th>
                                        <th style="display: none;">Aktif</th>
                                        <th>Aktif</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($pertanyaans as $pertanyaan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pertanyaan->kode == 1 ? 'Pengetahuan' : 'Perilaku' }}</td>
                                            <td>{{ $pertanyaan->soal }}</td>
                                            <td style="display: none;">
                                                @can('mahasiswa')
                                                    <label
                                                        class="{{ $pertanyaan->status == 0 ? 'btn btn-danger' : 'btn btn-success' }}">{{ $pertanyaan->status == 0 ? 'Tidak' : 'Iya' }}</label>
                                                @endcan
                                                @can('adminpembimbing')
                                                    @if ($pertanyaan->status == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handlestatus({{ $pertanyaan->id }})"
                                                            data-target="#statusModal" class="btn btn-danger">Tidak</a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handlestatus({{ $pertanyaan->id }})"
                                                            data-target="#statusModal" class="btn btn-success">Iya</a>
                                                    @endif
                                                @endcan
                                            </td>

                                            <td>
                                                @can('mahasiswa')
                                                    <label
                                                        class="{{ $pertanyaan->status == 0 ? 'btn btn-danger' : 'btn btn-success' }}">
                                                        {!! $pertanyaan->status == 0 ? '<i class="fas fa-times"></i>' : '<i class="fas fa-check"></i>' !!}
                                                    </label>
                                                @endcan
                                                @can('admin')
                                                    @if ($pertanyaan->status == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handlestatus({{ $pertanyaan->id }})"
                                                            data-target="#statusModal" class="btn btn-danger"><i
                                                                class="fas fa-times"></i></a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handlestatus({{ $pertanyaan->id }})"
                                                            data-target="#statusModal" class="btn btn-success"><i
                                                                class="fas fa-check"></i></a>
                                                    @endif
                                                @endcan
                                            </td>
                                            <td>{{ date_format($pertanyaan->created_at, 'd M Y') }}</td>
                                            <td>
                                                {{-- <a href ="{{ route('pertanyaan.show', $pertanyaan->id) }}" title="show"
                                                    class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white"
                                                            style="padding-top: 4px;"></i></span><span
                                                        class="text">Lihat</span>
                                                </a> --}}
                                                @can('admin')
                                                    <a href ="{{ route('pertanyaan.edit', $pertanyaan->id) }}" title="Edit"
                                                        class="btn btn-sm btn-icon-split btn-warning">
                                                        <span class="icon"><i class="fas fa-pen text-white"
                                                                style="padding-top: 4px;"></i></span><span
                                                            class="text">Edit</span>
                                                    </a>
                                                    {{-- <a href="javascript:;" data-toggle="modal"
                                                        onclick="handleDelete({{ $pertanyaan->id }})"
                                                        data-target="#DeleteModal"
                                                        class="btn btn-sm btn-icon-split btn-danger">
                                                        <span class="icon"><i class="fa fa-trash text-white"
                                                                style="padding-top: 4px;"></i></span><span
                                                            class="text">Hapus</span>
                                                    </a> --}}
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
    @can('admin')
        <script>
            function handlestatus(id) {
                let form = document.getElementById('statusForm')
                form.action = `./pertanyaan/status/${id}`
                console.log(form)
                $('#statusModal').modal('show')
            }
        </script>
    @endcan

    {{-- @can('admin')
        <script type="text/javascript">
            function handleDelete(id) {
                let form = document.getElementById('deleteForm')
                form.action = `./pertanyaan/${id}`
                console.log(form)
                $('#deleteModal').modal('show')
            }
        </script>
    @endcan --}}

    {{-- @can('admin')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endcan --}}

    @can('admin')
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        var date = new Date(data[5]);

                        if (
                            (min === null && max === null) ||
                            (min === null && date <= max) ||
                            (min <= date && max === null) ||
                            (min <= date && date <= max)
                        ) {
                            return true;
                        }
                        return false;
                    }
                );

                // Refilter the table
                $('#min, #max').on('change', function() {
                    table.draw();
                });

                // Create date inputs
                minDate = new DateTime($('#min'), {
                    format: 'DD MMM YYYY'
                });
                maxDate = new DateTime($('#max'), {
                    format: 'DD MMM YYYY'
                });

                var table = $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 5]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>
    @endcan
@endsection
