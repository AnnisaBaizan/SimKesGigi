@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Askepgilut'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Askepgilut'])

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Askepgilut, Penyebab, Gejala</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive mt-4 ms-5 me-5 mb-4">


                            <table class="table align-items-center mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Askepgilut</th>
                                        <th>Deskripsi</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Askepgilut</th>
                                        <th>Deskripsi</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($askepgiluts as $askepgilut)
                                        <tr>
                                            <td>{{ $askepgilut->id }}</td>
                                            <td>{{ $askepgilut->askepgilut }}</td>
                                            <td>{{ $askepgilut->deskripsi }}</td>
                                            <td>{{ date_format($askepgilut->created_at, 'd M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive mt-4 ms-5 me-5 mb-4">
                            <table class="table align-items-center mb-0" id="dataTable1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Askepgilut</th>
                                        <th>Gejala</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Askepgilut</th>
                                        <th>Gejala</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($gejalas as $gejala)
                                        <tr>
                                            <td>{{ $gejala->id }}</td>
                                            <td>{{ $gejala->askepgilut_id }}</td>
                                            <td>{{ $gejala->gejala }}</td>
                                            <td>{{ date_format($gejala->created_at, 'd M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive mt-4 ms-5 me-5 mb-4">
                            <table class="table align-items-center mb-0" id="dataTable2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Askepgilut</th>
                                        <th>Penyebab</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Askepgilut</th>
                                        <th>Penyebab</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($penyebabs as $penyebab)
                                        <tr>
                                            <td>{{ $penyebab->id }}</td>
                                            <td>{{ $penyebab->askepgilut_id }}</td>
                                            <td>{{ $penyebab->penyebab }}</td>
                                            <td>{{ date_format($penyebab->created_at, 'd M Y') }}</td>
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
                form.action = `./askepgilut/status/${id}`
                console.log(form)
                $('#statusModal').modal('show')
            }
        </script>
    @endcan

    @can('admin')
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        var date = new Date(data[3]);

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
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>



        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        var date = new Date(data[3]);

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
                $('#min1, #max1').on('change', function() {
                    table.draw();
                });

                // Create date inputs
                minDate = new DateTime($('#min1'), {
                    format: 'DD MMM YYYY'
                });
                maxDate = new DateTime($('#max1'), {
                    format: 'DD MMM YYYY'
                });

                var table = $('#dataTable1').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>


        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        var date = new Date(data[3]);

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
                $('#min2, #max2').on('change', function() {
                    table.draw();
                });

                // Create date inputs
                minDate = new DateTime($('#min2'), {
                    format: 'DD MMM YYYY'
                });
                maxDate = new DateTime($('#max2'), {
                    format: 'DD MMM YYYY'
                });

                var table = $('#dataTable2').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>
    @endcan
@endsection
