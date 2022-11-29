<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion |</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div id="auth-left">
                    {{-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a>
                    </div> --}}
                    <h1 class="auth-title">Connexion</h1>
                    <p class="auth-subtitle mb-5">Veuillez renseigner les champs suivants.</p>
                    @if ($errors->has('failed'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('failed') as $message)
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @endforeach
                    </div>
                    @endif
                    @if ($errors->has('throttle'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('throttle') as $message)
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" autocomplete="off" name="matricule" class="form-control form-control-xl" placeholder="Matricule">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
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
                        <div class="form-group position-relative has-icon-right mb-4">
                            <input type="password" autocomplete="off" name="password" id="pwd" class="form-control form-control-xl" placeholder="Mot de passe">
                            <div class="form-control-icon">
                                <i data-feather="eye"></i>
                                <i style="display: none" data-feather="eye-off"></i>
                              </div>
                        </div>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('password') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                @endif

                        <div class="form-group position-relative has-icon-left mb-4">
                            <select class="form-control form-control-xl" name="commissariat_id">
                                <option value="0"> -- Commissariat -- </option>

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

                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" name="remember" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Se souvenir de moi
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Se connecter</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        @if (Route::has('password.request'))
                        <p>
                            <a class="font-bold" href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        </p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>



{{-- Script pour l'apercu du mdp pour le 2è input --}}
<script src="assets/js/eyes.js"></script>

<script>
  feather.replace();

  const eye = document.querySelector(".feather-eye");
  const eyeoff = document.querySelector(".feather-eye-off");
  var pwd = document.getElementById('pwd');

  eye.addEventListener("click", () => {
    eye.style.display = "none";
    eyeoff.style.display = "block";
    pwd.type = "text";
  });

  eyeoff.addEventListener("click", () => {
    eyeoff.style.display = "none";
    eye.style.display = "block";
    pwd.type = "password";
  });

</script>
{{-- Fin  --}}
</body>

</html>
