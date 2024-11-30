<div class="modal fade" id="add-grade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvelle Grade</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('grades.store') }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('grade_name') ? 'has-error':''}}">
                            <label>Grade ou Niveau</label>
                            <input type="text" name="grade_name" placeholder="A2" class="form-control">
                            {{ $errors->first('grade_name'),'<code>:message</code>' }}
                        </div>
                            <div
                            class="col-xl-4 col-lg-4 col-12 form-group {{$errors->has('salaireBase') ? 'has-error':''}}">
                            <label>Salaire de Base(FC)</label>
                            <input type="text" class="form-control " name='salaireBase'>
                            {{ $errors->first('salaireBase'),'<code>:message</code>' }}
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