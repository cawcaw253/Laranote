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
            <p class="text-center text-3xl">Join Us</p>
            <div id="auth">
                <register-page-component register-url="{{ route('auth.register') }}" />
            </div>
            <div class="text-center pt-12 pb-12">
                <p>Already have an account?
                    <a href="{{ route('auth.login.view') }}" class="underline font-semibold">Log in here.</a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop