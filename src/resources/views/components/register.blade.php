<div class="w-full max-w-md">
    <div class="bg-cool-indigo shadow-md rounded px-8 py-5">
        <div class="flex justify-center flex-shrink-0 mb-2">
            <span class="font-bold text-3xl tracking-tight text-hot-orange">Register</span>
        </div>
        <form method="POST">
            {{ csrf_field() }}
            <div class="mb-4">
                <label class="block text-gray-600 text-md font-bold mb-2" for="name">
                    Name
                </label>
                <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name">
            </div>
            <div class="mb-4">
                <label class="block text-gray-600 text-md font-bold mb-2" for="email">
                    Email
                </label>
                <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label class="block text-gray-600 text-md font-bold mb-2" for="password">
                    Password
                </label>
                <input name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="********">
            </div>
            <div class="mb-3">
                <label class="block text-gray-600 text-md font-bold mb-2" for="confirm">
                    Password Confirm
                </label>
                <input name="confirm" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="confirm" type="password" placeholder="********">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Register
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
