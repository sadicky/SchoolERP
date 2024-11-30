<div class="modal fade" id="add-classe" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvelle classe</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('classes.store') }}" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-12 form-group {{$errors->has('section_id') ? 'has-error':''}}">
                            <label>Section</label>
                            <select class="form-control select2" id='section_id' name='section_id'>
                                <option value="">Choisir la section</option>
                                @foreach($sections as $section)
                                <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                            {{ $errors->first('section_id'),'<code>:message</code>' }}
                        </div>
                        <div
                            class="col-xl-6 col-lg-6 col-12 form-group {{$errors->has('option_id') ? 'has-error':''}}">
                            <label>Option</label>
                            <select disabled required multiple class="form-control select2" id='option_id' name='option_id[]'>
                                <option value="" selected>Choisir la section d'abord</option>
                            </select>
                            {{ $errors->first('option_id'),'<code class="text-danger">>:message</code>' }}
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12 form-group {{$errors->has('classe_name') ? 'has-error':''}}">
                            <label>Classe</label>
                            <input type="text" name="classe_name" placeholder="1e A" class="form-control">
                            {{ $errors->first('classe_name'),'<code class="text-danger">:message</code>' }}
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                            <label>#</label>
                            <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>