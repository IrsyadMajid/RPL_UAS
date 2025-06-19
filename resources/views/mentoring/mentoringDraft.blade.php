<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Mentoring/mentoringDraft.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peta/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
            <a href="{{ route('homepage') }}"
                ><img src="{{ asset('images/Mentoring/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a
            >
            <a href="{{ route('peta.peta1') }}"
                ><img src="{{ asset('images/Mentoring/icon-map.png') }}" alt="Icon Peta" /> Peta</a
            >
            <a href="{{ route('mentoring') }}" class="active"
                ><img src="{{ asset('images/Mentoring/icon-bimbingan.png') }}" alt="Icon Mentoring" /> Mentoring</a
            >
            <a href="{{ route('peringkat') }}"
                ><img src="{{ asset('images/Mentoring/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a
            >
            <a href="{{ route('library') }}"
                ><img src="{{ asset('images/Mentoring/icon-library.png') }}" alt="Icon Library" /> Library</a
            >
            </nav>
            <a class="logout" href="{{ route('login') }}"
            ><img src="{{ asset('images/Mentoring/icon-logout.png') }}" alt="Icon Log Out" /> Logout</a
            >
        </aside>

        <main class="main">
        <header>
            <div></div>
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
            <form class="mentoring-form">
            <label for="judul">Judul Mentoring</label>
            <input id="judul" type="text" placeholder="Masukkan Judul Mentoring" />

            <label for="dosen">Pilih Dosen Pembimbing</label>
            <select id="dosen">
                <option>--- Dosen Pembimbing ---</option>
                <option>1. Pratama Wirya Atmaja, S.Kom. M.Kom.</option>
                <option>2. Henni Endah Wahanani, S.T., M.Kom.</option>
            </select>

            <label for="file">File</label>
            <div class="file-drop">
                <p>Drag and Drop filemu di sini,<br>atau klik unggah</p>
                <button type="button" class="upload-button">Unggah File</button>
            </div>

            <button type="submit" class="submit-button">Buat Jadwal Mentoring</button>
            </form>
        </div>
        </main>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Script loaded');

        function navigateTo(routeName) {
            console.log('Attempting to navigate to:', routeName);
            try {
                window.location.href = '{{ url('') }}' + routeName;
            } catch (e) {
                console.error('Navigation error:', e);
            }
        }

        document.querySelector('.back-button')?.addEventListener('click', () => {
                navigateTo('/mentoring/2');
        })
    });
</script>
</body>
</html>
