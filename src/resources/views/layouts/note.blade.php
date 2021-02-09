<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote</title>
  <meta name="subject" content="laravel note">
  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  
  @stack('headers')
</head>

<body class="bg-ash-gray">
  <header>
    <x-navbar />
  </header>
  <div class="flex justify-center mb-4">
    <div id="app" class="w-full lg:w-5/6 xl:w-2/3">
      @yield('content')
    </div>
  </div>
  {{-- <footer>copy rights by LaraNote App</footer> --}}

  @stack('scripts')
</body>

</html>
