@extends('layouts.main')

@section('title', 'Primes | ' . config('app.name'))
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
        <a href="{{route('primes.create')}}" class="btn btn-lg btn-primary" style="font-size: 20px">Ajout d'une prime</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Primes</h3>
                </div>

            </div>
            <hr>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Catégorie prime</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Matricule</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

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