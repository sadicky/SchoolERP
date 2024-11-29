<div class="modal fade" id="add-category_primes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvelle categorie Prime</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('categories_primes.store') }}" enctype="multipart/form-data" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-6 col-lg-4 col-12 form-group {{$errors->has('category_prime') ? 'has-error':''}}">
                            <label>Categorie Prime</label>
                            <input type="text" name="category_prime" placeholder="Salaire" class="form-control">
                            {{ $errors->first('category_prime'),'<code>:message</code>' }}
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