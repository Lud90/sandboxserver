{{--
    Main page skeleton. Used in all admin panel pages
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - NS Sandbox App Admin</title>

    <link href="{{ URL::asset('css/materialize.css') }}" rel="stylesheet" type="text/css" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- Android Webapp Support --}}
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#283593">
    <script>
        $(".button-collapse").sideNav();

        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/js/service-worker.js');
        }
    </script>
    {{-- end android webapp support --}}

    @yield('styles')
    @yield('scripts')
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    @yield('body')
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    @yield('endscripts')
</body>
</html>