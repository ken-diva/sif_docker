<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mazer Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('dist/assets/css/main/app.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/assets/css/pages/auth.css') }}">
  <link rel="shortcut icon" href="{{ asset('dist/assets/images/logo/favicon-telu.png') }}">
  <script defer src="{{ asset('dist/assets/js/app.js') }}"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>

</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="mb-5">
            <img src="{{ asset('dist/assets/images/logo/logo-fif-2.png') }}" alt="Logo" width="70%">
          </div>

          <h1 class="auth-title">Log in.</h1>
          @if (session()->has('status'))
            <p class="auth-subtitle mb-5 text-danger">Login Gagal!</p>
          @else
            <p class="auth-subtitle mb-5">Login menggunakan SSO</p>
          @endif

          <div x-data="{ submitting: false }">
            <form action="/login" method="POST">
              @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('username') is-invalid @enderror"
                  placeholder="Username" name="username" value="{{ old('username') }}">
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
                @error('username')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                  placeholder="Password" name="password" value="{{ old('username') }}">
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit"
                x-on:click="submitting = true" x-bind:disabled="submitting">
                <span x-show="!submitting">Login</span>
                <span x-show="submitting" class="spinner-border spinner-border-sm" role="status"
                  aria-hidden="true"></span>
              </button>
            </form>
          </div>

        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>

  </div>
</body>

</html>
