@extends('layouts.main')

@section('title', 'Fiche de Cotation | ' . config('app.name'))
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
    <div class="modal-box pull-right">
        {{-- <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-eleve">Ajouter un Elève</button> --}}
        <a href="{{route('presencee.create')}}" class="btn btn-lg btn-primary">Faire la présence</a>
        <hr>
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <hr><form action="{{ route('presencee.filter') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group ">
                        <label>Section</label>
                        <select class="form-control select2 section" id='section_id' name='section_id'>
                            <option value="">Choisir la section</option>
                            @foreach($sections as $section)
                            <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                        {{ $errors->first('section_id'),'<code>:message</code>' }}
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group {{$errors->has('option_id') ? 'has-error':''}}">
                        <label>Option</label>
                        <select disabled required class="form-control select2" id='option_id' name='option_id[]'>
                            <option value="" selected>Choisir la section d'abord</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Classe</label>
                        <select type="text" id="classe_id" name="classe_id" placeholder="1e A"
                            class="form-control select2"></select>
                    </div>
                    
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mois</label>
                        <input type="month" id="month" name="month" placeholder="1e A"
                            class="form-control select2">
                    </div>
                    <div class="form-group col-xl-3"><br>
                        <button class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark sh" id="sh"
                            type="submit">
                            <i class="icon-eye"></i>Filtrer</button>
                    </div>
                </div>
            </form>
            <hr>
 
            @isset($eleves)
            @if($eleves->isEmpty())
            <h3 class="alert alert-danger">Aucun élève trouvé.</h3>
            @else
            <h4 class="card-title">FORMULAIRE DE PRESENCE ({{$month}})</h4> <hr>
            <div class="table-responsive">
                <table class="table bs-table table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-left">Students</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eleves as $eleve)
                        <tr>
                            <td class="text-left">{{$eleve->nom}} {{$eleve->prenom}} {{$eleve->postnom}}</td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-times text-danger"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td>-</td>
                            <td><i class="fas fa-times text-danger"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-times text-danger"></i></td>
                            <td>-</td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-times text-danger"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td>-</td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-times text-danger"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td>-</td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td><i class="fas fa-check text-success"></i></td>
                            <td>-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @endisset

        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>
@endsection