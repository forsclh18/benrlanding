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

        /* ── Card ── */
        .register-card {
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
        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, #7c6af5 50%, transparent);
        }

        .register-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5), 0 0 0 0.5px #3a3a50;
        }

        .card-body-custom {
            padding: 2.5rem;
        }

        /* ── Brand icon ── */
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

        /* ── Typography ── */
        .register-title {
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

        /* ── Form labels ── */
        .label-modern {
            display: block;
            margin-bottom: 0.45rem;
            font-weight: 500;
            font-size: 0.8rem;
            color: #8888a0;
            letter-spacing: 0.3px;
        }

        /* ── Input group ── */
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

        /* ── Input icons ── */
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

        /* ── Toggle password ── */
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

        /* ── Error feedback ── */
        .invalid-feedback-custom {
            display: block;
            font-size: 0.72rem;
            margin-top: 0.3rem;
            color: #e74c3c;
        }

        /* ── Alert ── */
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

        /* Bootstrap alert override for dark theme */
        .alert-danger {
            background-color: #1f1212;
            border: 0.5px solid #5a1a1a;
            color: #e07070;
            border-radius: 0.75rem;
        }

        .alert-danger .btn-close {
            filter: invert(0.6);
        }

        /* ── Password strength ── */
        .password-strength {
            margin-top: 0.5rem;
            height: 3px;
            background: #1e1e2e;
            border-radius: 3px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease, background-color 0.3s ease;
            border-radius: 3px;
        }

        .strength-text {
            font-size: 0.7rem;
            margin-top: 0.3rem;
            color: #4a4a60;
        }

        /* ── Submit button ── */
        .btn-register {
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
            cursor: pointer;
        }

        .btn-register:hover {
            background: #6a58e0;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(124, 106, 245, 0.3);
            color: white;
        }

        .btn-register:active {
            transform: translateY(0px);
            background: #5d4ec7;
        }

        /* ── Login link ── */
        .login-link {
            color: #7c6af5;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }

        .login-link:hover {
            color: #a090ff;
        }

        /* ── Divider ── */
        .divider-area {
            border-top: 0.5px solid #222230;
            margin: 1.25rem 0;
        }

        /* ── Footer text ── */
        .footer-text {
            font-size: 0.875rem;
            color: #44445a;
            margin: 0;
        }

        /* ── Fade in animation ── */
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

        /* ── Responsive ── */
        @media (max-width: 576px) {
            .card-body-custom {
                padding: 1.75rem;
            }

            .register-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center; position: relative; z-index: 1;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card register-card fade-in" style="border: none; background: transparent;">
                    <div class="card-body card-body-custom">
                        <div class="text-center mb-4">
                            <div class="brand-icon mx-auto">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h2 class="register-title mt-2">Buat Akun Baru</h2>
                            <p class="subtitle mb-0">Bergabung dan mulai perjalanan Anda</p>
                        </div>

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
                                <label for="email" class="label-modern">Alamat Email</label>
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

                            <button type="submit" class="btn btn-register mt-1" id="registerBtn">
                                <i class="fas fa-user-plus"></i> Daftar Akun
                            </button>
                        </form>

                        <div class="divider-area"></div>

                        <div class="text-center">
                            <p class="footer-text">
                                Sudah punya akun?
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
        const registerForm  = document.getElementById('registerForm');
        const nameInput     = document.getElementById('name');
        const emailInput    = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmInput  = document.getElementById('password_confirmation');
        const errorContainer = document.getElementById('errorAlertContainer');
        const strengthBar    = document.getElementById('strengthBar');
        const strengthText   = document.getElementById('strengthText');

        /* ── Error alert ── */
        function showErrorAlert(errorsArray) {
            const existingAlert = errorContainer.querySelector('.alert-dark-custom');
            if (existingAlert) existingAlert.remove();
            if (!errorsArray || errorsArray.length === 0) return;

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert-dark-custom';
            alertDiv.setAttribute('role', 'alert');

            const icon = document.createElement('i');
            icon.className = 'fas fa-circle-exclamation';
            alertDiv.appendChild(icon);

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
            setTimeout(() => { if (alertDiv.parentNode) alertDiv.remove(); }, 6000);
        }

        /* ── Input validation helpers ── */
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
            return /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/.test(email);
        }

        /* ── Password strength ── */
        function evaluatePasswordStrength(password) {
            let score = 0;
            if (password.length >= 5)  score++;
            if (password.length >= 8)  score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;

            if (password.length === 0) return { percentage: 0, text: '', color: '#1e1e2e' };
            if (password.length < 5)   return { percentage: 20, text: 'Terlalu pendek (min. 5 karakter)', color: '#e74c3c' };
            if (score <= 2) return { percentage: 40, text: 'Lemah',        color: '#e74c3c' };
            if (score === 3) return { percentage: 65, text: 'Sedang',       color: '#ef9f27' };
            if (score === 4) return { percentage: 85, text: 'Kuat',         color: '#7c6af5' };
                             return { percentage: 100, text: 'Sangat Kuat', color: '#1d9e75' };
        }

        function updateStrengthMeter() {
            const { percentage, text, color } = evaluatePasswordStrength(passwordInput.value);
            if (strengthBar)  { strengthBar.style.width = percentage + '%'; strengthBar.style.backgroundColor = color; }
            if (strengthText) { strengthText.textContent = text; strengthText.style.color = color; }
        }

        /* ── Event listeners ── */
        passwordInput.addEventListener('input', function () {
            updateStrengthMeter();
            if (passwordInput.value.length > 0 && confirmInput.value.length > 0) {
                passwordInput.value !== confirmInput.value
                    ? setInputError(confirmInput, 'confirmError', 'Kata sandi tidak cocok')
                    : clearInputError(confirmInput, 'confirmError');
            }
        });

        confirmInput.addEventListener('input', function () {
            passwordInput.value !== confirmInput.value
                ? setInputError(confirmInput, 'confirmError', 'Kata sandi tidak cocok')
                : clearInputError(confirmInput, 'confirmError');
        });

        /* ── Toggle visibility ── */
        document.getElementById('togglePasswordBtn').addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            document.getElementById('toggleIcon').classList.toggle('fa-eye-slash', !isPassword);
            document.getElementById('toggleIcon').classList.toggle('fa-eye', isPassword);
        });

        document.getElementById('toggleConfirmBtn').addEventListener('click', function () {
            const isPassword = confirmInput.getAttribute('type') === 'password';
            confirmInput.setAttribute('type', isPassword ? 'text' : 'password');
            document.getElementById('toggleConfirmIcon').classList.toggle('fa-eye-slash', !isPassword);
            document.getElementById('toggleConfirmIcon').classList.toggle('fa-eye', isPassword);
        });

        /* ── Form submit validation ── */
        registerForm.addEventListener('submit', function (event) {
            clearInputError(nameInput,     'nameError');
            clearInputError(emailInput,    'emailError');
            clearInputError(passwordInput, 'passwordError');
            clearInputError(confirmInput,  'confirmError');

            const nameValue     = nameInput.value.trim();
            const emailValue    = emailInput.value.trim();
            const passwordValue = passwordInput.value;
            const confirmValue  = confirmInput.value;
            const errors        = [];

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
    </script>
</body>
</html>