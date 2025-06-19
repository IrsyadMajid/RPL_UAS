<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Mentoring/mentoring2.css') }}" />
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
            </div>

            <div class="pengajuan-wrapper">
            <h2 class="pengajuan-title">Pilih Pengajuan Mentoring</h2>
                <div class="pengajuan-options">
                    <div id="review" class="option-card">
                    <img src="{{ asset('images/Mentoring/review-draf.png') }}" alt="Review Draft" />
                    <p>Review Draft</p>
                    </div>
                    <div id="offline" class="option-card">
                    <img src="{{ asset('images/Mentoring/meet-offline.png') }}" alt="Offline Meet" />
                    <p>Offline Meet</p>
                    </div>
                    <div id="online" class="option-card">
                    <img src="{{ asset('images/Mentoring/meet-online.png') }}" alt="Online Meet" />
                    <p>Online Meet</p>
                </div>
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

        document.querySelector('#review')?.addEventListener('click', () => {
            navigateTo('/mentoring/draft');
        });

        document.querySelector('#offline')?.addEventListener('click', () => {
            navigateTo('/mentoring/C');
        });

        document.querySelector('#online')?.addEventListener('click', () => {
            navigateTo('/mentoring/C');
        });

        document.querySelector('.back-button')?.addEventListener('click', () => {
            navigateTo('/mentoring/1');
        });
    });
</script>
</body>
</html>
