<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="{{ asset('css/lupaPassword/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-box">
        <h2>Lupa <span>Password</span></h2>
        <p>Untuk keamanan akun, jangan menyebarkan password anda</p>
        <form action="{{ route('submitLupaPassword') }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Masukkan email anda" required>
            <button type="submit">Kirim</button>
        </form>
        </div>
    </div>
</body>
</html>
