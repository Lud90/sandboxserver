<html>
<head>
    <title>@yield('title') - NS Sandbox App Admin</title>
    <link href="https://fonts.googleapis.com/icon?family-Material+Icons" rel="stylesheet"/>
    <link href="{{ URL::asset('css/materialize.min.css'); }}" rel="stylesheet" type="text/css" media="screen,projection"/>
    @yield('styles')
    @yield('scripts')
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    @yield('body')
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
</body>
</html>