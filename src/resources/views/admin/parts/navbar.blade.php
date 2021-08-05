<div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-azure-blue flex-shrink"
  x-data="{ open: false }">
  <div class="md:h-screen">
    <div class="flex-shrink px-8 py-4 flex flex-row items-center justify-between">
      <a href="{{ route('admin.user.index') }}"
        class="text-xl tracking-widest text-vermilion-red font-bold rounded-lg hover:text-vermilion-red-darker">
        AdmiN
      </a>
      <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'block': open, 'hidden': !open}"
      class="flex flex-grow flex-col md:h-3/4 md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
      <a class="block px-4 py-2 mt-2 text-sm font-semibold text-vermilion-red bg-transparent rounded-lg hover:text-vermilion-red-darker hover:bg-gray-200"
        href="{{ route('admin.user.index') }}">Users</a>
      <a class="block px-4 py-2 mt-2 text-sm font-semibold text-vermilion-red bg-transparent rounded-lg hover:text-vermilion-red-darker hover:bg-gray-200"
        href="{{ route('admin.tag.index') }}">Tags</a>
      <a class="block px-4 py-2 mt-2 text-sm font-semibold text-vermilion-red bg-transparent rounded-lg hover:text-vermilion-red-darker hover:bg-gray-200"
        href="{{ route('admin.migration.index') }}">Migrations</a>
    </nav>
    <nav :class="{'block': open, 'hidden': !open}"
      class="flex flex-grow flex-col-reverse md:block px-4 pb-6 md:pb-6 md:overflow-y-auto">
      <a class="block px-4 py-2 text-sm font-semibold text-vermilion-red bg-transparent rounded-lg hover:text-vermilion-red-darker hover:bg-gray-200"
        href="{{ route('admin.auth.logout') }}">
        <div class="flex justify-between items-center">
          <span>Logout</span>
          <ion-icon name="log-out-outline"></ion-icon>
        </div>
      </a>
    </nav>
  </div>
</div>