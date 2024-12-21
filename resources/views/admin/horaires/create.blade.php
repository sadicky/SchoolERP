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

    <div class="row">
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Ajouter une routine de cours</h3>
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
                            <div class="col-xl-3 col-lg-6 col-12 form-group ">
                                <label>Section</label>
                                <select class="form-control select2 section" id='section_id' name='section_id'>
                                    <option value="">Choisir la section</option>
                                    @foreach($sections as $section)
                                    <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                                    @endforeach
                                </select>
                                {{ $errors->first('section_id'),'<code>:message</code>' }}
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group {{$errors->has('option_id') ? 'has-error':''}}">
                                <label>Option</label>
                                <select disabled required class="form-control select2" id='option_id' name='option_id[]'>
                                    <option value="" selected>Choisir la section d'abord</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <label>Classe</label>
                                <select type="text" id="classe_id" name="classe_id" placeholder="1e A"
                                    class="form-control select2"></select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group ">
                                <label>Cours</label>
                                <select class="form-control select2 section" id='cours_id' name='cours_id'>
                                    <option value="">Choisir</option>
                                </select>
                            </div>
                        </div>
        
                        {{-- <div class="row">    
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
                        </div> --}}
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