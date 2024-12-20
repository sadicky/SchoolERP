@extends('layouts.main')

@section('title', 'Elèves | ' . config('app.name'))
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
                                <a class="nav-link" data-toggle="tab" href="#cours" role="tab"
                                    aria-selected="false">Cours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#horaires" role="tab"
                                    aria-selected="false">Horaire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#camarades" role="tab"
                                    aria-selected="false">Camarades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                                    aria-selected="false">Présence</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#paiements" role="tab"
                                    aria-selected="false">Frais</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#notes" role="tab"
                                    aria-selected="false">Notes</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <table class="table table-condensend table-bordered">
                                    <tr>
                                        <th>Nom</th>
                                        <td>{{$eleve->nom}}</td>
                                    </tr>
                                    <tr>
                                        <th>Postnom</th>
                                        <td>{{$eleve->postnom}}</td>
                                    </tr>
                                    <tr>
                                        <th>Prenom</th>
                                        <td>{{$eleve->prenom}}</td>
                                    </tr>
                                    <tr>
                                        <th>Sexe</th>
                                        <td>{{$eleve->sexe}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{$eleve->contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>E-mail</th>
                                        <td>{{$eleve->email}}</td>
                                    </tr>
                                    <th>date de naissance</th>
                                    <td>{{$eleve->date_naissance}}</td>
                                    </tr>
                                    <tr>
                                        <th>Section</th>
                                        <td>{{$eleve->section_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Option</th>
                                        <td>{{$eleve->option_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Classe</th>
                                        <td>{{$eleve->classe_name}}</td>
                                    </tr>
                                </table>
                                <a href="{{route('eleves.edit',$eleve->eleve_id)}}"
                                    class="btn btn-lg btn-info fas fa-edit " title="Modifier"> Modifier</a>
                            </div>
                            
                            <div class="tab-pane fade show" id="cours" role="tabpanel">
                                <p>cours</p>
                            </div>
                            
                            
                            <div class="tab-pane fade show" id="camarades" role="tabpanel">
                                <p>camarades</p>
                            </div>
                            
                            
                            <div class="tab-pane fade show" id="presences" role="tabpanel">
                                <p>presences</p>
                            </div>
                            
                            <div class="tab-pane fade show" id="horaires" role="tabpanel">
                                <p>Horaires</p>
                            </div>

                            <div class="tab-pane fade show" id="paiements" role="tabpanel">
                                <p>paiements</p>
                            </div> 

                            <div class="tab-pane fade show" id="notes" role="tabpanel">
                                <p>notes</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

{{-- @include('admin.eleves.modals.create') --}}
@endsection