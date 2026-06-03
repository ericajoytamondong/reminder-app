<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Reminder App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #fff0f5; /* Soft pink tint background */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        /* Plant vector style at the bottom corner to match screenshot 1 */
        .bg-deco-plant {
            position: absolute;
            bottom: 0;
            right: 10%;
            width: 120px;
            opacity: 0.8;
            pointer-events: none;
        }
        .text-pink {
            color: #ff3377 !important;
        }
        .btn-pink {
            background-color: #ff3377;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s ease-in-out;
        }
        .btn-pink:hover {
            background-color: #e02262;
            color: white;
        }
        .auth-card {
            background: white;
            border-radius: 24px;
            padding: 35px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 10px 30px rgba(255, 51, 119, 0.05);
            border: 1px solid rgba(255, 51, 119, 0.08);
            z-index: 2;
        }
        .form-label {
            font-weight: 600;
            color: #333333;
            font-size: 0.9rem;
            margin-bottom: 6px;
        }
        .form-control {
            border: 1px solid #e2d4d8;
            border-radius: 10px;
            padding: 12px;
            color: #333333;
            font-size: 0.95rem;
        }
        .form-control::placeholder {
            color: #b0a2a6;
        }
        .form-control:focus {
            border-color: #ff3377;
            box-shadow: 0 0 0 0.25rem rgba(255, 51, 119, 0.12);
        }
        .input-group-text {
            background-color: transparent;
            border-color: #e2d4d8;
            color: #776a6e;
            cursor: pointer;
            border-top-right-radius: 10px !important;
            border-bottom-right-radius: 10px !important;
        }
    </style>
</head>
<body>

    <div class="container text-center py-4">
        <div class="mb-2">
            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z" stroke="#ff3377" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 2V6" stroke="#ff3377" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 2V6" stroke="#ff3377" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3 10H21" stroke="#ff3377" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 14L12 16L16 12" stroke="#ff3377" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h2 class="text-pink fw-bold mb-1" style="font-size: 2.2rem; letter-spacing: -0.5px;">Reminder App</h2>
        <p class="text-muted mb-4 small-text">@yield('subtitle')</p>

        <div class="auth-card text-start mx-auto">
            @yield('content')
        </div>
    </div>

    <svg class="bg-deco-plant" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M50 95C50 95 30 70 35 45C38 30 50 15 50 15C50 15 62 30 65 45C68 70 50 95 50 95Z" fill="#ffecf2"/>
        <path d="M50 95V15" stroke="#ffccd9" stroke-width="2"/>
        <path d="M35 55C42 58 48 52 50 48" stroke="#ffccd9" stroke-width="2"/>
        <path d="M65 55C58 58 52 52 50 48" stroke="#ffccd9" stroke-width="2"/>
        <path d="M38 38C44 40 48 36 50 32" stroke="#ffccd9" stroke-width="2"/>
        <path d="M62 38C56 40 52 36 50 32" stroke="#ffccd9" stroke-width="2"/>
    </svg>

    <script>
        function togglePasswordVisibility(fieldId, iconElement) {
            const passwordInput = document.getElementById(fieldId);
            const icon = iconElement.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>