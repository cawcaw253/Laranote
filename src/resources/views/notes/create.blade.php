@extends('layouts.note')

@section('content')

<note-editor-component post-url="{{ route('notes.store') }}" image-upload-url="{{ route('image.store') }}"
    :prop-tag-list='{!! json_encode($tagList) !!}' />

@stop