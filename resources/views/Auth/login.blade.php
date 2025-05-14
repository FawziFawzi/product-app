<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ShopEase</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: white;
        }
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .auth-header h2 {
            color: #333;
            font-weight: 600;
        }
        .auth-logo {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 15px;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn-auth {
            padding: 10px;
            font-weight: 500;
        }
        .auth-footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider-text {
            padding: 0 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-logo">
                <i class="bi bi-shop"></i> Ecommerce Shop
            </div>
            <h2>Sign In to Your Account</h2>
            <p class="text-muted">Enter your credentials to access your account</p>
        </div>

        <form Action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password"  class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>

            </div>

            <button type="submit" class="btn btn-primary btn-auth w-100">Sign In</button>

            <div class="divider">
                <span class="divider-text">OR</span>
            </div>

            <div class="auth-footer">
                Don't have an account? <a href="{{ route('register.show') }}" class="text-decoration-none">Sign up</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
