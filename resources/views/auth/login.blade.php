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
        }

        body {
            background: linear-gradient(135deg, #ffffff 0%, #e8f5e9 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            margin: 0;
        }

        .modern-card {
            background: #ffffff;
            border-radius: 2rem;
            border: none;
            box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.1), 0 8px 18px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .card-body-custom {
            padding: 2.5rem;
        }

        .brand-icon {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 10px 20px -5px rgba(46, 204, 113, 0.3);
        }

        .brand-icon i {
            font-size: 2rem;
            color: white;
        }

        .welcome-title {
            font-weight: 700;
            font-size: 1.8rem;
            color: #2c3e2f;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #7f8c8d;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .input-group-modern {
            position: relative;
            margin-bottom: 1.75rem;
        }

        .form-control-modern {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            font-size: 1rem;
            font-weight: 500;
            border: 1.5px solid #e0e0e0;
            border-radius: 1rem;
            background-color: #ffffff;
            transition: all 0.2s ease;
            color: #2c3e2f;
        }

        .form-control-modern:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 0 4px rgba(46, 204, 113, 0.15);
            outline: none;
            background-color: #ffffff;
        }

        .form-control-modern.is-invalid {
            border-color: #e74c3c;
            background-image: none;
            padding-right: 2.8rem;
        }

        .form-control-modern.is-invalid:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.2);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #bdc3c7;
            font-size: 1.1rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-group-modern:focus-within .input-icon {
            color: #2ecc71;
        }

        .label-modern {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            font-size: 0.85rem;
            color: #2c3e2f;
            letter-spacing: 0.3px;
        }

        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-custom input {
            width: 1.1rem;
            height: 1.1rem;
            accent-color: #2ecc71;
            cursor: pointer;
        }

        .checkbox-custom label {
            color: #4a5568;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            margin: 0;
        }

        .btn-login {
            background: linear-gradient(95deg, #2ecc71, #27ae60);
            border: none;
            border-radius: 1rem;
            padding: 0.85rem 1rem;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.3px;
            transition: all 0.2s ease;
            box-shadow: 0 8px 18px rgba(46, 204, 113, 0.25);
            width: 100%;
            color: white;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            background: linear-gradient(95deg, #27ae60, #219a52);
            box-shadow: 0 12px 22px rgba(46, 204, 113, 0.35);
        }

        .btn-login:active {
            transform: translateY(1px);
        }

        .register-link {
            color: #2ecc71;
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
            border-bottom: 1px dashed transparent;
        }

        .register-link:hover {
            color: #27ae60;
            border-bottom-color: #27ae60;
        }

        .alert-custom {
            border-radius: 1rem;
            border: none;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.8rem 1rem;
            background-color: #fde2e2;
            color: #c0392b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
        }

        .alert-custom i {
            font-size: 1.1rem;
        }

        .alert-custom .btn-close {
            margin-left: auto;
            background: transparent;
        }

        .invalid-feedback-custom {
            display: block;
            font-size: 0.7rem;
            margin-top: 0.25rem;
            color: #e74c3c;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #bdc3c7;
            cursor: pointer;
            z-index: 10;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: #2ecc71;
        }

        .form-control-modern.pr-5 {
            padding-right: 2.8rem;
        }

        .fade-in {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .card-body-custom {
                padding: 1.8rem;
            }
            .welcome-title {
                font-size: 1.5rem;
            }
            .form-control-modern {
                padding: 0.8rem 1rem 0.8rem 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card modern-card fade-in">
                    <div class="card-body card-body-custom">
                        <div class="text-center mb-4">
                            <h2 class="welcome-title mt-2">RZF Software | Login</h2>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

                            <div class="checkbox-custom">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Ingat saya</label>
                            </div>

                            <button type="submit" class="btn btn-login" id="loginBtn">
                                <i class="fas fa-arrow-right-to-bracket me-2"></i> Masuk ke Akun
                            </button>
                        </form>

                        <div class="text-center mt-4 pt-2">
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Belum punya akun? 
                                <a href="{{ route('register') }}" class="register-link">Daftar sekarang</a>
                            </p>
                        </div>

                        <div class="text-center mt-3">
                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none small text-muted">Lupa kata sandi?</a>
                            @endif
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
            const existingAlert = alertContainer.querySelector('.alert-custom');
            if (existingAlert) existingAlert.remove();

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert-custom';
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

            emailInput.addEventListener('change', function () {
                if (rememberCheck && rememberCheck.checked) {
                    localStorage.setItem('remember_email', this.value);
                }
            });
        });
    </script>
</body>
</html>