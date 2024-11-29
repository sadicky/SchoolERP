@extends('layouts.main')

@section('title', $title.' | ' . config('app.name'))
@section('content')
{{-- {{dd($options)}} --}}
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <ul>
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>Modifier l'Année Scolaire {{$options->option_name}}</li>
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
            
            <form method="post" action="{{ route('options.update',$options->option_id) }}" enctype="multipart/form-data" class="form">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('section_id') ? 'has-error':''}}">
                        <label>Catégorie</label>
                        <select class="form-control select2" name='section_id'>
                            <option value="{{$options->section_id}}">{{$options->section_name}}</option>
                            @foreach($sections as $section)
                            <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('section_id'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>Option </label>
                        <input type="text" name="option_name" value="{{$options->option_name}}" class="form-control">
                        {{ $errors->first('option_name'),'<p class="text-danger">:message</p>' }}
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