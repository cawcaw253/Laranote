<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraNote Home</title>
  <meta name="subject" content="laravel note">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white h-screen">

  <nav id="header" class="note-layout-body-header">
    <div class="header-container">
      <a class="title" href="{{ route('notes.index') }}">
        LaraNote
      </a>
    </div>
  </nav>

  <div class="note-layout-body-contents">
    <div id="app" class="note-container">
      @yield('content')
    </div>
  </div>

</body>

<footer class="note-layout-body-footer">
  <div class="footer-container">
    <div class="contents">

      <div class="contents-item">
        <div>
          <h3>About</h3>
          <p>
            LaraNote is my personal project based on laravel
            you can email to me from <a href="mailto:" . {{ config('laranote.info.github') }}>Here</a>
          </p>
        </div>
      </div>

      <div class="contents-item">
        <div>
          <h3>Social</h3>
          <ul>
            <li>
              <a href="{{ config('laranote.info.github') }}">my GitHub profile</a>
            </li>
            <li>
              <a href="{{ config('laranote.info.instagram') }}">my Instagram</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</footer>

@stack('scripts')

</html>