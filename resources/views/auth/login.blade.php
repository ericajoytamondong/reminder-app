<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Reminder App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #fff0f5; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: sans-serif; }
        .login-container { width: 100%; padding: 20px; }
        .login-card { background: white; border-radius: 20px; padding: 30px; width: 100%; max-width: 420px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); margin: 0 auto; }
        .btn-pink { background-color: #ff3377; color: white; width: 100%; padding: 12px; border-radius: 10px; border: none; }
        .btn-pink:hover { background-color: #e02262; }
        .form-control { border-radius: 8px; padding: 12px; }
        .text-pink { color: #ff3377 !important; }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <div class="mb-2 text-pink fs-1"><i class="fa-solid fa-calendar-check"></i></div>
        <h2 class="text-pink fw-bold mb-1 fs-3">Reminder App</h2>
        <p class="text-muted small mb-4">Welcome back! Please login to your account.</p>

        <div class="login-card text-start">
            <h4 class="fw-bold mb-4 text-center text-dark fs-5">Login</h4>
            <form action="{{ route('login.perform') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted small">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                    @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted small">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-4 small">
                    <div>
                        <input type="checkbox" name="remember" id="rem"> 
                        <label for="rem" class="text-muted cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-pink text-decoration-none">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-pink fw-bold mb-3">Login</button>
                <div class="text-center small text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-pink text-decoration-none fw-bold">Register here</a></div>
            </form>
        </div>
    </div>
</body>
</html>