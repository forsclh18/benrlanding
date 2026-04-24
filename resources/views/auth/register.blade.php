<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar | Aplikasi Modern</title>

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

        .register-card {
            background: #ffffff;
            border-radius: 2rem;
            border: none;
            box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.1), 0 8px 18px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
        }

        .register-card:hover {
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

        .register-title {
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
            margin-bottom: 1.5rem;
        }

        .form-control-modern {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            font-size: 0.95rem;
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
            font-size: 1rem;
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

        .btn-register {
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

        .btn-register:hover {
            transform: translateY(-2px);
            background: linear-gradient(95deg, #27ae60, #219a52);
            box-shadow: 0 12px 22px rgba(46, 204, 113, 0.35);
        }

        .btn-register:active {
            transform: translateY(1px);
        }

        .login-link {
            color: #2ecc71;
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
            border-bottom: 1px dashed transparent;
        }

        .login-link:hover {
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
            position: relative;
        }

        .alert-custom ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
        }

        .alert-custom li {
            margin-bottom: 0.2rem;
        }

        .alert-custom .btn-close {
            position: absolute;
            right: 0.75rem;
            top: 0.75rem;
            background: transparent;
            font-size: 0.8rem;
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

        .password-strength {
            margin-top: 0.5rem;
            height: 4px;
            background: #ecf0f1;
            border-radius: 4px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease, background 0.3s ease;
            border-radius: 4px;
        }

        .strength-text {
            font-size: 0.7rem;
            margin-top: 0.25rem;
            color: #95a5a6;
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
            .register-title {
                font-size: 1.5rem;
            }
            .form-control-modern {
                padding: 0.75rem 1rem 0.75rem 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-5">
                <div class="card register-card fade-in">
                    <div class="card-body card-body-custom">
                        <div class="text-center mb-4">
                            <h2 class="register-title mt-2">RZF Software | Register</h2>
                        </div>

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

                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf

                            <!-- Nama Lengkap -->
                            <div class="input-group-modern">
                                <label for="name" class="label-modern">Nama Lengkap</label>
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" id="name" name="name" 
                                    class="form-control-modern" 
                                    placeholder="Masukkan nama lengkap Anda" 
                                    value="{{ old('name') }}"
                                    autocomplete="name" required>
                                <div class="invalid-feedback-custom" id="nameError"></div>
                            </div>

                            <!-- Email -->
                            <div class="input-group-modern">
                                <label for="email" class="label-modern">Email</label>
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" id="email" name="email" 
                                    class="form-control-modern" 
                                    placeholder="nama@perusahaan.com" 
                                    value="{{ old('email') }}"
                                    autocomplete="email" required>
                                <div class="invalid-feedback-custom" id="emailError"></div>
                            </div>

                            <!-- Kata Sandi -->
                            <div class="input-group-modern">
                                <label for="password" class="label-modern">Kata Sandi</label>
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="password" name="password" 
                                    class="form-control-modern pr-5" 
                                    placeholder="Minimal 5 karakter" 
                                    autocomplete="new-password" required>
                                <button type="button" class="toggle-password" id="togglePasswordBtn" tabindex="-1">
                                    <i class="far fa-eye-slash" id="toggleIcon"></i>
                                </button>
                                <div class="invalid-feedback-custom" id="passwordError"></div>
                                <div class="password-strength">
                                    <div class="strength-bar" id="strengthBar"></div>
                                </div>
                                <div class="strength-text" id="strengthText"></div>
                            </div>

                            <!-- Konfirmasi Kata Sandi -->
                            <div class="input-group-modern">
                                <label for="password_confirmation" class="label-modern">Konfirmasi Kata Sandi</label>
                                <i class="fas fa-check-circle input-icon"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation" 
                                    class="form-control-modern pr-5" 
                                    placeholder="Ulangi kata sandi" 
                                    autocomplete="off" required>
                                <button type="button" class="toggle-password" id="toggleConfirmBtn" tabindex="-1">
                                    <i class="far fa-eye-slash" id="toggleConfirmIcon"></i>
                                </button>
                                <div class="invalid-feedback-custom" id="confirmError"></div>
                            </div>

                            <button type="submit" class="btn btn-register" id="registerBtn">
                                <i class="fas fa-user-plus me-2"></i> Daftar Akun
                            </button>
                        </form>

                        <div class="text-center mt-4 pt-2">
                            <p class="text-muted mb-0" style="font-size: 0.9rem;">Sudah punya akun? 
                                <a href="{{ route('login') }}" class="login-link">Masuk sekarang</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const registerForm = document.getElementById('registerForm');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');
        const errorContainer = document.getElementById('errorAlertContainer');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        function showErrorAlert(errorsArray) {
            const existingAlert = errorContainer.querySelector('.alert-custom');
            if (existingAlert) existingAlert.remove();
            if (!errorsArray || errorsArray.length === 0) return;

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert-custom';
            alertDiv.setAttribute('role', 'alert');

            const ul = document.createElement('ul');
            errorsArray.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                ul.appendChild(li);
            });

            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.className = 'btn-close';
            closeBtn.setAttribute('aria-label', 'Close');

            alertDiv.appendChild(ul);
            alertDiv.appendChild(closeBtn);
            errorContainer.appendChild(alertDiv);

            closeBtn.addEventListener('click', () => alertDiv.remove());

            setTimeout(() => {
                if (alertDiv.parentNode) alertDiv.remove();
            }, 6000);
        }

        function clearInputError(inputElement, errorElementId) {
            inputElement.classList.remove('is-invalid');
            const errorDiv = document.getElementById(errorElementId);
            if (errorDiv) errorDiv.textContent = '';
        }

        function setInputError(inputElement, errorElementId, message) {
            inputElement.classList.add('is-invalid');
            const errorDiv = document.getElementById(errorElementId);
            if (errorDiv) errorDiv.textContent = message;
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            return re.test(email);
        }

        function evaluatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 5) strength++;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            let percentage = 0, text = '', color = '';
            if (password.length === 0) {
                percentage = 0;
                text = '';
                color = '#ecf0f1';
            } else if (password.length < 5) {
                percentage = 20;
                text = 'Terlalu pendek (min. 5 karakter)';
                color = '#e74c3c';
            } else if (strength <= 2) {
                percentage = 40;
                text = 'Lemah';
                color = '#e74c3c';
            } else if (strength === 3) {
                percentage = 65;
                text = 'Sedang';
                color = '#f39c12';
            } else if (strength === 4) {
                percentage = 85;
                text = 'Kuat';
                color = '#27ae60';
            } else {
                percentage = 100;
                text = 'Sangat Kuat';
                color = '#2ecc71';
            }
            return { percentage, text, color };
        }

        function updateStrengthMeter() {
            const password = passwordInput.value;
            const { percentage, text, color } = evaluatePasswordStrength(password);
            if (strengthBar) strengthBar.style.width = percentage + '%';
            if (strengthBar) strengthBar.style.backgroundColor = color;
            if (strengthText) strengthText.textContent = text;
            if (strengthText) strengthText.style.color = color;
        }

        if (passwordInput) {
            passwordInput.addEventListener('input', function () {
                updateStrengthMeter();
                clearInputError(confirmInput, 'confirmError');
                if (passwordInput.value.length > 0 && confirmInput.value.length > 0) {
                    if (passwordInput.value !== confirmInput.value) {
                        setInputError(confirmInput, 'confirmError', 'Kata sandi tidak cocok');
                    } else {
                        clearInputError(confirmInput, 'confirmError');
                    }
                }
            });
        }

        if (confirmInput) {
            confirmInput.addEventListener('input', function () {
                if (passwordInput.value !== confirmInput.value) {
                    setInputError(confirmInput, 'confirmError', 'Kata sandi tidak cocok');
                } else {
                    clearInputError(confirmInput, 'confirmError');
                }
            });
        }

        const togglePasswordBtn = document.getElementById('togglePasswordBtn');
        const toggleConfirmBtn = document.getElementById('toggleConfirmBtn');
        const toggleIcon = document.getElementById('toggleIcon');
        const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');

        if (togglePasswordBtn) {
            togglePasswordBtn.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                toggleIcon.classList.toggle('fa-eye-slash');
                toggleIcon.classList.toggle('fa-eye');
            });
        }

        if (toggleConfirmBtn) {
            toggleConfirmBtn.addEventListener('click', function () {
                const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmInput.setAttribute('type', type);
                toggleConfirmIcon.classList.toggle('fa-eye-slash');
                toggleConfirmIcon.classList.toggle('fa-eye');
            });
        }

        if (registerForm) {
            registerForm.addEventListener('submit', function (event) {
                clearInputError(nameInput, 'nameError');
                clearInputError(emailInput, 'emailError');
                clearInputError(passwordInput, 'passwordError');
                clearInputError(confirmInput, 'confirmError');

                let errors = [];
                const nameValue = nameInput.value.trim();
                const emailValue = emailInput.value.trim();
                const passwordValue = passwordInput.value;
                const confirmValue = confirmInput.value;

                if (nameValue === '') {
                    setInputError(nameInput, 'nameError', 'Nama lengkap wajib diisi.');
                    errors.push('Nama lengkap tidak boleh kosong.');
                } else if (nameValue.length < 3) {
                    setInputError(nameInput, 'nameError', 'Nama lengkap minimal 3 karakter.');
                    errors.push('Nama lengkap minimal 3 karakter.');
                }

                if (emailValue === '') {
                    setInputError(emailInput, 'emailError', 'Email wajib diisi.');
                    errors.push('Alamat email harus diisi.');
                } else if (!isValidEmail(emailValue)) {
                    setInputError(emailInput, 'emailError', 'Masukkan format email yang valid.');
                    errors.push('Format email tidak valid.');
                }

                if (passwordValue === '') {
                    setInputError(passwordInput, 'passwordError', 'Kata sandi wajib diisi.');
                    errors.push('Kata sandi tidak boleh kosong.');
                } else if (passwordValue.length < 5) {
                    setInputError(passwordInput, 'passwordError', 'Kata sandi minimal 5 karakter.');
                    errors.push('Kata sandi minimal 5 karakter.');
                }

                if (confirmValue === '') {
                    setInputError(confirmInput, 'confirmError', 'Konfirmasi kata sandi wajib diisi.');
                    errors.push('Konfirmasi kata sandi harus diisi.');
                } else if (passwordValue !== confirmValue) {
                    setInputError(confirmInput, 'confirmError', 'Kata sandi tidak cocok.');
                    errors.push('Konfirmasi kata sandi tidak cocok dengan kata sandi.');
                }

                if (errors.length > 0) {
                    event.preventDefault();
                    showErrorAlert(errors);
                }
            });
        }
    </script>
</body>
</html>