@extends('layouts.main')

@section('title', $title.' | ' . config('app.name'))
@section('content')
{{-- {{dd($periodes)}} --}}
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <ul>
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>Modifier l'Année Scolaire {{$periodes->periode_name}}</li>
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
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            
            <form method="post" action="{{ route('periodes.update',$periodes->periode_id) }}" enctype="multipart/form-data" class="form">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('category_option_id') ? 'has-error':''}}">
                        <label>Catégorie</label>
                        <select class="form-control select2" name='category_option_id'>
                            <option value="{{$periodes->category_option_id}}">{{$periodes->category}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->category_option_id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('category_option_id'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>periode_name Scolaire</label>
                        <input type="text" name="periode_name" value="{{$periodes->periode_name}}" class="form-control">
                        {{ $errors->first('periode_name'),'<p class="text-danger">:message</p>' }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>#</label>
                        <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

@endsection