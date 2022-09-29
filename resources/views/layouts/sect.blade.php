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
                <div class="col-12 col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Section enregistrés</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" data-bs-toggle="modal"
                                        data-bs-target="#sectAdd">insérer une nouvelle ligne</a></p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Libelle</th>
                                                <th>Sigle</th>
                                                <th>Fonction</th>
                                                <th>Commisariat</th>
                                                <th colspan="2" style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($sects as $sect)
                                            <tr>
                                                <td class="text-bold-500">{{$sect->libelle}}</td>
                                                <td class="text-bold-500">{{$sect->sigle}}</td>
                                                <td class="text-bold-500">{{$sect->fonction}}</td>
                                                <td class="text-bold-500">{{$sect->commissariat_id}}</td>
                                                <td>
                                                    <a class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#sectUpdate{{$sect->id}}" href="#">
                                                        Modifier
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#sectDestroy{{$sect->id}}" href="#">
                                                        Supprimer
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Boite modale pour la modification du site-->
                                            <div class="modal fade admin-query" id="sectUpdate{{$sect->id}}"
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
                                                            <form action="{{route('Section.update', $sect->id)}}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">

                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        autocomplete="off"
                                                                                        name="libelle"
                                                                                        class="form-control"
                                                                                        value="{{$sect->libelle}}"
                                                                                        placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        autocomplete="off" name="sigle"
                                                                                        class="form-control"
                                                                                        value="{{$sect->sigle}}"
                                                                                        placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        autocomplete="off"
                                                                                        name="fonction"
                                                                                        class="form-control"
                                                                                        value="{{$sect->fonction}}"
                                                                                        placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group has-icon-left">
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                        autocomplete="off"
                                                                                        name="commissariat_id"
                                                                                        class="form-control"
                                                                                        value="{{$sect->commissariat_id}}"
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
                                                            <div class="col-12 d-flex justify-content-end mt-4 ">
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
                                            <div class="modal fade admin-query" id="sectDestroy{{$sect->id}}"
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
                                                            <form action="{{route('Section.destroy', $sect->id)}}"
                                                                method="POST">
                                                                @method("DELETE")
                                                                @csrf
                                                                <div class="form-body">
                                                                    <p>
                                                                        Êtes-vous sur de vouloir supprimé le
                                                                        commissariat du : {{$sect->libelle}} ?
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




<!-- Boite modale pour l'ajout d'une section -->
<div class="modal fade admin-query" id="sectAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
    role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Enregistrement d'une nouvelle section</h5>
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
                <form action="{{route('Section.store')}}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="libelle" class="form-control"
                                            value="" placeholder="Nom de la section !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="sigle" class="form-control" value=""
                                            placeholder="sigle !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="fonction" class="form-control"
                                            value="" placeholder="fonction !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-control" name="commissariat_id">
                                            <option value=""> -- Selectionnez un commissariat --</option>
                                            @foreach($commissariats as $commissariat)
                                            <option value="{{ $commissariat->id }}">{{ $commissariat->libelle }}</option>
                                            @endforeach
                                        </select>
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


@endsection