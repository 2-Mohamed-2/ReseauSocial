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
                            <h4 class="card-title">Carte enregistrés</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" data-bs-toggle="modal"
                                    data-bs-target="#cartAdd">insérer une nouvelle ligne</a></p>
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Prenom</th>
                                                    <th>Domicile</th>
                                                    <th colspan="4" style="text-align: center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($carts as $cart)
                                                <tr>
                                                    {{-- @php
                                                        $k = $cart->id;
                                                        $us = App\Models\Carte::find($k)->inconnu;
                                                        @endphp
                                                        --}}
                                                        <td class="text-bold-500">{{$cart->nom}}</td>
                                                        <td class="text-bold-500">{{$cart->prenom}}</td>
                                                        <td class="text-bold-500">{{$cart->domicile}}</td>
                                                        <td>
                                                            <a class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#cartShow{{$cart->id}}" href="#">
                                                            Voir +
                                                        </a>
                                                    </td>
                                                     
                                                    <td>
                                                        <a class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#{{$cart->id}}" href="{{ route('downloadPDF', $cart->id    ) }}">
                                                        PDF
                                                    </a>
                                                </td>
                                                
                                                    <td>
                                                        <a class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#cartUpdate{{$cart->id}}" href="#">
                                                        Modifier
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#cartDestroy{{$cart->id}}" href="#">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Boite modale pour la visualisation d'une carte-->
                                        <div class="modal fade admin-query" id="cartShow{{$cart->id}}"
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
                                                                <img src="{{ asset('storage/'.$cart->photo) }}"
                                                                class="img-fluid" alt="Image">
                                                            </div>
                                                            <div class="col-lg-8 pt-4 pt-lg-0 content"
                                                            data-aos="fade-left">
                                                            
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <ul>
                                                                        <li><i class="bi bi-chevron-right"></i>
                                                                            <strong>Nom:</strong>
                                                                            <span>
                                                                                {{ $cart->nom }}
                                                                            </span>
                                                                        </li>
                                                                        
                                                                        <li><i class="bi bi-chevron-right"></i>
                                                                            <strong>Prenom:</strong>
                                                                            <span>
                                                                                {{ $cart->Prenom }}
                                                                            </span>
                                                                        </li>
                                                                        
                                                                        <li><i class="bi bi-chevron-right"></i>
                                                                            <strong>Domicile:</strong>
                                                                            <span>
                                                                                {{ $cart->domicile }}
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
                                
                                
                                <!-- Boite modale pour la modification des cartes-->
                                <div class="modal fade admin-query" id="cartUpdate{{$cart->id}}"
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
                                                    action="{{route('Carte.update', $cart->id)}}"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-body">
                                                        <div class="row">
                                                            
                                                            
                                                            {{-- <div class="col-md-6">
                                                                <div class="form-group has-icon-left">
                                                                    <small
                                                                    class="text-muted"><i>Grade</i></small>
                                                                    <div class="position-relative">
                                                                        <select class="form-control"
                                                                        name="grade_id">
                                                                        @php
                                                                        $daou = $mem->grade_id;
                                                                        $us =
                                                                        App\Models\Grade::find($daou);
                                                                        @endphp
                                                                        <option value="{{ $us->id }}">
                                                                            {{ $us->libelle }} (Par
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
                                                                    </div> --}}
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small
                                                                            class="text-muted"><i>N delivrance</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="n_delivrance"
                                                                                class="form-control"
                                                                                value="{{$cart->n_delivrance}}"
                                                                                placeholder="...">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>Fait_le</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="date"
                                                                                autocomplete="off"
                                                                                name="fait_le"
                                                                                class="form-control"
                                                                                value="{{$cart->fait_le}}"
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
                                                                            class="text-muted"><i>Village_de</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="village_de"
                                                                                class="form-control"
                                                                                value="{{$cart->village_de}}"
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
                                                                            class="text-muted"><i>Franction_de</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="franction_de"
                                                                                class="form-control"
                                                                                value="{{$cart->franction_de}}"
                                                                                placeholder="....">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>Nationalite</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="nationalite"
                                                                                class="form-control"
                                                                                value="{{$cart->nationalite}}"
                                                                                placeholder="....">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>Nom</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="nom"
                                                                                class="form-control"
                                                                                value="{{$cart->nom}}"
                                                                                placeholder="....">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>Prenom</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="prenom"
                                                                                class="form-control"
                                                                                value="{{$cart->prenom}}"
                                                                                placeholder="....">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>fils_de</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="fils_de"
                                                                                class="form-control"
                                                                                value="{{$cart->fils_de}}"
                                                                                placeholder="....">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>et_de</i></small>
                                                                            <div class="position-relative">
                                                                                <input type="text"
                                                                                autocomplete="off"
                                                                                name="et_de"
                                                                                class="form-control"
                                                                                value="{{$cart->et_de}}"
                                                                                placeholder="....">
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group has-icon-left">
                                                                            <small class="text-muted"><i>La
                                                                                modification de la photo est
                                                                                facultative</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="file"
                                                                                    autocomplete="off" name="photo"
                                                                                    class="form-control"
                                                                                    value="{{$cart->photo}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>profession</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="profession"
                                                                                    class="form-control"
                                                                                    value="{{$cart->profession}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>domicile</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="domicile"
                                                                                    class="form-control"
                                                                                    value="{{$cart->domicile}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>taille</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="taille"
                                                                                    class="form-control"
                                                                                    value="{{$cart->taille}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>teint</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="teint"
                                                                                    class="form-control"
                                                                                    value="{{$cart->teint}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>cheveux</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="cheveux"
                                                                                    class="form-control"
                                                                                    value="{{$cart->cheveux}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>signes</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="signes"
                                                                                    class="form-control"
                                                                                    value="{{$cart->signes}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>carte_n</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="number"
                                                                                    autocomplete="off"
                                                                                    name="carte_n"
                                                                                    class="form-control"
                                                                                    value="{{$cart->carte_n}}"
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
                                        
                                        <!-- Boite modale pour la confirmation de suppression d'une carte -->
                                        <div class="modal fade admin-query" id="cartDestroy{{$cart->id}}"
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
                                                            <form action="{{route('Carte.destroy', $cart->id)}}"
                                                                method="POST">
                                                                @method("DELETE")
                                                                @csrf
                                                                <div class="form-body">
                                                                    <p>
                                                                        Êtes-vous sur de vouloir supprimé :
                                                                        {{$cart->nom}} ?
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
            
            <p class="text-wrap">
                
                <form method="POST" action="{{route('Carte.store')}}" enctype="multipart/form-data">                    
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            
                            {{-- <div class="col-md-6">
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
                            </div><br> --}}
                            
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="n_delivrance"
                                        class="form-control" value="" placeholder="N delivrance !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="village_de"
                                        class="form-control" value="" placeholder="Village !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="franction_de"
                                        class="form-control" value="" placeholder="Franction!...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="nationalite"
                                        class="form-control" value="" placeholder="Nationalite !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="nom"
                                        class="form-control" value="" placeholder="Nom !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="prenom"
                                        class="form-control" value="" placeholder="prenom !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="fils_de"
                                        class="form-control" value="" placeholder="Nom du pere !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="et_de"
                                        class="form-control" value="" placeholder="Nom de la mere !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="file" autocomplete="off" name="photo"
                                        class="form-control" value="" placeholder="photo !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="profession"
                                        class="form-control" value="" placeholder="Profession !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="domicile"
                                        class="form-control" value="" placeholder="domicile !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="taille"
                                        class="form-control" value="" placeholder="Taille!...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="teint"
                                        class="form-control" value="" placeholder="Teint !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="cheveux"
                                        class="form-control" value="" placeholder="Cheveux !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" autocomplete="off" name="signes"
                                        class="form-control" value="" placeholder="Signes !...">
                                        <div class="form-control-icon">
                                            <i class="bi bi-pencil"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="number" autocomplete="off" name="carte_n"
                                        class="form-control" value="" placeholder="Carte numero !...">
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