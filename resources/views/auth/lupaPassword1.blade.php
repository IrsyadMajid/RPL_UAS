<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lupa Password</title>
    <link rel="stylesheet" href="{{ asset('css/lupaPassword1/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-box">
        <h2><span class="highlight">Lupa Password</span></h2>
        <p>Untuk keamanan akun, jangan menyebarkan password anda</p>
        <form action="{{ route('password.manual.reset') }}" method="POST">
            <label for="new-password">Password Baru</label>
            <div class="password-wrapper">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="password" name="new_password" required>
            <button type="button" class="eye" onclick="togglePassword(this, 'new-password')">
                <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7zm0
                    12c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3
                    1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z"/>
                </svg>
                <svg class="eye-closed" style="display: none;" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7z"/>
                <circle cx="12" cy="12" r="3"/>
                <path d="M3 3l18 18" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </button>
            </div>

            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
            <div class="password-wrapper">
            @csrf
            <input type="password" name="new_password_confirmation" required>
            <button type="button" class="eye" onclick="togglePassword(this, 'confirm-password')">
                <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7zm0
                    12c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3
                    1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z"/>
                </svg>
                <svg class="eye-closed" style="display: none;" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7z"/>
                <circle cx="12" cy="12" r="3"/>
                <path d="M3 3l18 18" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </button>
            </div>

            <button type="submit" class="submit-button">Ubah Password</button>
        </form>
        </div>
    </div>

    <script>
        function togglePassword(button, inputId) {
        const input = document.getElementById(inputId);
        const eyeOpen = button.querySelector('.eye-open');
        const eyeClosed = button.querySelector('.eye-closed');

        if (!input || !eyeOpen || !eyeClosed) return;

        if (input.type === "password") {
            input.type = "text";
            eyeOpen.style.display = "none";
            eyeClosed.style.display = "inline";
        } else {
            input.type = "password";
            eyeOpen.style.display = "inline";
            eyeClosed.style.display = "none";
        }
        }
    </script>
</body>
</html>
