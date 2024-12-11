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
    <div class="modal-box pull-right">
        <a href="{{route('eleves.index')}}" class="btn btn-lg btn-success">Tous les Enseignants</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Ajout d'un nouvel Enseignant</h3>
                </div>

            </div>
            <hr>
            <form method="post" action="{{route('enseignants.store')}}" enctype="multipart/form-data" class="form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" placeholder="Nom" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" placeholder="Prénom" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Post-nom</label>
                        <input type="text" name="postnom" placeholder="Post-nom" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Contact</label>
                        <input type="number" name="contact" placeholder="Contact" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Sexe</label>
                        <select name="sexe" id="" class="form-control">
                            <option selected readonly>Sélectionner</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Adresse</label>
                        <input type="text" name="adresse" placeholder="Adresse" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Nationalite</label>
                        <select name="nationalite" id="" class="form-control">
                            <option selected readonly>Selectionner</option>
                            <option value="Congolaise">RDC</option>
                            <option value="Burundaise">Burundi</option>
                            <option value="Kenyan">Kenya</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Groupe Sanguin</label>
                        <select name="groupe_sanguin" id="" class="form-control select2">
                            <option selected readonly>Sélectionner</option>
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
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Grade</label>
                        <select class="form-control select2" name="grade" id="grade">
                            <option value="">--Selectionner--</option>
                            @foreach ($grades as $grade)
                                <option value="{{$grade->grade_id}}">{{$grade->grade_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Classe Option</label>
                        <select name="category_option_id" id="" class="form-control select2">
                            <option selected value="">Selectionner</option>
                            @foreach ($category_options as $category_option)
                                <option value="{{$category_option->category_option_id}}">
                                    {{$category_option->category}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">
                            
                        </textarea>
                    </div>
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