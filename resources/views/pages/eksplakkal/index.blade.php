@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Eskternal & Internal Oral (Plak & Kalkulus)'])
    
    
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data data</h6>
        @can('adminmahasiswa')
        <a href="{{route('eksplakkal.create')}}" class="d-sm-inline-block btn btn-primary btn-sm shadow-sm">
        <i class="fas fa-plus fa-sm"></i> Tambah data</a>
        @endcan
    </div>
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
<script>

</script>
@endsection