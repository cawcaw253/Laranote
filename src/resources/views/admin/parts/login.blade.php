<div class="flex justify-center mb-5">
  <div class="w-full max-w-md">
    <div class="bg-azure-blue shadow-md rounded px-8 py-5">
      <div class="flex justify-center flex-shrink mb-2">
        <span class="font-bold text-3xl tracking-tight text-laravel-red">AdmiN</span>
      </div>
      <form method="POST">
        {{ csrf_field() }}
        <div class="mb-4">
          <label class="block text-gray-600 text-md font-bold mb-2" for="email">
            Email
          </label>
          <input name="email"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="email" type="email" placeholder="Email">
        </div>
        <div class="mb-3">
          <label class="block text-gray-600 text-md font-bold mb-2" for="password">
            Password
          </label>
          <input name="password"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="password" type="password" placeholder="********">
        </div>
        <div class="flex items-center justify-between">
          <button
            class="bg-laravel-red hover:bg-laravel-red-lighter text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</div>