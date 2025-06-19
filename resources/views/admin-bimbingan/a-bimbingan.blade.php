<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard BIMA</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
        <img src="{{ asset('images/Dosen_Bimbingan/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
        <nav class="menu">
            <a href="../dosen-dashboard/dashboard-dosen.html"><img src="{{ asset('images/Dosen_Bimbingan/icon-dashboard.png') }}" alt=""> Dashboard</a>
            <a href="../dosen-mahasiswa copy/mahasiswa-dosen1.html" class="active"><img src="{{ asset('images/Dosen_Bimbingan/icon-mahasiswa.png') }}" alt=""> Mahasiswa</a>
            <a href="../dosen-bimbingan/bimbingan-dosen.html"><img src="{{ asset('images/Dosen_Bimbingan/icon-bimbingan.png') }}" alt=""> Bimbingan</a>
        </nav>
        <a class="logout" href="../login/1/login1.html"><img src="{{ asset('images/Dosen_Bimbingan/icon-logout.png') }}" alt=""> Logout</a>
        </aside>

        <main class="main">
            <header>
                <div></div>
                <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <img src="{{ asset('images/Dosen_Bimbingan/dashboard-profile.png') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

        <section class="mahasiswa-section">
            <h2>Daftar Mahasiswa Bimbingan</h2>
            <div class="total-box">
                <div>
                    <div>Total Mahasiswa Bimbingan</div>
                    <h1>23</h1>
                </div>
            <img src="{{ asset('images/Dosen_Bimbingan/icon-totalmahasiswa.png') }}" alt="icon" />
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
                    <tr>
                        <td>1</td>
                        <td>23081010056</td>
                        <td>Berlian Ika Isabela</td>
                        <td>23081010056@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td>
                        <a href="#" onclick="showAlasan('Berlian Ika Isabela', '23081010056', 'Beliau dikenal luas dalam bidang pengembangan game edukatif dan memiliki banyak pengalaman dalam penelitian berbasis gamifikasi. Topik saya tentang aplikasi bimbingan skripsi berbasis RPG sangat relevan dengan keahlian beliau.')">Lihat Alasan</a>
                        </td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#" onclick="showDetailModalOnline()"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>23081010061</td>
                        <td>Lucky Fitrianda Wahyudi</td>
                        <td>23081010061@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status pending">Menunggu</span></td>
                        <td>
                        <a href="#" onclick="showDetailModalOnline()"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>23081010162</td>
                        <td>Muhammad Irsyad Majid</td>
                        <td>23081010162@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status rejected">Ditolak</span></td>
                        <td>
                        <a href="#" onclick="showDetailModalOffline()"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>23081010108</td>
                        <td>Salsabila Dwi Ramadhani</td>
                        <td>23081010108@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>23081010124</td>
                        <td>Naufal Rizky Pratama</td>
                        <td>23081010124@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>23081010079</td>
                        <td>Putri Ayu Lestari</td>
                        <td>23081010079@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>23081010119</td>
                        <td>Reza Fahmi Nurrohman</td>
                        <td>23081010119@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>23081010083</td>
                        <td>Intan Meliani Kusuma</td>
                        <td>23081010083@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>23081010092</td>
                        <td>Dimas Yoga Septian</td>
                        <td>23081010092@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status rejected">Ditolak</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>23081010131</td>
                        <td>Nadya Khairun Nisa</td>
                        <td>23081010131@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>23081010145</td>
                        <td>Fahmi Rizqullah</td>
                        <td>23081010145@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status pending">Menunggu</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>23081010146</td>
                        <td>Yolanda Nur Azizah</td>
                        <td>23081010146@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>23081010147</td>
                        <td>Hafidz Nur Rohman</td>
                        <td>23081010147@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status rejected">Ditolak</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>23081010148</td>
                        <td>Sheila Anjani</td>
                        <td>23081010148@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>23081010149</td>
                        <td>Faris Baihaqi</td>
                        <td>23081010149@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>23081010150</td>
                        <td>Rizka Nurhaliza</td>
                        <td>23081010150@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status pending">Menunggu</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>23081010151</td>
                        <td>Ammar Dzaky</td>
                        <td>23081010151@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>23081010152</td>
                        <td>Annisa Maulida</td>
                        <td>23081010152@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>23081010153</td>
                        <td>Vicky Ramadhan</td>
                        <td>23081010153@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status rejected">Ditolak</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>23081010154</td>
                        <td>Indah Kurniawati</td>
                        <td>23081010154@student.upnjatim.ac.id</td>
                        <td>081234567890</td>
                        <td><a href="#">Lihat Alasan</a></td>
                        <td><span class="status accepted">Diterima</span></td>
                        <td>
                        <a href="#"><i class="fa fa-search"></i> Lihat Detail</a>
                        </td>
                    </tr>
                </tbody></tbody>
                </table>
            <div class="table-info">Menampilkan 1–20 dari 999 data</div>

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

    <div class="modal-overlay" id="detailModalOnline">
    <div class="modal-content detail">
        <button class="modal-close" onclick="closeDetailModalOnline()">
        <i class="fa fa-times"></i>
        </button>
        <h2><span class="highlight">Detail</span> Mahasiswa</h2>
        <div class="modal-detail-body">
        <div class="left">
            <img src="{{ asset('images/Dosen_Bimbingan/ber-profile.png') }}" alt="Foto Mahasiswa" class="foto-mahasiswa" />
            <div class="status-online">
            <span class="dot-online"></span> Online
            </div>
            <div class="level-info">
            <div class="level-text">
                <span class="level">Level 4</span> - <span class="stage">Awal Perjalanan</span>
                <span class="progress-count">40/120</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 33%;"></div>
            </div>
            </div>
        </div>
        <div class="right">
            <div class="modal-row"><strong>Nama</strong><span>Berlian Ika Isabela</span></div>
            <div class="modal-row"><strong>NPM</strong><span>23081010056</span></div>
            <div class="modal-row"><strong>Status</strong><span>Mahasiswa Aktif</span></div>
            <div class="modal-row"><strong>Judul Skripsi</strong><span>Rancang Bangun Web Edukasi Anak SD Menggunakan Pendekatan Gamifikasi untuk Meningkatkan Motivasi Belajar</span></div>
            <div class="modal-row"><strong>Total Bimbingan</strong><span>4 Kali</span></div>
            <div class="modal-row"><strong>Bimbingan Terakhir</strong><span>8 Juni 2025, 08:00</span></div>
        </div>
        </div>
    </div>
    </div>

    <div class="modal-overlay" id="detailModalOffline">
    <div class="modal-content detail">
        <button class="modal-close" onclick="closeDetailModalOffline()">
        <i class="fa fa-times"></i>
        </button>
        <h2><span class="highlight">Detail</span> Mahasiswa</h2>
        <div class="modal-detail-body">
        <div class="left">
            <img src="{{ asset('images/Dosen_Bimbingan/ber-profile.png') }}" alt="Foto Mahasiswa" class="foto-mahasiswa" />
            <div class="status-offline">
            <span class="dot-offline"></span> Offline
            </div>
            <div class="level-info">
            <div class="level-text">
                <span class="level">Level 0</span> - -
                <span class="progress-count">00/00</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 0%;"></div>
            </div>
            </div>
        </div>
        <div class="right">
            <div class="modal-row"><strong>Nama</strong><span>Berlian Ika Isabela</span></div>
            <div class="modal-row"><strong>NPM</strong><span>23081010056</span></div>
            <div class="modal-row"><strong>Status</strong><span>Mahasiswa Aktif</span></div>
            <div class="modal-row"><strong>Judul Skripsi</strong><span>-</span></div>
            <div class="modal-row"><strong>Total Bimbingan</strong><span>- Kali</span></div>
            <div class="modal-row"><strong>Bimbingan Terakhir</strong><span>-</span></div>
        </div>
        </div>
    </div>
</div>

<script>
    function showDetailModalOnline() {
        document.getElementById('detailModalOnline').style.display = 'flex';
    }
    function closeDetailModalOnline() {
        document.getElementById('detailModalOnline').style.display = 'none';
    }

    function showDetailModalOffline() {
        document.getElementById('detailModalOffline').style.display = 'flex';
    }
    function closeDetailModalOffline() {
        document.getElementById('detailModalOffline').style.display = 'none';
    }
</script>
</body>
</html>
