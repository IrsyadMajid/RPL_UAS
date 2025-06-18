<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/StoryLogin/halaman8.css') }}" />
  <title>Portal Login</title>
</head>
<body>
    <div class="login-image">
        <div class="speech-bubble">
        Tapi ingat!!, di Akademia Arcana, gagal bukan akhir dari segalanya. Bahkan Archmage terkuat pun pernah terjatuh, sebelum akhirnya bangkit lebih kuat dari sebelumnya.
    </div>
    <p class="next-text">Klik manapun untuk berikutnya</p>
</body>
<script>
    document.querySelector('.login-image').addEventListener('click', function() {
        window.location.href = '{{ route('halaman9') }}';
    });
</script>
</html>
