<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Dosen_Dashboard/style.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <img src="{{ asset('images/Dosen_Dashboard/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
            <a href="../dosen-dashboard/dashboard-dosen.html" class="active"><img src="{{ asset('images/Dosen_Dashboard/icon-dashboard.png') }}" alt="" /> Dashboard
            </a>
            <a href="../dosen-mahasiswa copy/mahasiswa-dosen1.html"><img src="{{ asset('images/Dosen_Dashboard/icon-mahasiswa.png') }}" alt="" /> Mahasiswa</a>
            <a href="../dosen-bimbingan/bimbingan-dosen.html"><img src="{{ asset('images/Dosen_Dashboard/icon-bimbingan.png') }}" alt="" /> Bimbingan</a>
        </nav>
        <a class="logout" href="../login/1/login1.html"><img src="{{ asset('images/Dosen_Dashboard/icon-logout.png') }}" alt="" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <div></div>
                <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <img src="{{ asset('images/Dosen_Dashboard/dashboard-profile.png') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

            <section class="dashboard-content">
                <h2>Selamat Datang, Pratama Wirya Atmaja, S.Kom., M.Kom!</h2>

                <div class="summary-cards">
                    <div class="card purple">
                        <div class="card-info">
                        <h3>Total Mahasiswa Bimbingan</h3>
                        <p>23</p>
                        </div>
                        <img src="{{ asset('images/Dosen_Dashboard/icon-totalmahasiswa.png') }}" alt="icon" class="card-img-icon" />
                    </div>

                    <div class="card purple">
                        <div class="card-info">
                        <h3>Proses Bimbingan</h3>
                        <p>20</p>
                        </div>
                        <img src="{{ asset('images/Dosen_Dashboard/icon-prosesbimbingan.png') }}" alt="icon" class="card-img-icon" />
                    </div>

                    <div class="card purple">
                        <div class="card-info">
                        <h3>Sudah Sidang</h3>
                        <p>3</p>
                        </div>
                        <img src="{{ asset('images/Dosen_Dashboard/icon-sudahsidang.png') }}" alt="icon" class="card-img-icon" />
                    </div>
                    </div>

                    <div class="dashboard-grid">
                        <div class="chart-card grafik">
                            <div class="card-header">
                            <h4>Grafik Bimbingan</h4>
                                <div class="tab-options">
                                    <span class="tab active">Minggu</span>
                                    <span class="tab">Bulan</span>
                                    <span class="tab">Tahun</span>
                                </div>
                            </div>
                            <canvas id="barChart"></canvas>
                        </div>

                    <div class="chart-card statistik">
                        <h4>Statistik Mahasiswa</h4>
                        <canvas id="pieChart"></canvas>
                        <div class="chart-legend">
                            <div><span style="color:#7c4dff; font-weight:bold;">▣</span> Proses Bimbingan <span style="color:#7c4dff;">87%</span></div>
                            <div><span style="color:#ffca28; font-weight:bold;">▣</span> Sudah Sidang <span style="color:#ffca28;">13%</span></div>
                        </div>
                    </div>

                    <div class="kanan">
                        <div class="status-box">Judul Belum Disetujui<br /><strong>12</strong></div>
                        <div class="status-box">Bimbingan Belum Disetujui<br /><strong>12</strong></div>
                        <div class="status-box">Sempro Belum Disetujui<br /><strong>12</strong></div>
                        <div class="status-box">Semhas Belum Disetujui<br /><strong>12</strong></div>
                    </div>
                </div>

                <h3>Bimbingan Mendatang</h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Permintaan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2308100306</td>
                            <td>Berlian Ika Isabela</td>
                            <td>ACC Bimbingan</td>
                            <td>1 Juni 2025</td>
                            <td>
                                <span class="icon-check">✔️</span>
                                <span class="icon-cross">❌</span>
                                <a href="#">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2308100601</td>
                            <td>Lucky Fitrianda Wahyudi</td>
                            <td>ACC Judul</td>
                            <td>1 Juni 2025</td>
                            <td>
                                <span class="icon-check">✔️</span>
                                <span class="icon-cross">❌</span>
                                <a href="#">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2308101042</td>
                            <td>Muhammad Irsyad Majid</td>
                            <td>ACC Sempro</td>
                            <td>1 Juni 2025</td>
                            <td>
                                <span class="icon-check">✔️</span>
                                <span class="icon-cross">❌</span>
                                <a href="#">Lihat Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const barCtx = document.getElementById('barChart');
    new Chart(barCtx, {
        type: 'bar',
        data: {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
        datasets: [{
            label: 'Jumlah Bimbingan',
            data: [5, 15, 15, 12, 9],
            backgroundColor: '#7c4dff'
        }]
        },
        options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        }
        }
    });

    const pieCtx = document.getElementById('pieChart');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
        labels: ['Proses Bimbingan', 'Sudah Sidang'],
        datasets: [{
            data: [87, 13],
            backgroundColor: ['#7c4dff', '#ffca28']
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
            display: false
            }
        }
        }
    });
    </script>
</script>
</body>
</html>
