@extends('layouts.auth')

@section('title', 'Register')
@section('subtitle', "Create your account to get started.")

@section('content')
<h3 class="fw-bold mb-4 text-center text-dark" style="letter-spacing: -0.5px;">Register</h3>

<form action="{{ route('register.perform') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
        @error('name')
            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
        @enderror
    </div>
    
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
            <input type="password" name="password" id="register_password" class="form-control" placeholder="Enter your password" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" required>
            <span class="input-group-text" onclick="togglePasswordVisibility('register_password', this)">
                <i class="fa-regular fa-eye"></i>
            </span>
        </div>
        @error('password')
            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="form-label">Confirm Password</label>
        <div class="input-group">
            <input type="password" name="password_confirmation" id="register_password_confirmation" class="form-control" placeholder="Confirm your password" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" required>
            <span class="input-group-text" onclick="togglePasswordVisibility('register_password_confirmation', this)">
                <i class="fa-regular fa-eye"></i>
            </span>
        </div>
    </div>

    <button type="submit" class="btn btn-pink mb-4">Register</button>

    <div class="text-center text-muted" style="font-size: 0.9rem;">
        Already have an account? <a href="{{ route('login') }}" class="text-pink text-decoration-none fw-bold">Login here</a>
    </div>
</form>
@endsection