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

    <!-- Row -->
    <div class="modal-box pull-right">
        <a href="{{route('eleves.index')}}" class="btn btn-lg btn-success">Tous les Elèves</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    Modifier les informations de l'élève <b>{{$eleve->nom}}</b>
                </div>

            </div>
            <hr>
            <form method="post" action="{{route('eleves.update',$eleve->eleve_id)}}" enctype="multipart/form-data" class="form">
                {{ csrf_field() }}
                @method('PUT')
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" value="{{$eleve->nom}}" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" value="{{$eleve->prenom}}" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Post-nom</label>
                        <input type="text" name="postnom" value="{{$eleve->postnom}}" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" value="{{$eleve->email}}" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Contact</label>
                        <input type="number" name="contact" value="{{$eleve->contact}}" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Sexe</label>
                        <select name="sexe" id="" class="form-control">
                            <option selected value="{{$eleve->sexe}}">
                                @if ($eleve->sexe == 'F')
                                   Féminin
                                @else
                                   Masculin 
                                @endif
                            </option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Adresse</label>
                        <input type="text" name="adresse" value={{$eleve->adresse}} class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Nationalite</label>
                        <select name="nationalite" id="" class="form-control">
                            <option selected value="{{$eleve->nationalite}}">
                                {{$eleve->nationalite}}
                            </option>
                            <option value="Congolaise">RDC</option>
                            <option value="Burundaise">Burundi</option>
                            <option value="Kenyan">Kenya</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Groupe Sanguin</label>
                        <select name="groupe_sanguin" id="" class="form-control">
                            <option selected value="{{$eleve->groupe_sanguin}}">
                                {{$eleve->groupe_sanguin}}
                            </option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Date de naissance</label>
                        <input type="date" name="date_naissance" value="{{$eleve->date_naissance}}" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Provenance</label>
                        <input type="text" name="provenance" value="{{$eleve->provenance}}" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Classe</label>
                        <select name="classe_id" id="" class="form-control">
                            <option selected value="{{$eleve->classe_id}}">
                                {{$eleve->classe_name}}
                            </option>
                            @foreach ($classes as $classe)
                                <option value="{{$classe->classe_id}}">
                                    {{$classe->classe_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Nom</label>
                        <input type="text" name="category" placeholder="Maternelle" class="form-control">
                    </div> --}}
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>#</label>
                        <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                    </div>
                </div>
            </form><br>
            {{-- Check if there are any errors --}}
            @if ($errors->any())
               @foreach ($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               @endforeach
            @endif
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

@include('admin.eleves.modals.create')
@endsection