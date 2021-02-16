@extends('layouts.note')

@push('headers')
<script src="{{ mix('js/vue/notes/viewer.js') }}" defer></script>
@endpush

@section('content')

<note-viewer-component class="w-full" title="{{ $note->title }}" contents="{{ $note->contents }}"
  created-at="{{ $note->created_at->format('Y-m-d') }}" updated-at="{{ $note->updated_at->format('Y-m-d') }}" />

@stop