
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
                            <h4 class="card-title">Residence enregistrés</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <p class="card-text">Pour <a href="" data-bs-toggle="modal" data-bs-target="#resiAdd"><h3>insérer une nouvelle ligne</h3></a></p>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Cerifions</th>
                                                <th>Domicile</th>
                                                <th colspan="3" style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($resi as $resi)
                                            <tr>
                                                <td class="text-bold-500">{{$resi->certifions}}</td>
                                                <td class="text-bold-500">{{$resi->domicile}}</td>
                                                
                                                <td>
                                                    <a class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#{{$resi->id}}" href="{{ route('downloadPDF', $resi->id    ) }}">
                                                    PDF
                                                </a>
                                            </td>
                                            
                                            <td>
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resiUpdate{{$resi->id}}"
                                                    href="#">
                                                    Modifier
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#resiDestroy{{$resi->id}}"
                                                    href="#">
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        <!-- Boite modale pour la modification du site-->
                                        <div class="modal fade admin-query" id="resiUpdate{{$resi->id}}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"  role="dialog" tabindex="-1">
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
                                                            <form action="{{ route('Residence.update', $resi->id)}}" method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <div class="position-relative">
                                                                                    <select class="form-control" name="inconnu_id">
                                                                                        @php
                                                                                        $kone = $resi->inconnu_id; 
                                                                                        $us = App\Models\Inconnu::find($kone);
                                                                                        @endphp
                                                                                        <option value="{{ $us->id }}"> {{ $us->nomcomplet }} </option>
                                                                                        
                                                                                        @foreach($inconnus as $inconnu)
                                                                                        <option value="{{ $inconnu->id }}">{{ $inconnu->nomcomplet }}
                                                                                        </option>
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
                                                                                class="text-muted"><i>Numero</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="number"
                                                                                    autocomplete="off"
                                                                                    name="numero"
                                                                                    class="form-control"
                                                                                    value="{{$resi->numero}}"
                                                                                    placeholder="...">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small
                                                                                class="text-muted"><i>Certifions</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="certifions"
                                                                                    class="form-control"
                                                                                    value="{{$resi->certifions}}"
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
                                                                                class="text-muted"><i>Ne_le</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="date"
                                                                                    autocomplete="off"
                                                                                    name="ne"
                                                                                    class="form-control"
                                                                                    value="{{$resi->ne}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>a</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="a"
                                                                                    class="form-control"
                                                                                    value="{{$resi->a}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Fils_de</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="fils"
                                                                                    class="form-control"
                                                                                    value="{{$resi->fils}}"
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
                                                                                    name="et"
                                                                                    class="form-control"
                                                                                    value="{{$resi->et}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Profession</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="profession"
                                                                                    class="form-control"
                                                                                    value="{{$resi->profession}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Resulte</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="resulte"
                                                                                    class="form-control"
                                                                                    value="{{$resi->resulte}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>Domicile</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="text"
                                                                                    autocomplete="off"
                                                                                    name="domicile"
                                                                                    class="form-control"
                                                                                    value="{{$resi->domicile}}"
                                                                                    placeholder="....">
                                                                                    <div class="form-control-icon">
                                                                                        <i class="bi bi-pencil"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-icon-left">
                                                                                <small class="text-muted"><i>kati</i></small>
                                                                                <div class="position-relative">
                                                                                    <input type="date"
                                                                                    autocomplete="off"
                                                                                    name="kati"
                                                                                    class="form-control"
                                                                                    value="{{$resi->kati}}"
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
                                                    
                                                </p>
                                            </div>
                                            <!-- End boite modale -->
                                            
                                            <!-- Boite modale pour la confirmation de suppression d'un site-->
                                            <div class="modal fade admin-query" id="resiDestroy{{$resi->id}}" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"  role="dialog" tabindex="-1">
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
                                                                <form action="{{route('Residence.destroy', $resi->id)}}" method="POST">
                                                                    @method("DELETE")
                                                                    @csrf
                                                                    <div class="form-body">
                                                                        <p>
                                                                            Êtes-vous sur de vouloir supprimé le certificat du Mr : {{$resi->certifions}} ?
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




<!-- Boite modale pour l'ajout d'une Certificat-->
<div class="modal fade admin-query" id="resiAdd" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"  role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Enregistrement d'une Residence</h5>
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
                    <form action="{{route('Residence.store')}}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-control" name="inconnu_id">
                                                <option value=""> --  --</option>
                                                @foreach($inconnus as $inconnu)
                                                <option value="{{ $inconnu->id }}">{{ $inconnu->nomcomplet }}
                                                </option>
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
                                        <div class="position-relative">
                                            <input type="number" autocomplete="off" name="numero"
                                            class="form-control" value="" placeholder="Numero residence !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" autocomplete="off" name="certifions"
                                            class="form-control" value="" placeholder="Certifions Mr/Mme !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" autocomplete="off" name="ne"
                                            class="form-control" value="" placeholder="Né_le !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" autocomplete="off" name="a"
                                            class="form-control" value="" placeholder="Ville de naissance !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" autocomplete="off" name="fils"
                                            class="form-control" value="" placeholder="Fils_de !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" autocomplete="off" name="et"
                                            class="form-control" value="" placeholder="Et_de !...">
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
                                            class="form-control" value="" placeholder="Profession!...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" autocomplete="off" name="resulte"
                                            class="form-control" value="" placeholder="Resulte !...">
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
                                            class="form-control" value="" placeholder="Domicile !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" autocomplete="off" name="kati"
                                            class="form-control" value="" placeholder=" !...">
                                            <div class="form-control-icon">
                                                <i class="bi bi-pencil"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" autocomplete="off" name="dossier"
                                            class="form-control" value="" placeholder="Dossier !...">
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
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light-secondary me-1 mb-1 m-auto">Annuler</button>
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

