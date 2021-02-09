<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote Home</title>
  <meta name="subject" content="laravel note">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <header>
    <x-navbar />
  </header>
  <div id="app">
    @yield('content')
  </div>
  {{-- <footer>copy rights by LaraNote App</footer> --}}

  @stack('scripts')
</body>

</html>
