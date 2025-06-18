<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/StoryLogin/halaman10.css') }}" />
  <title>Portal Login</title>
</head>
<body>
    <div class="login-image">
        <div class="speech-bubble">
        Siapkah kamu memulai perjalananmu? Karena begitu kamu sudah melangkah ke Arena, tak ada jalan untuk kembali, selain menuju takdirmu sebagai legenda baru di langit para Archmage.
    </div>
<button class="fixed-button">Bawa Aku ke Arena!</button>
</body>
<script>
    document.querySelector('.fixed-button').addEventListener('click', function() {
        window.location.href = '{{ route('homepage') }}';
    });
</script>
</html>
