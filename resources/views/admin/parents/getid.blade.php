@extends('layouts.main')

@section('title', 'Enseignants | ' . config('app.name'))
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

    <!-- Row -->
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-12">
            <div class="card">
                <div class="card-header">
                    <img src="{{asset($enseignant->image)}}" class="card-img" alt="...">
                </div>
                <div class="card-body">
                    <ul>
                        <li>*Noms: <b>{{$enseignant->nom}} {{$enseignant->postnom}}</b></li>
                        <li>*Grade:  <b>{{$enseignant->grade_name}}</b></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="custom-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab"
                                    aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#frais" role="tab"
                                    aria-selected="false">Primes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                                    aria-selected="false">Présences</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#cours" role="tab" aria-selected="false">Cours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#horaires" role="tab"
                                    aria-selected="false">Horaires</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <table class="table table-condensend table-bordered">
                                    <tr>
                                        <th>Categorie</th>
                                        <td>{{$enseignant->category}}</td>
                                    </tr>
                                    <tr>
                                        <th>Experience</th>
                                        <td>--</td>
                                    </tr>
                                    <tr>
                                        <th>E-mail</th>
                                        <td>{{$enseignant->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{$enseignant->contact}}</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>{{$enseignant->adresse}}</td>
                                    </tr>
                                </table>
                                <a href="{{route('enseignants.edit',$enseignant->enseignant_id)}}"
                                    class="btn btn-lg btn-info fas fa-edit " title="Modifier"> Modifier</a>
                            </div>
                        </div>
                        {{--  --}}
                        {{-- <div class="tab-content">
                            <div class="tab-pane fade show" id="frais" role="tabpanel">
                                <h2>22</h2>
                            </div>
                        </div> --}}
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