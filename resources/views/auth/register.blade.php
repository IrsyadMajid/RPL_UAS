<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal Masuk BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Register/style.css') }}" />
</head>
<body>
    <div class="container">
        <div class="login-form">
        <img src="{{ asset('images/Login_Register/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <h2>Portal Masuk BIMA</h2>
        <p class="tagline">Keberanian adalah mantra pertama menuju kelulusan.</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama" required />

            <label for="username">Email</label>
            <input type="text" id="username" name="email" placeholder="Masukkan email" required />

            <label for="password">Password</label>
            <div class="password-wrapper">
            <input type="password" id="password" name="password" placeholder="Masukkan password" required />
            <button type="button" class="eye" onclick="togglePassword(this)">
                <svg class="eye-icon eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7
                11-7 11-7-3.367-7-11-7zm0 12c-2.761 0-5-2.239-5-5s2.239-5
                5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3
                1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z"/>
                </svg>
                <svg class="eye-icon eye-closed" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7
                11-7 11-7-3.367-7-11-7z"/>
                <circle cx="12" cy="12" r="3"/>
                <path d="M3 3l18 18" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </button>
            </div>

            <label for="password_confirmation">Konfirmasi Password</label>
            <div class="password-wrapper">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password" required />
            <button type="button" class="eye" onclick="togglePassword(this)">
                <svg class="eye-icon eye-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7
                11-7 11-7-3.367-7-11-7zm0 12c-2.761 0-5-2.239-5-5s2.239-5
                5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3
                1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z"/>
                </svg>
                <svg class="eye-icon eye-closed" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7
                11-7 11-7-3.367-7-11-7z"/>
                <circle cx="12" cy="12" r="3"/>
                <path d="M3 3l18 18" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
            </button>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <button type="submit" id="loginBtn">Masuk Dunia Akademia Arcana</button>
        </form>
        </div>
        <div class="login-image"></div>
    </div>
    <script src="{{ asset('js/Register/script.css') }}"></script>
</body>
</html>
