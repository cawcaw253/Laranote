@extends('layouts.note')

@section('content')

<note-viewer-component class="w-full" title="{{ $note->title }}" contents="{{ $note->contents }}"
  :tags='{!! json_encode($note->tags) !!}' created-at="{{ $note->created_at->format('Y-m-d') }}"
  updated-at="{{ $note->updated_at->format('Y-m-d') }}" />

@stop