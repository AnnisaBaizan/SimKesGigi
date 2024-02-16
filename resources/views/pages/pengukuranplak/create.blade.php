@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pengukuran Plak'])
    <div class="container-fluid py-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengukuran Plak</h6>
            </div>
            <div class="card-body">
                <form class="user" action="s" method="post">
                    @csrf
                <div id="alert">
                    @include('components.alert')
                </div>
                
                <div class="form-group row justify-content-center">
                    <div class="col-sm-4">
                        
                    </div>
                </div>
                <hr>
                <form class="user" action="#" method="post">
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Basic checkbox toggle button group">
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck1" autocomplete="off" value="1">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck1"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck2" autocomplete="off" value="2">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck2"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck3" autocomplete="off" value="3">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck3"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck4" autocomplete="off" value="4">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck4"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck5" autocomplete="off" value="5">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck5"><i class="fas fa-tooth fa-xs"></i></label>
                                
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck6" autocomplete="off" value="6">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck6"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" >   
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck7" autocomplete="off" value="7">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck7"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck8" autocomplete="off" value="8">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck8"><i class="fas fa-tooth fa-xs"></i></label>
                            
                            <input type="checkbox" name="gigi[]" class="btn-check" id="btncheck9" autocomplete="off" value="9">
                            <label class="btn btn-outline-danger px-1 py-0 mb-0" for="btncheck9"><i class="fas fa-tooth fa-xs"></i></label>
                        </div>
                    </div>

                    
                    
                    <P><INPUT class=btn name=submit value=check type=submit  onclick="validate()"></P>
                </form>

                    <div class="form-group row">
        
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="jk" class ="form-text">Jenis Kelamin :</label>
                            <select class="form-control @error('jk') is-invalid @enderror" id="jk" name="jk" placeholder="Jenis Kelamin" value="{{ old('jk') }}" required>
                                    @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <option value="" selected disabled>Jenis Kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                          </div>
                        <div class="col-sm-6">
                        <label for="suku" class ="form-text">Suku/Ras :</label>
                          <input type="text" class="form-control @error('suku') is-invalid @enderror" id="suku" name="suku" placeholder="Suku/Ras" value="{{ old('suku') }}" required>
                                  @error('suku')
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                      
                    </div>

                    <div class="form-group row">
                        
                    </div>

                    <div class="form-group row">
                        
                    </div>

                        <div class="form-group row">
                            <div class="col-sm-6 d-grid gap-2">
                                <a href="{{route('kartupasien.index')}}" class="btn btn-success btn-block btn">
                                    <i class="fas fa-arrow-left fa-fw"></i> Kembali
                                </a>
                            </div>
                            <div class="col-sm-6 d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan" >
                                    <i class="fas fa-save fa-fw"></i> Save
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    
    @include('layouts.footers.auth.footer')
@endsection
@section('js')
<script type="text/javascript">
    function validate() {
        if (document.getElementById('btncheck1').checked) {
            alert("checked");
        } else {
            alert("You didn't check it! Let me check it for you.");
        }
    }
</script>
  <script type="text/javascript">
        class CustomSelect {
        constructor(originalSelect) {
            this.originalSelect = originalSelect;
            this.customSelect = document.createElement("div");
            this.customSelect.classList.add("select");

            this.originalSelect.querySelectorAll("option").forEach((optionElement) => {
            const itemElement = document.createElement("div");

            itemElement.classList.add("select__item");
            itemElement.textContent = optionElement.textContent;
            this.customSelect.appendChild(itemElement);

            if (optionElement.selected) {
                this._select(itemElement);
            }

            itemElement.addEventListener("click", () => {
                if (
                this.originalSelect.multiple &&
                itemElement.classList.contains("select__item--selected")
                ) {
                this._deselect(itemElement);
                } else {
                this._select(itemElement);
                }
            });
            });

            this.originalSelect.insertAdjacentElement("afterend", this.customSelect);
            this.originalSelect.style.display = "none";
        }

        _select(itemElement) {
            const index = Array.from(this.customSelect.children).indexOf(itemElement);

            if (!this.originalSelect.multiple) {
            this.customSelect.querySelectorAll(".select__item").forEach((el) => {
                el.classList.remove("select__item--selected");
            });
            }

            this.originalSelect.querySelectorAll("option")[index].selected = true;
            itemElement.classList.add("select__item--selected");
        }

        _deselect(itemElement) {
            const index = Array.from(this.customSelect.children).indexOf(itemElement);

            this.originalSelect.querySelectorAll("option")[index].selected = false;
            itemElement.classList.remove("select__item--selected");
        }
        }

        document.querySelectorAll(".custom-select").forEach((selectElement) => {
        new CustomSelect(selectElement);
        });
  </script>
@endsection