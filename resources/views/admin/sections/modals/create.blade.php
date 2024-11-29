<div class="modal fade" id="add-section" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvelle Section</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('sections.store') }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div
                            class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('category_option_id') ? 'has-error':''}}">
                            <label>Catégorie</label>
                            <select class="form-control select2" name='category_option_id'>
                                <option value="">Choisir la categorie</option>
                                @foreach($categories as $category)
                                <option value="{{$category->category_option_id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                            {{ $errors->first('category_option_id'),'<code>:message</code>' }}
                        </div>
                        <div
                            class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('section_name') ? 'has-error':''}}">
                            <label>Section</label>
                            <input type="text" name="section_name" placeholder="Littéraire" class="form-control">
                            {{ $errors->first('section_name'),'<code>:message</code>' }}
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