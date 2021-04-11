<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote - AdmiN</title>
  <meta name="subject" content="laravel note">
  <!-- Styles -->
  <link href="{{ mix('css/admin.css') }}" rel="stylesheet">

  {{-- ionicons --}}
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  {{-- alpine js --}}
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  @stack('headers')
</head>

<body class="bg-ash-gray">
  <div class="md:flex flex-col md:flex-row min-h-full w-screen">
    @if (Auth::guard('admin')->check())
    @include('admin.parts.navbar')
    @endif

    <div class="w-full flex flex-col">
      <div id="app" class="h-full">
        @yield('content')
      </div>
    </div>
  </div>

  @stack('scripts')
</body>

</html>