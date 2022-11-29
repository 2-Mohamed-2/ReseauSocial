
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" href="´{{asset('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="´{{asset('assets/images/logo/favicon.png')}}" type="image/png">
</head>

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

<body>
    <div id="auth">
        <div class="row justify-content-center mt-3">
            <div class="col-lg-7 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Réinitialisation du mot de passe </h1>
                    <p class="auth-subtitle mb-5">Veuillez renseigner le champs suivant.</p>

                    @if (session('status'))
                        <div class="alert alert-info">
                                <span role="alert">
                                    <strong>{{ session('status') }}</strong>
                                </span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group position-relative has-icon-left">
                            <input type="text" autocomplete="off" disabled name="email" class="form-control form-control-xl"
                                    value="{{ old('email', $request->email) }}" placeholder="Votre email ...">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('email') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                @endif

                            <div class="form-group position-relative has-icon-right">
                                <small class="text-muted"><i>Nouveau mot de passe</i></small>
                                <div class="position-relative">
                                    <input type="password" autocomplete="off" name="password" id="pwd" class="form-control form-control-xl "
                                        value="{{ old('password1') }}" required placeholder="Nouveau mot de passe ...">
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

                            <div class="form-group position-relative has-icon-right">
                                <small class="text-muted"><i>Confirmation du mot de passe</i></small>
                                <div class="position-relative">
                                    <input type="password" autocomplete="off" id="pwd2" class="form-control form-control-xl"
                                        value="{{ old('password2') }}" name="password_confirmation" required disabled placeholder="Confirmation du mot de passe ...">
                                </div>

                                <br>
                                <div id="pwd2msg" class="alert " style="display: none">
                                    <span role="alert">
                                        <strong> </strong>
                                    </span>
                                </div>

                            </div>

                        <button id="sauv" type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Confirmer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{-- Script pour l'apercu du mdp pour le 2è input --}}
<script src="{{asset('assets/js/eyes.js')}}"></script>
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

</body>

</html>




{{--  <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>  --}}
