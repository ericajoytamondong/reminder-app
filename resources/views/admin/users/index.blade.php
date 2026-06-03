@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h2 class="fw-bold h4 mb-0 text-dark">User System Accounts</h2>
        <a href="{{ route('users.create') }}" class="btn btn-pink btn-sm px-3 shadow-sm">
            <i class="fa-solid fa-user-plus me-1"></i> New User
        </a>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <!-- Container for responsive mobile view table wrapper handling overflow gracefully -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-nowrap">
                <thead class="table-light text-secondary small fw-bold">
                    <tr>
                        <th class="px-4">User Name</th>
                        <th>Email Address</th>
                        <th class="text-center">Active Reminders</th>
                        <th class="text-center px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="px-4 fw-semibold text-dark">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center"><span class="badge bg-light text-pink border border-pink px-2.5 py-1.5">{{ $user->reminders_count }}</span></td>
                        <td class="text-center px-4">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary border-0" title="Edit Profile"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Purge this profile context?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-secondary border-0"><i class="fa-solid fa-trash text-danger"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3 border-top bg-white d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection