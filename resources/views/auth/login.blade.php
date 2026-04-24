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

    .btn-primary, .btn-dark {
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

    .nav-tabs .nav-link {
      border-radius: 10px;
      font-weight: 600;
    }
  </style>
</head>

<body>

<div class="col-md-4">
  <div class="card login-card shadow-lg">
    <div class="card-body">

      <!-- Logo -->
      <div class="text-center mb-4">
        <div class="logo">Jinlong PMS</div>
        <div class="subtitle">Property Management System</div>
      </div>

      <!-- Tabs -->
      <ul class="nav nav-tabs mb-3" id="loginTab" role="tablist">
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link active w-100" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button">
            Admin
          </button>
        </li>
        <li class="nav-item w-50" role="presentation">
          <button class="nav-link w-100" id="tenant-tab" data-bs-toggle="tab" data-bs-target="#tenant" type="button">
            Tenant
          </button>
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content">

        
        <div class="tab-pane fade show active" id="admin">
          <h5 class="text-center mb-3">Admin Login</h5>

          <form method="POST" action="{{ url('/admin/login') }}">
            @csrf

            <input type="email" name="email" class="form-control mb-3" placeholder="Admin Email" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button class="btn btn-primary w-100">Login as Admin</button>
          </form>
        </div>

        
        <div class="tab-pane fade" id="tenant">
          <h5 class="text-center mb-3">Tenant Login</h5>

          <form method="POST" action="{{ url('/tenant/login') }}">
            @csrf

            <input type="email" name="email" class="form-control mb-3" placeholder="Tenant Email" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button class="btn btn-dark w-100">Login as Tenant</button>
          </form>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS (REQUIRED for tabs) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>