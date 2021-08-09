<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraNote Home</title>
    <meta name="subject" content="laravel note">

    <!-- Scripts -->
    <script src="{{ mix('js/vue/auth.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white h-screen">
    <div class="w-full flex flex-wrap">

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden lg:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>

        <!-- Login Section -->
        <div class="w-full lg:w-1/2 flex flex-col">

            <div class="flex justify-center lg:justify-start pt-12 lg:pl-12 lg:-mb-24">
                <a href="#" class="text-laravel-red font-bold text-3xl p-4">LaraNote</a>
            </div>

            <div class="flex flex-col justify-center lg:justify-start my-auto pt-8 lg:pt-0 px-8 lg:px-20 xl:px-32">
                <p class="text-center text-3xl">Welcome</p>
                <div id="auth">
                    <login-page-component login-url="{{ route('auth.login') }}" />
                </div>
                <div class="text-center pt-12 pb-12">
                    <p>Don't have an account?
                        <a href="{{ route('auth.register.view') }}" class="underline font-semibold">Register here.</a>
                    </p>
                </div>
            </div>

        </div>
    </div>

    @stack('scripts')
</body>

</html>