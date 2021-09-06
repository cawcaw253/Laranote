<html>

<head>
  {!! SEO::generate() !!}
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" size="16x16" href="{{ url('favicon-16.ico') }}">
  <link rel="icon" size="32x32" href="{{ url('favicon-32.ico') }}">

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

  @stack('headers')
</head>

<body class="note-layout-body">
  <nav id="header" class="note-layout-body-header">
    <div class="header-container">
      <a class="title" href="{{ route('notes.index') }}">
        LaraNote
      </a>

      <div class="nav-content-toggle">
        <button id="nav-toggle">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>

      <div id="nav-content" class="nav-content-buttons hidden">
        <ul>
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
    <section class="section">
      <div class="contents-container left-side">
        {{-- <div class="card-content">
          INFOS
        </div> --}}
        <x-widgets.tag :user-id="$userId" />
        <div class="right-sides">
          <div class="card-content">
            RECENTS
          </div>
          <div class="card-content">
            ARCHIVES
          </div>
        </div>
      </div>

      <div class="contents-container center">
        <div class="card-content">
          <x-note-controlbar :note="empty($note) ? null : $note" />
          <div id="app" class="note-container">
            @yield('content')
          </div>
        </div>
      </div>

      <div class="contents-container right-side">
        <div class="card-content">
          RECENTS
        </div>
        <div class="card-content">
          ARCHIVES
        </div>
      </div>
    </section>

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

  @include('layouts.parts.footer')

  @stack('scripts')
</body>

</html>