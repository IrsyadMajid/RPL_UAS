<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <img src="{{ asset('images/Login_Register/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
            <a href="dashboard.html" class="active"><img src="assets/icon-dashboarad.png" alt="" /> Dashboard</a>
            <a href="../peta/peta.html"><img src="assets/icon-peta.png" alt="" /> Peta</a>
            <a href="../mentoring/1/mentoring.html"><img src="assets/icon-mentoring.png" alt="" /> Mentoring</a>
            <a href="../peringkat/peringkat.html"><img src="assets/icon-peringkat.png" alt="" /> Peringkat</a>
            <a href="../library/library.html"><img src="assets/icon-library.png" alt="" /> Library</a>
        </nav>
        <a class="logout" href="../login/1/login1.html"><img src="assets/icon-logout.png" alt="" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <h2>Selamat Datang, Berlian Ika!</h2>
                <div class="top-right-icons">
                    <button class="icon-button">
                    <i class="fa-solid fa-bell"></i>
                    </button>
                    <img src="{{ asset('images/Dashboard/profile-dashboard.png') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

        <section class="level-section">
            <div class="level-card">
            <div class="level-text">
                <span class="level-badge">Level 1 - Gerbang Arcana</span>
                <div class="level-progress"><small>5/65</small></div>
            </div>
            <img src="assets/bg-dashboard.png" alt="Portal" class="portal-bg" />
            <img src="assets/k-bima-dashboard.png" alt="Karakter" class="character" />
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
                <tr>
                    <td>🥇</td>
                    <td>M. Irsyad Majid</td>
                    <td>10</td>
                    <td>98%</td>
                </tr>
                <tr>
                    <td>🥈</td>
                    <td>Lucky Fitrianda</td>
                    <td>10</td>
                    <td>96%</td>
                </tr>
                <tr>
                    <td>🥉</td>
                    <td>M. Rafathar A.</td>
                    <td>10</td>
                    <td>92%</td>
                </tr>
                <tr class="you">
                    <td>156</td>
                    <td>Berlian Ika</td>
                    <td>1</td>
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
                    <button>+60XP</button>
                </div>
            </section>
            </main>
        </div>
    </div>
</body>
</html>
