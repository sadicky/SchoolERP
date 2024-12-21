@extends('layouts.main')

@section('title', 'Fiche de Cotation | ' . config('app.name'))
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
            <hr><form action="{{ route('presencee.search') }}" method="POST">
                @csrf
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
                    
                    <div class="form-group col-xl-3"><br>
                        <button class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark sh" id="sh"
                            type="submit">
                            <i class="icon-eye"></i>Filtrer</button>
                    </div>
                </div>
            </form>
            <hr>

            @isset($eleves)
            @if($eleves->isEmpty())
            <h3 class="alert alert-danger">Aucun élève trouvé.</h3>
            @else
            <h4 class="card-title">FORMULAIRE DE PRESENCE</h4> <hr>
            <form action="{{ url('admin/presencee/' . $classe) }}" method="POST">
                @csrf
                <div class="form-group col-md-3">
                    <input type="hidden" name="date_presence" value="{{ date('Y-m-d') }}">
                </div>
                <br>
                
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>Eleve</th>
                            <th>Présence</th>
                            <th>Justifié</th>
                            <th>Motif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eleves as $eleve)
                        <tr>
                           <input type="hidden" id="eleve_id" value="{{$eleve->eleve_id}}" name="eleve_id[]">
                           <input type="hidden" name="presences[{{ $eleve->eleve_id }}][presence]" value="0">
                           <input type="hidden" name="presences[{{ $eleve->eleve_id }}][justify]" value="0">
                            <td>{{$eleve->nom}} {{$eleve->prenom}} {{$eleve->postnom}}</td>
                            <td> <input type="checkbox" id="check"  value="1" class="presence-checkbox form-control" name="presences[{{$eleve->eleve_id}}][presence]"> </td>
                            <td> <input type="checkbox" value="0" class="justify-checkbox form-control" name="presences[{{ $eleve->eleve_id}}][justify]" > </td>
                            <td> <input type="text"  class="form-control" placeholder="Motif (si nécessaire)" name="presences[{{ $eleve->eleve_id }}][motif]"> </td>
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