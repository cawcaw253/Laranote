@extends('layouts.admin')

@section('content')

<div class="flex-col py-5">
	<div class="flex justify-center mb-5">
		@include('admin.parts.login')
	</div>

	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
</div>

@stop