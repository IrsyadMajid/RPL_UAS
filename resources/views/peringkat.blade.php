<!DOCTYPE html>
<html lang="id">
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard BIMA</title>
  <link rel="stylesheet" href="{{ asset('css/Peringkat/style.css') }}" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peringkat/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
            <a href="{{ route('homepage') }}"
                ><img src="{{ asset('images/Peringkat/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a
            >
            <a href="{{ route('peta.peta1') }}"
                ><img src="{{ asset('images/Peringkat/icon-peta.png') }}" alt="Icon Peta" /> Peta</a
            >
            <a href="{{ route('mentoring') }}"
                ><img src="{{ asset('images/Peringkat/icon-bimbingan.png') }}" alt="Icon Mentoring" /> Mentoring</a
            >
            <a href="{{ route('peringkat') }}" class="active"
                ><img src="{{ asset('images/Peringkat/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a
            >
            <a href="{{ route('library') }}"
                ><img src="{{ asset('images/Peringkat/icon-library.png') }}" alt="Icon Library" /> Library</a
            >
            </nav>
            <a class="logout" href="{{ route('login') }}"
            ><img src="{{ asset('images/Peringkat/icon-logout.png') }}" alt="Icon Log Out" /> Logout</a
            >
        </aside>

        <main class="main">
            <header>
                <div></div>
                <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <img src="{{ asset('images/Peringkat/profile-dashboard.jpg') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

            <section class="leaderboard">
            <h2>Peringkat Arcana Tertinggi</h2>

            <div class="podium">
                <div class="rank second">
                    <img src="{{ asset('images/Peringkat/lucky.png') }}" alt="Lucky Fitrianda">
                    <p>Lucky Fitrianda<br><strong>Level 10 | 96%</strong></p>
                </div>
                <div class="rank first">
                    <img src="{{ asset('images/Peringkat/irsyad.png') }}" alt="M. Irsyad Majid">
                    <p>M. Irsyad Majid<br><strong>Level 10 | 98%</strong></p>
                </div>
                <div class="rank third">
                    <img src="{{ asset('images/Peringkat/rafathar.png') }}" alt="M. Rafathar A">
                    <p>M. Rafathar A<br><strong>Level 10 | 92%</strong></p>
                </div>
            </div>

            <table class="rank-table">
                <thead>
                <tr>
                    <th>Rank</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Konsistensi</th>
                </tr>
                </thead>
                <tbody>
                    <tr><td>4</td><td>Ariana Somen</td><td>10</td><td>95%</td></tr>
                    <tr><td>5</td><td>Alvara Nixora</td><td>10</td><td>95%</td></tr>
                    <tr><td>6</td><td>Jeron Valtine</td><td>10</td><td>94%</td></tr>
                    <tr><td>7</td><td>Mireya Solenne</td><td>10</td><td>94%</td></tr>
                    <tr><td>8</td><td>Kaelen Drest</td><td>10</td><td>93%</td></tr>
                </tbody>
            </table>

            <div class="avatar-info">
                <div class="speech-bubble">
                Kamu berada di Peringkat<br>156 dengan 100% Konsistensi!
                </div>
                <img src="{{ asset('images/Peringkat/k-bima.png') }}" alt="Avatar" />
            </div>
        </section>
        </main>
    </div>
</body>
</html>
