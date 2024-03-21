@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Odontogram'])


    <!-- Modal Delete-->
    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Odontogram</h5>
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
                    <form action="{{ route('importodontogram') }}" method="POST" enctype="multipart/form-data">
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Odontogram</h6>
                        @can('adminmahasiswa')
                            <a href="{{ route('odontogram.create') }}"
                                class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah data</a>
                        @endcan
                    </div>

                    {{-- <div class="card-header d-sm-flex align-items-center">
                            @can('adminpembimbing')
                            <a href="{{route('exportodontogram')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm me-3">
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
                                        <th>11</th>
                                        <th>21</th>
                                        <th>12</th>
                                        <th>22</th>
                                        <th>13</th>
                                        <th>23</th>
                                        <th>14</th>
                                        <th>24</th>
                                        <th>15</th>
                                        <th>25</th>
                                        <th>16</th>
                                        <th>26</th>
                                        <th>17</th>
                                        <th>27</th>
                                        <th>18</th>
                                        <th>28</th>

                                        <th>41</th>
                                        <th>31</th>
                                        <th>42</th>
                                        <th>32</th>
                                        <th>43</th>
                                        <th>33</th>
                                        <th>44</th>
                                        <th>34</th>
                                        <th>45</th>
                                        <th>35</th>
                                        <th>46</th>
                                        <th>36</th>
                                        <th>47</th>
                                        <th>37</th>
                                        <th>48</th>
                                        <th>38</th>

                                        <th>Gigi Tetap D</th>
                                        <th>Gigi Tetap M</th>
                                        <th>Gigi Tetap F</th>
                                        <th>DMF-T</th>

                                        <th>51</th>
                                        <th>61</th>
                                        <th>52</th>
                                        <th>62</th>
                                        <th>53</th>
                                        <th>63</th>
                                        <th>54</th>
                                        <th>64</th>
                                        <th>55</th>
                                        <th>65</th>

                                        <th>81</th>
                                        <th>71</th>
                                        <th>82</th>
                                        <th>72</th>
                                        <th>83</th>
                                        <th>73</th>
                                        <th>84</th>
                                        <th>74</th>
                                        <th>85</th>
                                        <th>75</th>

                                        <th>Gigi Susu D</th>
                                        <th>Gigi Susu E</th>
                                        <th>Gigi Susu F</th>
                                        <th>DEF-T </th>
                                        <th style="display: none;">Gigi Karies </th>
                                        <th>Gigi Karies </th>
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
                                        <th>No_Kartu & Nama Pasien</th>
                                        <th>11</th>
                                        <th>21</th>
                                        <th>12</th>
                                        <th>22</th>
                                        <th>13</th>
                                        <th>23</th>
                                        <th>14</th>
                                        <th>24</th>
                                        <th>15</th>
                                        <th>25</th>
                                        <th>16</th>
                                        <th>26</th>
                                        <th>17</th>
                                        <th>27</th>
                                        <th>18</th>
                                        <th>28</th>

                                        <th>41</th>
                                        <th>31</th>
                                        <th>42</th>
                                        <th>32</th>
                                        <th>43</th>
                                        <th>33</th>
                                        <th>44</th>
                                        <th>34</th>
                                        <th>45</th>
                                        <th>35</th>
                                        <th>46</th>
                                        <th>36</th>
                                        <th>47</th>
                                        <th>37</th>
                                        <th>48</th>
                                        <th>38</th>

                                        <th>Gigi Tetap D</th>
                                        <th>Gigi Tetap M</th>
                                        <th>Gigi Tetap F</th>
                                        <th>DMF-T</th>

                                        <th>51</th>
                                        <th>61</th>
                                        <th>52</th>
                                        <th>62</th>
                                        <th>53</th>
                                        <th>63</th>
                                        <th>54</th>
                                        <th>64</th>
                                        <th>55</th>
                                        <th>65</th>

                                        <th>81</th>
                                        <th>71</th>
                                        <th>82</th>
                                        <th>72</th>
                                        <th>83</th>
                                        <th>73</th>
                                        <th>84</th>
                                        <th>74</th>
                                        <th>85</th>
                                        <th>75</th>

                                        <th>Gigi Susu D</th>
                                        <th>Gigi Susu E</th>
                                        <th>Gigi Susu F</th>
                                        <th>DEF-T </th>
                                        <th style="display: none;">Gigi Karies </th>
                                        <th>Gigi Karies </th>
                                        <th style="display: none;">ACC</th>
                                        <th>ACC</th>
                                        <th>Dibuat</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($odontograms as $odontogram)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            @can('admin')
                                                <td>{{ $odontogram->user->username }}</td>
                                                <td>{{ ucwords(get_v('users', 'nimnip', $odontogram->user->pembimbing, 'username')[0]->username ?? '') }}
                                                </td>
                                            @endcan
                                            @can('mahasiswa')
                                                <td>{{ ucwords(get_v('users', 'nimnip', $odontogram->user->pembimbing, 'username')[0]->username ?? '') }}
                                                </td>
                                            @endcan
                                            @can('pembimbing')
                                                <td>{{ $odontogram->user->username }}</td>
                                            @endcan
                                            <td>{{ $odontogram->kartupasien->no_kartu }} |
                                                {{ $odontogram->kartupasien->nama }}</td>
                                            <!-- Kolom 1 -->
                                            <td>{{ $odontogram->kode_11 }}</td>
                                            <td>{{ $odontogram->kode_21 }}</td>
                                            <td>{{ $odontogram->kode_12 }}</td>
                                            <td>{{ $odontogram->kode_22 }}</td>
                                            <td>{{ $odontogram->kode_13 }}</td>
                                            <td>{{ $odontogram->kode_23 }}</td>
                                            <td>{{ $odontogram->kode_14 }}</td>
                                            <td>{{ $odontogram->kode_24 }}</td>
                                            <td>{{ $odontogram->kode_15 }}</td>
                                            <td>{{ $odontogram->kode_25 }}</td>
                                            <td>{{ $odontogram->kode_16 }}</td>
                                            <td>{{ $odontogram->kode_26 }}</td>
                                            <td>{{ $odontogram->kode_17 }}</td>
                                            <td>{{ $odontogram->kode_27 }}</td>
                                            <td>{{ $odontogram->kode_18 }}</td>
                                            <td>{{ $odontogram->kode_28 }}</td>
                                            <!-- Kolom 2 -->
                                            <td>{{ $odontogram->kode_41 }}</td>
                                            <td>{{ $odontogram->kode_31 }}</td>
                                            <td>{{ $odontogram->kode_42 }}</td>
                                            <td>{{ $odontogram->kode_32 }}</td>
                                            <td>{{ $odontogram->kode_43 }}</td>
                                            <td>{{ $odontogram->kode_33 }}</td>
                                            <td>{{ $odontogram->kode_44 }}</td>
                                            <td>{{ $odontogram->kode_34 }}</td>
                                            <td>{{ $odontogram->kode_45 }}</td>
                                            <td>{{ $odontogram->kode_35 }}</td>
                                            <td>{{ $odontogram->kode_46 }}</td>
                                            <td>{{ $odontogram->kode_36 }}</td>
                                            <td>{{ $odontogram->kode_47 }}</td>
                                            <td>{{ $odontogram->kode_37 }}</td>
                                            <td>{{ $odontogram->kode_48 }}</td>
                                            <td>{{ $odontogram->kode_38 }}</td>


                                            <td>{{ $odontogram->jumlah_tetap_d }}</td>
                                            <td>{{ $odontogram->jumlah_tetap_m }}</td>
                                            <td>{{ $odontogram->jumlah_tetap_f }}</td>
                                            <td>{{ $odontogram->dmf_t }}</td>


                                            <!-- Kolom 3 -->
                                            <td>{{ $odontogram->kode_51 }}</td>
                                            <td>{{ $odontogram->kode_61 }}</td>
                                            <td>{{ $odontogram->kode_52 }}</td>
                                            <td>{{ $odontogram->kode_62 }}</td>
                                            <td>{{ $odontogram->kode_53 }}</td>
                                            <td>{{ $odontogram->kode_63 }}</td>
                                            <td>{{ $odontogram->kode_54 }}</td>
                                            <td>{{ $odontogram->kode_64 }}</td>
                                            <td>{{ $odontogram->kode_55 }}</td>
                                            <td>{{ $odontogram->kode_65 }}</td>
                                            <!-- Kolom 4 -->
                                            <td>{{ $odontogram->kode_81 }}</td>
                                            <td>{{ $odontogram->kode_71 }}</td>
                                            <td>{{ $odontogram->kode_82 }}</td>
                                            <td>{{ $odontogram->kode_72 }}</td>
                                            <td>{{ $odontogram->kode_83 }}</td>
                                            <td>{{ $odontogram->kode_73 }}</td>
                                            <td>{{ $odontogram->kode_84 }}</td>
                                            <td>{{ $odontogram->kode_74 }}</td>
                                            <td>{{ $odontogram->kode_85 }}</td>
                                            <td>{{ $odontogram->kode_75 }}</td>

                                            <td>{{ $odontogram->jumlah_susu_d }}</td>
                                            <td>{{ $odontogram->jumlah_susu_e }}</td>
                                            <td>{{ $odontogram->jumlah_susu_f }}</td>
                                            <td>{{ $odontogram->def_t }}</td>
                                            <td style="display: none;">
                                                {{ $odontogram->gigi_karies }}
                                            </td>
                                            <td>
                                                {{ strlen($odontogram->gigi_karies) > 25 ? substr($odontogram->gigi_karies, 0, 25) . ' . . .' : $odontogram->gigi_karies }}
                                            </td>
                                            
                                            <td style="display: none;">
                                                @can('mahasiswa')
                                                    <label
                                                        class="{{ $odontogram->acc == 0 ? 'btn btn-danger' : 'btn btn-success' }}">{{ $odontogram->acc == 0 ? 'Belum' : 'Sudah' }}</label>
                                                @endcan
                                                @can('adminpembimbing')
                                                    @if ($odontogram->acc == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $odontogram->id }})"
                                                            data-target="#AccModal" class="btn btn-danger">Belum</a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $odontogram->id }})"
                                                            data-target="#AccModal" class="btn btn-success">Sudah</a>
                                                    @endif
                                                @endcan
                                            </td>

                                            <td>
                                                @can('mahasiswa')
                                                    <label class="{{ $odontogram->acc == 0 ? 'btn btn-danger' : 'btn btn-success' }}">
                                                        {!! $odontogram->acc == 0 ? '<i class="fas fa-times"></i>' : '<i class="fas fa-check"></i>' !!}
                                                    </label>
                                                
                                                @endcan
                                                @can('adminpembimbing')
                                                    @if ($odontogram->acc == 0)
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $odontogram->id }})"
                                                            data-target="#AccModal" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                                    @else
                                                        <a href="javascript:;" data-toggle="modal"
                                                            onclick="handleACC({{ $odontogram->id }})"
                                                            data-target="#AccModal" class="btn btn-success"><i class="fas fa-check"></i></a>
                                                    @endif
                                                @endcan
                                            </td>

                                            <td>{{ date_format($odontogram->created_at, 'd M Y') }}</td>
                                            <td>

                                                <a href ="{{ route('odontogram.show', $odontogram->id) }}" title="show"
                                                    class="btn btn-sm btn-icon-split btn-primary">
                                                    <span class="icon"><i class="fas fa-eye text-white"
                                                            style="padding-top: 4px;"></i></span><span
                                                        class="text">Lihat</span>
                                                </a>
                                                {{-- <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                                                    data-attr="{{ route('anamriodontogram.show', $project->id) }}" title="show">
                                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                                </a> --}}
                                                @can('adminmahasiswa')
                                                    <a href ="{{ route('odontogram.edit', $odontogram->id) }}" title="Edit"
                                                        class="btn btn-sm btn-icon-split btn-warning">
                                                        <span class="icon"><i class="fas fa-pen text-white"
                                                                style="padding-top: 4px;"></i></span><span
                                                            class="text">Edit</span>
                                                    </a>
                                                    <a href="javascript:;" data-toggle="modal"
                                                        onclick="handleDelete({{ $odontogram->id }})"
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
    </div>

    @include('layouts.footers.auth.footer')
@endsection
@section('js')
    @can('adminmahasiswa')
        <script type="text/javascript">
            function handleDelete(id) {
                let form = document.getElementById('deleteForm')
                form.action = `./odontogram/${id}`
                console.log(form)
                $('#deleteModal').modal('show')
            }
        </script>
    @endcan

    @can('adminpembimbing')
        <script>
            function handleACC(id) {
                let form = document.getElementById('AccForm')
                form.action = `./odontogram/acc/${id}`
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
                        var date = new Date(data[66]);

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
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 66, 68
                                ]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 66, 68
                                ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 66, 68
                                ]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 66, 68
                                ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 66, 68
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
                        var date = new Date(data[65]);

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
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 67
                                ]
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 67
                                ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 67
                                ]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 67
                                ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                                    19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                                    37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53,
                                    54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 67
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
