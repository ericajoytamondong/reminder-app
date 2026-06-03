@extends('layouts.app')

@section('content')
<div class="container-fluid px-0" style="max-width: 600px; margin: 0 auto;">
    <div class="mb-4">
        <a href="{{ route('users.index') }}" class="text-pink text-decoration-none small fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Users
        </a>
        <h2 class="fw-bold text-dark mt-2 h4">Modify User Profile</h2>
    </div>

    <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 15px;">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">User Name</label>
                <input type="text" name="name" class="form-control py-2.5" value="{{ old('name', $user->name) }}" required>
                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary small">Email Address</label>
                <input type="email" name="email" class="form-control py-2.5" value="{{ old('email', $user->email) }}" required>
                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold text-secondary small">New Password (Leave blank to keep current)</label>
                <input type="password" name="password" class="form-control py-2.5" placeholder="Enter new password if changing">
                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-pink w-100 fw-bold py-2.5 shadow-sm">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Changes
            </button>
        </form>
    </div>
</div>
@endsection