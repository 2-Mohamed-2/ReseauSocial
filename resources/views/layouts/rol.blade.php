@extends('master')

@section('title')
Administrateurs
@endsection

@section('liens')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="assets/css/pages/simple-datatables.css">
<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>

@endsection


@section('content')

<!-- Boite modale pour la modification du role-->
<div class="modal fade" id="editRole"
    data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Modification d'un role
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal">
                    x
                </button>
            </div>

            <div class="modal-body">

                <ul id="updateform_errlist"></ul>
                
                <p class="text-wrap"> 
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" id="edit_role_id">
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <small>Libelle du role</small>
                                    <div class="position-relative">
                                        <input type="text" id="libelle" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </p>
            </div>

            <div class="modal-footer">
                <div class="col-12 d-flex justify-content-end mt-4 ">
                    <div class="col-5 d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-success me-1 mb-1 update_role">Sauvegarder</button>
                        <button type="reset" data-bs-dismiss="modal"
                            class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End boite modale -->

<!-- Boite modale pour la suppression du role-->
<div class="modal fade" id="deleteRole"
    data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Suppression du role
                </h5>
                <button type="button" class="close"
                    data-bs-dismiss="modal">
                    x
                </button>
            </div>

            <div class="modal-body">                
                <p class="text-wrap"> 
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" id="delete_role_id">
                            <p>
                                Êtes-vous sûr de voulir supprimer cette donnée ?
                            </p>
                        </div>
                    </div>
                </p>
            </div>

            <div class="modal-footer">
                <div class="col-12 d-flex justify-content-end mt-4 ">
                    <div class="col-5 d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-success me-1 mb-1 yes_delete_role">Oui</button>
                        <button type="reset" data-bs-dismiss="modal"
                            class="btn btn-light-secondary me-1 mb-1 m-auto">Non</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End boite modale -->


<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Informations sur Tout</h3>
            <p class="text-subtitle text-muted">Ici, toutes les infos sur les admins</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Infos +</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="section">
    <div class="row" id="table-striped">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Role enregistrés</h4>
                        </div>
                        <div id="successMsg"> </div>

                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" data-bs-toggle="modal"
                                    data-bs-target="#rolAdd">insérer une nouvelle ligne</a>
                                </p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Libelle</th>
                                                <th colspan="2" style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>




<!-- Boite modale pour l'ajout d'un role-->
<div class="modal fade admin-query" id="rolAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
    role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Enregistrement d'un nouveau role</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    x
                </button>
            </div>

            <div class="modal-body">
                <div class="">

                    <ul id="errList">
                    </ul>

                <p class="text-wrap"> 
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="" class="libelle form-control"
                                            value="" placeholder="Nom du role !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </p>
            </div>

            <div class="modal-footer">
                <div class="col-12 d-flex justify-content-end mt-3 ">
                    <div class="col-5 d-flex justify-content-center">
                        <button class="btn btn-success me-1 mb-1 save-data">Enregistrer</button>
                        <button type="reset" data-bs-dismiss="modal"
                        class="btn btn-light-secondary me-1 mb-1 m-auto reset-btn">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End boite modale -->

<script>
    
    $(document).ready(function(){

        //Pour fetcher les données sans reactualiser
        fetchrole();

        function fetchrole()
        {
            $.ajax({
                type: "GET",
                url: "/RoleFetch",
                dataType: "json",
                
                success:function(response){
                    console.log(response.roles);
                    $('tbody').html("");
                    $.each(response.roles, function(key, item){
                        $('tbody').append(  '<tr>  \
                            <td>'+item.libelle+'</td> \
                            <td>  <button value="'+item.id+'" class="edit_role btn btn-primary"> Modifier </button>  </td> \
                            <td>  <button value="'+item.id+'" class="delete_role btn btn-danger"> Supprimer </button>  </td> \
                            </tr>'  );
                    });
                }
            });
        }


        // Pur supprimer un role
            // Affichage de la boite modale
            $(document).on('click', '.delete_role', function(e){
                e.preventDefault();

                var rol_id = $(this).val();
                //alert(rol_id);
                $('#delete_role_id').val(rol_id);
                $('#deleteRole').modal('show'); 
            });

            // Pour la suppression
            $(document).on('click', '.yes_delete_role', function(e){
                e.preventDefault();

                $(this).text("En cours ...");
                var rol_id = $('#delete_role_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url:"/Role/"+rol_id,
                    success: function(response){
                        //console.log(response);
                        $('#successMsg').addClass('alert alert-info');
                        $('#successMsg').text(response.message);
                        
                        $('#deleteRole').modal('hide');
                        $('.yes_delete_role').text("Supprimer")
                        fetchrole();
                    }
                }); 
            });



        // Pour récupérer les données pour la modification
        $(document).on('click', '.edit_role', function(e){
            e.preventDefault();

            var rol_id = $(this).val();
            //console.log(rol_id);
            $('#editRole').modal('show');
            $.ajax({
                type: "GET",
                url: "/Role/"+rol_id+"/edit",
                success: function(response){
                    // console.log(response);
                    if (response.status == 404) {
                        $('#successMsg').html("");
                        $('#successMsg').addClass('alert alert-danger');
                        $('#successMsg').text(response.message);
                    } 
                    else {
                        $('#libelle').val(response.role.libelle);
                        $('#edit_role_id').val(rol_id);
                    }
                }
            });

        });

        //Modification d'une donnée
        $(document).on('click', '.update_role', function(e){
            e.preventDefault();

            $(this).text('En cours ...');

            var rol_id = $('#edit_role_id').val();
            var data = {
                'libelle': $('#libelle').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url:"/Role/"+rol_id,
                data: data,
                dataType:"json",
                success: function(response){
                    //console.log(response);
                    if (response.status == 400) {

                        $('#updateform_errlist').html("");
                        $('#updateform_errlist').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values){
                            $('#updateform_errlist').append('<li>'+err_values+'</li>');
                        });

                        $('.update_role').text('Sauvegarder');
                    }
                    else if(response.status == 404)
                    {

                        $('#updateform_errlist').html("");
                        $('#successMsg').addClass('alert alert-danger');
                        $('#successMsg').text(response.message);

                        $('.update_role').text('Sauvegarder');
                        
                    }
                    else
                    {
                        $('#updateform_errlist').html("");
                        $('#updateform_errlist').removeClass('alert alert-danger');
                        $('#successMsg').html("");
                        $('#successMsg').addClass('alert alert-info');
                        $('#successMsg').text(response.message);

                        $('#editRole').modal('hide');
                        $('.update_role').text('Sauvegarder');
                        fetchrole();
                    }
                }
            });


        });


        // Pour inserer sans reactualiser
        $(document).on('click', '.save-data', function(e){
            e.preventDefault();

            $(this).text("En cours ...");
            var data ={
                'libelle': $('.libelle').val(),
            }
            // console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/Role",
                data: data,
                dataType: "json",
                success:function(response){
                    // console.log(response);
                    if (response.status == 400) { 
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values){
                            $('#errList').append('<li>'+err_values+'</li>');
                        })
                    }
                    else
                    {
                        $('#errList').html("");
                        $('#successMsg').addClass('alert alert-info')
                        $('#successMsg').text(response.message)
                        $('#rolAdd').modal('hide');
                        $('#rolAdd').find('input').val("");

                        $('.save-data').text("Enregistrer");
                        // fetchrole();
                    }
                }
            });

        });

    });
    
</script>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/simple-datatables.js"></script>



@endsection

