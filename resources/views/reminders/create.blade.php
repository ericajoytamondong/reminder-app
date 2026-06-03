@extends('layouts.app')

@section('title', 'Add Reminder')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-dark mb-1">Add Reminder</h4>
                    <p class="text-muted small mb-4">Create a new reminder.</p>

                    <form action="{{ route('reminders.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Title</label>
                            <input type="text" name="title" class="form-control px-3 py-2" placeholder="Enter reminder title" required style="border-radius: 10px; border-color: #e2d4d8;">
                            @error('title')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Description</label>
                            <textarea name="description" class="form-control px-3 py-2" rows="4" placeholder="Enter description (optional)" style="border-radius: 10px; border-color: #e2d4d8; resize: none;"></textarea>
                            @error('description')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Date</label>
                            <input type="date" name="date" class="form-control px-3 py-2" required style="border-radius: 10px; border-color: #e2d4d8;">
                            @error('date')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-start pt-2">
                            <button type="submit" class="btn btn-pink px-4 py-2 text-white fw-semibold" style="border-radius: 10px; background-color: #ff3377; border: none;">Save Reminder</button>
                            <a href="{{ route('reminders.index') }}" class="btn btn-light px-4 py-2 border fw-semibold" style="border-radius: 10px; background-color: #ffffff; color: #776a6e;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection