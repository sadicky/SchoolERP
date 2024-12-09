@extends('layouts.main')

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

    <!-- Row -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="custom-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#profile" role="tab"
                            aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#frais" role="tab"
                            aria-selected="false">Frais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#presences" role="tab"
                            aria-selected="false">Présences</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-selected="false">Notes</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#horaires" role="tab"
                            aria-selected="false">Horaires</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <table class="table table-condensend table-bordered">
                            <tr>
                                <th>Nom</th>
                                <td>{{$eleve->nom}}</td>
                            </tr>
                            <tr>
                                <th>Postnom</th>
                                <td>{{$eleve->postnom}}</td>
                            </tr>
                            <tr>
                                <th>Pre-nom</th>
                                <td>{{$eleve->prenom}}</td>
                            </tr>
                            <th>date de naissance</th>
                            <td>{{$eleve->date_naissance}}</td>
                            </tr>
                            <tr>
                                <th>Classe</th>
                                <td>{{$eleve->classe_name}}</td>
                            </tr>
                        </table>
                        <a href="{{route('eleves.edit',$eleve->eleve_id)}}"
                            class="btn btn-lg btn-info fas fa-edit " title="Modifier"> Modifier</a>
                    </div>
                </div>
                {{--  --}}
                {{-- <div class="tab-content">
                    <div class="tab-pane fade show" id="frais" role="tabpanel">
                        <h2>22</h2>
                    </div>
                </div> --}}
            </div>
            

        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

{{-- @include('admin.eleves.modals.create') --}}
@endsection