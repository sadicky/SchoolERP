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
        {{-- <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-eleve">Ajouter un Elève</button> --}}
        <a href="{{route('enseignants.create')}}" class="btn btn-lg btn-primary">Ajouter un nouvel Enseignant</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Tous les Enseignants</h3>
                </div>

            </div>
            <hr>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th>contact</th>
                    <th>Grade</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($enseignants as $enseignant)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="{{route('enseignants.show', $enseignant->enseignant_id)}}">
                                    {{$enseignant->nom}}
                                </a>
                            </td>
                            <td>{{$enseignant->prenom}}</td>
                            <td>{{$enseignant->email}}</td>
                            <td>{{$enseignant->contact}}</td>
                            <td>{{$enseignant->grade}}</td>
                            <td>{{$enseignant->category}}</td>
                            <td>
                                @if ($enseignant->deleted_at != '')
                                <a href="{{route('enseignants.restore',$enseignant->enseignant_id)}}"
                                    class=" btn btn-xs btn-warning fas fa-edit" title="Restaurer">
                                    Restaurer 
                                </a>
                                <form action="{{route('enseignants.force_delete', $enseignant->enseignant_id)}}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                        onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                        Supprimer complètement
                                    </button>
                                </form>
                                
                                @else
                                <form action="{{route('enseignants.destroy', $enseignant->enseignant_id)}}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                        onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                        Supprimer
                                    </button>
                                </form>
                                <a href="{{route('enseignants.edit',$enseignant->enseignant_id)}}"
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