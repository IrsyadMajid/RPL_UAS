<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Dashboard/style.css') }}" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <img src="{{ asset('images/Dashboard/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
            <a href="{{ route('homepage') }}" class="active"><img src="{{ asset('images/Dashboard/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a>
            <a href="{{ route('peta.peta1') }}"><img src="{{ asset('images/Dashboard/icon-peta.png') }}" alt="Icon Peta" /> Peta</a>
            <a href="{{ route('mentoring') }}"><img src="{{ asset('images/Dashboard/icon-mentoring.png') }}" alt="Icon Mentoring" /> Mentoring</a>
            <a href="{{ route('peringkat') }}"><img src="{{ asset('images/Dashboard/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a>
            <a href="{{ route('library') }}"><img src="{{ asset('images/Dashboard/icon-library.png') }}" alt="Icon Library" /> Library</a>
        </nav>
        <a class="logout" href="{{ route('login') }}"><img src="{{ asset('images/Dashboard/icon-logout.png') }}" alt="Icon LogOut" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <h2>Selamat Datang, {{ auth()->user()->fullname ?? auth()->user()->name }}!</h2>
                <div class="top-right-icons">
                    <button class="icon-button">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <a href="{{ route('profile') }}"><img src="{{ asset('images/Dashboard/profile-dashboard.jpg') }}" alt="Profile" class="profile-image" /></a>
                </div>
            </header>

        <section class="level-section">
            <div class="level-card">
            <div class="level-text">
                <span class="level-badge">Level {{ auth()->user()->level }} - {{ auth()->user()->level_name }}</span>
                <div class="level-progress"><small>{{ auth()->user()->xp }}/{{ auth()->user()->xp_for_next_level }}</small></div>
            </div>
            <img src="{{ asset('images/Dashboard/bg-dashboard.png') }}" alt="Portal" class="portal-bg" />
            <img src="{{ asset('images/Dashboard/k-bima-dashboard.png') }}" alt="Karakter" class="character" />
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
                    @foreach($rankingData as $rank)
                    <tr>
                        <td>{{ $rank['rank'] }}</td>
                        <td>{{ $rank['name'] }}</td>
                        <td>{{ $rank['level'] }}</td>
                        <td>{{ $rank['consistency'] }}</td>
                    </tr>
                    @endforeach
                    <tr class="you">
                        <td>{{ $userRank }}</td>
                        <td>{{ auth()->user()->fullname ?? auth()->user()->name }}</td>
                        <td>{{ auth()->user()->level }}</td>
                        <td>100%</td>
                    </tr>
                    </tbody>
            </table>
        </div>

            <section class="cards">
                <div class="card event">
                    <strong>📢 Event mendatang!</strong>
                    <p>Seminar Proposal Batch Mei – Pendaftaran dibuka hingga 28 Mei!</p>
                </div>
                <div class="card history">
                    <strong>🗝️ Riwayat bimbingan</strong>
                    <p>12 Mei 2025 – 13.00 WIB<br />Pendahuluan (Bab 1) - Revisi</p>
                </div>
                <div class="card quest">
                    <strong>🪄 Quest</strong>
                    <p>Beri nama tongkat sihirmu</p>
                    <form action="{{ route('dashboard.completeQuest') }}" method="POST">
                        @csrf
                        <button type="submit">+10XP</button>
                    </form>
                </div>
            </section>
            </main>
        </div>
    </div>
</body>
</html>
