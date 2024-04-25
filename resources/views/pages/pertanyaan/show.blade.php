@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100', 'titlePage' => 'Pertanyaan'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Kartu Pasien'])
    
    
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
<script>

</script>
@endsection