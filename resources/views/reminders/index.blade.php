@extends('layouts.app')

@section('title', 'All Reminders')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">All Reminders</h3>
            <p class="text-muted small mb-0">Manage your reminders easily.</p>
        </div>
        <a href="{{ route('reminders.create') }}" class="btn btn-pink px-3 py-2 text-white fw-semibold d-flex align-items-center gap-2" style="border-radius: 10px; background-color: #ff3377; border: none;">
            <i class="fa-solid fa-plus"></i> Add Reminder
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
        <div class="table-responsive">
            <table class="table align-middle mb-0" style="font-size: 0.95rem;">
                <thead class="table-light text-secondary" style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="py-3">Title</th>
                        <th class="py-3">Description</th>
                        <th class="py-3">Date</th>
                        <th class="py-3">Status</th>
                        <th class="px-4 py-3 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reminders as $index => $reminder)
                    <tr class="border-bottom">
                        <td class="px-4 text-muted">{{ $index + 1 }}</td>
                        <td class="text-pink fw-semibold" style="color: #ff3377;">{{ $reminder->title }}</td>
                        <td class="text-muted text-truncate" style="max-width: 250px;">{{ $reminder->description ?? 'No description provided.' }}</td>
                        <td class="text-secondary">
                            <i class="fa-regular fa-calendar me-2 text-muted"></i>{{ \Carbon\Carbon::parse($reminder->date)->format('M d, Y') }}
                        </td>
                        <td>
                            @if($reminder->status == 'Upcoming')
                                <span class="badge px-3 py-2 rounded-pill bg-light text-primary">Upcoming</span>
                            @elseif($reminder->status == 'Completed')
                                <span class="badge px-3 py-2 rounded-pill bg-light text-success">Completed</span>
                            @else
                                <span class="badge px-3 py-2 rounded-pill bg-light text-danger">Overdue</span>
                            @endif
                        </td>
                        <td class="px-4 text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('reminders.edit', $reminder->id) }}" class="btn btn-sm btn-pink p-2 text-white" style="border-radius: 6px; background-color: #ff3377;"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reminder?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-pink p-2 text-white" style="border-radius: 6px; background-color: #ff3377;"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fa-regular fa-folder-open d-block mb-3 text-pink opacity-50" style="font-size: 2.5rem; color: #ff3377;"></i>
                            No reminders found. Click "Add Reminder" to get started!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection