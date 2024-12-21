@extends('layouts.main_tuteur')

@section('title', 'Dashboard | ' . config('app.name'))
@section('content')
{{-- Index --}}
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <ul>
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>{{$title}}</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body">
                    <div class="border-nav-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab"
                                    aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#enfants" role="tab"
                                    aria-selected="false">Mes Enfants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#discipline" role="tab"
                                    aria-selected="false">Discipline</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                {{-- {{dd($eleve)}} --}}
                                <h3>Mes Info</h3>
                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <th>Noms</th>
                                        <td>{{$tuteur->nom}} {{$tuteur->prenom}} {{$tuteur->postnom}} </td>
                                        <th>E-mail</th>
                                        <td>{{$tuteur->email}}</td>
                                        <th>Contact</th>
                                        <td>{{$tuteur->contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>Relation</th>
                                        <td>{{$tuteur->relation}}</td>
                                        <th>Adresse</th>
                                        <td>{{$tuteur->adresse}}</td>
                                        <th>Profession</th>
                                        <td>{{$tuteur->profession}}</td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="tab-pane fade show" id="cours" role="tabpanel">
                                <p>cours</p>
                            </div>
                            
                            <div class="tab-pane fade show" id="enfants" role="tabpanel">
                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <th></th>
                                        <th>Section</th>
                                        <th>Option</th>
                                        <th>Classe</th>
                                        <th>Noms</th>
                                    </tr>
                                    @php $i = 1; @endphp
                                    @foreach($eleves as $c)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$c->section_name}}</td> 
                                        <td>{{$c->option_name}}</td> 
                                        <td>{{$c->classe_name}}</td> 
                                        <td>{{$c->nom}} {{$c->prenom}} {{$c->postnom}}</td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                    
                                </table>
                                <hr>
                            </div>
                            
                            
                            
                            <div class="tab-pane fade show" id="camarades" role="tabpanel">
                                <p>camarades</p>
                            </div>
                                                       
                            <div class="tab-pane fade show" id="horaires" role="tabpanel">
                                <p>Horaires</p>
                            </div>

                            <div class="tab-pane fade show" id="discipline" role="tabpanel">
                                <p>Discipline</p>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Area Start Here -->
    @include('layouts.footer');
    <!-- Footer Area End Here -->
@endsection