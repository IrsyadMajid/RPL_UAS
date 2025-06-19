<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Mentoring/mentoring1.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peta/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
            <a href="{{ route('homepage') }}"
                ><img src="{{ asset('images/Mentoring/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a
            >
            <a href="{{ route('peta.peta1') }}"
                ><img src="{{ asset('images/Mentoring/icon-map.png') }}" alt="Icon Peta" /> Peta</a
            >
            <a href="{{ route('mentoring') }}" class="active"
                ><img src="{{ asset('images/Mentoring/icon-bimbingan.png') }}" alt="Icon Mentoring" /> Mentoring</a
            >
            <a href="{{ route('peringkat') }}"
                ><img src="{{ asset('images/Mentoring/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a
            >
            <a href="{{ route('library') }}"
                ><img src="{{ asset('images/Mentoring/icon-library.png') }}" alt="Icon Library" /> Library</a
            >
            </nav>
            <a class="logout" href="{{ route('login') }}"
            ><img src="{{ asset('images/Mentoring/icon-logout.png') }}" alt="Icon Log Out" /> Logout</a
            >
        </aside>

        <main class="main">
            <header>
            <div></div>
            <div class="top-right-icons">
                <button class="icon-button">
                <i class="fa-solid fa-bell"></i>
                </button>
                <img
                src="{{ asset('images/Mentoring/profile-dashboard.jpg') }}"
                alt="Profile"
                class="profile-image"
                />
            </div>
            </header>

            <div class="wrapper">
            <div class="mentoring-card">
                <div class="section-title">
                <h3>Yang akan datang</h3>
                <p class="empty-text">Tidak Ada</p>
                </div>

                <div class="section-title">
                <h3>Riwayat Bimbingan</h3>
                <div class="mentoring-list">
                    <div class="mentoring-item">
                    <div>
                        <p class="mentoring-title">Draft BAB II</p>
                        <p class="mentoring-time">
                        12 Mei 2025 - 14:00 (Online Meet)
                        </p>
                    </div>
                    <button id="unggah" class="upload-button">
                        Unggah Bukti
                    </button>
                    </div>
                    <div class="mentoring-item">
                    <div>
                        <p class="mentoring-title">Draft BAB II</p>
                        <p class="mentoring-time">10 Mei 2025 - (Online)</p>
                    </div>
                    <span id="bab3" class="claimed-tag">Terklaim</span>
                    </div>
                    <div class="mentoring-item">
                    <div>
                        <p class="mentoring-title">Draft BAB I</p>
                        <p class="mentoring-time">5 Mei 2025 - (Online)</p>
                    </div>
                    <span id="bab3" class="claimed-tag">Terklaim</span>
                    </div>
                    <div class="mentoring-item">
                    <div>
                        <p class="mentoring-title">Draft BAB I</p>
                        <p class="mentoring-time">1 Mei 2025 - 07:00 (Offline)</p>
                    </div>
                    <span id="bab1" class="claimed-tag">Terklaim</span>
                    </div>
                </div>
                </div>
            </div>

            <div class="maskot-wrapper">
                <img src="{{ asset('images/Mentoring/k-bima.png') }}" alt="maskot" class="maskot" />
                <div id="chat-bubble" class="chat-bubble">
                Sudah mulai banyak sesi telah kamu lalui, merupakan satu langkah
                lebih dekat menuju gelar magister pengetahuan. Teruslah melangkah,
                jangan lengah!
                </div>
            </div>
            </div>

            <button class="mentoring-submit">Ajukan Jadwal Mentoring</button>
        </main>
    </div>

<script>
      const texts = [
        "Sudah mulai banyak sesi telah kamu lalui, merupakan satu langkah lebih dekat menuju gelar magister pengetahuan. Teruslah melangkah, jangan lengah!",
        "Jangan lupa unggah bukti mentoring agar pencapaianmu tercatat dengan baik!",
        "Setiap langkah kecil hari ini, adalah lompatan besar di masa depan!",
      ];

      let currentIndex = 0;
      const bubble = document.getElementById("chat-bubble");

      function updateBubbleText() {
        bubble.style.opacity = 0;
        setTimeout(() => {
          bubble.textContent = texts[currentIndex];
          bubble.style.opacity = 1;
          currentIndex = (currentIndex + 1) % texts.length;
        }, 500);
      }

    document.addEventListener('DOMContentLoaded', function() {

        document.querySelector(".claimed-tag")?.addEventListener("click", function() {
            window.location.href = "{{ route('mentoring.1') }}";
        });

        document.querySelector(".mentoring-submit")?.addEventListener("click", function() {
            window.location.href = "{{ route('mentoring.2') }}";
        });
    });
</script>
</body>
</html>
