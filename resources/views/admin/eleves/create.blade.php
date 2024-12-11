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
                    <h3>Admission</h3>
                </div>
                <br>

            </div>
            <hr>
            <form method="post" action="{{route('eleves.store')}}" enctype="multipart/form-data" class="form">
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
                        <select name="sexe" id="sexe" class="form-control select2">
                            <option value="M" selected>Masculin</option>
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
                        <select name="nationalite" id="" class="form-control select2">
                            <option selected readonly>Selectionner</option>
                            <option value="Congolaise">RDC</option>
                            <option value="Burundaise">Burundi</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Kenyan">Kenya</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Groupe Sanguin</label>
                        <select name="groupe_sanguin" id="" class="form-control select2">
                            <option selected value="">Sélectionner</option>
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
                    <div class="col-xl-6 col-lg-4 col-12 form-group">
                        <label>Date de naissance</label>
                        <input type="date" name="date_naissance" class="form-control">
                    </div>
                    <div class="col-xl-6 col-lg-4 col-12 form-group">
                        <label>Provenance</label>
                        <input type="text" name="provenance" placeholder="Provenance" class="form-control">
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label>Section</label>
                        <select class="form-control select2 section" id='section_id' name='section_id'>
                            <option value="">Choisir la section</option>
                            @foreach($sections as $section)
                            <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('section_id'),'<code>:message</code>' }}
                    </div>
                    <div
                        class="col-xl-4 col-lg-6 col-12 form-group {{$errors->has('option_id') ? 'has-error':''}}">
                        <label>Option</label>
                        <select disabled required class="form-control select2" id='option_id' name='option_id[]'>
                            <option value="" selected>Choisir la section d'abord</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Classe</label>
                        <select type="text" id="classe_id" name="classe_id" placeholder="1e A" class="form-control select2"></select>
                    </div>
                </div>
                <hr>
                <div class="heading-layout1">
                <div class="item-title">
                    <h4>Tuteur</h4>
                </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label>Téléphone</label>
                        <input autocomplete="false" type="text" class="form-control" id='tuteur_tel' name='tuteur_tel'>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label>Relation</label>
                        <input type="text" autocomplete="false"  class="form-control" id='tuteur_relation' name='tuteur_relation'>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group {{$errors->has('tuteur_nom') ? 'has-error':''}}">
                        <label>Nom</label>
                        <input type="text" autocomplete="false"  class="form-control" id='tuteur_nom' name='tuteur_nom'>
                        {{ $errors->first('tuteur_nom'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group {{$errors->has('tuteur_prenom') ? 'has-error':''}}">
                        <label>Prenom</label>
                        <input type="text" autocomplete="false"  class="form-control" id='tuteur_prenom' name='tuteur_prenom'>
                        {{ $errors->first('tuteur_prenom'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group {{$errors->has('tuteur_postnom') ? 'has-error':''}}">
                        <label>Postnom</label>
                        <input type="text" class="form-control" autocomplete="false"  id='tuteur_postnom' name='tuteur_postnom'>
                        {{ $errors->first('tuteur_postnom'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group " >
                        <label>Email</label>
                        <input type="text" autocomplete="false"  class="form-control"  id='tuteur_email' name='tuteur_email'>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group " >
                        <label>Sexe</label>
                        <select class="form-control" id='tuteur_sexe' name='tuteur_sexe'>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label>Profession</label>
                        <input type="text" autocomplete="false"  class="form-control" id='tuteur_job' name='tuteur_job'>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group " >
                        <label>Nationalité</label>
                        <input type="text" autocomplete="false"  class="form-control" id='tuteur_nat' name='tuteur_nat'>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Adresse</label>
                        <textarea class="form-control" id='tuteur_adresse' autocomplete="false"  name='tuteur_adresse'></textarea>
                    </div>
                </div>
                <hr> 
                <div class="heading-layout1">
                <div class="item-title">
                <h4>Frais d'inscription</h4>
            </div>
            </div>
                
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Frais d'Inscription</label>
                        <input type="text" readonly class="form-control" id='frais' name='frais'>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Payer</label>
                        <select name="payer" id="payer" class="form-control">
                            <option value="0" selected>Non</option>
                            <option value="1">Oui</option>
                        </select>
                     </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>#</label>
                        <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                    </div>
                </div>
            </form>

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