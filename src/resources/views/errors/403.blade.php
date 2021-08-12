@extends('layouts.default')

@section('content')

<div class="flex flex-col justify-center w-full mt-8">
    <div class="flex justify-center flex-wrap">
        <p class="font-sans text-laravel-red error-text">403</p>
    </div>

    <div class="flex justify-center">
        <span class="text-laravel-red text-center font-sans text-xl opacity-50">Forbidden</span>
    </div>
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