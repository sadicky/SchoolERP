@extends('layouts.main_teacher')

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
                                <a class="nav-link" data-toggle="tab" href="#classes" role="tab"
                                    aria-selected="false">Mes Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#cours" role="tab"
                                    aria-selected="false">Mes Cours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                                    aria-selected="false">Mes Présences</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#paiements" role="tab"
                                    aria-selected="false">Mes Paiements</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">

                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <th>Noms</th>
                                        <td>{{Auth::user()->enseignant->nom}} {{Auth::user()->enseignant->prenom}} {{Auth::user()->enseignant->postnom}}</td>
                                        <th>E-mail</th>
                                        <td>{{Auth::user()->enseignant->email}}</td>
                                        <th>Contact</th>
                                        <td>{{Auth::user()->enseignant->contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>Sexe</th>
                                        <td>{{Auth::user()->enseignant->sexe}}</td>
                                        <th>Adresse</th>
                                        <td>{{Auth::user()->enseignant->adresse}}</td>
                                        <th>Nationalité</th>
                                        <td>{{Auth::user()->enseignant->nationalite}}</td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="tab-pane fade show" id="cours" role="tabpanel">
                                <p>cours</p>
                            </div>
                            
                            
                            <div class="tab-pane fade show" id="camarades" role="tabpanel">
                                <p>camarades</p>
                            </div>
                                                       
                            <div class="tab-pane fade show" id="horaires" role="tabpanel">
                                <p>Horaires</p>
                            </div>

                            <div class="tab-pane fade show" id="paiements" role="tabpanel">
                                <p>paiements</p>
                            </div> 

                            <div class="tab-pane fade show" id="classes" role="tabpanel">
                                <p>Mes Classes</p>
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