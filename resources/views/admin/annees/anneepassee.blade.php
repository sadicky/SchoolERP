@extends('layouts.main')

@section('title', 'Année Scolaire | ' . config('app.name'))
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
        <!--  -->    
 
    </div>
    <br>
     <!-- Row -->
     <div class="modal-box pull-right">
        <a href="{{route('annees.index')}}" class="btn btn-lg btn-default" >
            <b>L'année Scolaire courante</b>
        </a>  
        <hr>
    </div>
    <!-- Annees passees -->
    <div class="card height-auto">
        @if (count($annees) == 0)
        <div class="card-body">
            <div class="heading-layout1">
            </div>
            <hr>
            <div class="alert alert-danger" role="alert">
                Aucune Années passée enregistrée!
            </div>
        </div>    
        @else
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Toutes les années passées</h3>
                </div>
            </div>
            
            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Annee Scolaire</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                @php
                    $i =1;
                @endphp
                <tbody>
                    @foreach ($annees as $annee )
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('annees.show',$annee)}}">{{$annee->annee}}</a></td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-success" 
                                title="Restaurer" 
                                href="{{route('annees.restore',$annee->annee_id)}}"
                                >
                                {{-- <i class="flaticon-classmates"></i> --}}
                                Restaurer
                                </a>&nbsp;&nbsp;
                                <form action="{{route('annees.force_delete', $annee->annee_id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">
                                    Supprimer
                                  </button>
                                 </form>
                            </div>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>


@endsection