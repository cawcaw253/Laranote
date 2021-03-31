<div class="flex-col py-5">
	<h2>Admin Login</h2>
	<div class="flex justify-center mb-5">
		<x-login />
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