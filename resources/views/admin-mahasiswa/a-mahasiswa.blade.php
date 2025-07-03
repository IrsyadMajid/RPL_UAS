<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Dosen_Mahasiswa/style.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <img src="{{ asset('images/Dosen_Mahasiswa/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
            <a href="{{ route('admin.a-dashboard') }}"><img src="{{ asset('images/Dosen_Mahasiswa/icon-dashboard.png') }}" alt=""> Dashboard</a>
            <a href="{{ route('admin.a-mahasiswa') }}" class="active"><img src="{{ asset('images/Dosen_Mahasiswa/icon-mahasiswa.png') }}" alt=""> Mahasiswa</a>
            <a href="{{ route('admin.a-bimbingan') }}"><img src="{{ asset('images/Dosen_Mahasiswa/icon-bimbingan.png') }}" alt=""> Bimbingan</a>
        </nav>
        <a class="logout" href="{{ route('login') }}"><img src="{{ asset('images/Dosen_Mahasiswa/icon-logout.png') }}" alt=""> Logout</a>
        </aside>

        <main class="main">
        <header>
            <div></div>
            <div class="top-right-icons">
            <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
            <img src="{{ asset('images/Dosen_Mahasiswa/dashboard-profile.png') }}" alt="Profile" class="profile-image" />
            </div>
        </header>

        <section class="mahasiswa-section">
            <h2>Daftar Mahasiswa Bimbingan</h2>

            <div class="total-box">
                <div>
                    <div>Total Mahasiswa Bimbingan</div>
                    <h1>{{ $approvedRequests->count() }}</h1>
                </div>
                <img src="{{ asset('images/Dosen_Mahasiswa/icon-totalmahasiswa.png') }}" alt="icon" />
            </div>

            <div class="search-bar">
            <input type="text" placeholder="Cari Mahasiswa..." />
            <button><i class="fa fa-search"></i> Search</button>
            </div>

            <div class="table-container">
            <table class="data-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Alasan Permintaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($approvedRequests as $request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $request->user->npm ?? 'N/A' }}</td>
                        <td>{{ $request->user->name ?? 'N/A' }}</td>
                        <td>{{ $request->user->email ?? 'N/A' }}</td>

                        <td>{{ $request->user->nomor_telepon ?? '081234567890' }}</td>

                        <td>
                            <a href="#" onclick="showAlasan('{{ $request->user->name }}', '{{ $request->user->npm }}', '{{ str_replace(["\r", "\n"], ' ', $request->topic ?? 'Tidak ada topik.') }}')">Lihat Alasan</a>
                        </td>

                        <td><span class="status accepted">Diterima</span></td>

                        <td>
                            <a href="#" onclick="showDetailModal()"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center;">Belum ada mahasiswa bimbingan yang disetujui.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="table-info">Menampilkan 1-20 dari 999 data</div>

            <div class="pagination">
                <button disabled>&lt;</button>
                <button>&gt;</button>
            </div>
            </div>
        </section>
        </main>
    </div>

    <div class="modal-overlay" id="alasanModal">
        <div class="modal-content">
        <button class="modal-close" onclick="closeModal()">
            <i class="fa fa-times"></i>
        </button>
        <h2><span class="highlight">Alasan Memilih</span> Dosen Pembimbing</h2>
        <div class="modal-row">
            <strong>Nama</strong>
            <span id="alasanNama"></span>
        </div>
        <div class="modal-row">
            <strong>NPM</strong>
            <span id="alasanNPM"></span>
        </div>
        <div class="modal-row">
            <strong>Alasan Memilih</strong>
            <p id="alasanIsi"></p>
        </div>
        </div>
    </div>
    <script>
        function showAlasan(nama, npm, alasan) {
        document.getElementById('alasanNama').innerText = nama;
        document.getElementById('alasanNPM').innerText = npm;
        document.getElementById('alasanIsi').innerText = alasan;
        document.getElementById('alasanModal').style.display = 'flex';
        }

        function closeModal() {
        document.getElementById('alasanModal').style.display = 'none';
        }

        function showDetailModal() {
            document.getElementById('detailModal').style.display = 'flex';
        }

        function closeDetailModal() {
            document.getElementById('detailModal').style.display = 'none';
        }

    </script>
</body>
</html>
