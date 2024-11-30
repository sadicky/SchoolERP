@extends('layouts.main')

@section('title', $title.' | ' . config('app.name'))
@section('content')
{{-- Index --}}
{{-- {{dd($categories_frais_option)}} --}}
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <ul>
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>Detail sur la categories de frais {{$categories_frais->category_name}}</li>
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
            <h3>Affecter le prix de ({{$categories_frais->category_name}}) aux catégories</h3>
            <hr>
            <form method="post" action="{{ route('affect_option',$categories_frais->category_frais_id) }}"
                enctype="multipart/form-data" class="form">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="row">
                    <div
                        class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('category_option_id') ? 'has-error':''}}">
                        <label>Catégorie</label>
                        <select multiple class="form-control  select2" name='category_option_id[]'>
                            <option value="">Choisir la categorie</option>
                            @foreach($categories as $category)
                            <option value="{{$category->category_option_id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('category_option_id'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('montant') ? 'has-error':''}}">
                        <label>Montant</label>
                        <input type="hidden" value="{{$categories_frais->category_frais_id}}" name="category_frais_id">
                        <input type="text" name="montant" placeholder="100000" class="form-control">
                        {{ $errors->first('montant'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 form-group">
                        <label>#</label>
                        <button type="submit"
                            class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Affecter</button>
                    </div>
                </div>
            </form>
            <hr>
            <h3>Listes</h3>
            <table class="table data-table text-nowrap">
                <thead>
                    <th>categories de frais</th>
                    <th>Montant</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories_frais_option as $data)
                    <tr>
                        <td><a href="{{route('categories.show',$data->category_option_id)}}">{{$data->category}}</a>
                        </td>
                        <td>{{number_format($data->montant, 0, ',', ' ')}} Fc</td>
                        <td>
                            <a href="{{route('categories_frais.edit',$categories_frais->category_frais_id)}}"
                                class=" btn btn-xs btn-success fas fa-edit" title="Modifier">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer');
    <!-- Footer Area End Here -->
</div>

@endsection