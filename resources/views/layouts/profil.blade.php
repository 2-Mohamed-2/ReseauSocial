

@extends('master')

@section('liens')

<style>

  #message{
    display: none;
    animation: anime 1s ease-out;
  }

  @keyframes anime {
    from{
      transform: translateY(1000px);
    }
  }

  .invalid{
    color: red;
    font-size: 18px;
  }
  .invalid:before
  {
    position: relative;
    left: -7px;
    content: "✗";
  }

  .valid{
    text-decoration: line-through;
    color: green;
    font-size: 18px;
  }
  .valid:before
  {
    position: relative;
    left: -7px;
    content: "✓";
  }

  .ok{
    text-decoration: none;
    color: white;
    font-size: 18px;
  }
  .ok:before
  {
    position: relative;
    left: -7px;
    content: "✓";
  }

</style>

@endsection

@section('content')

<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Profil</h3>
          <p class="text-subtitle text-muted">Ici, toutes les infos vous concernant</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('index')}}">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profil</li>
              </ol>
          </nav>
      </div>
  </div>
</div>
@include('flash-message')

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
              {{ Auth::user()->grade->libelle ?? ''}}
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
                  <span class="ms-2">Modifier le mot de passe</span>
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
              <form action="{{ route('profilupdate', encrypt(Auth::user()->id) ) }}"
                method="POST" >
                @method('PUT')
                @csrf
                <div class="form-body">
                  <div class="row">  

                    <div class="col-md-12">
                      <div class="form-group has-icon-right">
                        <small class="text-muted"><i>Ancien mot de passe</i></small>
                        <div class="position-relative">
                          <input type="password" id="apwd" autocomplete="off" name="password" class="form-control" 
                            required value="{{ old('password') }}" placeholder="Ancien mot de passe ...">
                          <div class="form-control-icon">
                            <i id="apwd1" class="bi bi-eye"></i>
                            <i id="apwd2" style="display: none" class="bi bi-eye-slash"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group has-icon-right">
                        <small class="text-muted"><i>Nouveau mot de passe</i></small>
                        <div class="position-relative">
                          <input type="password" autocomplete="off" name="password1" id="pwd" 
                            class="form-control" value="{{ old('password1') }}" required
                            placeholder="Nouveau mot de passe ...">
                          <div class="form-control-icon">
                            <i data-feather="eye"></i>
                            <i style="display: none" data-feather="eye-off"></i>
                          </div>
                        </div>

                        <div id="message" class="col-12 alert alert-danger">
                          <div class="col-12 d-flex justify-content-center mt-2">
                            <div class="form-group has-icon-left">
                              <h4 class="">Le mot de passe doit contenir :</h4>
                              <span class="invalid" id="letter">Une lettre minuscule</span><br>
                              <span class="invalid" id="capital">Une lettre majuscule</span><br>
                              <span class="invalid" id="number">Un chiffre</span><br>
                              <span class="invalid" id="lenght">06 caractères minimum</span><br>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group has-icon-right">
                        <small class="text-muted"><i>Confirmation du mot de passe</i></small>
                        <div class="position-relative">
                          <input type="password" autocomplete="off" id="pwd2" class="form-control" 
                            value="{{ old('password2') }}"
                            required disabled placeholder="Confirmation du mot de passe ...">
                        </div>

                        <br>
                        <div id="pwd2msg" class="alert " style="display: none">
                          <span role="alert">
                              <strong> </strong>
                          </span>
                        </div>

                      </div>
                    </div> 
                  </div>                 

                </div>
                </p>
          </div>

          <div class="modal-footer">
              <div class="col-12 d-flex justify-content-end mt-4 ">
                  <div class="d-flex justify-content-center">
                      <button type="submit" id="sauv"
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



{{-- Script pour l'apercu du mdp pour le 1er input --}}
<script>
  const apwd = document.getElementById('apwd');

  const apwd1 = document.querySelector(".bi-eye");
  var apwd2 = document.querySelector(".bi-eye-slash");

  apwd1.addEventListener("click", () => {
    apwd1.style.display = "none";
    apwd2.style.display = "block";
    apwd.type = "text";
  });

  apwd2.addEventListener("click", () => {
    apwd2.style.display = "none";
    apwd1.style.display = "block";
    apwd.type = "password";
  });

</script> 
{{-- Fin --}}


{{-- Script pour l'apercu du mdp pour le 2è input --}}
<script src="assets/js/eyes.js"></script>
<script>
  feather.replace();

  const eye = document.querySelector(".feather-eye");
  const eyeoff = document.querySelector(".feather-eye-off");
  var pwd = document.getElementById('pwd');
  var pwd2 = document.getElementById('pwd2');

  eye.addEventListener("click", () => {
    eye.style.display = "none";
    eyeoff.style.display = "block";
    pwd.type = "text";
    pwd2.type = "text";
  });

  eyeoff.addEventListener("click", () => {
    eyeoff.style.display = "none";
    eye.style.display = "block";
    pwd.type = "password";
    pwd2.type = "password";
  });

</script> 
{{-- Fin  --}}


{{-- Pour l'apercu du mdp pour le 3è input, ca se fera simultanement avec le 2è input --}}

{{-- Script pour les critère de validation du mdp (2è input) --}}
<script>

  var pwd = document.getElementById('pwd');
  var letter = document.getElementById('letter');
  var capital = document.getElementById('capital');
  var number = document.getElementById('number');
  var lenght = document.getElementById('lenght');

  // Afficher les critères au click sur le input
  pwd.onfocus = function(){
    document.getElementById("message").style.display = "block"
  }

  // faire disparaitre les critères au click sur un autre point
  pwd.onblur = function(){
    document.getElementById("message").style.display = "none"
  }

  // Quand on commence à taper dans le pwd
  pwd.onkeyup = function(){

    

    // Validation des minuscules
    var minuscule = /[a-z]/g
    if(pwd.value.match(minuscule)){
      letter.classList.remove('invalid');
      letter.classList.add('valid');
    }
    else{
      letter.classList.remove('valid');
      letter.classList.add('invalid');
    }


    // Validation des majuscules
    var majuscule = /[A-Z]/g
    if(pwd.value.match(majuscule)){
      capital.classList.remove('invalid');
      capital.classList.add('valid');
    }
    else{
      capital.classList.remove('valid');
      capital.classList.add('invalid');
    }


    // Validation des nombre
    var nbre = /[0-9]/g
    if(pwd.value.match(nbre)){
      number.classList.remove('invalid');
      number.classList.add('valid');
    }
    else{
      number.classList.remove('valid');
      number.classList.add('invalid');
    }



    // Validation de la longueur
    if(pwd.value.length >= 6){
      lenght.classList.remove('invalid');
      lenght.classList.add('valid');
    }
    else{
      lenght.classList.remove('valid');
      lenght.classList.add('invalid');
    }

    
    const button = document.getElementById('sauv');
    const npwd = document.getElementById('pwd2');

    if ((pwd.value.length >= 6) && (pwd.value.match(nbre)) && (pwd.value.match(majuscule)) && (pwd.value.match(minuscule))) {      
      button.disabled = false;
      npwd.disabled = false;

      document.getElementById("message").classList.remove('alert-danger');
      document.getElementById("message").classList.add('alert-success');

      lenght.classList.remove('valid');
      lenght.classList.add('ok');

      number.classList.remove('valid');
      number.classList.add('ok');

      capital.classList.remove('valid');
      capital.classList.add('ok');

      letter.classList.remove('valid');
      letter.classList.add('ok');
    } 
    else {
      button.disabled = true;
      npwd.disabled = true;

      document.getElementById("message").classList.remove('alert-succes');
      document.getElementById("message").classList.add('alert-danger');

      lenght.classList.remove('ok');
      lenght.classList.add('invalid');

      capital.classList.remove('ok');
      capital.classList.add('invalid');

      letter.classList.remove('ok');
      letter.classList.add('invalid');

      number.classList.remove('ok');
      number.classList.add('invalid');
    }

  }


</script>
{{-- Fin --}}


{{-- Script pour la vérification des deux mots de passe (2è et 3è input)--}}
<script>

  var pwd2 = document.getElementById("pwd2");
  var pwd2msg = document.getElementById("pwd2msg");

  pwd2.onfocus = function(){
    document.getElementById("pwd2msg").style.display = "block"
  }

  // faire disparaitre les critères au click sur un autre point
  pwd2.onblur = function(){
    document.getElementById("pwd2msg").style.display = "none"
  }

    pwd2.onkeyup = function()
    {     
      const button = document.getElementById('sauv');
      var pwd = document.getElementById("pwd"); 

      if (pwd.value != pwd2.value) {
        // alert("Pas Ok");              
        
        button.disabled = true;
        pwd2msg.classList.add('alert-danger');
        pwd2msg.innerHTML = "Attention, les deux mots de passe sont differents";
        
      } 
      else {
        // alert("Ok");
        
        button.disabled = false;
        pwd2msg.classList.remove('alert-danger');
        pwd2msg.classList.add('alert-success');
        pwd2msg.innerHTML = "Les deux mots de passe sont identiques";
      }

    }
</script>
{{-- Fin --}}




@endsection