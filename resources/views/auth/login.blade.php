<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Jinlong PMS</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      height: 100vh;
      background: linear-gradient(135deg, #4f46e5, #3b82f6);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
    }

    .login-card .card-body {
      padding: 2rem;
    }

    .form-control {
      border-radius: 10px;
      padding: 10px;
    }

    .btn-primary {
      border-radius: 10px;
      padding: 10px;
      font-weight: 600;
    }

    .logo {
      font-size: 22px;
      font-weight: bold;
      color: #4f46e5;
    }

    .subtitle {
      font-size: 14px;
      color: #6c757d;
    }
  </style>
</head>

<body>

  <div class="col-md-4">
    
    <div class="card login-card shadow-lg">
      <div class="card-body">

        <!-- Logo / Title -->
        <div class="text-center mb-4">
          <div class="logo">Jinlong PMS</div>
          
          <div class="subtitle">Property Management System</div>
        </div>

        <h4 class="text-center mb-4">Sign in to your account</h4>
        <div class="text-center mb-3">
  <button class="btn btn-outline-primary btn-sm me-2" onclick="setRole('admin')">Admin</button>
  <button class="btn btn-outline-secondary btn-sm" onclick="setRole('tenant')">Tenant</button>
</div>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
          </div>

          <div class="d-flex justify-content-between mb-3">
            <div>
              <input type="checkbox" id="remember">
              <label for="remember">Remember</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot?</a>
          </div>

          <button type="submit" class="btn btn-primary w-100">
            Login
          </button>
        </form>

      </div>
    </div>
  </div>

</body>
</html>