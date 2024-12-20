@extends('layouts.main')

@section('title', 'Fichen de Cotation | ' . config('app.name'))
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

    @if (session()->has('message'))
    <div class="ui-alart-box">
        <div class="icon-color-alart">
            <div class="alert icon-alart bg-light-green2" role="alert">
                <i class="far fa-hand-point-right bg-light-green3"></i>
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif

    @if (session()->has('supprimer'))
    <div class="ui-alart-box">
        <div class="icon-color-alart">
            <div class="alert icon-alart bg-pink2" role="alert">
                <i class="fas fa-times bg-pink3"></i>
                {{session()->get('supprimer')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Fiche de cotation</h3>
                </div>
            </div>
            <hr><form action="{{ route('notes.search') }}" method="POST">
                @csrf
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
                    <div class="col-xl-4 col-lg-6 col-12 form-group {{$errors->has('option_id') ? 'has-error':''}}">
                        <label>Option</label>
                        <select disabled required class="form-control select2" id='option_id' name='option_id[]'>
                            <option value="" selected>Choisir la section d'abord</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Classe</label>
                        <select type="text" id="classe_id" name="classe_id" placeholder="1e A"
                            class="form-control select2"></select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label>Cours</label>
                        <select class="form-control select2 section" id='cours_id' name='cours_id'>
                            <option value="">Choisir</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label>Periode</label>
                        <select class="form-control select2 section" id='periode_id' name='periode_id'>
                            <option value="">Choisir</option>
                        </select>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-12 form-group ">
                        <label for="ponderation">Max (1 à 10) :</label>
                        <input type="number" id="ponderation" class="form-control" name="ponderation" value="10" min="1" max="50" required>                       
                    </div>
                    
                    <div class="form-group col-md-3"><br>
                        <button class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark sh" id="sh"
                            type="submit">
                            <i class="icon-eye"></i>Afficher</button>
                    </div>
                </div>
            </form>
            <hr>

            @isset($eleves)
            {{-- {{dd($eleves)}} --}}
            @if($eleves->isEmpty())
            <h3 class="alert alert-danger">Aucun élève trouvé.</h3>
            @else
            <h4 class="card-title">FICHE DE COTATION</h4>
            <form action="{{ route('fiches.store') }}" method="POST">
                @csrf
                <input type="hidden" id="cours_id" value="{{$cours}}" name="cours_id">
                <input type="hidden" id="periode_id" value="{{$periode}}" name="periode_id">
                
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>Section</th>
                            <th>Option</th>
                            <th>Classe</th>
                            <th>Eleve</th>
                            <th>Cote</th>
                            <th>Max</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Section</th>
                            <th>Option</th>
                            <th>Classe</th>
                            <th>Eleve</th>
                            <th>Cote</th>
                            <th>Max</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($eleves as $eleve)
                        <tr>
                            <td>{{$eleve->section_name}}</td>
                            <input type="hidden" id="classe_id" value="{{$eleve->classe_id}}" name="classe_id">
                            <input type="hidden" id="eleve_id" value="{{$eleve->eleve_id}}" name="eleve_id[]">
                            <td>{{$eleve->option_name}}</td>
                            <td>{{$eleve->classe_name}}</td>
                            <td>{{$eleve->nom}} {{$eleve->prenom}} {{$eleve->postnom}}</td>
                            <td> <input type="text" id="note"  class="form-control sm-lg" name="note" min="0" max="20" required> </td>
                            <td> <input type="text" readonly class="form-control sm-lg" value="{{$ponderation}}"> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-group col-md-6">
                    <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" class="form-control" type="submit">
                        <i class="icon-note"></i>Enregistrer</button>
                </div>
            </form>
            @endif
            @endisset
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>
@endsection