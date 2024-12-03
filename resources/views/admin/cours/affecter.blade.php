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
            <li>Affection pour le cours <b>({{$cours->cours_name}})</b></li>
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
           <div class="row">
                <div class="col-md-4 col-sm-4 col-12">
                    <h4 class="page-header">Y affecter le cours ({{$cours->cours_name}})</h4>
                    
                <form method="post" action="{{ route('cours.affecter',$cours->cours_id) }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="col-12 form-group">
                            <label>Section</label>
                            <input type="hidden" name="cours_id" value="{{$cours->cours_id}}">
                            <input type="hidden" name="cours" value="{{$cours->cours_name}}">
                            <select class="form-control select2" id='section_id'>
                                <option value="">Choisir la section</option>
                                @foreach($sections as $section)
                                <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                            {{ $errors->first('section_id'),'<code>:message</code>' }}
                        </div>
                        <div
                            class="col-12 form-group {{$errors->has('option_id') ? 'has-error':''}}">
                            <label>Option</label>
                            <select disabled required class="form-control select2" id='option_id' name='option_id'>
                                <option value="">Choisir la section d'abord</option>
                            </select>
                            {{ $errors->first('option_id'),'<code class="text-danger">>:message</code>' }}
                        </div>
                        <div class="col-12 form-group {{$errors->has('classe_id') ? 'has-error':''}}">
                            <label>Classe</label>
                            <select disabled required multiple class="form-control select2" id='classe_id' name='classe_id[]'>
                                <option value="" selected>Choisir l'option d'abord</option>
                            </select>
                              {{ $errors->first('classe_id'),'<code class="text-danger">:message</code>' }}
                        </div>
                        <div class="col-12 form-group {{$errors->has('ponderation') ? 'has-error':''}}">
                            <label>Ponderation</label>
                            <input type="text" required class="form-control" name='ponderation'>
                              {{ $errors->first('ponderation'),'<code class="text-danger">:message</code>' }}
                        </div>
                        <div class="col-12 form-group">
                            <label>#</label>
                            <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-md-8 col-sm-8 col-12">
                    <h4>Listes de Classes ayant <b>({{$cours->cours_name}})</b> </h4>
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