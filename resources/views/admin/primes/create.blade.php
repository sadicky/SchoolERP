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
    <div class="modal-box pull-right">
        <a href="{{route('primes.index')}}" class="btn btn-lg btn-success" style="font-size: 20px">Toutes les primes</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here --> 
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Prime</h3>
                </div>

            </div>
            <hr>
            <form method="post" action="{{route('primes.store')}}" enctype="multipart/form-data" class="form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Catégorie</label>
                        <select name="category_prime_id" id="" class="form-control">
                            </option>
                            <option value="all">Selectionner</option>
                            @foreach ($categories_primes as $category_prime)
                                <option value="{{$category_prime->category_prime_id}}">
                                    {{$category_prime->category_prime}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Montant</label>
                      <input type="text" class="form-control" name="montant">
                    </div>
                    
                    
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Matricule</label>
                        <input type="number" name="matricule"  class="form-control">
                    </div>

                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                        <label>Date</label>
                        <input type="date" name="date_prime" class="form-control">
                    </div>

                <div/>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                        <label for="">#</label>
                        <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                    </div>
                </div>
            </form><br>
            {{-- Check if there are any errors --}}
            @if ($errors->any())
               @foreach ($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
               @endforeach
            @endif
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

{{-- @include('admin.eleves.modals.create') --}}
@endsection