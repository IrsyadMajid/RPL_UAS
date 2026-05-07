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
            <a href="{{ route('mentoring.index') }}" class="active"
                ><img src="{{ asset('images/Mentoring/icon-bimbingan.png') }}" alt="Icon Mentoring" /> Mentoring</a
            >
            <a href="{{ route('peringkat') }}"
                ><img src="{{ asset('images/Mentoring/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a
            >
            <a href="{{ route('library') }}"
                ><img src="{{ asset('images/Mentoring/icon-library.png') }}" alt="Icon Library" /> Library</a
            >
            </nav>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;padding:0;">@csrf<button type="submit" class="logout" style="background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:8px;color:inherit;font:inherit;padding:0;"><img src="{{ asset('images/Mentoring/icon-logout.png') }}" alt="Icon Log Out" /> Logout</button></form>
        </aside>

        <main class="main">
            <header>
                <div class="top-right-icons">
                    <button class="icon-button">
                    <i class="fa-solid fa-bell"></i>
                    </button>
                    <img
                    src="{{ asset('images/Mentoring/profile-dashboard.jpg') }}"
                    alt="Profile"
                    class="profile-image"/>
                </div>
            </header>

            @if (session('success'))
                <div class="alert alert-success" style="padding: 15px; background-color: #d4edda; color: #155724; border-radius: 8px; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="wrapper">
                <div class="mentoring-card">
                    <div class="section-title">
                        <h3>Yang akan datang</h3>
                    </div>
                    @forelse($upcoming as $item)
                    <div class="mentoring-item">
                        <div>
                            <p class="mentoring-title">{{ $item->topic }}</p>
                            <p class="mentoring-time">{{ \Carbon\Carbon::parse($item->proposed_date)->format('d M Y, H:i') }} - ({{ $item->jenis_bimbingan }})</p>
                        </div>
                        <a href="{{ route('mentoring.D', ['id' => $item->id]) }}" class="claimed-tag" style="background-color: #28a745;">Disetujui</a>
                    </div>
                    @empty
                    <p class="empty-text">Tidak ada jadwal yang akan datang.</p>
                    @endforelse

                <div class="section-title" style="margin-top: 30px;">
                    <h3>Riwayat Bimbingan</h3>
                </div>
                <div class="mentoring-list">
                    @forelse($history as $item)
                    <div class="mentoring-item">
                        <div>
                            <p class="mentoring-title">{{ $item->topic }}</p>
                            <p class="mentoring-time">{{ \Carbon\Carbon::parse($item->proposed_date)->format('d M Y, H:i') }} - ({{ $item->jenis_bimbingan }})</p>
                        </div>
                        @if($item->status == 'Menunggu')
                                <a href="{{ route('mentoring.D', ['id' => $item->id]) }}" class="claimed-tag" style="background-color: #ffc107; color: #212529;">{{ $item->status }}</a>
                            @elseif($item->status == 'Ditolak')
                                <a href="{{ route('mentoring.D', ['id' => $item->id]) }}" class="claimed-tag" style="background-color: #dc3545;">{{ $item->status }}</a>
                            @else
                                <span class="claimed-tag">{{ $item->status }}</span>
                            @endif
                    </div>
                    @empty
                    <p class="empty-text">Tidak ada riwayat bimbingan.</p>
                    @endforelse
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
