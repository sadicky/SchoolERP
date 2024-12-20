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
        <a href="{{route('communiques.create')}}" class="btn btn-lg btn-primary" style="font-size: 20px">Ajouter un communiqué</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Communiqués</h3>
                </div>

            </div>
            <hr>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Date de communique</th>
                    <th>Concerné</th>
                    <th>Année scolaire</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($communiques as $communique)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="{{route('communiques.show', $communique->communique_id)}}">
                                    {{$communique->date_communique}}
                                </a>
                            </td>
                            <td>
                                @if ($communique->concerned == 'tuteur')
                                    Parents
                                @elseif ($communique->concerned == 'eleves')
                                    Eleves
                                @elseif ($communique->concerned == 'enseignant') 
                                    Enseignants
                                @else
                                    Tous
                                @endif
                            </td>
                            <td>{{$communique->annee}}</td>
                            <td>
                                @if ($communique->deleted_at !== null)
                                 <a href="{{route('communiques.restore',$communique->communique_id)}}"
                                    class=" btn btn-xs btn-warning fas fa-edit" title="Restaurer">
                                    Restaurer 
                                </a>
                                <form action="{{route('communiques.force_delete', $communique->communique_id)}}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                        onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                        Supprimer complètement
                                    </button>
                                </form>  
                                
                                @else
                                 <form action="{{route('communiques.destroy',$communique->communique_id)}}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                        onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                        Supprimer
                                    </button>
                                </form>
                                <a href="{{route('communiques.edit',$communique->communique_id)}}"
                                    class=" btn btn-xs btn-success fas fa-edit" title="Modifier">
                                    Modifier
                                </a> 
                                @endif
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
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

{{-- @include('admin.eleves.modals.create') --}}
@endsection