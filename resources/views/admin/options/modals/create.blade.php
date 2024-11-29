<div class="modal fade" id="add-option" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvelle Période</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('options.store') }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div
                            class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('section_id') ? 'has-error':''}}">
                            <label>Section</label>
                            <select class="form-control select2" name='section_id'>
                                <option value="">Choisir la section</option>
                                @foreach($sections as $section)
                                <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                                @endforeach
                            </select>
                            {{ $errors->first('section_id'),'<code>:message</code>' }}
                        </div>
                        <div
                            class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('option_name') ? 'has-error':''}}">
                            <label>Options</label>
                            <input type="text" name="option_name" placeholder="Math-Physique" class="form-control">
                            {{ $errors->first('option_name'),'<code>:message</code>' }}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>#</label>
                            <button type="submit"
                                class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>