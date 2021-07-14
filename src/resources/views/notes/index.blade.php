@extends('layouts.note')

@section('content')
<div class="note-index">
  <table class="note-index-table">
    <thead>
      <tr>
        <th class="w-full md:w-2/4">Title</th>
        <th class="hidden md:table-cell w-1/3 lg:table-cell w-1/4">Tags</th>
        <th class="hidden md:table-cell w-1/4">Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($notes as $note)
      <tr>
        <td class="w-full md:w-2/5">
          <a href="{{ route('notes.show', $note->id) }}">
            <span class="inline-block text-sm">
              {{ $note->title }}
            </span>
          </a>
        </td>
        <td class="hidden md:table-cell w-2/5">
          @foreach ($note->tags as $tag)
          <span class="inline-block text-sm"
            style="background-color: {!! $tag->color_code !!}; color: {!! $tag->contrast_font_color !!};">{{ $tag->title }}</span>
          @endforeach
        </td>
        <td class="hidden md:table-cell w-1/5">
          <span class="inline-block text-sm">
            {{ \Carbon\Carbon::parse($note->created_at)->format('Y-m-d') }}
          </span>
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