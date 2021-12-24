@extends('layouts.auth')

@section('content')
<div class="w-full flex flex-wrap">

    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen hidden lg:block" src="{{ url('/images/top/top.jpg') }}">
    </div>

    <!-- Login Section -->
    <div class="w-full lg:w-1/2 flex flex-col">

        <div class="flex justify-center lg:justify-start pt-12 lg:pl-12 lg:-mb-24">
            <a href="#" class="text-laravel-red hover:text-laravel-red-lighter font-bold text-3xl p-4">LaraNote</a>
        </div>

        <div class="flex flex-col justify-center lg:justify-start my-auto pt-8 lg:pt-0 px-8 lg:px-20 xl:px-32">
            <p class="text-center text-3xl">Merry Christmas !!!</p>
            @if (session()->has('isRequested'))
            <div class="flex justify-center pt-3 lg:pt-8">
                <div class="w-full py-3 px-5 bg-green-100 text-green-900 text-sm rounded-md border border-green-200"
                    role="alert">
                    {{ session()->get('isRequested') }}
                </div>
            </div>
            @endif
            <div id="auth">
                <login-page-component login-url="{{ route('auth.login') }}" />
            </div>
            <div class="text-center pt-12 pb-12">
                <p>Don't have an account?
                    <a href="{{ route('auth.register.view') }}" class="underline font-semibold">Register here.</a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop