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
        <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-user">Ajouter un Admin</button>
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Toutes les user</h3>
                </div>
            </div>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Noms</th>
                    <th>contact</th>
                    <th>E-mail</th>
                    <th>Statut</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{$user->admin_id}}</td>
                        <td><a href="{{route('admins.show',$user->admin_id)}}">{{$user->nom}} {{$user->prenom}} {{$user->postnom}}</a></td>
                        <td>{{$user->contact}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->statut =='1')
                        <td class="text-success">Actif </td>
                        @else
                        <td class="text-danger">Inactif</td>
                        @endif
                        <td>
                            <form action="{{ route('admins.destroy', $user->admin_id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                    onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                    Desactiver
                                </button>
                            </form>
                            <a href="{{route('admins.edit',$user->admin_id)}}"
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

@include('admin.users.modals.create')
@endsection