<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote Home</title>
  <meta name="subject" content="laravel note">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200">
  <div id="app">
    <section class="flex flex-col md:flex-row h-screen items-center">
      <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="{{url('/images/top/top.jpg')}}" alt="" class="w-full h-full object-cover">
      </div>
      <div
        class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
        @yield('content')
      </div>
    </section>
  </div>
  {{-- <footer>copy rights by LaraNote App</footer> --}}

  @stack('scripts')
</body>

</html>