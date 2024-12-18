<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nouvel Utilisateur</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admins.store')}}" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Role</label>
                            <select class="form-control" id='role_id' name='role_id'>
                                <option value="1" selected>Admin</option>
                            </select>
                        </div>    
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Nom</label>
                            <input type="text" required name="nom" placeholder="Nom" class="form-control">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Prénom</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Post-nom</label>
                            <input type="text" name="postnom" placeholder="Post-nom" class="form-control">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>E-mail</label>
                            <input type="email" required name="email" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Contact</label>
                            <input type="number" name="contact" placeholder="Contact" class="form-control">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                            <label>Sexe</label>
                            <select name="sexe" id="sexe" class="form-control select2">
                                <option value="M" selected>Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
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