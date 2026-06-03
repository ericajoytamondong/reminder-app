@extends('layouts.auth')

@section('title', 'Login')
@section('subtitle', "Welcome back! Please login to your account.")

@section('content')
<h3 class="fw-bold mb-4 text-center text-dark" style="letter-spacing: -0.5px;">Login</h3>

<form action="{{ route('login.perform') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
        @error('email')
            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
            <input type="password" name="password" id="password_input" class="form-control" placeholder="Enter your password" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" required>
            <span class="input-group-text" onclick="togglePasswordVisibility('password_input', this)">
                <i class="fa-regular fa-eye"></i>
            </span>
        </div>
        @error('password')
            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
        @enderror
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4" style="font-size: 0.9rem;">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember_check">
            <label class="form-check-label text-muted" for="remember_check">Remember me</label>
        </div>
        <a href="#" class="text-pink text-decoration-none fw-semibold">Forgot password?</a>
    </div>

    <button type="submit" class="btn btn-pink mb-4">Login</button>

    <div class="text-center text-muted" style="font-size: 0.9rem;">
        Don't have an account? <a href="{{ route('register') }}" class="text-pink text-decoration-none fw-bold">Register here</a>
    </div>
</form>
@endsection