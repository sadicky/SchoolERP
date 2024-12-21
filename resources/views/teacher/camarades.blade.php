@extends('layouts.main_teacher')

@section('title', 'Elèves | ' . config('app.name'))
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
    <!-- Row -->
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Mes Camarades</h3>
                </div>

            </div>
            <hr>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Noms</th>
                    <th>E-mail</th>
                    <th>contact</th>
                    <th>Grade</th>
                    <th>Catégorie</th>
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
                                    {{$enseignant->nom}} {{$enseignant->prenom}}
                                </a>
                            </td>
                            <td>{{$enseignant->email}}</td>
                            <td>{{$enseignant->contact}}</td>
                            <td>{{$enseignant->grade_name}}</td>
                            <td>{{$enseignant->category}}</td>
                         
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