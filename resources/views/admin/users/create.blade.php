@extends('layouts.app')

@section('content')
<div class="container-fluid px-0" style="max-width: 600px; margin: 0 auto;">
    <div class="mb-4">
        <a href="{{ route('users.index') }}" class="text-pink text-decoration-none small fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Users
        </a>
        <h2 class="fw-bold text-dark mt-2 h4">Add New User Account</h2>
    </div>

    <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 15px;">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">User Name</label>
                <input type="text" name="name" class="form-control py-2.5" placeholder="Enter full name" value="{{ old('name') }}" required>
                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">Email Address</label>
                <input type="email" name="email" class="form-control py-2.5" placeholder="user@example.com" value="{{ old('email') }}" required>
                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary small">Account Password</label>
                <input type="password" name="password" class="form-control py-2.5" placeholder="Minimum 6 characters" required>
                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-pink w-100 fw-bold py-2.5 shadow-sm">
                <i class="fa-solid fa-user-plus me-1"></i> Register User
            </button>
        </form>
    </div>
</div>
@endsection