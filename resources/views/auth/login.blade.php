<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk | Aplikasi Modern</title>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: #0f0f13;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            margin: 0;
        }

        /* Subtle background grid pattern */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(124, 106, 245, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(124, 106, 245, 0.03) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 0;
        }

        .login-card {
            background: #18181f;
            border-radius: 1.5rem;
            border: 0.5px solid #2a2a35;
            box-shadow: 0 32px 64px rgba(0, 0, 0, 0.4), 0 0 0 0.5px #2a2a35;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        /* Top accent line */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, #7c6af5 50%, transparent);
        }

        .login-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5), 0 0 0 0.5px #3a3a50;
        }

        .card-body-custom {
            padding: 2.5rem;
        }

        .brand-icon {
            background: #1e1e2a;
            border: 0.5px solid #3a3a50;
            width: 54px;
            height: 54px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            margin-bottom: 1rem;
        }

        .brand-icon i {
            font-size: 1.4rem;
            color: #7c6af5;
        }

        .welcome-title {
            font-weight: 600;
            font-size: 1.7rem;
            color: #f0f0f5;
            margin-bottom: 0.3rem;
            letter-spacing: -0.3px;
        }

        .subtitle {
            color: #55556a;
            font-size: 0.875rem;
            font-weight: 400;
        }

        .input-group-modern {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control-modern {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.7rem;
            font-size: 0.925rem;
            font-weight: 400;
            border: 0.5px solid #2a2a38;
            border-radius: 0.75rem;
            background-color: #111118;
            transition: all 0.2s ease;
            color: #dddde8;
        }

        .form-control-modern:focus {
            border-color: #7c6af5;
            box-shadow: 0 0 0 3px rgba(124, 106, 245, 0.12);
            outline: none;
            background-color: #111118;
        }

        .form-control-modern.is-invalid {
            border-color: #c0392b;
            background-image: none;
        }

        .form-control-modern.is-invalid:focus {
            border-color: #c0392b;
            box-shadow: 0 0 0 3px rgba(192, 57, 43, 0.15);
        }

        .form-control-modern::placeholder {
            color: #3d3d52;
            font-size: 0.875rem;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #3d3d52;
            font-size: 0.95rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-group-modern:focus-within .input-icon {
            color: #7c6af5;
        }

        .label-modern {
            display: block;
            margin-bottom: 0.45rem;
            font-weight: 500;
            font-size: 0.8rem;
            color: #8888a0;
            letter-spacing: 0.3px;
        }

        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-custom input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: #7c6af5;
            cursor: pointer;
            border-radius: 4px;
        }

        .checkbox-custom label {
            color: #6b6b7e;
            font-weight: 400;
            font-size: 0.875rem;
            cursor: pointer;
            margin: 0;
        }

        .btn-login {
            background: #7c6af5;
            border: none;
            border-radius: 0.75rem;
            padding: 0.82rem 1rem;
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.2px;
            transition: all 0.2s ease;
            width: 100%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background: #6a58e0;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(124, 106, 245, 0.3);
            color: white;
        }

        .btn-login:active {
            transform: translateY(0px);
            background: #5d4ec7;
        }

        .register-link {
            color: #7c6af5;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-link:hover {
            color: #a090ff;
        }

        .forgot-link {
            color: #55556a;
            font-size: 0.825rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #7c6af5;
        }

        .alert-dark-custom {
            border-radius: 0.75rem;
            border: 0.5px solid #5a1a1a;
            font-weight: 400;
            font-size: 0.85rem;
            padding: 0.8rem 1rem;
            background-color: #1f1212;
            color: #e07070;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            position: relative;
        }

        .alert-dark-custom i {
            font-size: 1rem;
            flex-shrink: 0;
            margin-top: 1px;
            color: #e74c3c;
        }

        .alert-dark-custom .btn-close {
            margin-left: auto;
            filter: invert(0.6);
            opacity: 0.6;
            font-size: 0.75rem;
        }

        .alert-dark-custom ul {
            margin-bottom: 0;
            padding-left: 1.1rem;
        }

        .alert-dark-custom li {
            margin-bottom: 0.15rem;
        }

        .invalid-feedback-custom {
            display: block;
            font-size: 0.72rem;
            margin-top: 0.3rem;
            color: #e74c3c;
        }

        .toggle-password {
            position: absolute;
            right: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #44445a;
            cursor: pointer;
            z-index: 10;
            transition: color 0.2s;
            padding: 0;
            font-size: 0.9rem;
        }

        .toggle-password:hover {
            color: #7c6af5;
        }

        .form-control-modern.pr-5 {
            padding-right: 2.7rem;
        }

        .divider-area {
            border-top: 0.5px solid #222230;
            margin: 1.25rem 0;
        }

        .fade-in {
            animation: fadeInUp 0.4s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .card-body-custom {
                padding: 1.75rem;
            }
            .welcome-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; position: relative; z-index: 1;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card login-card fade-in" style="border: none; background: transparent;">
                    <div class="card-body card-body-custom">
                        <div class="text-center mb-4">
                            <div class="brand-icon mx-auto">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h2 class="welcome-title mt-2">Selamat datang</h2>
                            <p class="subtitle mb-0">Masuk untuk melanjutkan</p>
                        </div>

                        @if(session('error'))
                            <div class="alert-dark-custom" role="alert">
                                <i class="fas fa-circle-exclamation"></i>
                                <span>{{ session('error') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert-dark-custom" role="alert">
                                <i class="fas fa-circle-exclamation"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div id="errorAlertContainer"></div>

                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <div class="input-group-modern">
                                <label for="email" class="label-modern">Alamat Email</label>
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="email" name="email"
                                    class="form-control-modern"
                                    placeholder="nama@perusahaan.com"
                                    value="{{ old('email') }}"
                                    autocomplete="email" required autofocus>
                                <div class="invalid-feedback-custom" id="emailError"></div>
                            </div>

                            <div class="input-group-modern">
                                <label for="password" class="label-modern">Kata Sandi</label>
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="password" name="password"
                                    class="form-control-modern pr-5"
                                    placeholder="••••••••"
                                    autocomplete="current-password" required>
                                <button type="button" class="toggle-password" id="togglePasswordBtn" tabindex="-1">
                                    <i class="far fa-eye-slash" id="toggleIcon"></i>
                                </button>
                                <div class="invalid-feedback-custom" id="passwordError"></div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="checkbox-custom mb-0">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Ingat saya</label>
                                </div>
                                @if(Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-login" id="loginBtn">
                                <i class="fas fa-arrow-right-to-bracket"></i> Masuk ke Akun
                            </button>
                        </form>

                        <div class="divider-area"></div>

                        <div class="text-center">
                            <p style="font-size: 0.875rem; color: #44445a; margin: 0;">Belum punya akun?
                                <a href="{{ route('register') }}" class="register-link">Daftar sekarang</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showErrorAlert(message) {
            const alertContainer = document.getElementById('errorAlertContainer');
            const existingAlert = alertContainer.querySelector('.alert-dark-custom');
            if (existingAlert) existingAlert.remove();

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert-dark-custom';
            alertDiv.innerHTML = `
                <i class="fas fa-circle-exclamation"></i>
                <span>${message}</span>
                <button type="button" class="btn-close" aria-label="Close"></button>
            `;
            alertContainer.appendChild(alertDiv);

            const closeBtn = alertDiv.querySelector('.btn-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => alertDiv.remove());
            }

            setTimeout(() => {
                if (alertDiv.parentNode) alertDiv.remove();
            }, 5000);
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            return re.test(email);
        }

        function clearInputError(inputElement, errorElementId) {
            inputElement.classList.remove('is-invalid');
            const errorDiv = document.getElementById(errorElementId);
            if (errorDiv) errorDiv.innerText = '';
        }

        function setInputError(inputElement, errorElementId, message) {
            inputElement.classList.add('is-invalid');
            const errorDiv = document.getElementById(errorElementId);
            if (errorDiv) errorDiv.innerText = message;
        }

        const togglePasswordBtn = document.getElementById('togglePasswordBtn');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (togglePasswordBtn) {
            togglePasswordBtn.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                toggleIcon.classList.toggle('fa-eye-slash');
                toggleIcon.classList.toggle('fa-eye');
            });
        }

        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const rememberCheck = document.getElementById('remember');

        if (loginForm) {
            loginForm.addEventListener('submit', function (event) {
                clearInputError(emailInput, 'emailError');
                clearInputError(passwordInput, 'passwordError');

                let isValid = true;
                const emailVal = emailInput.value.trim();
                const passVal = passwordInput.value;

                if (emailVal === '') {
                    setInputError(emailInput, 'emailError', 'Email wajib diisi.');
                    isValid = false;
                } else if (!validateEmail(emailVal)) {
                    setInputError(emailInput, 'emailError', 'Masukkan alamat email yang valid.');
                    isValid = false;
                }

                if (passVal === '') {
                    setInputError(passwordInput, 'passwordError', 'Kata sandi tidak boleh kosong.');
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        }

        window.addEventListener('DOMContentLoaded', function () {
            const savedEmail = localStorage.getItem('remember_email');
            if (savedEmail && emailInput) {
                emailInput.value = savedEmail;
                if (rememberCheck) rememberCheck.checked = true;
            }

            if (rememberCheck) {
                rememberCheck.addEventListener('change', function () {
                    if (this.checked) {
                        localStorage.setItem('remember_email', emailInput.value);
                    } else {
                        localStorage.removeItem('remember_email');
                    }
                });
            }

            if (emailInput) {
                emailInput.addEventListener('change', function () {
                    if (rememberCheck && rememberCheck.checked) {
                        localStorage.setItem('remember_email', this.value);
                    }
                });
            }
        });
    </script>
</body>
</html>
