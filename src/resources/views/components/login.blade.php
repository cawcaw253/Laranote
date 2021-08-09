<div class="w-full flex flex-wrap">

	<!-- Image Section -->
	<div class="w-1/2 shadow-2xl">
		<img class="object-cover w-full h-screen hidden lg:block" src="https://source.unsplash.com/IXUM4cJynP0">
	</div>

	<!-- Login Section -->
	<div class="w-full lg:w-1/2 flex flex-col">

		<div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
			<a href="#" class="bg-black text-white font-bold text-xl p-4">LaraNote</a>
		</div>

		<div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
			<p class="text-center text-3xl">Welcome.</p>
			{{-- <form class="mt-6" action="{{ route('auth.login') }}" method="POST">
			@csrf
			<div>
				<label class="block text-gray-700">Email Address</label>
				<input type="email" name="email" id="email" placeholder="Enter Email Address"
					class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red focus:bg-white focus:outline-none"
					value="{{ old('email') }}" autofocus autocomplete required>
			</div>

			<div class="mt-4">
				<label class="block text-gray-700">Password</label>
				<input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red
							focus:bg-white focus:outline-none" required>
			</div>

			<button type="submit" class="w-full block bg-vermilion-red hover:bg-vermilion-red-lighter focus:bg-vermilion-red-lighter text-white font-semibold rounded-lg
						px-4 py-3 mt-6">Log In</button>
			</form> --}}

			<form class="flex flex-col pt-3 md:pt-8" action="{{ route('auth.login') }}" method="POST">
				@csrf
				<div class="flex flex-col pt-4">
					<label for="email" class="text-lg">Email</label>
					<input type="email" id="email" placeholder="your@email.com"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-roman-silver mt-1 leading-tight focus:outline-none focus:shadow-outline"
						value="{{ old('email') }}" autofocus autocomplete required>
				</div>

				<div class="flex flex-col pt-4">
					<label for="password" class="text-lg">Password</label>
					<input type="password" id="password" placeholder="Password"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-roman-silver mt-1 leading-tight focus:outline-none focus:shadow-outline">
				</div>

				<button type="submit"
					class="bg-laravel-red text-white font-bold text-lg hover:bg-laravel-red-lighter p-2 mt-8">
					Log In
				</button>
			</form>
			<div class="text-center pt-12 pb-12">
				<p>Don't have an account? <a href="/register" class="underline font-semibold">Register here.</a></p>
			</div>
		</div>

	</div>
</div>



{{-- <div class="w-full h-100">
	@if (session('success'))
	<div class="flex justify-center pt-5">
		<div class="w-full py-3 px-5 bg-green-100 text-green-900 text-sm rounded-md border border-green-200"
			role="alert">
			{{ session('success') }}
</div>
</div>
@elseif (session('error'))
<div class="flex justify-center pt-5">
	<div class="w-full py-3 px-5 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
		{{ session('error') }}
	</div>
</div>
@elseif (count($errors) > 0)
<div class="flex justify-center pt-5">
	<div class="w-full py-3 px-5 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif

<h1 class="text-xl md:text-2xl text-vermilion-red font-bold rounded-lg leading-tight mt-8">Welcome to LaraNote</h1>
<form class="mt-6" action="{{ route('auth.login') }}" method="POST">
	@csrf
	<div>
		<label class="block text-gray-700">Email Address</label>
		<input type="email" name="email" id="email" placeholder="Enter Email Address"
			class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red focus:bg-white focus:outline-none"
			value="{{ old('email') }}" autofocus autocomplete required>
	</div>

	<div class="mt-4">
		<label class="block text-gray-700">Password</label>
		<input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red
				focus:bg-white focus:outline-none" required>
	</div>

	<button type="submit" class="w-full block bg-vermilion-red hover:bg-vermilion-red-lighter focus:bg-vermilion-red-lighter text-white font-semibold rounded-lg
			px-4 py-3 mt-6">Log In</button>
</form>

<p class="mt-8">
	Need an account?
	<a href="/register" class="text-vermilion-red hover:text-vermilion-red-lighter font-semibold">
		Create an account
	</a>
</p>
</div> --}}