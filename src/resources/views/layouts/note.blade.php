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

<body class="bg-white font-sans leading-normal tracking-normal">

  <nav id="header" class="fixed w-full z-10 top-0 bg-dim-gray">

    {{-- <div id="progress" class="h-1 z-20 top-0"
      style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div> --}}

    <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
      <div class="pl-4">
        <a class="text-hot-orange text-base no-underline hover:text-hot-orange-darkest font-bold text-xl" href="#">
          LaraNote
        </a>
      </div>

      <div class="block lg:hidden pr-4">
        <button id="nav-toggle"
          class="flex items-center px-3 py-2 border rounded text-hot-orange border-hot-orange hover:text-hot-orange-darker hover:border-hot-orange-darker appearance-none focus:outline-none">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>

      <div
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 md:bg-transparent z-20"
        id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block text-hot-orange no-underline hover:text-hot-orange-darker hover:text-underline py-2 px-4 flex items-center"
              href="{{ route('auth.logout') }}">
              <ion-icon name="power"></ion-icon>
              <span class="ml-1">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--Container-->
  <div class="container w-full  md:max-w-3xl lg:max-w-4xl mx-auto pt-20">

    <div id="app" class="h-full">
      @yield('content')
    </div>

    <!--Tags -->
    <div class="text-base md:text-sm text-gray-500 px-4 py-6">
      Tags: <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a> . <a href="#"
        class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a>
    </div>

    <!--Divider-->
    <hr class="border-b-2 border-gray-400 mb-8 mx-4">


    <!--Subscribe-->
    <div class="container px-4">
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
    </div>
    <!-- /Subscribe-->



    <!--Author-->
    <div class="flex w-full items-center font-sans px-4 py-12">
      <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
      <div class="flex-1 px-2">
        <p class="text-base font-bold text-base md:text-xl leading-none mb-2">Jo Bloggerson</p>
        <p class="text-gray-600 text-xs md:text-base">Minimal Blog Tailwind CSS template by <a
            class="text-green-500 no-underline hover:underline"
            href="https://www.tailwindtoolbox.com">TailwindToolbox.com</a></p>
      </div>
      <div class="justify-end">
        <button
          class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Read
          More</button>
      </div>
    </div>
    <!--/Author-->

    <!--Divider-->
    <hr class="border-b-2 border-gray-400 mb-8 mx-4">

    <!--Next & Prev Links-->
    <div class="font-sans flex justify-between content-center px-4 pb-12">
      <div class="text-left">
        <span class="text-xs md:text-sm font-normal text-gray-600">&lt; Previous Post</span><br>
        <p><a href="#"
            class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog
            title</a></p>
      </div>
      <div class="text-right">
        <span class="text-xs md:text-sm font-normal text-gray-600">Next Post &gt;</span><br>
        <p><a href="#"
            class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog
            title</a></p>
      </div>
    </div>


    <!--/Next & Prev Links-->

  </div>
  <!--/container-->

  <footer class="bg-white border-t border-gray-400 shadow">
    <div class="container max-w-4xl mx-auto flex py-8">

      <div class="w-full mx-auto flex flex-wrap">
        <div class="flex w-full md:w-1/2 ">
          <div class="px-8">
            <h3 class="font-bold text-gray-900">About</h3>
            <p class="py-4 text-gray-600 text-sm">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id
              erat. Suspendisse consectetur dapibus velit ut lacinia.
            </p>
          </div>
        </div>

        <div class="flex w-full md:w-1/2">
          <div class="px-8">
            <h3 class="font-bold text-gray-900">Social</h3>
            <ul class="list-reset items-center text-sm pt-3">
              <li>
                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                  href="#">Add social link</a>
              </li>
              <li>
                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                  href="#">Add social link</a>
              </li>
              <li>
                <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1"
                  href="#">Add social link</a>
              </li>
            </ul>
          </div>
        </div>
      </div>



    </div>
  </footer>

  @stack('scripts')
</body>
{{-- <body class="bg-ash-gray">
  <div class="md:flex flex-col md:flex-row min-h-full w-full">
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
  <footer>copy rights by LaraNote App</footer>

  @stack('scripts')
</body> --}}

</html>