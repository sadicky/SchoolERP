@extends('layouts.main')

@section('title', $title.' | ' . config('app.name'))
@section('content')
{{-- Index --}}
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <ul>
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>Detail sur la classe ({{$classes->section_name}} => {{$classes->option_name}} =>
                {{$classes->classe_name}})</li>
        </ul>
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="card ui-tab-card">
        <div class="card-body">
            <div class="heading-layout1 mg-b-25">
                <div class="item-title">
                    <h3>Detail sur la classe ({{$classes->section_name}} => {{$classes->option_name}} =>
                        {{$classes->classe_name}})</h3>
                </div>
            </div>
            <div class="custom-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#info" role="tab"
                            aria-selected="true">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#eleves" role="tab" aria-selected="false">Elèves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#paiements" role="tab"
                            aria-selected="false">Paiements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                            aria-selected="false">Présences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-selected="false">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#horaires" role="tab"
                            aria-selected="false">Horaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#cours" role="tab" aria-selected="false">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#enseignants" role="tab"
                            aria-selected="false">Enseignants</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <table class="table table-condensend table-bordered">
                            <tr>
                                <th>Categorie</th>
                                <td>{{$classes->category}}</td>
                            </tr>
                            <tr>
                                <th>Section</th>
                                <td>{{$classes->section_name}}</td>
                            </tr>
                            <th>Option</th>
                            <td>{{$classes->option_name}}</td>
                            </tr>
                            <tr>
                                <th>Classe</th>
                                <td>{{$classes->classe_name}}</td>
                            </tr>
                        </table>
                        <a href="{{route('classes.edit',$classes->classe_id)}}"
                            class="btn btn-lg btn-info fas fa-edit " title="Modifier"> Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

@endsection