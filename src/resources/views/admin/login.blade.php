@extends('layouts.admin')

@section('content')

<div class="flex-col py-5">

	@include('admin.parts.login')

	@if (session('error'))
	<div class="flex justify-center">
		<div
			class='flex justify-center items-center text-white max-w-sm bg-hot-orange shadow-md rounded-lg overflow-hidden mx-auto'>
			<div class='w-10 border-r px-2'>
				<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
					</path>
				</svg>
			</div>
			<div class='flex items-center px-2 py-3'>
				<div class='mx-3'>
					<p>{{ session('error') }}</p>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>

@stop