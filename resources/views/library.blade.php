<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/LibraryMenu/style.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/LibraryAsset/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
            <a href="{{ route('homepage') }}"
                ><img src="{{ asset('images/LibraryAsset/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a
            >
            <a href="{{ route('peta.peta1') }}"
                ><img src="{{ asset('images/LibraryAsset/icon-map.png') }}" alt="Icon Peta" /> Peta</a
            >
            <a href="{{ route('mentoring') }}"
                ><img src="{{ asset('images/LibraryAsset/icon-mentoring.png') }}" alt="Icon Mentoring" /> Mentoring</a
            >
            <a href="{{ route('peringkat') }}"
                ><img src="{{ asset('images/LibraryAsset/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a
            >
            <a href="{{ route('library') }}" class="active"
                ><img src="{{ asset('images/LibraryAsset/icon-library.png') }}" alt="Icon Library" /> Library</a
            >
            </nav>
            <a class="logout" href="{{ route('login') }}"
            ><img src="{{ asset('images/LibraryAsset/icon-logout.png') }}" alt="Icon Log Out" /> Logout</a
            >
        </aside>

        <main class="main">
            <header>
                <div class="top-right-icons">
                    <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                    <img src="{{ asset('images/LibraryAsset/profile-dashboard.jpg') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

            <div class="search-wrapper">
                <input type="text" class="search-bar" placeholder="Cari sesuatu...">
            </div>

        <div class="library-grid">
            <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/buku.png') }}" alt="icon" class="doc-icon">
                <div class="doc-title">Template Penulisan Skripsi</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Template MoA Mitra Instansi Pemerintah</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Template IA Panjang Fasilkom</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Pedoman Penulisan Dokumen Skripsi</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Lembar Revisi</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Berita Acara Ujian Skripsi(2024)</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/book.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Lembar Penguji</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/book.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Lembar Persetujuan Pembatalan Topik Skripsi</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/book.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Lembar Persetujuan Pergantian Judul Skripsi</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/book.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Lembar Persetujuan Dosen Pembimbing Lanjutan</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/book.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Surat Pernyataan Bebas Plagiasi</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Template MoA Mitra DUDI (Dunia Usaha/Dunia Industri)</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Template MoA Mitra Pendidikan PT</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="doc-card">
            <div class="doc-icon-title">
                <img src="{{ asset('images/LibraryAsset/frame.png') }}" alt="Icon" class="doc-icon">
                <div class="doc-title">Template MoA Mitra Pendidikan Sekolah</div>
            </div>
            <div class="doc-actions">
                <button class="lihat"><i class="fa-solid fa-eye"></i> Lihat</button>
                <button class="unduh"><i class="fa-solid fa-download"></i> Unduh</button>
            </div>
        </div>

        <div class="modal-overlay" id="previewModal">
            <div class="modal-content">
                <div class="modal-header">
                <div class="modal-title-left">
                    <span id="modalTitle">Template Penulisan Skripsi</span>
                </div>
                <div class="modal-actions-right">
                    <a id="downloadBtn" href="#" download>
                    <i class="fa-solid fa-download"></i> <span>Unduh</span>
                    </a>
                    <button id="closeModal">&times;</button>
                </div>
                </div>
                <img id="imageViewer" src="" alt="Preview Dokumen" />
            </div>
        </div>

    <script>
        window.onload = function () {
        document.querySelectorAll('.lihat').forEach(button => {
            button.addEventListener('click', function () {
            const title = this.closest('.doc-card').querySelector('.doc-title').innerText;
            const image = document.getElementById('imageViewer');
            const modal = document.getElementById('previewModal');
            const modalTitle = document.getElementById('modalTitle');
            const downloadBtn = document.getElementById('downloadBtn');

            const imagePath = "{{ asset('images/LibraryAsset/listpdf.png') }}";
            image.src = imagePath;
            downloadBtn.href = imagePath;
            modalTitle.innerText = title;

            modal.style.display = "flex";
            });
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            const modal = document.getElementById('previewModal');
            const image = document.getElementById('imageViewer');
            modal.style.display = 'none';
            image.src = '';
        });
        };
    </script>
</body>
</html>
