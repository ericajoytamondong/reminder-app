<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #fcf6f8; font-family: 'Segoe UI', sans-serif; }
        .bg-pink { background-color: #ff3377 !important; }
        .text-pink { color: #ff3377 !important; }
        .btn-pink { background-color: #ff3377; color: white; border-radius: 8px; }
        .btn-pink:hover { background-color: #e02262; color: white; }
        .sidebar { background: white; min-height: 100vh; border-right: 1px solid #f0e4e8; }
        .sidebar .nav-link { color: #6c757d; font-weight: 500; padding: 12px 20px; border-radius: 8px; margin: 4px 15px; }
        .sidebar .nav-link.active { background-color: #fff0f5; color: #ff3377; }
        .card-stat { border: none; border-radius: 15px; background: white; box-shadow: 0 4px 12px rgba(0,0,0,0.02); }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-pink sticky-top px-4">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fa-solid fa-calendar-check me-2"></i> <strong>Reminder App</strong>
            </a>
            <div class="d-flex align-items-center ms-auto text-white">
                <i class="fa-regular fa-bell me-3 fs-5"></i>
                <div class="rounded-circle bg-white text-pink d-flex align-items-center justify-content-center me-2" style="width:32px; height:32px;">
                    <i class="fa-solid fa-user"></i>
                </div>
                <span class="me-3 fw-semibold">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar px-0 pt-3">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fa-solid fa-house me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('reminders') ? 'active' : '' }}" href="{{ route('reminders.index') }}">
                                <i class="fa-solid fa-list-ul me-2"></i> All Reminders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('reminders/create') ? 'active' : '' }}" href="{{ route('reminders.create') }}">
                                <i class="fa-solid fa-circle-plus me-2"></i> Add Reminder
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
                @yield('content')
                <footer class="text-center text-muted mt-5 py-3 border-top">
                    © 2026 Reminder App. All rights reserved.
                </footer>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('toast_success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
        Toast.fire({
            icon: 'success',
            title: "{{ session('toast_success') }}"
        });
    </script>
    @endif
</body>
</html>