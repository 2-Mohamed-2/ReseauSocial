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

<!-- Boite modale pour la modification du Carte-->
<div class="modal fade" id="editCarte"
    data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Modification d'une Carte
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
                            <input type="hidden" id="edit_carte_id">
                            <div class="col-md-6">

                                <div class="form-group has-icon-left">
                                    <small>Inconnu_id</small>
                                    <div class="position-relative">
                                        <input type="text" id="inconnu" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>n_delivrance</small>
                                    <div class="position-relative">
                                        <input type="text" id="n_delivrance" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>fait_le</small>
                                    <div class="position-relative">
                                        <input type="date" id="fait_le" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>village_de</small>
                                    <div class="position-relative">
                                        <input type="text" id="village_de" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>franction_de</small>
                                    <div class="position-relative">
                                        <input type="text" id="franction_de" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>nationalite</small>
                                    <div class="position-relative">
                                        <input type="text" id="nationalite" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>nom</small>
                                    <div class="position-relative">
                                        <input type="text" id="nom" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>prenom</small>
                                    <div class="position-relative">
                                        <input type="text" id="prenom" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>fils_de</small>
                                    <div class="position-relative">
                                        <input type="text" id="fils_de" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>et_de</small>
                                    <div class="position-relative">
                                        <input type="text" id="et_de" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>profession</small>
                                    <div class="position-relative">
                                        <input type="text" id="profession" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>domicile</small>
                                    <div class="position-relative">
                                        <input type="text" id="domicile" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>taille</small>
                                    <div class="position-relative">
                                        <input type="text" id="taille" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>teint</small>
                                    <div class="position-relative">
                                        <input type="text" id="teint" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>cheveux</small>
                                    <div class="position-relative">
                                        <input type="text" id="cheveux" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>signes</small>
                                    <div class="position-relative">
                                        <input type="text" id="signes" autocomplete="off" class="form-control">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-icon-left">
                                    <small>carte_n</small>
                                    <div class="position-relative">
                                        <input type="number" id="carte_n" autocomplete="off" class="form-control">
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
                            class="btn btn-success me-1 mb-1 update_carte">Sauvegarder</button>
                        <button type="reset" data-bs-dismiss="modal"
                            class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End boite modale -->

<!-- Boite modale pour la suppression du carte-->
<div class="modal fade" id="deleteCarte"
    data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Suppression du carte
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
                            <input type="hidden" id="delete_carte_id">
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
                            class="btn btn-success me-1 mb-1 yes_delete_carte">Oui</button>
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
                            <h4 class="card-title">Carte enregistrés</h4>
                        </div>
                        <div id="successMsg"> </div>

                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" data-bs-toggle="modal"
                                    data-bs-target="#cartAdd">insérer une nouvelle ligne</a>
                                </p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Inconnu</th>
                                                <th>n_delivrance</th>
                                                <th>fait_le</th>
                                                <th>village_de</th>
                                                <th>franction_de</th>
                                                <th>nationalite</th>
                                                <th>nom</th>
                                                <th>prenom</th>
                                                <th>fils_de</th>
                                                <th>et_de</th>
                                                <th>profession</th>
                                                <th>domicile</th>
                                                <th>taille</th>
                                                <th>teint</th>
                                                <th>cheveux</th>
                                                <th>signes</th>
                                                <th>carte_n</th>
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




<!-- Boite modale pour l'ajout d'une carte-->
<div class="modal fade admin-query" id="cartAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
    role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Enregistrement d'une carte</h5>
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
                                        <input type="text" id="inconnu_id" autocomplete="off" name="" class="inconnu_id form-control"
                                            value="" placeholder="Nom inconnu !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="n_delivrance" autocomplete="off" name="" class="n_delivrance form-control"
                                            value="" placeholder="N du delivrance !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="date" id="fait_le" autocomplete="off" name="" class="fait_le form-control"
                                            value="" placeholder="Date de creation !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="village_de" autocomplete="off" name="" class="village_de form-control"
                                            value="" placeholder="Village de !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="franction_de" autocomplete="off" name="" class="franction_de form-control"
                                            value="" placeholder="Fraction de !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="nationalite" autocomplete="off" name="" class="nationalite form-control"
                                            value="" placeholder="Nationalite !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="nom" autocomplete="off" name="" class="nom form-control"
                                            value="" placeholder="Nom !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="prenom" autocomplete="off" name="" class="prenom form-control"
                                            value="" placeholder="Prenom !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="fils_de" autocomplete="off" name="" class="fils_de form-control"
                                            value="" placeholder="Nom du pere !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="et_de" autocomplete="off" name="" class="et_de form-control"
                                            value="" placeholder="Nomcomplet de la mere !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="profession" autocomplete="off" name="" class="profession form-control"
                                            value="" placeholder="Profession !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="domicile" autocomplete="off" name="" class="domicile form-control"
                                            value="" placeholder="Domicile !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="taille" autocomplete="off" name="" class="taille form-control"
                                            value="" placeholder="Taille!...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="teint" autocomplete="off" name="" class="teint form-control"
                                            value="" placeholder="Teint !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="cheveux" autocomplete="off" name="" class="cheveux form-control"
                                            value="" placeholder="Cheveux !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="signes" autocomplete="off" name="" class="signes form-control"
                                            value="" placeholder="Signes !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="number" id="carte_n" autocomplete="off" name="" class="carte_n form-control"
                                            value="" placeholder="Carte numero !...">
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
        // fetchcarte();

        // function  fetchcarte()
        // {
        //     $.ajax({
        //         type: "GET",
        //         url: "/CarteFetch",
        //         dataType: "json",
                
        //         success:function(response){
        //             console.log(response.roles);
        //             $('tbody').html("");
        //             $.each(response.roles, function(key, item){
        //                 $('tbody').append(  '<tr>  \
        //                     <td>'+item.inconnu_id+'</td> \
        //                     <td>'+item.n_delivrance+'</td> \
        //                     <td>'+item.fait_le+'</td> \
        //                     <td>'+item.village_de+'</td> \
        //                     <td>'+item.franction_de+'</td> \
        //                     <td>'+item.nationalite+'</td> \
        //                     <td>'+item.nom+'</td> \
        //                     <td>'+item.prenom+'</td> \
        //                     <td>'+item.fils_de+'</td> \
        //                     <td>'+item.et_de+'</td> \
        //                     <td>'+item.profession+'</td> \
        //                     <td>'+item.domicile+'</td> \
        //                     <td>'+item.taille+'</td> \
        //                     <td>'+item.teint+'</td> \
        //                     <td>'+item.cheveux+'</td> \
        //                     <td>'+item.signes+'</td> \
        //                     <td>'+item.carte_n+'</td> \
        //                     <td>  <button value="'+item.id+'" class="edit_carte btn btn-primary"> Modifier </button>  </td> \
        //                     <td>  <button value="'+item.id+'" class="delete_carte btn btn-danger"> Supprimer </button>  </td> \
        //                     </tr>'  );
        //             });
        //         }
        //     });
        // }


        // // Pur supprimer une carte
        //     // Affichage de la boite modale
        //     $(document).on('click', '.delete_carte', function(e){
        //         e.preventDefault();

        //         var cart_id = $(this).val();
        //         //alert(rol_id);
        //         $('#delete_carte_id').val(cart_id);
        //         $('#deleteCarte').modal('show'); 
        //     });

        //     // Pour la suppression
        //     $(document).on('click', '.yes_delete_carte', function(e){
        //         e.preventDefault();

        //         $(this).text("En cours ...");
        //         var cart_id = $('#delete_carte_id').val();
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         $.ajax({
        //             type: "DELETE",
        //             url:"/Carte/"+cart_id,
        //             success: function(response){
        //                 //console.log(response);
        //                 $('#successMsg').addClass('alert alert-info');
        //                 $('#successMsg').text(response.message);
                        
        //                 $('#deleteCarte').modal('hide');
        //                 $('.yes_delete_carte').text("Supprimer")
        //                 fetchcarte();
        //             }
        //         }); 
        //     });



        // // Pour récupérer les données pour la modification
        // $(document).on('click', '.edit_carte', function(e){
        //     e.preventDefault();

        //     var cart_id = $(this).val();
        //     //console.log(rol_id);
        //     $('#editCarte').modal('show');
        //     $.ajax({
        //         type: "GET",
        //         url: "/Carte/"+cart_id+"/edit",
        //         success: function(response){
        //             // console.log(response);
        //             if (response.status == 404) {
        //                 $('#successMsg').html("");
        //                 $('#successMsg').addClass('alert alert-danger');
        //                 $('#successMsg').text(response.message);
        //             } 
        //             else {
        //                 $('#inconnu_id').val(response.carte.inconnu_id);
        //                 $('#n_delivrance').val(response.carte.n_delivrance);
        //                 $('#fait_le').val(response.carte.fait_le);
        //                 $('#village_de').val(response.carte.village_de);
        //                 $('#franction_de').val(response.carte.franction_de);
        //                 $('#nationalite').val(response.role.nationalite);
        //                 $('#nom').val(response.carte.nom);
        //                 $('#prenom').val(response.carte.prenom);
        //                 $('#fils_de').val(response.carte.fils_de);
        //                 $('#et_de').val(response.carte.et_de);
        //                 $('#profession').val(response.carte.profession);
        //                 $('#domicile').val(response.carte.domicile);
        //                 $('#taille').val(response.carte.taille);
        //                 $('#teint').val(response.carte.teint);
        //                 $('#cheveux').val(response.carte.cheveux);
        //                 $('#signes').val(response.role.signes);
        //                 $('#carte_n').val(response.carte.carte_n);
        //                 $('#edit_carte_id').val(cart_id);
        //             }
        //         }
        //     });

        // });

        // //Modification d'une donnée
        // $(document).on('click', '.update_carte', function(e){
        //     e.preventDefault();

        //     $(this).text('En cours ...');

        //     var cart_id = $('#edit_carte_id').val();
        //     var data = {
        //         'inconnu_id': $('#inconnu_id').val(),
        //         'n_delivrance': $('#n_delivrance').val(),
        //         'fait_le': $('#fait_le').val(),
        //         'village_de': $('#village_de').val(),
        //         'franction_de': $('#franction_de').val(),
        //         'nationalite': $('#nationalite').val(),
        //         'nom': $('#nom').val(),
        //         'prenom': $('#prenom').val(),
        //         'fils_de': $('#fils_de').val(),
        //         'et_de': $('#et_de').val(),
        //         'profession': $('#profession').val(),
        //         'domicile': $('#domicile').val(),
        //         'taille': $('#taille').val(),
        //         'teint': $('#teint').val(),
        //         'cheveux': $('#cheveux').val(),
        //         'signes': $('#signes').val(),
        //         'carte_n': $('#carte_n').val(),
                

        //     }

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type: "PUT",
        //         url:"/Carte/"+cart_id,
        //         data: data,
        //         dataType:"json",
        //         success: function(response){
        //             //console.log(response);
        //             if (response.status == 400) {

        //                 $('#updateform_errlist').html("");
        //                 $('#updateform_errlist').addClass('alert alert-danger');
        //                 $.each(response.errors, function(key, err_values){
        //                     $('#updateform_errlist').append('<li>'+err_values+'</li>');
        //                 });

        //                 $('.update_carte').text('Sauvegarder');
        //             }
        //             else if(response.status == 404)
        //             {

        //                 $('#updateform_errlist').html("");
        //                 $('#successMsg').addClass('alert alert-danger');
        //                 $('#successMsg').text(response.message);

        //                 $('.update_carte').text('Sauvegarder');
                        
        //             }
        //             else
        //             {
        //                 $('#updateform_errlist').html("");
        //                 $('#updateform_errlist').removeClass('alert alert-danger');
        //                 $('#successMsg').html("");
        //                 $('#successMsg').addClass('alert alert-info');
        //                 $('#successMsg').text(response.message);

        //                 $('#editCarte').modal('hide');
        //                 $('.update_Carte').text('Sauvegarder');
        //                 fetchcarte();
        //             }
        //         }
        //     });


        // });


        // Pour inserer sans reactualiser
        $(document).on('click', '.save-data', function(e){
            e.preventDefault();

            $(this).text("En cours ...");
            var data ={
                'inconnu_id': $('.inconnu_id').val(),
                'n_delivrance': $('.n_delivrance').val(),
                'fait_le': $('.fait_le').val(),
                'village_de': $('.village_de').val(),
                'franction_de': $('.franction_de').val(),
                'nationalite': $('.nationalite').val(),
                'nom': $('.nom').val(),
                'prenom': $('.prenom').val(),
                'fils_de': $('.fils_de').val(),
                'et_de': $('.et_de').val(),
                'profession': $('.profession').val(),
                'domicile': $('.domicile').val(),
                'taille': $('.taille').val(),
                'teint': $('.teint').val(),
                'cheveux': $('.cheveux').val(),
                'signes': $('.signes').val(),
                'carte_n': $('.carte_n').val(),
            }
            //console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/Carte",
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
                        $('.save-data').text("Réessayer !..");
                    }
                    else
                    {
                        $('#errList').html("");
                        $('#successMsg').addClass('alert alert-info')
                        $('#successMsg').text(response.message)
                        $('#cartAdd').modal('hide');
                        $('#cartAdd').find('input').val("");

                        $('.save-data').text("Enregistrer");
                        //fetchcarte();
                    }
                }
            });

        });

    });
</script>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/simple-datatables.js"></script>



@endsection

