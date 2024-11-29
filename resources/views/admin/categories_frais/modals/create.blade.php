<div class="modal fade" id="add-categories_frais" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvelle categories_frais</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('categories_frais.store') }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-6 col-lg-4 col-12 form-group {{$errors->has('category_name') ? 'has-error':''}}">
                            <label>Categorie Frais</label>
                            <input type="text" name="category_name" placeholder="Frais Scolaire" class="form-control">
                            {{ $errors->first('category_name'),'<code>:message</code>' }}
                        </div>
                        <div class="col-xl-6 col-lg-4 col-12 form-group">
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