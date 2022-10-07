@extends('master')

@section('title')
Administrateurs
@endsection

@section('liens')
<link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="assets/css/pages/simple-datatables.css">
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
<h4 class="card-title">Membre enregistrés</h4>
</div>
<div class="card-content">
<div class="card-body">
<p class="card-text">Pour <a href="" data-bs-toggle="modal"
data-bs-target="#memAdd">insérer une nouvelle ligne</a></p>
<!-- Table with outer spacing -->
<div class="table-responsive">
<table class="table table-lg">
<thead>
<tr>
<th>Matricule</th>
<th>NomComplet</th>
<th colspan="3" style="text-align: center">Actions</th>
</tr>
</thead>
<tbody>
@forelse ($mems as $mem)
<tr>
@php
$k = $mem->id;
$us = App\Models\Membre::find($k)->grade;
@endphp     

<td class="text-bold-500">{{$mem->matricule}}</td>
<td class="text-bold-500">{{$mem->nomcomplet}}</td>
<td>
<a class="btn btn-info" data-bs-toggle="modal"
data-bs-target="#memShow{{$mem->id}}" href="#">
Voir +
</a>
</td>
<td>
<a class="btn btn-primary" data-bs-toggle="modal"
data-bs-target="#memUpdate{{$mem->id}}" href="#">
Modifier
</a>
</td>
<td>
<a class="btn btn-danger" data-bs-toggle="modal"
data-bs-target="#memDestroy{{$mem->id}}" href="#">
Supprimer
</a>
</td>  
</tr>
<!-- Boite modale pour la visualisation d'un membre-->
<div class="modal fade admin-query" id="memShow{{$mem->id}}"
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
<div class="col-lg-4" data-aos="fade-right">
<img src="/image/{{ $mem->photo }}" class="img-fluid" alt="Image">
</div>
<div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">

<h3>{{ $us->libelle }} {{ $mem->nomcomplet }} en poste depuis {{ $mem->datearrive }} </h3>

<div class="row">
<div class="col-lg-12">
<ul>
    <li><i class="bi bi-chevron-right"></i> <strong>Matricule:</strong> 
        <span>
            {{ $mem->matricule }}
        </span>
    </li>
    <li><i class="bi bi-chevron-right"></i> <strong>Genre:</strong>
        <span>
            {{ $mem->genre }}
        </span>
    </li>
    <li><i class="bi bi-chevron-right"></i> <strong>Numero C.I:</strong>
        <span>
            {{ $mem->numeroci }}
        </span>
    </li>
    <li><i class="bi bi-chevron-right"></i> <strong>Tel:</strong> <span>{{ $mem->telephone }}</span>
    </li>
    <li><i class="bi bi-chevron-right"></i> <strong>Adresse:</strong> 
        <span>
            {{ $mem->adresse }}
        </span>
    </li>
    <li><i class="bi bi-chevron-right"></i> <strong>Départ:</strong> 
        <span>
            {{ $mem->datedepart }}
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


<!-- Boite modale pour la modification des membres-->
<div class="modal fade admin-query" id="memUpdate{{$mem->id}}"
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
<form method="POST" action="{{route('Membre.update', $mem->id)}}" enctype="multipart/form-data">
@method('PUT')
@csrf
<div class="form-body">
<div class="row">

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Matricule</i></small>
<div class="position-relative">                                                                    
<input type="text"
autocomplete="off"
name="matricule"
class="form-control"
value="{{$mem->matricule}}"
placeholder="....">                                                                    
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Numero d'identité</i></small>
<div class="position-relative">
<input type="text"
autocomplete="off"
name="numeroci"
class="form-control"
value="{{$mem->numeroci}}"
placeholder="....">
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Nom Complet</i></small>
<div class="position-relative">
<input type="text"
autocomplete="off"
name="nomcomplet"
class="form-control"
value="{{$mem->nomcomplet}}"
placeholder="....">
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Adresse</i></small>
<div class="position-relative">
<input type="text"
autocomplete="off"
name="adresse"
class="form-control"
value="{{$mem->adresse}}"
placeholder="....">
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Telephone</i></small>
<div class="position-relative">
<input type="text"
autocomplete="off"
name="telephone"
class="form-control"
value="{{$mem->telephone}}"
placeholder="....">
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Date d'arrivée</i></small>
<div class="position-relative">
<input type="date"
autocomplete="off"
name="datearrive"
class="form-control"
value="{{$mem->datearrive}}"
placeholder="....">
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>La modification de la photo est facultative</i></small>
<div class="position-relative">
<input type="file"
autocomplete="off" name="photo"
class="form-control"
placeholder="....">
<img src="/image/{{ $mem->photo }}" width="100px">
<div class="form-control-icon">
    <i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<small class="text-muted"><i>Sexe</i></small>
<div class="position-relative">
<select class="form-control" name="genre">
    <option value="{{$mem->genre}}">{{$mem->genre}} </option>

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
<small class="text-muted"><i>Date de départ</i></small>
<div class="position-relative">
<input type="date"
autocomplete="off"
name="datedepart"
class="form-control"
value="{{$mem->datedepart}}"
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

<!-- Boite modale pour la confirmation de suppression d'un site-->
<div class="modal fade admin-query" id="memDestroy{{$mem->id}}"
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
<form action="{{route('Membre.destroy', $mem->id)}}" method="POST">
@method("DELETE")
@csrf
<div class="form-body">
<p>
Êtes-vous sur de vouloir supprimé :
{{$mem->nomcomplet}} ?
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




<!-- Boite modale pour l'ajout d'un membre-->
<div class="modal fade admin-query" id="memAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
role="dialog" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Enregistrement d'un nouveau membre</h5>
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

<form action="{{route('Membre.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-body">
<div class="row">

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<select class="form-control" name="grade_id">
<option value="">-- Le grade --</option>
@foreach ($grades as $grade )
<option value="{{ $grade->id }}">{{ $grade->libelle }}</option>
@endforeach
</select>
<div class="form-control-icon">
<i class="bi bi-pencil"></i> 
</div>
</div>
</div>
</div><br>

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" autocomplete="off" name="matricule" class="form-control"
value="" placeholder="Matricule !...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

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
<input type="text" autocomplete="off" name="numeroci" class="form-control"
value="" placeholder="Numero CI !...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<input autocomplete="off" name="datearrive" class="form-control" type="text" 
onfocus="(this.type='date')" value="" placeholder="Date d'arrivée !...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>

<div class="col-md-12">        
<fieldset>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">Photo !...</span>
</div>
<input type="file" autocomplete="off" name="photo" class="form-control" value="">
</div>
</fieldset>
</div>
<br><br>

<div class="col-md-6">
<div class="form-group has-icon-left">
<div class="position-relative">
<select class="form-control" name="genre">
<option value="">-- Le Genre--</option>
<option value="H">Homme</option>
<option value="F">Femme</option>
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
<input autocomplete="off" class="form-control" type="text" onfocus="(this.type='date')" 
name="datedepart" value="" placeholder="Date de depart !...">
<div class="form-control-icon">
<i class="bi bi-pencil"></i>
</div>
</div>
</div>
</div>
 <br>

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


@endsection