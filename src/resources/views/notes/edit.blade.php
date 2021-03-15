@extends('layouts.note')

@push('headers')
<script src="{{ mix('js/vue/notes/editor.js') }}" defer></script>
@endpush

@section('content')

<section>
  <note-editor-component prop-title="{{ $note->title }}" prop-contents="{{ $note->contents }}"
    :prop-tags='{!! json_encode($note->tags) !!}' post-url="{{ route('notes.update', $note->id) }}"
    :prop-tag-list='{!! json_encode($tagList) !!}' />
</section>

@stop