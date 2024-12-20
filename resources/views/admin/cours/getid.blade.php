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
            <li>Detail sur le cours: {{$cours->cours_name}}</li>
        </ul>
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="row">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="card-body">
                    <div class="border-nav-tab">
                         <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#info" role="tab"
                                    aria-selected="true">Classes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#eleves" role="tab"
                                    aria-selected="false">Présence</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#paiements" role="tab"
                                    aria-selected="false">Examens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                                    aria-selected="false">Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                                    aria-selected="false">Résultats</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <table class="table data-table text-nowrap table-condensed table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Section</th>
                                            <th>Option</th>
                                            <th>Classes</th>
                                            <th>Ponderation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coursClasses as $item)
                                        <tr>
                                            <td>{{$item->section_name}}</td>
                                            <td>{{$item->option_name}}</td>
                                            <td>{{$item->classe_name}}</td>
                                            <td>{{$item->ponderation}} pts</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('get_classes',$cours->cours_id)}}"
                                    class=" btn btn-lg btn-success fas fa-random" title="Affecter">Affecter</a>
                                <a href="{{route('cours.edit',$cours->cours_id)}}"
                                    class="btn btn-lg btn-info fas fa-edit " title="Modifier"> Modifier</a>
                            </div>
                        </div>
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