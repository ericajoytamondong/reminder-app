@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Dashboard</h2>
            <p class="text-muted mb-0">Overview of your system metrics and reminders</p>
        </div>
        <span class="badge bg-white text-pink border border-pink px-3 py-2 rounded-3 mt-2 mt-sm-0 shadow-sm fw-semibold">
            <i class="fa-regular fa-calendar me-1"></i> {{ now()->format('F d, Y') }}
        </span>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card-stat p-3 p-md-4 text-start h-100 shadow-sm border-0">
                <div class="rounded-circle bg-light text-pink d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px;">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <h1 class="fw-bold m-0 text-dark fs-2">{{ $total }}</h1>
                <span class="text-muted small fw-semibold">Total Reminders</span>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card-stat p-3 p-md-4 text-start h-100 shadow-sm border-0">
                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px; color:#a133ff; background-color: #f5ebff !important;">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <h1 class="fw-bold m-0 text-dark fs-2">{{ $upcoming }}</h1>
                <span class="text-muted small fw-semibold">Upcoming</span>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card-stat p-3 p-md-4 text-start h-100 shadow-sm border-0">
                <div class="rounded-circle bg-light text-warning d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px;">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <h1 class="fw-bold m-0 text-dark fs-2">{{ $overdue }}</h1>
                <span class="text-muted small fw-semibold">Overdue</span>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card-stat p-3 p-md-4 text-start h-100 shadow-sm border-0">
                <div class="rounded-circle bg-light text-success d-flex align-items-center justify-content-center fs-4 mb-3" style="width:45px; height:45px;">
                    <i class="fa-regular fa-circle-check"></i>
                </div>
                <h1 class="fw-bold m-0 text-dark fs-2">{{ $completed }}</h1>
                <span class="text-muted small fw-semibold">Completed</span>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm p-3 bg-white h-100" style="border-radius:15px;">
                <h5 class="fw-bold text-dark mb-3 fs-6"><i class="fa-solid fa-chart-bar text-pink me-2"></i>User Activity Matrix</h5>
                <div style="position: relative; height:260px; width:100%;">
                    <canvas id="userActivityChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm p-3 bg-white h-100" style="border-radius:15px;">
                <h5 class="fw-bold text-dark mb-3 fs-6"><i class="fa-solid fa-chart-pie text-pink me-2"></i>System User Base</h5>
                <div style="position: relative; height:260px; width:100%;">
                    <canvas id="userRatioChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 rounded-4 p-4 p-md-5 bg-white shadow-sm mb-3">
        <div class="row align-items-center g-4 text-center text-md-start">
            <div class="col-12 col-md-auto">
                <i class="fa-solid fa-clipboard-list text-pink opacity-50" style="font-size: 80px;"></i>
            </div>
            <div class="col-12 col-md">
                <h3 class="fw-bold text-dark fs-4">Stay organized and never miss what's important!</h3>
                <p class="text-muted m-0">Add your tasks and reminders to stay on track every day. ❤️</p>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Bar Chart: User activity matrix comparison
    const ctxActivity = document.getElementById('userActivityChart').getContext('2d');
    new Chart(ctxActivity, {
        type: 'bar',
        data: {
            labels: ['Total Registered Users', 'Users with Reminders'],
            datasets: [{
                label: 'Count',
                data: [{{ $totalSystemUsers }}, {{ $usersWithReminders }}],
                backgroundColor: ['#ff3377', '#36a2eb'],
                borderRadius: 8,
                barThickness: 35
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
        }
    });

    // 2. Pie Chart: Ratio distribution breakdown
    const ctxRatio = document.getElementById('userRatioChart').getContext('2d');
    new Chart(ctxRatio, {
        type: 'pie',
        data: {
            labels: ['Using Reminders', 'No Active Reminders'],
            datasets: [{
                data: [{{ $usersWithReminders }}, {{ $usersWithoutReminders }}],
                backgroundColor: ['#4bc0c0', '#ff9f40']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection