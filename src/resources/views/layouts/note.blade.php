<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote</title>
  <meta name="subject" content="laravel note">
  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  {{-- ionicons --}}
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  {{-- alpine js --}}
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  @stack('headers')
</head>

<body class="bg-ash-gray">
  <div class="md:flex flex-col md:flex-row min-h-full w-screen">
    <x-side-navbar />

    <div class="w-full flex flex-col">
      <div>
        <x-note-controlbar :note="empty($note) ? null : $note" />
      </div>
      <div id="app" class="h-full">
        @yield('content')
      </div>
    </div>
  </div>
  {{-- <footer>copy rights by LaraNote App</footer> --}}

  @stack('scripts')
</body>

</html>