@extends('layouts.default')

@section('content')

<div class="h-screen w-screen flex justify-center content-center flex-wrap">
    <p class="font-sans text-laravel-red error-text">403</p>
</div>

<div class="absolute w-screen bottom-0 mb-6 text-laravel-red text-center font-sans text-xl">
    <span class="opacity-50">Forbidden</span>
</div>

<style>
    .error-text {
        font-size: 130px;
    }

    @media (min-width: 768px) {
        .error-text {
            font-size: 220px;
        }
    }
</style>
@stop