<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ShopEase</title>
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
            margin: 60px auto;
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
        .password-strength {
            height: 5px;
            background-color: #e9ecef;
            margin-top: 5px;
            border-radius: 3px;
            overflow: hidden;
        }
        .password-strength-bar {
            height: 100%;
            width: 0%;
            background-color: #dc3545;
            transition: width 0.3s ease, background-color 0.3s ease;
        }
        .form-floating label {
            padding: 1rem 0.75rem;
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
                <i class="bi bi-shop"></i> ShopEase
            </div>
            <h2>Create Your Account</h2>
            <p class="text-muted">Join us to start shopping</p>
        </div>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="row g-3 mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="firstName" placeholder="name" required>
                        <label for="firstName">First name</label>
                    </div>

            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email address" required>
                    <label for="email">Email address</label>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

            </div>

            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
                    <label for="confirmPassword">Confirm password</label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary btn-auth w-100 mb-3">Create Account</button>

            <div class="auth-footer">
                Already have an account? <a href="login.html" class="text-decoration-none">Sign in</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Password Strength Indicator -->
<script>
    const passwordInput = document.getElementById('password');
    const strengthBar = document.getElementById('passwordStrength');

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;

        // Length check
        if (password.length >= 8) strength += 25;
        if (password.length >= 12) strength += 25;

        // Contains number
        if (/\d/.test(password)) strength += 25;

        // Contains special char
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 25;

        // Update strength bar
        strengthBar.style.width = strength + '%';

        // Change color based on strength
        if (strength < 50) {
            strengthBar.style.backgroundColor = '#dc3545'; // Red
        } else if (strength < 75) {
            strengthBar.style.backgroundColor = '#fd7e14'; // Orange
        } else {
            strengthBar.style.backgroundColor = '#28a745'; // Green
        }
    });
</script>
</body>
</html>
