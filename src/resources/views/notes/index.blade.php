@extends('layouts.note')

@section('content')
<div class="note-index">
  <table class="note-index-table">
    <thead>
      <tr>
        <th class="w-2/3 md:w-2/4">Title</th>
        <th class="w-1/3 md:w-1/4">Tags</th>
        <th class="hidden md:table-cell w-1/4">Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($notes as $note)
      <tr>
        <td class="w-2/3 md:w-2/4">
          <a href="{{ route('notes.show', $note->id) }}">
            {{ $note->title }}
          </a>
        </td>
        <td class="w-1/3 md:w-1/4">
          <span class="text-green-500 bg-green-100">test 1</span>
          <span class="text-red-500 bg-red-100">test 2</span>
        </td>
        <td class="hidden md:table-cell w-1/4">
          {{ \Carbon\Carbon::parse($note->created_at)->format('Y-m-d') }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="note-index-nav">
    {{ $notes->links() }}
  </div>
</div>
@stop

@push('scripts')
@endpush