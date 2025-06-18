<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/StoryLogin/halaman6.css') }}" />
  <title>Portal Login</title>
</head>
<body>
    <div class="login-image">
        <div class="speech-bubble">
        Setiap langkahmu akan tercatat dalam Kitab Riwayat Bimbingan. Tempat seluruh perjalananmu dibimbing, dimonitor, dan diarsipkan oleh mentor-mentor pilihan.      <span class="arrow"></span>
        </div>
        <p class="next-text">Klik manapun untuk berikutnya</p>
    </div>
</body>
<script>
    document.querySelector('.login-image').addEventListener('click', function() {
        window.location.href = '{{ route('halaman7') }}';
    });
</script>
</html>
