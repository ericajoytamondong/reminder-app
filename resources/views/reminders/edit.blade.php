@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-dark mb-1">Add Reminder</h2>
    <p class="text-muted">Create a new reminder.</p>
</div>

<div class="card border-0 rounded-4 shadow-sm p-4 bg-white" style="max-width: 600px;">
    <form action="{{ route('reminders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Title</label>
            <input type="text" name="title" class="form-control p-3 border-light-subtle" placeholder="Enter reminder title" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Description</label>
            <textarea name="description" rows="4" class="form-control p-3 border-light-subtle" placeholder="Enter description (optional)"></textarea>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary">Date</label>
            <input type="date" name="date" class="form-control p-3 border-light-subtle" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-pink px-4 py-2 fw-semibold">Save Reminder</button>
            <a href="{{ route('reminders.index') }}" class="btn btn-light px-4 py-2 border fw-semibold">Cancel</a>
        </div>
    </form>
</div>
@endsection