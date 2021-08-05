<div class="w-full h-100">
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


    <h1 class="text-xl md:text-2xl text-vermilion-red font-bold rounded-lg leading-tight mt-8">Register
    </h1>
    <form class="mt-6" method="POST">
        @csrf
        <div>
            <label class="block text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Enter Email Address"
                class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red focus:bg-white focus:outline-none"
                value="{{ old('email') }}" autofocus autocomplete required>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red
				focus:bg-white focus:outline-none" value="{{ old('name') }}" required>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red
				focus:bg-white focus:outline-none" required>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700">Password Confirm</label>
            <input type="password" name="confirm" id="confirm" placeholder="********" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-vermilion-red
				focus:bg-white focus:outline-none" required>
        </div>

        <button type="submit" class="w-full block bg-vermilion-red hover:bg-vermilion-red-darker focus:bg-vermilion-red-darker text-white font-semibold rounded-lg
			px-4 py-3 mt-6">Register</button>
    </form>

    <p class="mt-8">
        Already have account?
        <a href="/" class="text-vermilion-red hover:text-vermilion-red-darker font-semibold">
            Log In page
        </a>
    </p>
</div>