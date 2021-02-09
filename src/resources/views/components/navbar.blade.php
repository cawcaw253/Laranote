<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="antialiased bg-hot-orange">
  <div class="w-full text-hot-orange bg-cool-indigo">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="flex flex-row items-center justify-between p-4">
        <a href="{{ route('home') }}" class="text-xl tracking-widest font-bold text-hot-orange hover:text-red-600 rounded-lg focus:outline-none focus:shadow-outline">LaraNote</a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <!-- Menu List -->
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
        @if(auth()->check())
          <p class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:outline-none focus:shadow-outline">welcome {{ auth()->user()->name }} !!</p>
        @else
          <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:outline-none focus:shadow-outline" href="#">About</a>
          <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:outline-none focus:shadow-outline" href="#">Contact</a>
        @endif
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
          <button @click="open = !open" class="flex flex-row text-hot-orange bg-ash-gray items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 focus:text-hot-orange focus:bg-ash-gray focus:outline-none focus:shadow-outline">
            <span>Service</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
          <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right z-50">
            <div class="px-2 pt-2 pb-4 bg-ash-gray rounded-md shadow-lg">
              @if(auth()->check())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <a class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('notes.index') }}">
                  <div class="bg-hot-orange text-white rounded-lg p-3">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                  </div>
                  <div class="ml-3">
                      <p class="font-semibold">Note</p>
                      <p class="text-sm text-gray-600">enjoy laranote</p>
                  </div>
                  </a>

                  <a class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('auth.logout') }}">
                  <div class="bg-hot-orange text-white rounded-lg p-3">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                  </div>
                  <div class="ml-3">
                      <p class="font-semibold">Logout</p>
                      <p class="text-sm text-gray-600">see you later</p>
                  </div>
                  </a>

                  <!-- <a class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                  <div class="bg-hot-orange text-white rounded-lg p-3">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 16 16" class="md:h-6 md:w-6 h-4 w-4"><path d="M 8 2 C 6.347656 2 5 3.347656 5 5 C 5 6.652344 6.347656 8 8 8 C 9.652344 8 11 6.652344 11 5 C 11 3.347656 9.652344 2 8 2 Z M 8 8 C 5.246094 8 3 10.246094 3 13 L 4 13 C 4 10.785156 5.785156 9 8 9 C 10.214844 9 12 10.785156 12 13 L 13 13 C 13 10.246094 10.753906 8 8 8 Z M 8 3 C 9.109375 3 10 3.890625 10 5 C 10 6.109375 9.109375 7 8 7 C 6.890625 7 6 6.109375 6 5 C 6 3.890625 6.890625 3 8 3 Z"></path></svg>
                  </div>
                  <div class="ml-3">
                      <p class="font-semibold">Account</p>
                      <p class="text-sm text-gray-600">Check your account</p>
                  </div>
                  </a> -->
                </div>
              @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <a class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-red-600 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('auth.login') }}">
                  <div class="bg-hot-orange text-white rounded-lg p-3">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                  </div>
                  <div class="ml-3">
                      <p class="font-semibold">Login</p>
                      <p class="text-sm text-gray-600">welcome to laranote!</p>
                  </div>
                  </a>

                  <a class="flex flex row items-start rounded-lg bg-transparent p-2 hover:text-red-600 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('auth.register') }}">
                  <div class="bg-hot-orange text-white rounded-lg p-3">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                  </div>
                  <div class="ml-3">
                      <p class="font-semibold">Register</p>
                      <p class="text-sm text-gray-600">easy register and experience laranote!</p>
                  </div>
                  </a>
                </div>
              @endif
            </div>
          </div>
        </div>    
      </nav>
    </div>
  </div>
</div>