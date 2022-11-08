Bonjourrrrr

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe |</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row">
            <div class="col-lg-7 mt-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">{{ $user->matricule }}Définir un nouveau mot de passe</h1>

                    @if ($errors->has('failed'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('failed') as $message)
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @endforeach
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors as $message)
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @endforeach
                    </div>
                    @endif

                    <form method="POST" action="{{ route('Chande-pwd.update',$user->id) }}">
                        @method('PUT')
                        @csrf   

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" autocomplete="off" name="password" class="form-control form-control-xl" placeholder="Nouveau mot de passe">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" autocomplete="off" name="password2" class="form-control form-control-xl" placeholder="Confirmation du mot de passe">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Définir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}