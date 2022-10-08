@extends('master')

@section('title')
Administrateurs
@endsection

@section('liens')
<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="assets/css/pages/simple-datatables.css">
<link rel="stylesheet" href="assets/extensions/choices.js/public/assets/styles/choices.css">
@endsection


@section('content')


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
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Inconnu enregistrés</h4>
</div>
<div class="card-content">
<div class="card-body">
<p class="card-text">Pour <a href="" data-bs-toggle="modal"
data-bs-target="#incoAdd">insérer une nouvelle ligne</a></p>
<!-- Table with outer spacing -->
<div class="table-responsive">
<table class="table table-lg">
<thead>
<tr>
    <th>nomcomplet</th>
    <th>adresse</th>
    <th>telephone</th>
    <th>genre</th>
    <th>motif</th>
    <th colspan="3" style="text-align: center">Actions</th>
</tr>
</thead>
<tbody>
@forelse ($incos as $inco)
<tr>
<td>
    <a class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#incoUpdate{{$inco->id}}" href="#">
    Modifier
</a>
</td>
<td>
<a class="btn btn-danger" data-bs-toggle="modal"
data-bs-target="#incoDestroy{{$inco->id}}" href="#">
Supprimer
</a>
</td>  
</tr>
<!-- Boite modale pour la visualisation d'un !!!-->
<div class="modal fade admin-query" id="incoShow{{$inco->id}}"
data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Détails</h5>
    <button type="button" class="close" data-bs-dismiss="modal">
        x
    </button>
</div>

<div class="modal-body">
    <div class="row">
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>Nom Complet:</strong> 
                            <span>
                                {{ $inco->nomcomplet }}
                            </span>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Adresse:</strong>
                            <span>
                                {{ $inco->adresse }}
                            </span>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Telephone:</strong>
                            <span>
                                {{ $inco->telephone }}
                            </span>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Genre:</strong> 
                            <span>
                                {{ $inco->genre }}
                            </span>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Motif:</strong> 
                            <span>
                                {{ $inco->motif }}
                            </span>
                        </li> 
                    </ul>
                </div>
            </div> <br>
            
        </div>
    </div>
</div>

<div class="modal-footer">
    <div class="col-12 d-flex justify-content-end mt-4 ">
        <div class="col-5 d-flex justify-content-center">
            <button type="reset" data-bs-dismiss="modal"
            class="btn btn-light-secondary me-1 mb-1 m-auto">Fermer</button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
<!-- End boite modale -->


<!-- Boite modale pour la modification des !!!-->
<div class="modal fade admin-query" id="incoUpdate{{$inco->id}}"
data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Modification</h5>
<button type="button" class="close" data-bs-dismiss="modal">
    x
</button>
</div>

<div class="modal-body">
<p class="text-wrap">
    <form method="POST" action="{{route('Inconnu.update', $inco->id)}}">
        @method('PUT')
        @csrf
        <div class="form-body">
            <div class="row">

        <div class="col-md-6">
            <div class="form-group has-icon-left">
                <small class="text-muted"><i>Nom Complet</i></small>
                <div class="position-relative">                                                                    
                    <input type="text"
                    autocomplete="off"
                    name="nomcomplet"
                    class="form-control"
                    value="{{$inco->nomcomplet}}"
                    placeholder="....">                                                                    
                    <div class="form-control-icon">
                        <i class="bi bi-pencil"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group has-icon-left">
                <small class="text-muted"><i>Adresse</i></small>
                <div class="position-relative">
                    <input type="text"
                    autocomplete="off"
                    name="adresse"
                    class="form-control"
                    value="{{$inco->adresse}}"
                    placeholder="....">
                    <div class="form-control-icon">
                        <i class="bi bi-pencil"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group has-icon-left">
                <small class="text-muted"><i>Telephone</i></small>
                <div class="position-relative">
                    <input type="text"
                    autocomplete="off"
                    name="telephone"
                    class="form-control"
                    value="{{$inco->telephone}}"
                    placeholder="....">
                    <div class="form-control-icon">
                        <i class="bi bi-pencil"></i>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-md-12">
            <div class="form-group has-icon-left">
                <small class="text-muted"><i>Genre</i></small>
                <div class="position-relative">
                    <select class="form-control" name="genre">
                        <option value="{{$inco->genre}}">{{$inco->genre}} </option>

                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                    <div class="form-control-icon">
                        <i class="bi bi-pencil"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group has-icon-left">
                <small class="text-muted"><i>Motif</i></small>
                <div class="position-relative">
                    <input type="date"
                    autocomplete="off"
                    name="motif"
                    class="form-control"
                    value="{{$inco->motif}}"
                    placeholder="....">
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
<div class="col-12 d-flex justify-content-end mt-1 ">
<div class="col-5 d-flex justify-content-center">
    <button type="submit"
    class="btn btn-success me-1 mb-1">Sauvegarder</button>
    <button type="reset" data-bs-dismiss="modal"
    class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- End boite modale -->

<!-- Boite modale pour la confirmation de suppression d'un -->
<div class="modal fade admin-query" id="incoDestroy{{$inco->id}}"
data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Suppression</h5>
<button type="button" class="close" data-bs-dismiss="modal">
x
</button>
</div>

<div class="modal-body">
<p class="text-wrap">
<form action="{{route('Inconnu.destroy', $inco->id)}}" method="POST">
@method("DELETE")
@csrf
<div class="form-body">
<p>
    Êtes-vous sur de vouloir supprimé :
    {{$inco->nomcomplet}} ?
</p>
</div>

</p>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Non </button>
<button type="submit" name="okmodalvote" class="btn btn-primary"> Oui </button>
</div>
</form>
</div>
</div>
</div>
<!-- End boite modale -->
@empty
Pas d'insertion pour le moment !!!
@endforelse

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




<!-- Boite modale pour l'ajout d'un !!!-->
<div class="modal fade admin-query" id="memAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Enregistrement d'un nouveau !!!!?</h5>
<button type="button" class="close" data-bs-dismiss="modal">
x
</button>
</div>

<div class="modal-body">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<p class="text-wrap">

<form action="{{route('Inconnu.store')}}" method="POST">
@csrf
<div class="form-body">
<div class="row">

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" autocomplete="off" name="nomcomplet" class="form-control"
value="" placeholder="Nom et Prenom !...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" autocomplete="off" name="adresse" class="form-control"
value="" placeholder="Adresse!...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" autocomplete="off" name="telephone" class="form-control"
value="" placeholder="Numero de telephone !...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<select class="form-control" name="genre">
<option selected disabled>-- Le Genre --</option>
<option value="Homme">Homme</option>
<option value="Femme">Femme</option>
</select>
<div class="form-control-icon">
<i class="bi bi-pencil"></i> 
</div>
</div>
</div>
</div>


<div class="col-md-6">
    <div class="form-group has-icon-left">
    <div class="position-relative">
    <input type="password" autocomplete="off" name="motif" class="form-control"
    value="" placeholder="Motif !...">
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
<button type="submit" class="btn btn-success me-1 mb-1">Enregistrer</button>
<button type="reset" data-bs-dismiss="modal"
class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- End boite modale -->


<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/simple-datatables.js"></script>

<script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="assets/js/pages/form-element-select.js"></script>


@endsection