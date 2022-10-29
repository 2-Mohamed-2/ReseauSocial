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
                            <h4 class="card-title">Membre enregistrés</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" data-bs-toggle="modal"
                                        data-bs-target="#memAdd">insérer une nouvelle ligne</a></p>

                                @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
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
                                                $k = $mem->grade_id;
                                                $us = App\Models\Grade::find(1);
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
                                                                    <img src="{{ asset('storage/'.$mem->photo) }}"
                                                                        class="img-fluid" alt="Image">
                                                                </div>
                                                                <div class="col-lg-8 pt-4 pt-lg-0 content"
                                                                    data-aos="fade-left">

                                                                    <h3>{{ $us->libelle }} {{ $mem->nomcomplet }} en
                                                                        poste depuis {{ $mem->datearrive }} </h3>

                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <ul>
                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>Matricule:</strong>
                                                                                    <span>
                                                                                        {{ $mem->matricule }}
                                                                                    </span>
                                                                                </li>
                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>Genre:</strong>
                                                                                    <span>
                                                                                        {{ $mem->genre }}
                                                                                    </span>
                                                                                </li>
                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>Numero C.I:</strong>
                                                                                    <span>
                                                                                        {{ $mem->numeroci }}
                                                                                    </span>
                                                                                </li>
                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>Tel:</strong> <span>{{
                                                                                        $mem->telephone }}</span>
                                                                                </li>
                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>Adresse:</strong>
                                                                                    <span>
                                                                                        {{ $mem->adresse }}
                                                                                    </span>
                                                                                </li>
                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>Départ:</strong>
                                                                                    <span>
                                                                                        {{ $mem->datedepart }}
                                                                                    </span>
                                                                                </li> <br>

                                                                                <li><i class="bi bi-chevron-right"></i>
                                                                                    <strong>roles :</strong>
                                                                                    @forelse ($mem->roles as $role)
                                                                                    <span class="text-info">{{
                                                                                        $role->libelle }} |</span>
                                                                                    @empty

                                                                                    @endforelse

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
                                                            <form method="POST"
                                                                action="{{route('Membre.update', $mem->id)}}"
                                                                enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">


                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small
                                                                                    class="text-muted"><i>Grade</i></small>
                                                                                <div class="position-relative">
                                                                                    <select class="form-control"
                                                                                        name="grade_id">
                                                                                        @php
                                                                                        $daou = $mem->grade_id;
                                                                                        $us = App\Models\Grade::find($daou);
                                                                                        @endphp
                                                                                        <option value="{{ $us->id ?? "" }}">
                                                                                            {{ $us->libelle ?? ""}} (Par
                                                                                            défaut) </option>

                                                                                        <option value="">-- Liste des
                                                                                            grades --</option>
                                                                                        @foreach ($grades as $grade )
                                                                                        <option
                                                                                            value="{{ $grade->id }}">{{
                                                                                            $grade->libelle }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small
                                                                                    class="text-muted"><i>Matricule</i></small>
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

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Nom
                                                                                        Complet</i></small>
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

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <small
                                                                                    class="text-muted"><i>Adresse</i></small>
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
                                                                                <small
                                                                                    class="text-muted"><i>Telephone</i></small>
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
                                                                                <small class="text-muted"><i>Numero
                                                                                        d'identité</i></small>
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

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Date
                                                                                        d'arrivée</i></small>
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

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>La
                                                                                        modification de la photo est
                                                                                        facultative</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="file"
                                                                                        autocomplete="off" name="photo"
                                                                                        class="form-control"
                                                                                        value="{{$mem->photo}}"
                                                                                        placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <small
                                                                                    class="text-muted"><i>Sexe</i></small>
                                                                                <div class="position-relative">
                                                                                    <select class="form-control"
                                                                                        name="genre">
                                                                                        <option value="{{$mem->genre}}">
                                                                                            {{$mem->genre}} </option>

                                                                                        <option value="Homme">Homme
                                                                                        </option>
                                                                                        <option value="Femme">Femme
                                                                                        </option>
                                                                                    </select>
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Date de
                                                                                        départ</i></small>
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
                                                            <form action="{{route('Membre.destroy', $mem->id)}}"
                                                                method="POST">
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
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal"> Non </button>
                                                            <button type="submit" name="okmodalvote"
                                                                class="btn btn-primary"> Oui </button>
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

                <p class="text-wrap">

                <form method="post" action="{{route('Membre.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-control" name="commissariat_id">
                                            <option value=""> -- Commissariat -- </option>                            
                                            @foreach($commissariats as $commissariat)
                                            <option value="{{ $commissariat->id }}">{{ $commissariat->libelle }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('commissariat_id'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('commissariat_id') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-control" name="grade_id">
                                            <option selected disabled>-- Le grade --</option>
                                            @foreach ($grades as $grade )
                                            <option value="{{ $grade->id }}">{{ $grade->libelle }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('grade_id'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('grade_id') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div><br>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="matricule" class="form-control"
                                            value="{{ old('matricule') }}" placeholder="Matricule !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('matricule'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('matricule') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="numeroci" class="form-control"
                                            value="{{ old('numeroci') }}" placeholder="Numero CI !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('numeroci'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('numeroci') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="nomcomplet" class="form-control"
                                            value="{{ old('nomcomplet') }}" placeholder="Nom et Prenom !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('nomcomplet'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('nomcomplet') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="adresse" class="form-control"
                                            value="{{ old('adresse') }}" placeholder="Adresse!...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('adresse'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('adresse') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="telephone" class="form-control"
                                            value="{{ old('telephone') }}" placeholder="Numero de tele !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('telephone'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('telephone') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input autocomplete="off" name="datearrive" class="form-control" type="text"
                                            onfocus="(this.type='date')" value="{{ old('datearrive') }}"
                                            placeholder="Date d'arrivée !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('datearrive'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('datearrive') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Photo !...</span>
                                        </div>
                                        <input type="file" autocomplete="off" name="photo" class="form-control"
                                            value="{{ old('photo') }}">
                                    </div>
                                </fieldset>

                                @if ($errors->has('photo'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->get('photo') as $message)
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <br><br>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-control" name="genre">
                                            <option selected disabled>-- Le Genre--</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('genre'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('genre') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input autocomplete="off" class="form-control" type="text"
                                            onfocus="(this.type='date')" name="datedepart"
                                            value="{{ old('datedepart') }}" placeholder="Date de depart !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>

                                    @if ($errors->has('datedepart'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('datedepart') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <small class="text-muted"><i>Selection de rôles</i></small>
                                    <div class="position-relative">
                                        <select class="choices form-select" name="roles[]" multiple="multiple">
                                            <option disabled> Selectionnez ses rôles</option>
                                            @forelse ($roles as $role)
                                            <option name="roles[]" value="{{ $role->id }}">{{ $role->libelle }}</option>
                                            @empty
                                            <p>Pas d'insertion pour le moment !</p>
                                            @endforelse
                                        </select>
                                    </div>

                                    @if ($errors->has('roles[]'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('roles[]') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <small class="text-muted"><i>L'email est facultatif mais necessaire lors</i></small>
                                    <div class="position-relative">
                                        <input autocomplete="off" name="email" class="form-control" type="email"
                                            value="{{ old('email') }}" placeholder="Email(Facultatif) !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                    <small class="text-muted"><i> de la réinitialisation du mot de passe</i></small>

                                    @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('email') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
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

<script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="assets/js/pages/form-element-select.js"></script>


@endsection