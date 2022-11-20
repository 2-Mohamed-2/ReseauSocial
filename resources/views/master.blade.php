
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    @yield('liens')

<link rel="stylesheet" href="assets/css/shared/iconly.css">


</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
            @include('partials.sidebar')
        {{-- End Sidebar --}}
        <div id="main">

            {{--  Pour les flash-msg  --}}
            @include('flash-message')
            {{--  fin  --}}
            
            {{-- Contenu de dashboard --}}
            @yield('content')
            {{-- Fin Contenu de dashboard --}}

            {{-- Footer --}}
            @include('partials.footer')
            {{-- End Footer --}}

        </div>
    </div>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>

<!-- Need: Apexcharts -->
<script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

</body>

</html>
