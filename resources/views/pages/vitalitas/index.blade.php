@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Vitalitas'])
    
    
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
<script>

</script>
@endsection