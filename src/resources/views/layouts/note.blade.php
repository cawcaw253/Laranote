<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote</title>
  <meta name="subject" content="laravel note">
  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  <!-- Note -->
  <script src="{{ mix('js/vue/note.js') }}" defer></script>
  <!-- Note control bar -->
  <script src="{{ mix('js/vue/noteControlBar.js') }}" defer></script>

  <!-- ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
  <!-- alpine js -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  @stack('headers')
</head>

<body class="note-layout-body">
  <nav id="header" class="note-layout-body-header">
    <div class="header-container">
      <a class="title" href="#">
        LaraNote
      </a>

      <div class="block lg:hidden pr-4">
        <button id="nav-toggle"
          class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>

      <div
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-100 md:bg-transparent z-20"
        id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block py-2 px-4 text-gray-900 font-bold no-underline" href="#">Active</a>
          </li>
          <li class="mr-3">
            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4"
              href="#">link</a>
          </li>
          <li class="mr-3">
            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4"
              href="#">link</a>
          </li>
        </ul>
      </div>

      <div class="nav-content-toggle">
        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded appearance-none focus:outline-none">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>

      <div id="nav-content" class="nav-content-buttons">
        <ul class="list-reset">
          <li>
            <a href="{{ route('auth.logout') }}">
              <ion-icon name="power"></ion-icon>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="note-layout-body-contents">
    <x-note-controlbar :note="empty($note) ? null : $note" />
    <div id="app" class="note-container">
      @yield('content')
    </div>

    <!--Divider-->
    {{-- <hr class="border-b-2 border-gray-400 mb-8 mx-4"> --}}


    <!--Subscribe-->
    {{-- <div class="container px-4">
      <div class="font-sans bg-gradient-to-b from-green-100 to-gray-100 rounded-lg shadow-xl p-4 text-center">
        <h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to my Newsletter</h2>
        <h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered right to
          your inbox</h3>
        <div class="w-full text-center pt-4">
          <form action="#">
            <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
              <input type="email" placeholder="youremail@example.com"
                class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
              <button type="submit"
                class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div> --}}
    <!-- /Subscribe-->
  </div>

  <footer class="note-layout-body-footer">
    <div class="footer-container">
      <div class="contents">

        <div class="contents-item">
          <div>
            <h3>About</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id
              erat. Suspendisse consectetur dapibus velit ut lacinia.
            </p>
          </div>
        </div>

        <div class="contents-item">
          <div>
            <h3>Social</h3>
            <ul>
              <li>
                <a href="#">Add social link</a>
              </li>
              <li>
                <a href="#">Add social link</a>
              </li>
              <li>
                <a href="#">Add social link</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </footer>

  @stack('scripts')
</body>

</html>