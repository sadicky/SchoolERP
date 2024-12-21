@extends('layouts.main')

@section('title', 'Communiqués | ' . config('app.name'))
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
        <a href="{{route('communiques.index')}}" class="btn btn-lg btn-primary" style="font-size: 20px">Tous les communiqués</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Communiqué</h3>
                </div>
            </div>
            <hr>
                <div class="jumbotron">
                    <h1 class="display-4">Bonjour, Chers Tous!</h1>
                    <p class="lead">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                              <a class="nav-link active" href="#">
                                @if ($communique->concerned == 'tuteur')
                                Avis aux Parents
                                @elseif ($communique->concerned == 'eleves')
                                    Avis aux Eleves
                                @elseif ($communique->concerned == 'enseignant') 
                                   Avis aux Enseignants
                                @else
                                   Avis à tous
                                @endif
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled">Date: {{$communique->date_communique}}</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled">Année scolaire: {{$communique->annee}}</a>
                            </li>
                            {{-- <li class="nav-item">
                              <a class="nav-link disabled"></a>
                            </li> --}}
                        </ul>
                    </p>
                    <hr class="my-4">
                    <p>
                        {{$communique->description}}
                    </p>
                    <a class="btn btn-primary btn-lg" href="{{route('communiques.index')}}" role="button" style="font-size: 20px">
                        Retourner
                    </a>
                    <a class="btn btn-success btn-lg" href="{{route('communiques.edit', $communique->communique_id)}}" role="button" style="font-size: 20px">
                        Modifier
                    </a>
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