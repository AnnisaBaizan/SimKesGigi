@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Eskternal & Internal Oral (Plak & Kalkulus)'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Eskternal & Internal Oral (Plak & Kalkulus)'])

    <!-- Modal Delete-->
    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Eskternal & Internal Oral (Plak & Kalkulus)</h5>
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
                    <form action="{{ route('importeksplakkal') }}" method="POST" enctype="multipart/form-data">
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

    {{-- acc --}}
    <div class="modal" id="AccModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AccModalLabel">ACC Pemeriksaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengubah status ACC?</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" id="AccForm">
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
                        <h6 class="m-0 font-weight-bold text-primary">Data eksplakkal</h6>
                        @can('adminmahasiswa')
                            <a href="{{ route('eksplakkal.create') }}"
                                class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah data</a>
                        @endcan
                    </div>

                    {{-- <div class="card-header d-sm-flex align-items-center">
                        @can('adminpembimbing')
                        <a href="{{route('exporteksplakkal')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
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
                                        {{-- Eksternal Oral --}}
                                        <th>Muka</th>
                                        <th>limpe Kanan Teraba</th>
                                        <th>Limpe Kanan Texture</th>
                                        <th>Limpe Kanan Sakit</th>
                                        <th>limpe Kiri Teraba</th>
                                        <th>Limpe Kiri Texture</th>
                                        <th>Limpe Kiri Sakit</th>
                                        {{-- Internal Oral Plak --}}
                                        <th style="display: none;">Gigi lokasi Plak</th>
                                        <th>Gigi lokasi Plak</th>
                                        <th>Gigi Ada Plak</th>
                                        <th>Nilai</th>
                                        <th>Score</th>
                                        <th>Kriteria</th>
                                        {{-- Internal Oral Kalkulus --}}
                                        <th style="display: none;">Kalkulus Supragingiva</th>
                                        <th style="display: none;">Kalkulus subgingiva</th>
                                        <th>Kalkulus Supragingiva</th>
                                        <th>Kalkulus subgingiva</th>
                                        <th style="display: none;">ACC</th>
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
                                        <th>Nama</th>
                                        {{-- Eksternal Oral --}}
                                        <th>Muka</th>
                                        <th>limpe Kanan Teraba</th>
                                        <th>Limpe Kanan Texture</th>
                                        <th>Limpe Kanan Sakit</th>
                                        <th>limpe Kiri Teraba</th>
                                        <th>Limpe Kiri Texture</th>
                                        <th>Limpe Kiri Sakit</th>
                                        {{-- Internal Oral Plak --}}
                                        <th style="display: none;">Gigi lokasi Plak</th>
                                        <th>Gigi lokasi Plak</th>
                                        <th>Gigi dengan Plak</th>
                                        <th>Nilai</th>
                                        <th>Score</th>
                                        <th>Kriteria</th>
                                        {{-- Internal Oral Kalkulus --}}
                                        <th style="display: none;">Kalkulus Supragingiva</th>
                                        <th style="display: none;">Kalkulus subgingiva</th>
                                        <th>Kalkulus Supragingiva</th>
                                        <th>Kalkulus subgingiva</th>
                                        <th style="display: none;">ACC</th>
                                        <th>ACC</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($eksplakkals as $eksplakkal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @can('admin')
                                                <td>{{ $eksplakkal->user->username }}</td>
                                                <td>{{ ucwords(get_v('users', 'nimnip', $eksplakkal->pembimbing, 'username')[0]->username ?? '') }}
                                                </td>
                                            @endcan
                                            @can('mahasiswa')
                                                <td>{{ ucwords(get_v('users', 'nimnip', $eksplakkal->pembimbing, 'username')[0]->username ?? '') }}
                                                </td>
                                            @endcan
                                            @can('pembimbing')
                                                <td>{{ $eksplakkal->user->username }}</td>
                                            @endcan
                                            <td>{{ $eksplakkal->kartupasien->no_kartu }} |
                                                {{ $eksplakkal->kartupasien->nama }}</td>

                                            {{-- Eksternal Oral --}}
                                            <td>
                                                @if ($eksplakkal->muka == 'Simetris')
                                                    <span class="badge badge-sm bg-gradient-success">Simetris</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Tidak Simetris</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($eksplakkal->limpe_kanan_teraba == 'Teraba')
                                                    <span class="badge badge-sm bg-gradient-success">Teraba</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Tidak Teraba</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($eksplakkal->limpe_kanan_texture == 'Lunak')
                                                    <span class="badge badge-sm bg-gradient-success">Lunak</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Keras</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($eksplakkal->limpe_kanan_sakit == 'Sakit')
                                                    <span class="badge badge-sm bg-gradient-success">Sakit</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Tidak Sakit</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($eksplakkal->limpe_kiri_teraba == 'Teraba')
                                                    <span class="badge badge-sm bg-gradient-success">Teraba</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Tidak Teraba</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($eksplakkal->limpe_kiri_texture == 'Lunak')
                                                    <span class="badge badge-sm bg-gradient-success">Lunak</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Keras</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($eksplakkal->limpe_kiri_sakit == 'Sakit')
                                                    <span class="badge badge-sm bg-gradient-success">Sakit</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Tidak Sakit</span>
                                                @endif
                                            </td>

                                            {{-- Internal Oral Plak --}}
                                            <td style="display: none;">{{ $eksplakkal->plak }}</td>
                                            <td>{{ strlen($eksplakkal->plak) > 25 ? substr($eksplakkal->plak, 0, 25) . ' . . .' : $eksplakkal->plak }}
                                            </td>
                                            <td>{{ $eksplakkal->jumlah_plak }}</td>
                                            <td>{{ $eksplakkal->jumlah_tidak_plak }} / {{ $eksplakkal->jumlah_permukaan }}
                                            </td>
                                            <td>{{ $eksplakkal->plaque_score }}</td>
                                            <td>
                                                @if ($eksplakkal->kriteria == 'Baik')
                                                    <span class="badge badge-sm bg-gradient-success">Baik</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Buruk</span>
                                                @endif
                                            </td>

                                            {{-- Internal Oral Kalkulus --}}
                                            <td style="display: none;">{{ $eksplakkal->supragingiva }}</td>
                                            <td style="display: none;">{{ $eksplakkal->subgingiva }}</td>
                                            <td>{{ strlen($eksplakkal->supragingiva) > 25 ? substr($eksplakkal->supragingiva, 0, 25) . ' . . .' : $eksplakkal->supragingiva }}
                                            </td>
                                            <td>{{ strlen($eksplakkal->subgingiva) > 25 ? substr($eksplakkal->subgingiva, 0, 25) . ' . . .' : $eksplakkal->subgingiva }}
                                            </td>


                                            <td style="display: none;">
                                                @can('mahasiswa')
                                                    <label
                                                        class="{{ $eksplakkal->acc == 0 ? 'btn btn-danger' : 'btn btn-success' }}">{{ $eksplakkal->acc == 0 ? 'Belum' : 'Sudah' }}</label>
                                                @endcan
                                                @can('adminpembimbing')
                                                    @if ($eksplakkal->acc == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $eksplakkal->id }})"
                                                            data-target="#AccModal" class="btn btn-danger">Belum</a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $eksplakkal->id }})"
                                                            data-target="#AccModal" class="btn btn-success">Sudah</a>
                                                    @endif
                                                @endcan
                                            </td>

                                            <td>
                                                @can('mahasiswa')
                                                    <label
                                                        class="{{ $eksplakkal->acc == 0 ? 'btn btn-danger' : 'btn btn-success' }}">
                                                        {!! $eksplakkal->acc == 0 ? '<i class="fas fa-times"></i>' : '<i class="fas fa-check"></i>' !!}
                                                    </label>
                                                @endcan
                                                @can('adminpembimbing')
                                                    @if ($eksplakkal->acc == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $eksplakkal->id }})"
                                                            data-target="#AccModal" class="btn btn-danger"><i
                                                                class="fas fa-times"></i></a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $eksplakkal->id }})"
                                                            data-target="#AccModal" class="btn btn-success"><i
                                                                class="fas fa-check"></i></a>
                                                    @endif
                                                @endcan
                                            </td>


                                            <td>{{ date_format($eksplakkal->created_at, 'd M Y') }}</td>
                                            <td>

                                                <a href ="{{ route('eksplakkal.show', $eksplakkal->id) }}" title="show"
                                                    class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white"
                                                            style="padding-top: 4px;"></i></span><span
                                                        class="text">Lihat</span>
                                                </a>
                                                {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                data-attr="{{ route('anamrieksplakkal.show', $project->id) }}" title="show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a> --}}
                                                @can('adminmahasiswa')
                                                    @if ($eksplakkal->acc !== 1)
                                                        <a href ="{{ route('eksplakkal.edit', $eksplakkal->id) }}"
                                                            title="Edit" class="btn btn-sm btn-icon-split btn-warning">
                                                            <span class="icon"><i class="fas fa-pen text-white"
                                                                    style="padding-top: 4px;"></i></span><span
                                                                class="text">Edit</span>
                                                        </a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleDelete({{ $eksplakkal->id }})"
                                                            data-target="#DeleteModal"
                                                            class="btn btn-sm btn-icon-split btn-danger">
                                                            <span class="icon"><i class="fa fa-trash text-white"
                                                                    style="padding-top: 4px;"></i></span><span
                                                                class="text">Hapus</span>
                                                        </a>
                                                    @else
                                                        <a href ="" title="Edit"
                                                            class="btn btn-sm btn-icon-split btn-secondary"
                                                            style="pointer-events: none; opacity: 0.6;">
                                                            <span class="icon"><i class="fas fa-pen text-white"
                                                                    style="padding-top: 4px;"></i></span><span
                                                                class="text">Edit</span>
                                                        </a>
                                                        <a href="" title="Hapus"
                                                            class="btn btn-sm btn-icon-split btn-secondary"
                                                            style="pointer-events: none; opacity: 0.6;">
                                                            <span class="icon"><i class="fa fa-trash text-white"
                                                                    style="padding-top: 4px;"></i></span><span
                                                                class="text">Hapus</span>
                                                        </a>
                                                    @endif
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
    @can('adminmahasiswa')
        <script type="text/javascript">
            function handleDelete(id) {
                let form = document.getElementById('deleteForm')
                form.action = `./eksplakkal/${id}`
                console.log(form)
                $('#deleteModal').modal('show')
            }
        </script>
    @endcan


    @can('adminpembimbing')
        <script>
            function handleACC(id) {
                let form = document.getElementById('AccForm')
                form.action = `./eksplakkal/acc/${id}`
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
                        var date = new Date(data[23]);

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
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18, 21,
                                    23
                                ]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18, 21,
                                    23
                                ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18, 21,
                                    23
                                ]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18, 21,
                                    23
                                ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18, 21,
                                    23
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
                        var date = new Date(data[22]);

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
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 20, 22]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 20, 22]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 20, 22]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 20, 22]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 20, 22]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>
    @endcan
@endsection
