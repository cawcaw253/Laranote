@extends('layouts.admin')

@section('content')
<div id="tag-list" x-data="{ showModal: false }">
    @if (session('error'))
    <div class="flex items-center bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md mb-2">
        <div class="text-red-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd"
                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
            </svg>
        </div>
        <div class="text-white max-w-xs ">
            {{ session('error') }}
        </div>
    </div>
    @elseif(session('success'))
    <div class="flex items-center bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
        <div class="text-green-500 rounded-full bg-white mr-3">
            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg>
        </div>
        <div class="text-white max-w-xs ">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="flex-col py-5">
        <div class="text-gray-900 bg-gray-200">
            <div class="p-4 flex justify-between">
                <h1 class="text-3xl">
                    Migrations
                </h1>
                <form method="POST" ref="migration_form" class="mb-0">
                    @csrf
                    <button
                        class="focus:outline-none px-4 bg-hot-orange p-2 ml-3 rounded-lg text-white hover:bg-hot-orange-darker"
                        type="submit">
                        Migrate
                    </button>
                </form>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">ID</th>
                            <th class="text-left p-3 px-5">Migration</th>
                            <th class="text-left p-3 px-5">Batch</th>
                        </tr>
                        @foreach ($migrations as $migration)
                        <tr class="border-b hover:bg-gray-200 bg-gray-100">
                            <td class="p-2 px-5">{{ $migration->id }}</td>
                            <td class="p-2 px-5">{{ $migration->migration }}</td>
                            <td class="p-2 px-5">{{ $migration->batch }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop