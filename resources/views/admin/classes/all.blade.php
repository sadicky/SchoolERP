@extends('layouts.main')

@section('title', $title.' | ' . config('app.name'))
@section('content')

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
        <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-classe">Ajouter une Classe</button>
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Toutes les classe</h3>
                </div>
            </div>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Section</th>
                    <th>Option</th>
                    <th>Classe</th>
                    <th>Statut</th>
                    <th>Détails</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $classe )
                    <tr>
                        <td>{{$classe->classe_id}}</td>
                        <td><a href="{{route('sections.show',$classe->section_id)}}">{{$classe->section_name}}</a></td>
                        <td><a href="{{route('options.show',$classe->option_id)}}">{{$classe->option_name}}</a></td>
                        <td><a href="{{route('classes.show',$classe->classe_id)}}">{{$classe->classe_name}}</a></td>
                         @if($classe->status =='1')
                        <td class="text-success">Actif </td>
                        @else
                        <td class="text-danger">Inactif</td>
                        @endif
                        <td><a class="btn btn-xs btn-info fa fa-file" href="{{route('classes.show',$classe->classe_id)}}">Afficher</a></td>
                        <td>
                            <form action="{{ route('classes.destroy', $classe->classe_id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                    onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                    Desactiver
                                </button>
                            </form>
                            <a href="{{route('classes.edit',$classe->classe_id)}}"
                                class=" btn btn-xs btn-success fas fa-edit" title="Modifier">Modifier</a>
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

@include('admin.classes.modals.create')
@endsection