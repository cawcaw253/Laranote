@extends('layouts.note')

@section('content')
<div class="note-index">
  <table class="note-index-table">
    <thead>
      <tr>
        <th class="w-2/3 md:w-2/4">Title</th>
        <th class="w-1/3 lg:w-1/4">Tags</th>
        <th class="hidden md:table-cell w-1/4">Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($notes as $note)
      <tr>
        <td class="w-2/3 md:w-2/5">
          <a href="{{ route('notes.show', $note->id) }}">
            {{ $note->title }}
          </a>
        </td>
        <td class="w-1/3 md:w-2/5">
          @foreach ($note->tags as $tag)
          <span class="inline-block my-0.5 text-sm"
            style="background-color: {!! $tag->color_code !!}; color: {!! $tag->contrast_font_color !!};">{{ $tag->title }}</span>
          @endforeach
        </td>
        <td class="hidden md:table-cell w-1/5">
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