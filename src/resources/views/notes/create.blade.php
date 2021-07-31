@extends('layouts.note')

@section('content')

<section>
  <note-editor-component post-url="{{ route('notes.store') }}" :prop-tag-list='{!! json_encode($tagList) !!}' />
</section>

@stop