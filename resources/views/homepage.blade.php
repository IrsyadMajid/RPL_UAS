<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <!-- Memanggil CSS FontAwesome untuk rendering ikon dashboard -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Memanggil asset CSS kustom dashboard secara aman dengan fungsi pembantu Laravel asset() -->
    <link rel="stylesheet" href="{{ asset('css/Dashboard/style.css') }}" />
</head>
<body>
    <div class="dashboard-container">
        <!-- 🧭 KOMPONEN SIDEBAR (Menu Navigasi Utama) -->
        <aside class="sidebar">
        <img src="{{ asset('images/Dashboard/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
            <!-- Pemanfaatan fungsi route() Laravel untuk memanggil tautan dinamis dari routes/web.php -->
            <a href="{{ route('homepage') }}" class="active"><img src="{{ asset('images/Dashboard/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a>
            <a href="{{ route('peta.peta1') }}"><img src="{{ asset('images/Dashboard/icon-peta.png') }}" alt="Icon Peta" /> Peta</a>
            <a href="{{ route('mentoring.index') }}"><img src="{{ asset('images/Dashboard/icon-mentoring.png') }}" alt="Icon Mentoring" /> Mentoring</a>
            <a href="{{ route('peringkat') }}"><img src="{{ asset('images/Dashboard/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a>
            <a href="{{ route('library') }}"><img src="{{ asset('images/Dashboard/icon-library.png') }}" alt="Icon Library" /> Library</a>
        </nav>
        
        <!-- Formulir LogOut Mahasiswa dengan Proteksi CSRF Token Laravel -->
        <form method="POST" action="{{ route('logout') }}" style="margin:0;padding:0;">
            @csrf <!-- Menghasilkan input hidden token keamanan untuk memvalidasi request POST -->
            <button type="submit" class="logout" style="background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:8px;color:inherit;font:inherit;padding:0;"><img src="{{ asset('images/Dashboard/icon-logout.png') }}" alt="Icon LogOut" /> Logout</button>
        </form>
        </aside>

        <!-- 🖥️ KONTEN UTAMA (Main Workspace) -->
        <main class="main">
            <header>
                <!-- MEMANGGIL DATA BACKEND: Menampilkan nama lengkap/nama panggilan user yang terotentikasi saat ini -->
                <h2>Selamat Datang, {{ auth()->user()->fullname ?? auth()->user()->name }}!</h2>
                <div class="top-right-icons">
                    <button class="icon-button">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <!-- Mengarahkan ke halaman profile mahasiswa -->
                    <a href="{{ route('profile') }}"><img src="{{ asset('images/Dashboard/profile-dashboard.jpg') }}" alt="Profile" class="profile-image" /></a>
                </div>
            </header>

        <!-- 🏰 BAGIAN INTEGRASI GAMIFIKASI RPG (Level, XP, & Leaderboard) -->
        <section class="level-section">
            <div class="level-card">
            <div class="level-text">
                <!-- MEMANGGIL DATA BACKEND: Merender level numerik dan julukan kasta wilayah skripsi mahasiswa secara dinamis -->
                <span class="level-badge">Level {{ auth()->user()->level }} - {{ auth()->user()->level_name }}</span>
                
                <!-- PROGRESS BAR XP: Merender perolehan XP saat ini dibanding ambang batas naik level berikutnya -->
                <div class="level-progress"><small>{{ auth()->user()->xp }}/{{ auth()->user()->xp_for_next_level }}</small></div>
            </div>
            <img src="{{ asset('images/Dashboard/bg-dashboard.png') }}" alt="Portal" class="portal-bg" />
            <img src="{{ asset('images/Dashboard/k-bima-dashboard.png') }}" alt="Karakter" class="character" />
            
            <!-- PAPAN PERINGKAT (Leaderboard Box) -->
            <div class="ranking-box">
                <table class="ranking-table">
                <thead>
                    <tr>
                    <th>Rank</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Konsistensi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- MEMANGGIL DATA BACKEND: Looping data array peringkat tiruan dari DashboardController -->
                    @foreach($rankingData as $rank)
                    <tr>
                        <td>{{ $rank['rank'] }}</td>
                        <td>{{ $rank['name'] }}</td>
                        <td>{{ $rank['level'] }}</td>
                        <td>{{ $rank['consistency'] }}</td>
                    </tr>
                    @endforeach
                    
                    <!-- BARIS ANDA (Current Student Highlight Bar) -->
                    <tr class="you">
                        <td>{{ $userRank }}</td>
                        <td>{{ auth()->user()->fullname ?? auth()->user()->name }}</td>
                        <td>{{ auth()->user()->level }}</td>
                        <td>100%</td>
                    </tr>
                    </tbody>
            </table>
        </div>

            <!-- 📝 WIDGET KONTEN (Events, Riwayat Bimbingan, & Quest) -->
            <section class="cards">
                <div class="card event">
                    <strong>📢 Event mendatang!</strong>
                    <p>Seminar Proposal Batch Mei – Pendaftaran dibuka hingga 28 Mei!</p>
                </div>
                
                <!-- RIWAYAT BIMBINGAN (Menggunakan perulangan aman forelse Laravel) -->
                <div class="card history">
                    <strong>🗝️ Riwayat Bimbingan</strong>
                    @forelse ($mentoringHistory as $item)
                        <div class="history-item" style="padding: 10px 0;">
                            <p style="margin: 0;">
                                <!-- Mengubah format proposed_date database menjadi format hari/bulan Indonesia via Carbon -->
                                <strong>{{ \Carbon\Carbon::parse($item->proposed_date)->translatedFormat('d F Y H.i') }} WIB</strong>
                                <br />
                                {{ $item->topic }} - <span style="font-weight: bold;">{{ $item->status }}</span>
                            </p>
                        </div>
                        @if (!$loop->last)
                            <!-- Pembatas horizontal, tidak ditampilkan pada item terakhir perulangan -->
                            <hr style="border: 0; height: 1px; background-color: #eeeeee; margin: 0;">
                        @endif
                    @empty
                        <!-- Blok cadangan jika antrean mentoring mahasiswa masih kosong -->
                        <p>Belum ada riwayat bimbingan.</p>
                    @endforelse

                    @if(isset($mentoringHistory) && $mentoringHistory->isNotEmpty())
                        <!-- Tombol ekspansi rujukan ke folder mentoring utama -->
                        <a href="{{ route('mentoring.1') }}" style="display: block; text-align: center; margin-top: 10px; font-weight: bold; text-decoration: none; color: #007bff;">
                            Lihat Semua
                        </a>
                    @endif
                </div>
                
                <!-- QUEST HARIAN: Memicu controller completeQuest via form POST terenkripsi CSRF -->
                <div class="card quest">
                    <strong>🪄 Quest</strong>
                    <p>Beri nama tongkat sihirmu</p>
                    <form action="{{ route('dashboard.completeQuest') }}" method="POST">
                        @csrf <!-- Proteksi keutuhan input Laravel -->
                        <button type="submit">+10XP</button>
                    </form>
                </div>
            </section>
            </main>
        </div>
    </div>
</body>
</html>
