<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Mentoring/mentoringC.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peta/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
                <a href="{{ route('homepage') }}"><img src="{{ asset('images/Mentoring/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a>
                <a href="{{ route('peta.peta1') }}"><img src="{{ asset('images/Mentoring/icon-map.png') }}" alt="Icon Peta" /> Peta</a>
                <a href="{{ route('mentoring.index') }}" class="active"><img src="{{ asset('images/Mentoring/icon-bimbingan.png') }}" alt="Icon Mentoring" /> Mentoring</a>
                <a href="{{ route('peringkat') }}"><img src="{{ asset('images/Mentoring/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a>
                <a href="{{ route('library') }}"><img src="{{ asset('images/Mentoring/icon-library.png') }}" alt="Icon Library" /> Library</a>
            </nav>
                <a class="logout" href="{{ route('login') }}"><img src="{{ asset('images/Mentoring/icon-logout.png') }}" alt="Icon Log Out" /> Logout</a>
        </aside>

        <main class="main">
            <header>
                <div class="top-right-icons">
                <button class="icon-button"><i class="fa-solid fa-bell"></i></button>
                <img src="{{ asset('images/Mentoring/profile-dashboard.jpg') }}" alt="Profile" class="profile-image" />
                </div>
            </header>

            <div class="page-header">
                <button class="back-button">
                    <img src="{{ asset('images/Mentoring/icon-back.png') }}" alt="Kembali" />
                </button>
                <h2 class="page-title">Pengajuan Mentoring</h2>
            </div>
            <div class="mentoring-form-container">
                <form class="mentoring-form" action="{{ route('mentoring.store') }}" method="POST">
                @csrf
                <label>Judul Mentoring</label>
                <input name="topic" type="text" placeholder="Masukkan Judul Mentoring" />

                <label>Pilih Dosen Pembimbing</label>
                <select name="jenis_bimbingan" required>
                    <option value="">--- Dosen Pembimbing ---</option>
                    <option value="Pratama Wirya Atmaja, S.Kom. M.Kom.">1. Pratama Wirya Atmaja, S.Kom. M.Kom.</option>
                    <option value="Henni Endah Wahanani, S.T., M.Kom.">2. Henni Endah Wahanani, S.T., M.Kom.</option>
                </select>

                <label>Pilih tanggal mentoring</label>
                <input name="proposed_date" type="date" required/>

                <label>Jam Mentoring</label>
                <select name="proposed_time" required>
                    <option value="">--- Jam Mentoring ---</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16.00</option>
                </select>

                <label for="file_content">Catatan atau Isi File (Opsional)</label>
                    <textarea id="file_content" name="file_content" rows="6" placeholder="Anda bisa menuliskan catatan, ringkasan, atau menempelkan isi teks dari file Anda di sini..."></textarea>
                    <button id="submit" type="submit" class="submit-button">Buat Jadwal Mentoring</button>
                </form>
            </div>
        </main>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.back-button')?.addEventListener('click', () => {
             window.history.back();
        })
    });
</script>
</body>
</html>
