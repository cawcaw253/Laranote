<html>

<head>
    {!! SEO::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1">

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