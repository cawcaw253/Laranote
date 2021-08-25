<html>

<head>
    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" size="16x16" href="{{ url('favicon-16.ico') }}">
    <link rel="icon" size="32x32" href="{{ url('favicon-32.ico') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/vue/auth.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white h-screen">
    @yield('content')

    @stack('scripts')
</body>

</html>