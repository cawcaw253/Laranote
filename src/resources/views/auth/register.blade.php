@extends('layouts.default')

@section('content')
@if (session('success'))
<div class="flex justify-center pt-5">
    <div class="py-3 px-5 bg-green-100 text-green-900 text-sm rounded-md border border-green-200" role="alert">
        {{ session('success') }}
    </div>
</div>
@elseif (session('error'))
<div class="flex justify-center pt-5">
    <div class="py-3 px-5 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
        {{ session('error') }}
    </div>
</div>
@elseif (count($errors) > 0)
<div class="flex justify-center pt-5">
    <div class="py-3 px-5 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<div class="flex justify-center py-4">
    <x-register />
</div>
@stop