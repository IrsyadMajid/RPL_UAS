<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Mentoring/mentoringDraft1.css') }}" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peta/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
                <a href="{{ route('homepage') }}"><img src="{{ asset('images/Mentoring/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a>
                <a href="{{ route('peta.peta1') }}"><img src="{{ asset('images/Mentoring/icon-map.png') }}" alt="Icon Peta" /> Peta</a>
                <a href="{{ route('mentoring.index') }}" class="active"><img src="{{ asset('images/Mentoring/icon-bimbingan.png') }}" alt="Icon Mentoring" /> Mentoring</a>
                <a href="{{ route('peringkat') }}"><img src="{{ asset('images/Mentoring/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a>
                <a href="{{ route('library') }}"><img src="{{ asset('images/Mentoring/icon-library.png') }}" alt="Icon Library" /> Library</a>
            </nav>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;padding:0;">@csrf<button type="submit" class="logout" style="background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:8px;color:inherit;font:inherit;padding:0;"><img src="{{ asset('images/Mentoring/icon-logout.png') }}" alt="Icon Log Out" /> Logout</button></form>
        </aside>

        <main class="main">
        <header>
            <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <button class="icon-button"><i class="fa-solid fa-comment-dots"></i></button>
                <img src="{{ asset('images/Mentoring/profile-dashboard.jpg') }}" alt="Profile" class="profile-image" />
            </div>
        </header>

        <div class="wrapper">
            <div class="mentoring-card">
            <div class="section-title">
                <h3>Yang akan datang</h3>
            </div>
            @forelse ($upcoming as $mentoring)
            <div class="mentoring-item">
                <div class="mentoring-left">
                    <div>
                        <img src="{{ asset('images/Mentoring/icon-buku.png') }}" alt="Book Icon" style="width: 18px; height: 18px;" />
                    </div>
                    <div class="text-wrapper">
                        <p class="mentoring-title">{{ $mentoring->topic }}</p>
                        <p class="mentoring-time">
                        {{ \Carbon\Carbon::parse($mentoring->proposed_date)->format('d M Y - H:i') }} ({{ $mentoring->jenis_bimbingan }})
                        </p>
                    </div>
                </div>
                <span class="claimed-tag">+40 XP</span>
            </div>
            @empty
                <p class="empty-message">Tidak ada jadwal bimbingan yang akan datang.</p>
            @endforelse

            <div class="section-title">
                <h3>Riwayat Bimbingan</h3>
            </div>

            <div class="mentoring-list">
                @forelse ($history as $mentoring)
                <div class="mentoring-item">
                    <div class="mentoring-left">
                        <div class="icon-wrapper">
                            <img src="{{ asset('images/Mentoring/icon-buku.png') }}" alt="Book Icon" style="width: 18px; height: 18px;" />
                        </div>
                        <div class="text-wrapper">
                            <p class="mentoring-title">{{ $mentoring->topic }}</p>
                            <p class="mentoring-time">
                                {{ \Carbon\Carbon::parse($mentoring->proposed_date)->format('d M Y') }} - ({{ $mentoring->jenis_bimbingan }})
                            </p>
                        </div>
                    </div>
                    @if ($mentoring->status == 'Menunggu')
                            <span class="status-tag pending">Menunggu</span>
                        @elseif ($mentoring->status == 'Ditolak')
                            <span class="status-tag rejected">Ditolak</span>
                        @else
                            <span class="status-tag claimed">Terklaim</span>
                        @endif
                </div>

                @empty
                    <p class="empty-message">Belum ada riwayat bimbingan.</p>
                @endforelse
            </div>
        </div>

            <div class="maskot-wrapper">
            <img src="{{ asset('images/Mentoring/k-bima.png') }}" alt="maskot" class="maskot" />
                <div id="chat-bubble" class="chat-bubble">
                    Sudah mulai banyak sesi telah kamu lalui, merupakan satu langkah lebih dekat menuju gelar magister pengetahuan. Teruslah melangkah, jangan lengah!
                </div>
            </div>
        </div>
        <a href="{{ route('mentoring.draft') }}" class="mentoring-submit">Ajukan Jadwal Mentoring</a>
        </main>
    </div>

    <script>
        const texts = [
        "Sudah mulai banyak sesi telah kamu lalui, merupakan satu langkah lebih dekat menuju gelar magister pengetahuan. Teruslah melangkah, jangan lengah!",
        "Jangan lupa unggah bukti mentoring agar pencapaianmu tercatat dengan baik!",
        "Setiap langkah kecil hari ini, adalah lompatan besar di masa depan!"
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

        setInterval(updateBubbleText, 10000);
        window.onload = updateBubbleText;
    </script>
</body>
</html>
