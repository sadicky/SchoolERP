@extends('layouts.main')

@section('title', 'Tuteurs | ' . config('app.name'))
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

   
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Tous les Tuteurs</h3>
                </div>

            </div>
            <hr>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Noms</th>
                    <th>E-mail</th>
                    <th>contact</th>
                    <th>Rélation</th>
                    <th>Profession</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($tuteurs as $tuteur)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="{{route('parents.show', $tuteur->tuteur_id)}}">
                                    {{$tuteur->nom}} {{$tuteur->prenom}} {{$tuteur->postnom}}
                                </a>
                            </td>
                            <td>{{$tuteur->email}}</td>
                            <td>{{$tuteur->contact}}</td>
                            <td>{{$tuteur->relation}}</td>
                            <td>{{$tuteur->profession}}</td>
                            <td>
                                @if ($tuteur->deleted_at != '')
                                <a href="{{route('parents.restore',$tuteur->tuteur_id)}}"
                                    class=" btn btn-xs btn-warning fas fa-edit" title="Restaurer">
                                    Restaurer 
                                </a>
                                <form action="{{route('parents.force_delete', $tuteur->tuteur_id)}}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                        onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                        Supprimer complètement
                                    </button>
                                </form>
                                
                                @else
                                <form action="{{route('parents.destroy', $tuteur->tuteur_id)}}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                        onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                        Supprimer
                                    </button>
                                </form>
                                <a href="{{route('parents.edit',$tuteur->tuteur_id)}}"
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