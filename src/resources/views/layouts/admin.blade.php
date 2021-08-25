<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" size="16x16" href="{{ url('favicon-16.ico') }}">
  <link rel="icon" size="32x32" href="{{ url('favicon-32.ico') }}">

  <!-- Styles -->
  <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  <!-- ionicons -->
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

  @stack('headers')
</head>

<body class="bg-ash-gray">
  <div class="md:flex flex-col md:flex-row min-h-full w-full">
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