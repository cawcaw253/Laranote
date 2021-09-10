<html>

<head>
  {!! SEO::generate() !!}
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" size="16x16" href="{{ url('favicon-16.ico') }}">
  <link rel="icon" size="32x32" href="{{ url('favicon-32.ico') }}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white h-screen">

  <nav id="header" class="note-layout-body-header">
    <div class="header-container">
      <a class="title" href="{{ route('notes.index') }}">
        LaraNote
      </a>
    </div>
  </nav>

  <div class="w-full">
    <div id="app" class="p-6 sm:p-10 md:p-16 flex flex-wrap min-h-full">
      @yield('content')
    </div>
  </div>

</body>

@include('layouts.parts.footer')

@stack('scripts')

</html>