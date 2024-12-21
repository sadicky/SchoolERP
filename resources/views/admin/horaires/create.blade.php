@extends('layouts.main')

@section('title', 'Horaires | ' . config('app.name'))
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
        {{-- <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-eleve">Ajouter un Elève</button> --}}
        <a href="{{route('horaires.create')}}" class="btn btn-lg btn-primary" style="font-size: 20px">Nouvel Horaire</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    {{-- <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Horaires</h3>
                </div>

            </div>
            <hr>

        </div>
    </div> --}}
    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Ajouter une routine de cours</h3>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-times text-orange-red"></i>Close</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                <a class="dropdown-item" href="#"><i
                                        class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{route('horaires.store')}}" enctype="multipart/form-data" class="new-added-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Jours *</label>
                                <select class="select2" name="jours">
                                    <option selected readonly>Veuillez sélectionner</option>
                                    <option value="Lundi">Lundi</option>
                                    <option value="Mardi">Mardi</option>
                                    <option value="Mercredi">Mercredi</option>
                                    <option value="Jeudi">Jeudi</option>
                                    <option value="Vendredi">Vendredi</option>
                                    <option value="Samedi">Samedi</option>
                                </select>
                            </div>
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Heure de début *</label>
                                <input type="time" class="form-control" name="heure">
                            </div>
                            <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                <label>Heure de fin *</label>
                                <input type="time" class="form-control" name="fin">
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Sélectionnez la Classe *</label>
                                <select class="select2" name="classe_id">
                                    <option selected readonly>Veuillez sélectionner</option>
                                    @foreach ($classes as $classe)
                                        <option value="{{$classe->classe_id}}">{{$classe->classe_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Sélectionnez un cours *</label>
                                <select class="select2" name="cours_id">
                                    <option selected readonly>Veuillez sélectionner</option>
                                    @foreach ($cours as $cours)
                                        <option value="{{$cours->cours_id}}">
                                            {{$cours->cours_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group mg-t-8">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                            </div>
                        </div>
                    </form><br>
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
        </div>
         
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

{{-- @include('admin.eleves.modals.create') --}}
@endsection