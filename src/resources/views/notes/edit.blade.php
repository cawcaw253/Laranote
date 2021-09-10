@extends('layouts.note')

@section('content')

<note-editor-component prop-title="{{ $note->title }}" prop-contents="{{ $note->contents }}"
  :prop-tags='{!! json_encode($note->tags) !!}' post-url="{{ route('notes.update', $note->id) }}"
  image-upload-url="{{ route('image.store') }}" :prop-tag-list='{!! json_encode($tagList) !!}' />

@stop