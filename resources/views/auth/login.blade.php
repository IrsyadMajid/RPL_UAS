<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
            <div class="left-side">
                <div class="logo">
                    <img src="{{ asset('images/Logo_BIMA.png') }}" alt="Logo Bima">
                </div>
                <p class="tagline">Keberanian adalah mantra pertama menuju kelulusan.</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar Disini!</a></p>
                    <button type="submit" class="login-button">Masuk Dunia Akademik Arcana</button>
                </form>
                @if($errors->any())
                    <div style="color:red;">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
            <div class="right-side">
                <div class="icon1">
                    <img src="{{ asset('images/Icon_Login.png') }}" alt="Icon Login">
                </div>
            </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            toggleIcon.textContent = passwordInput.type === 'password' ? '👁️' : '👁️‍🗨️';
        }
    </script>
</body>
</html>
