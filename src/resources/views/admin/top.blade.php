@extends('layouts.admin')

@section('content')

<div class="flex-col py-5">
  <h2>Login Success !!</h2>
  <p>{{ Auth::guard('admin')->user() }}</p>
</div>

@stop