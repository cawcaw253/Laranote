@extends('layouts.note')

@push('headers')
<script src="{{ mix('js/vue/notes/editor.js') }}" defer></script>
@endpush

@section('content')

<section>
  <note-editor-component post-url="{{ route('notes.store') }}" :prop-tag-list='{!! json_encode($tagList) !!}' />
</section>

@stop