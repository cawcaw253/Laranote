@extends('layouts.note')

@push('headers')
<script src="{{ mix('js/vue/notes/viewer.js') }}" defer></script>
@endpush

@section('content')

<section>
  <div class="flex space-x-4 w-full">
    <div class="flex-grow">
      <note-viewer-component title="{{ $note->title }}" contents="{{ $note->contents }}"
        created-at="{{ $note->created_at->format('Y-m-d') }}" updated-at="{{ $note->updated_at->format('Y-m-d') }}" />
    </div>
    <div class="flex-shrink">
      <note-controlbar-component :csrf="{{ json_encode(csrf_token()) }}" index-url="{{ route('notes.index') }}"
        edit-url="{{ route('notes.edit', $note->id) }}" destroy-url="{{ route('notes.destroy', $note->id) }}" />
    </div>
  </div>
</section>

@stop