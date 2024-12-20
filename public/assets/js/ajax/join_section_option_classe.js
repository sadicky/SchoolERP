$(document).ready(function () {
    $('#section_id').on('change', function () {
        let section_id = $(this).val();
        let option_id = $('#option_id');
        let classe_id = $('#classe_id');
        let cours_id = $('#cours_id');
        let periode_id = $('#periode_id');
        option_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        classe_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        cours_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        periode_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        if (section_id) {
            $.ajax({
                type: 'GET',
                url: '/classes/get-options/' + section_id,
                success: function (d) {
                    if (d.length > 0) {
                        option_id.empty().append("<option value='' >--Choisir--</option>");
                        d.forEach(option => {
                            option_id.append(`<option value="${option.option_id}">${option.option_name}</option>`);
                        });
                        option_id.prop("disabled", false);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 404) {
                        option_id.html("<option value='' selected>Aucune Option</option>").prop('disabled', true);
                    }
                }

            });
        }
    });
    $('#option_id').on('change', function () {
        let option_id = $(this).val();
        let classe_id = $('#classe_id');;
        classe_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        if (option_id) {
            $.ajax({
                type: 'GET',
                url: '/cours/get-classes/' + option_id,
                success: function (d) {
                    if (d.length > 0) {
                        classe_id.empty().append("<option value='' >--Choisir--</option>");
                        d.forEach(classe => {
                            classe_id.append(`<option value="${classe.classe_id}">${classe.classe_name}</option>`);
                        });
                        classe_id.prop("disabled", false);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 404) {
                        classe_id.html("<option value='' selected>Aucune Classe</option>").prop('disabled', true);
                    }
                }

            });
        }
    });
    $('#classe_id').on('change', function () {
        let classe_id = $(this).val();
        let cours_id = $('#cours_id');
        cours_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        if (classe_id) {
            $.ajax({
                type: 'GET',
                url: '/classes/get-cours/' + classe_id,
                success: function (d) {
                    if (d.length > 0) {
                        cours_id.empty().append("<option value='' >--Choisir--</option>");
                        d.forEach(cours => {
                            cours_id.append(`<option value="${cours.cours_id}">${cours.cours_name}</option>`);
                        });
                        cours_id.prop("disabled", false);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 404) {
                        cours_id.html("<option value='' selected>Aucun Cours</option>").prop('disabled', true);
                    }
                }

            });
        }
    });

    $('#section_id').on('change', function () {
        let section_id = $(this).val();
        let option_id = $('#option_id');
        let classe_id = $('#classe_id');
        let cours_id = $('#cours_id');
        let periode_id = $('#periode_id');
        option_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        classe_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        cours_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        periode_id.html("<option selected>Chargement...</option>").prop('disabled', true);
        if (section_id) {
            $.ajax({
                type: 'GET',
                url: '/sections/get-periode/' + section_id,
                success: function (d) {
                    if (d.length > 0) {
                        periode_id.empty().append("<option value='' >--Choisir--</option>");
                        d.forEach(periode => {
                            periode_id.append(`<option value="${periode.periode_id}">${periode.periode_name}</option>`);
                        });
                        periode_id.prop("disabled", false);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 404) {
                        periode_id.html("<option value='' selected>Aucune Periode</option>").prop('disabled', true);
                    }
                }

            });
        }
    });
});
