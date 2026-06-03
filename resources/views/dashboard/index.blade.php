@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-dark mb-1">Dashboard</h2>
    <p class="text-muted">Overview of your reminders</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card-stat p-4 text-start">
            <div class="rounded-circle bg-light text-pink d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px;">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <h1 class="fw-bold m-0">{{ $total }}</h1>
            <span class="text-muted small fw-semibold">Total Reminders</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-stat p-4 text-start">
            <div class="rounded-circle bg-light text-purple d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px; color:#a133ff;">
                <i class="fa-regular fa-clock"></i>
            </div>
            <h1 class="fw-bold m-0">{{ $upcoming }}</h1>
            <span class="text-muted small fw-semibold">Upcoming</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-stat p-4 text-start">
            <div class="rounded-circle bg-light text-warning d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px;">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <h1 class="fw-bold m-0">{{ $overdue }}</h1>
            <span class="text-muted small fw-semibold">Overdue</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-stat p-4 text-start">
            <div class="rounded-circle bg-light text-success d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px;">
                <i class="fa-regular fa-circle-check"></i>
            </div>
            <h1 class="fw-bold m-0">{{ $completed }}</h1>
            <span class="text-muted small fw-semibold">Completed</span>
        </div>
    </div>
</div>

<div class="card border-0 rounded-4 p-5 bg-white d-flex flex-row align-items-center gap-5 box-shadow">
    <div style="max-width: 140px;">
        <i class="fa-solid fa-clipboard-list text-pink opacity-50" style="font-size: 100px;"></i>
    </div>
    <div>
        <h3 class="fw-bold text-dark">Stay organized and never miss what's important!</h3>
        <p class="text-muted m-0">Add your tasks and reminders to stay on track every day. ❤️</p>
    </div>
</div>
@endsection