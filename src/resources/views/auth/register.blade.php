@extends('layouts.default')

@section('content')
<div class="flex justify-center py-5">
    @if ($message = Session::get('error'))
        {{ $message }}
    @endif

    <x-register />
</div>
@stop
