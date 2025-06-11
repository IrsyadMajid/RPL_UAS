<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="left-side">
            <div class="logo">
                <img src="{{ asset('images/Logo_BIMA.png') }}" alt="Logo Bima">
            </div>
            <p class="tagline">Daftarkan dirimu untuk memulai perjalanan akademikmu.</p>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required placeholder="Masukkan nama">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password">
                </div>
                <button type="submit" class="login-button">Daftar</button>
            </form>
            @if($errors->any())
                <div style="color:red;">
                    {{ $errors->first() }}
                </div>
            @endif
        </div>
        <div class="right-side">
            <div class="icon1">
                <img src="{{ asset('images/Icon_Login.png') }}" alt="Icon Register">
            </div>
        </div>
    </div>
</body>
</html>
