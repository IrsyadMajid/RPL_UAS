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
            <a href="{{ route('admin.a-dashboard') }}" class="active"><img src="{{ asset('images/Dosen_Dashboard/icon-dashboard.png') }}" alt="" /> Dashboard</a>
            <a href="{{ route('admin.a-mahasiswa') }}"><img src="{{ asset('images/Dosen_Dashboard/icon-mahasiswa.png') }}" alt="" /> Mahasiswa</a>
            <a href="{{ route('admin.a-bimbingan') }}"><img src="{{ asset('images/Dosen_Dashboard/icon-bimbingan.png') }}" alt="" /> Bimbingan</a>
        </nav>
        <a class="logout" href="{{ route('login') }}"><img src="{{ asset('images/Dosen_Dashboard/icon-logout.png') }}" alt="" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <img src="{{ asset('images/Dosen_Dashboard/dashboard-profile.png') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

            <section class="dashboard-content">
                <h2>Selamat Datang</h2>
                <div class="summary-cards">
                    <div class="card purple">
                        <div class="card-info">
                        <h3>Total Mahasiswa Bimbingan</h3>
                        <p>{{ $stats['total_students'] }}</p>
                        </div>
                        <img src="{{ asset('images/Dosen_Dashboard/icon-totalmahasiswa.png') }}" alt="icon" class="card-img-icon" />
                    </div>

                    <div class="card purple">
                        <div class="card-info">
                        <h3>Proses Bimbingan</h3>
                        <p>{{ $stats['ongoing_guidances'] }}</p>
                        </div>
                        <img src="{{ asset('images/Dosen_Dashboard/icon-prosesbimbingan.png') }}" alt="icon" class="card-img-icon" />
                    </div>

                    <div class="card purple">
                        <div class="card-info">
                        <h3>Sudah Sidang</h3>
                        <p>{{ $stats['completed_defenses'] }}</p>
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
                            <div>
                                <span style="color:#7c4dff; font-weight:bold;">▣</span> Proses Bimbingan
                                <span style="color:#7c4dff;">{{ $pieChartData['proses_percentage'] }}%</span>
                            </div>
                            <div>
                                <span style="color:#ffca28; font-weight:bold;">▣</span> Sudah Sidang
                                <span style="color:#ffca28;">{{ $pieChartData['sidang_percentage'] }}%</span>
                            </div>
                        </div>
                    </div>

                    <div class="kanan">
                        <div class="status-box">Judul Belum Disetujui<br /><strong>{{ $stats['pending_titles'] }}</strong></div>
                        <div class="status-box">Bimbingan Belum Disetujui<br /><strong>{{ $stats['pending_guidance'] }}</strong></div>
                        <div class="status-box">Sempro Belum Disetujui<br /><strong>{{ $stats['pending_sempro'] }}</strong></div>
                        <div class="status-box">Semhas Belum Disetujui<br /><strong>{{ $stats['pending_semhas'] }}</strong></div>
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
                        @forelse ( $upcoming_guidances as $guidance )
                        <tr>
                            <td>{{ $guidance->user->npm ?? 'N/A' }}</td>
                            <td>{{ $guidance->user->name ?? 'N/A' }}</td>
                            <td>{{ $guidance->topic ?? 'ACC Bimbingan' }}</td> <td>{{ \Carbon\Carbon::parse($guidance->proposed_date)->format('j F Y') }}</td>
                            <td>
                                <a href="{{ route('admin.bimbingan.approve', $guidance->id) }}" class="icon-check">✔️</a>
                                <a href="{{ route('admin.bimbingan.reject', $guidance->id) }}" class="icon-cross">❌</a>
                                <a href="#">Lihat Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align:center;">Tidak ada bimbingan yang akan datang.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>
        </main>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Grafik Bimbingan (Bar Chart)
    const barCtx = document.getElementById('barChart');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            // Gunakan data dari controller
            labels: @json($barChartData['labels']),
            datasets: [{
                label: 'Jumlah Bimbingan',
                // Gunakan data dari controller
                data: @json($barChartData['data']),
                backgroundColor: '#7c4dff'
            }]
        },
        options: { // ... (opsi lainnya tetap sama)
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Statistik Mahasiswa (Pie/Doughnut Chart)
    const pieCtx = document.getElementById('pieChart');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Proses Bimbingan', 'Sudah Sidang'],
            datasets: [{
                // Gunakan data dari controller
                data: @json($pieChartData['data']),
                backgroundColor: ['#7c4dff', '#ffca28']
            }]
        },
        options: { // ... (opsi lainnya tetap sama)
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
</body>
</html>
