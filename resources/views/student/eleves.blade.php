@extends('layouts.main_student')

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
                    <h3>Tous les Elèves</h3>
                </div>

            </div>
            <hr>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Noms</th>
                    <th>Section</th>
                    <th>Option</th>
                    <th>classe</th>
                    <th>Bulletin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($eleves as $eleve)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="{{route('eleves.show', $eleve->eleve_id)}}">
                                    {{$eleve->nom}} {{$eleve->prenom}} {{$eleve->postnom}}
                                </a>
                            </td>
                            <td>{{$eleve->section_name}}</td>
                            <td>{{$eleve->option_name}}</td>
                            <td>{{$eleve->classe_name}}</td>
                            <td>
                                @if($eleve->category_option_id == 1)
                                <a href="{{route('bulletinm', $eleve->eleve_id)}}" class="fas fa-file"></a>
                                @elseif($eleve->category_option_id == 2)
                                <a href="{{route('bulletinp', $eleve->eleve_id)}}" class="fas fa-file"></a>
                                @else 
                                <a href="{{route('bulletin', $eleve->eleve_id)}}" class="fas fa-file"></a>
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