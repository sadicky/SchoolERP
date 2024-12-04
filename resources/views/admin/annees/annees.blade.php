@extends('layouts.main')

@section('title', 'Année Scolaire | ' . config('app.name'))
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
    <!-- Row -->
    <div class="modal-box pull-right">
        <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-annee">Ajouter Une Année
            Scolaire</button>
        <a href="{{route('annees.annees_passees')}}" class="btn btn-danger btn-lg">
            L'années passées
        </a>    
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Toutes les années Scolaires</h3>
                </div>
            </div>
            
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Annee Scolaire</th>
                    <th>Statut</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($annees as $annee )
                    <tr>
                        <td>{{$annee->annee_id}}</td>
                        <td><a href="{{route('annees.show',$annee)}}">{{$annee->annee}}</a></td>
                        @if($annee->statut =='1')
                        <td class="text-success">Actif </td>
                        @else
                        <td class="text-danger">Désactiver</td>
                        @endif
                        <td>
                            <form action="{{ route('annees.destroy', $annee) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger fa fa-trash" onclick="return confirm('Êtes-vous sûr de vouloir desactiver cette année Scolaire ?')">
                                    Desactiver
                                </button>
                            </form>
                            <a href="{{route('annees.edit',$annee->annee_id)}}" class=" btn btn-xs btn-success fas fa-edit" title="Modifier">Modifier</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

@include('admin.annees.modals.create')
@endsection