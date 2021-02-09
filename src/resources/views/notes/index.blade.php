@extends('layouts.note')

@section('content')
<!-- component -->
<div class="my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
  {{-- Search Box --}}
  <div
    class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-sm px-12">
    <div class="flex justify-between">
      <div class="flex flex-wrap">
        <div class="relative mx-auto text-gray-600 pt-2">
          <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type="search" name="search" placeholder="Search">
          <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
              viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
              width="512px" height="512px">
              <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
          </button>
        </div>
      </div>
      <div class="flex pt-3 pb-1">
        <a href="{{ route('notes.create') }}"
          class="inline-block text-sm ml-2 mr-2 px-5 py-2 leading-none border rounded text-red-500 border-red-500 hover:text-red-600 mt-4 md:mt-0">
          Posting
        </a>
      </div>
    </div>
  </div>

  {{-- Note List --}}
  <div class="inline-block min-w-full bg-white px-8 py-5 flex flex-col flex-wrap">
    <table class="table-fixed min-w-full w-full">
      <thead>
        <tr class="border-b-2 border-gray-300 text-left leading-4 text-hot-orange tracking-wider">
          <th class="w-1/2 px-6 pb-3">Title</th>
          <th class="w-2/6 px-6 pb-3">Tags</th>
          <th class="w-1/6 px-6 pb-3">Created At</th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($notes as $note)
        <tr class="hover:bg-ash-gray" data-url="http://www.google.com">
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
            <a href="{{ route('notes.show', $note->id) }}">
              {{ $note->title }}
            </a>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
            <span class="text-sm font-medium bg-green-100 py-1 px-2 rounded text-green-500 align-middle">test 1</span>
            <span class="text-sm font-medium bg-red-100 py-1 px-2 rounded text-red-500 align-middle">test 2</span>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
            {{ \Carbon\Carbon::parse($note->created_at)->format('Y-m-d') }}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-4 mx-3">
      {{ $notes->links() }}
    </div>
  </div>
</div>
@stop

@push('scripts')
@endpush