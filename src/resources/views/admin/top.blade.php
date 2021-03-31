<div class="flex-col py-5">
  <h2>Login Success !!</h2>
  <p>{{ Auth::guard('admin')->user() }}</p>
  <a href="{{ route('admin.auth.logout') }}">Logout</a>
</div>