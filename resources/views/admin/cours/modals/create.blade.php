<div class="modal fade" id="add-cours" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouveau Cours</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('cours.store') }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('cours_name') ? 'has-error':''}}">
                            <label>Cours</label>
                            <input type="text" name="cours_name" placeholder="Histoire" class="form-control">
                            {{ $errors->first('cours_name'),'<code class="text-danger">:message</code>' }}
                        </div>
                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Manuel</label>
                            <input type="file" class="form-control " name='manuel'>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>#</label>
                            <button type="submit" class="btn-fill-lg btn-block btn-gradient-yellow btn-hover-bluedark">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>