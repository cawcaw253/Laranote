@extends('layouts.default')

@section('content')

<div class="flex-col py-5">
    <div class="flex justify-center mb-5">
        <x-login />
    </div>
    @if (count($errors) > 0)
        <div class="flex justify-center mb-3">
            <div class="bg-red-300 border-l-4 border-red-600 text-orange-dark p-4" role="alert">
                <p class="font-bold">Be Warned</p>
                @if ($message = Session::get('error'))
                    <p>{{ $message }}</p>
                @endif
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@stop
