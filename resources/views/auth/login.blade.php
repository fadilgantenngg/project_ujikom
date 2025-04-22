<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Asset Styles -->
  <link rel="icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

  <style>
    body {
      background: linear-gradient(to right, #4f9de1, #2d70a1);
      font-family: 'Arial', sans-serif;
    }

    .auth-card {
      background: #fff;
      border-radius: 10px;
      padding: 2rem;
      max-width: 400px;
      margin: 10vh auto;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      border-top: 5px solid #2d70a1;
    }

    .auth-card h4 {
      color: #2d70a1;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
    }

    .auth-card p {
      color: #666;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-label {
      font-weight: 500;
      margin-bottom: 5px;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #ccc;
      padding: 10px;
      font-size: 14px;
    }

    .form-control:focus {
      border-color: #2d70a1;
      box-shadow: 0 0 5px rgba(45,112,161,0.3);
    }

    .btn-primary {
      background-color: #2d70a1;
      border: none;
      width: 100%;
      padding: 12px;
      font-weight: 600;
      border-radius: 8px;
      margin-top: 1rem;
    }

    .btn-primary:hover {
      background-color: #255a87;
    }

    .text-link {
      text-align: center;
      margin-top: 1.2rem;
    }

    .text-link a {
      color: #2d70a1;
      text-decoration: none;
      font-weight: 600;
    }

    .text-link a:hover {
      text-decoration: underline;
    }

    .form-check-label {
      font-size: 14px;
      color: #555;
    }

    .invalid-feedback {
      font-size: 13px;
      color: red;
    }
  </style>
</head>
<body>

  <div class="auth-card">
    <h4>Welcome Back! 👋</h4>
    <p>Please login to continue</p>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               class="form-control @error('email') is-invalid @enderror"
               id="email" name="email"
               value="{{ old('email') }}" required autofocus
               placeholder="you@example.com">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               class="form-control @error('password') is-invalid @enderror"
               id="password" name="password"
               required placeholder="••••••••">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember"
               {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
          Remember Me
        </label>
      </div>

      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>

    <div class="text-link">
      <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>
  </div>

  <!-- JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
</body>
</html>
