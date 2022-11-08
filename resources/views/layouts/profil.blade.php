

@extends('master')

@section('content')

<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ Auth::user()->nomcomplet }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ Auth::user()->grade->libelle }}
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <button data-bs-toggle="modal" data-bs-target="#pwdUpdate{{Auth::user()->id}}"
                  class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                  <i class="ni ni-app"></i>
                  <span class="ms-2">Modifier mot de passe</span>
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                  <i class="ni ni-settings-gear-65"></i>
                  <span class="ms-2">Signaler un problème</span>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="text-uppercase mb-2">Informations personnelles</p>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Matricule</label>
                  <input class="form-control" readonly type="text" value="{{ Auth::user()->matricule }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Date d'arrivée</label>
                  <input class="form-control" readonly type="text" value="{{ Auth::user()->datearrive }}">
                </div>
              </div>

              <hr class="horizontal dark">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Telephone</label>
                  <input class="form-control" readonly type="text" value="{{ Auth::user()->telephone }}">
                </div>
              </div>     
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Numero d'identité</label>
                  <input class="form-control" readonly type="text" value="{{ Auth::user()->numeroci }}">
                </div>
              </div>         
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email</label>
                  <input class="form-control" readonly type="email" value="{{ Auth::user()->email }}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Adresse</label>
                  <input class="form-control" readonly type="text" value="{{ Auth::user()->adresse }}">
                </div>
              </div>
            </div>                       
          </div>
        </div>
      </div>
    </div>
</div>


<!-- Boite modale pour la modification d'une section-->
<div class="modal fade admin-query" id="pwdUpdate{{Auth::user()->id}}"
  data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
  role="dialog" tabindex="-1">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Modification du mot de passe</h5>
              <button type="button" class="close" data-bs-dismiss="modal">
                  x
              </button>
          </div>

          <div class="modal-body">
              <p class="text-wrap">
              <form action="" method="POST">
                @method('PUT')
                @csrf
                <div class="form-body">
                  <div class="row">                
                    <div class="col-md-12">
                      <div class="form-group has-icon-left">
                        <small class="text-muted"><i>Nouveau mot de passe</i></small>
                        <div class="position-relative">
                          <input type="password" autocomplete="off" name="password" class="form-control" value=""
                            placeholder="Nouveau mot de passe ...">
                          <div class="form-control-icon">
                            <i class="bi bi-file-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group has-icon-left">
                        <small class="text-muted"><i>Confirmation du mot de passe</i></small>
                        <div class="position-relative">
                          <input type="password" autocomplete="off" name="password2" class="form-control" value=""
                            placeholder="Confirmation du mot de passe ...">
                          <div class="form-control-icon">
                            <i class="bi bi-file-lock"></i>
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

@endsection