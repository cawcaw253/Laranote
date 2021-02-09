@extends('layouts.components.navbar')

@section('menus')
<p class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 focus:outline-none focus:shadow-outline">welcome {{ $user->name }} !!</p>

<div @click.away="open = false" class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex flex-row text-hot-orange bg-ash-gray items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 focus:text-hot-orange focus:bg-ash-gray focus:outline-none focus:shadow-outline">
    <span>Service</span>
    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right z-50">
    <div class="px-2 pt-2 pb-4 bg-ash-gray rounded-md shadow-lg">
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
        </div>
    </div>
    </div>
</div>    
@stop