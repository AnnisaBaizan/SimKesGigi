@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Anamnesa dan Riwayat'])
    <!-- Modal Delete-->
    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Kartu Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin menghapus Kartu Pasien ?</p>
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
                    <h5 class="modal-title" id="importModalLabel">Import User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('importanamripasien') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="importanamripasien">Import File</label>
                            <input type="file" class="form-control-file" name="importanamripasien"
                                id="importanamripasien" placeholder="" aria-describedby="fileHelpId" required>
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

    {{-- acc --}}
    <div id="AccModal" class="modal fade text-danger" role="dialog">
        <div class="modal-dialog modal-dialog modal-dialog-centered ">
            <!-- Modal content-->
            <form action="" id="AccForm" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title text-center text-white">Konfirmasi Perubahan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        @method('put')
                        @csrf
                        <p class="text-center">Apakah anda yakin ingin mengubah status ACC? </p>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tidak, Batal</button>
                            <button type="submit" name="" class="btn btn-danger" data-dismiss="modal">Ya,
                                Ubah</button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Anamnesa dan Riwayat</h6>
                        @can('adminmahasiswa')
                            <a href="{{ route('anamripasien.create') }}"
                                class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah Anamnesa dan Riwayat</a>
                        @endcan
                    </div>

                    {{-- <div class="card-header d-sm-flex align-items-center">
                        @can('adminpembimbing')
                        <a href="{{route('exportanamripasien')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
                        <i class="fas fa-file-export fa-sm"></i>  Format Import/Restore</a>
                        
                        
                        <button type="button" class="d-sm-inline-block btn btn-success btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                            <span class="icon">
                                <i class="fas fa-file-import fa-sm text-white"></i>
                            </span>
                            <span class="text">Import Anamnesa & Riwayat Pasien</span>
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
                                        <th style="display: none;">Keluhan Utama</th>
                                        <th style="display: none;">Keluhan Tambahan</th>
                                        <th>Keluhan Utama</th>
                                        <th>Keluhan Tambahan</th>
                                        <th>GoDar</th>
                                        <th>Tek. Darah</th>
                                        <th>Nadi</th>
                                        <th>Suhu Tbh</th>
                                        <th>Pernafasan</th>
                                        <th>Jantung</th>
                                        <th>Diabetes</th>
                                        <th>Haemophilia</th>
                                        <th>Hepatitis</th>
                                        <th>Lambung</th>
                                        <th>Penyakit Lain</th>
                                        <th>Alergi Obat</th>
                                        <th>Alergi Makanan</th>
                                        <th>ACC</th>
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
                                        <th style="display: none;">Keluhan Utama</th>
                                        <th style="display: none;">Keluhan Tambahan</th>
                                        <th>Keluhan Utama</th>
                                        <th>Keluhan Tambahan</th>
                                        <th>GoDar</th>
                                        <th>Tek. Darah</th>
                                        <th>Nadi</th>
                                        <th>Suhu Tbh</th>
                                        <th>Pernafasan</th>
                                        <th>Jantung</th>
                                        <th>Diabetes</th>
                                        <th>Haemophilia</th>
                                        <th>Hepatitis</th>
                                        <th>Lambung</th>
                                        <th>Penyakit Lain</th>
                                        <th>Alergi Obat</th>
                                        <th>Alergi Makanan</th>
                                        <th>ACC</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($anamripasiens as $anamripasien)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @can('admin')
                                                <td>{{ $anamripasien->user->username }}</td>
                                                <td>{{ ucwords(get_v('users', 'nimnip', $anamripasien->user->pembimbing, 'username')[0]->username ?? '') }}
                                                </td>
                                            @endcan
                                            @can('mahasiswa')
                                                <td>{{ ucwords(get_v('users', 'nimnip', $anamripasien->user->pembimbing, 'username')[0]->username ?? '') }}
                                                </td>
                                            @endcan
                                            @can('pembimbing')
                                                <td>{{ $anamripasien->user->username }}</td>
                                            @endcan
                                            <td>{{ $anamripasien->kartupasien->no_kartu }} |
                                                {{ $anamripasien->kartupasien->nama }}</td>
                                            <td style="display: none;">{{ $anamripasien->klhn_utama }}</td>
                                            <td style="display: none;">{{ $anamripasien->klhn_tmbhn }}</td>
                                            <td>
                                                {{ strlen($anamripasien->klhn_utama) > 25 ? substr($anamripasien->klhn_utama, 0, 25) . ' . . .' : $anamripasien->klhn_utama }}
                                            </td>
                                            <td>
                                                {{ strlen($anamripasien->klhn_tmbhn) > 25 ? substr($anamripasien->klhn_tmbhn, 0, 25) . ' . . .' : $anamripasien->klhn_tmbhn }}
                                            </td>
                                            <td>{{ $anamripasien->goldar }}</td>
                                            <td>{{ $anamripasien->tknn_drh }} {{ $anamripasien->ktrgn_drh }}</td>
                                            <td>{{ $anamripasien->nadi }}</td>
                                            <td>{{ $anamripasien->suhu }}</td>
                                            <td>{{ $anamripasien->pernafasan }}</td>
                                            <td>{{ $anamripasien->jantung }}</td>
                                            <td>{{ $anamripasien->diabetes }}</td>
                                            <td>{{ $anamripasien->haemophilia }}</td>
                                            <td>{{ $anamripasien->hepatitis }}</td>
                                            <td>{{ $anamripasien->lambung }}</td>
                                            <td>{{ $anamripasien->pnykt_ln === 'Ada' ? $anamripasien->pnykt_ln . ' | ' . $anamripasien->nm_pnykt_ln : $anamripasien->pnykt_ln }}
                                            </td>
                                            <td>{{ $anamripasien->alergi_obat === 'Ada' ? $anamripasien->alergi_obat . ' | ' . $anamripasien->nm_obat : $anamripasien->alergi_obat }}
                                            </td>
                                            <td>{{ $anamripasien->alergi_mkn === 'Ada' ? $anamripasien->alergi_mkn . ' | ' . $anamripasien->nm_mkn : $anamripasien->alergi_mkn }}
                                            </td>


                                            <td>
                                                @can('mahasiswa')
                                                    <label
                                                        class="{{ $anamripasien->acc == 0 ? 'btn btn-danger' : 'btn btn-success' }}">{{ $anamripasien->acc == 0 ? '<i class="fas fa-times"></i>' : '<i class="fas fa-check"></i>' }}</label>
                                                @endcan
                                                @can('adminpembimbing')
                                                    @if ($anamripasien->acc == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $anamripasien->id }})"
                                                            data-target="#AccModal" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $anamripasien->id }})"
                                                            data-target="#AccModal" class="btn btn-success"><i class="fas fa-check"></i></a>
                                                    @endif
                                                @endcan
                                            </td>

                                            <td>{{ date_format($anamripasien->created_at, 'd M Y') }}</td>
                                            <td>
                                                <a href ="{{ route('anamripasien.show', $anamripasien->id) }}"
                                                    title="show" class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white"
                                                            style="padding-top: 4px;"></i></span><span
                                                        class="text">Lihat</span>
                                                </a>
                                                @can('adminmahasiswa')
                                                    <a href ="{{ route('anamripasien.edit', $anamripasien->id) }}"
                                                        title="Edit" class="btn btn-sm btn-icon-split btn-warning">
                                                        <span class="icon"><i class="fas fa-pen text-white"
                                                                style="padding-top: 4px;"></i></span><span
                                                            class="text">Edit</span>
                                                    </a>
                                                    <a href="javascript:;" data-toggle="modal"
                                                        onclick="handleDelete({{ $anamripasien->id }})"
                                                        data-target="#DeleteModal"
                                                        class="btn btn-sm btn-icon-split btn-danger">
                                                        <span class="icon"><i class="fa fa-trash text-white"
                                                                style="padding-top: 4px;"></i></span><span
                                                            class="text">Hapus</span>
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
        @include('layouts.footers.auth.footer')
    </div>
@endsection
@section('js')
    @can('adminmahasiswa')
        <script type="text/javascript">
            function handleDelete(id) {
                let form = document.getElementById('deleteForm')
                form.action = `./anamripasien/${id}`
                console.log(form)
                $('#deleteModal').modal('show')
            }
        </script>
    @endcan


    @can('adminpembimbing')
        <script>
            function handleACC(id) {
                let form = document.getElementById('AccForm')
                form.action = `./anamripasien/acc/${id}`
                console.log(form)
                $('#AccModal').modal('show')
            }
        </script>
    @endcan

    @can('mahasiswa')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endcan

    @can('admin')
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        // data[1] is the date column
                        var date = new Date(data[21]);

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
                                columns: [0, 1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20, 21
                                ]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20, 21
                                ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20, 21
                                ]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20, 21
                                ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20, 21
                                ]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>
    @endcan
    @can('pembimbing')
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        // data[1] is the date column
                        var date = new Date(data[20]);

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
                                columns: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20
                                ]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20
                                ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20
                                ]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20
                                ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                    20
                                ]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>
    @endcan
@endsection
