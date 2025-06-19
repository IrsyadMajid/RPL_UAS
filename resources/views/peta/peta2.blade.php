<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Peta/peta2.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peta/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
            <a href="{{ route('homepage') }}"
                ><img src="{{ asset('images/Peta/icon-dashboard.png') }}" alt="Icon Dashboard" /> Dashboard</a
            >
            <a href="{{ route('peta.peta1') }}" class="active"
                ><img src="{{ asset('images/Peta/icon-peta.png') }}" alt="Icon Peta" /> Peta</a
            >
            <a href="{{ route('mentoring') }}"
                ><img src="{{ asset('images/Peta/icon-mentoring.png') }}" alt="Icon Mentoring" /> Mentoring</a
            >
            <a href="{{ route('peringkat') }}"
                ><img src="{{ asset('images/Peta/icon-peringkat.png') }}" alt="Icon Peringkat" /> Peringkat</a
            >
            <a href="{{ route('library') }}"
                ><img src="{{ asset('images/Peta/icon-library.png') }}" alt="Icon Library" /> Library</a
            >
            </nav>
            <a class="logout" href="{{ route('login') }}"
            ><img src="{{ asset('images/Peta/icon-logout.png') }}" alt="Icon Log Out" /> Logout</a
            >
        </aside>

        <main class="main">
            <header class="main-header">
            <div></div>
            <div class="top-right-icons">
                <button class="icon-button">
                <i class="fa-solid fa-bell"></i>
                </button>
                <img
                src="{{ asset('images/Peta/profile-dashboard.jpg') }}"
                alt="Profile"
                class="profile-image"
                />
            </div>
            </header>

            <h2 class="peta-title">Peta Level</h2>

            <div class="peta-container">
            <div class="jalur atas">
                <div id="level-1" class="level">
                <a href="{{ route('peta.peta1') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 1</strong><br />Gerbang Arcana</p>
                </div>
                <div class="line"></div>
                <div id="level-2" class="level">
                <a href="{{ route('peta.peta1') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 2</strong><br />Mencari Mentor</p>
                </div>
                <div class="line"></div>
                <div id="level-3" class="level">
                <a href="{{ route('peta.peta1') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 3</strong><br />Ritual Judul</p>
                </div>
                <div class="line"></div>
                <div id="level-4" class="level">
                <a href="{{ route('peta.peta1') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 4</strong><br />Awal Perjalanan</p>
                </div>
            </div>

            <div class="line-vertical"></div>

            <div class="jalur bawah">
                <div id="level-12" class="level">
                <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                />
                <p><strong>The End?</strong><br />Wisuda Purnacita</p>
                </div>
                <div class="line2"></div>
                <div id="level-10" class="level">
                <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                />
                <p><strong>Level 10</strong><br />Sidang Suci Arcana</p>
                </div>
                <div class="line2"></div>
                <div id="level-69" class="level">
                <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                />
                <p><strong>Level 6 - 9</strong><br />Lembah Revisi Abadi</p>
                </div>
                <div class="line2"></div>
                <div id="level-5" class="level">
                <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                />
                <p><strong>Level 5</strong><br />Duel Proposal</p>
                </div>
            </div>
            </div>

            <div id="popup-level5" class="popup5-container" style="display: none">
            <div class="popup5-content">
                <button class="close5-popup" onclick="closePopup('popup-level5')">
                ✖
                </button>
                <div class="popup5-flex">
                <div class="popup5-character">
                    <img src="{{ asset('images/Peta/icon-lvl5.png') }}" alt="Penyihir" />
                </div>
                <div class="popup5-info">
                    <h2>Level 5 – Duel Proposal</h2>
                    <p>
                    Di puncak Menara Teori, para Penjaga Akademik menantimu.
                    Mereka siap menilai kekuatan nalar dan logika dari mantra
                    skripsimu. Siapkan dirimu, karena setiap pertanyaan akan
                    menguji kesiapan dan konsistensimu sebagai calon Sarjana
                    Arcanum.
                    </p>
                    <p class="quest5-label">Quest:</p>

                    <div class="quest5-box">
                    <div class="quest5-left">
                        <div class="quest5-icon">
                        <img src="{{ asset('images/Peta/quest-lvl5.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest5-text">
                        <strong>Ajukan mantra judulmu</strong>
                        <p>Ajukan dan validasi judul skripsi</p>
                        </div>
                    </div>
                    <div id="after-popuplvl5" class="quest5-xp">+10 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div id="popup51-jadwal" class="popup51-jadwal-container">
            <div class="popup51-jadwal-content">
                <button
                class="close51-popup-btn"
                onclick="closePopup('popup51-jadwal')"
                >
                ✖
                </button>
                <h2>Memasuki arena sidang proposal</h2>
                <p>
                Tiba saatnya memasuki arena ujian. Para Penjaga Akademik telah
                menunggu, dan proposalmu akan diuji dalam cahaya logika dan badai
                pertanyaan. Siapkan keberanian, ini adalah langkah penting menuju
                pengakuan.
                </p>

                <label for="judul 1">Judul Skripsi Anda</label>
                <input
                type="text"
                id="alasan1"
                placeholder="Isi judul skripsi anda"
                />

                <label for="jadwal">Jadwal Seminar Proposal</label>
                <select id="jadwal">
                <option value="">--- jadwal ---</option>
                <option value="jadwal1">jadwal1</option>
                <option value="jadwal2">jadwal 2</option>
                <option value="jadwal3">jadwal 3</option>
                </select>

                <label for="transkrip">Unggah Proposal Skripsi Anda</label>
                <label class="upload51-btn">
                <input type="file" id="transkrip" />
                <span>📤 Upload file</span>
                </label>

                <button id="submit51-jadwal" class="submit51-btn">Kirim</button>
            </div>
            </div>

            <div id="popup52-submit" class="popup52-submit-container">
            <div class="popup52-submit-content">
                <button
                class="close52-popup"
                onclick="closePopup('popup52-submit')"
                >
                ✖
                </button>
                <div class="popup52-judul-content">
                <h2>Unggah Bukti Seminar Proposal</h2>
                <p>
                    Unggah bukti pelaksanaan Seminar Proposal sebagai tanda telah
                    menyelesaikan quest ini.
                </p>

                <label class="upload52-btn">
                    <input type="file" id="lampiran" />
                    <span>📤 Upload bukti pelaksanaan Seminar Proposal</span>
                </label>

                <button id="submit52-submit" class="submit52-submit-btn">
                    Kirim
                </button>
                </div>
            </div>
            </div>

            <div id="quest-alert9" class="quest-alert9">
            <p>Quest Level 5 telah diselesaikan, <span>+10 XP</span></p>
            </div>
            <div id="quest-alert10" class="quest-alert10">
            <p>Quest Level 6 Telah dibuka!</p>
            </div>
            <div id="quest-alert91" class="quest-alert91">
            <p>
                Jadwal telah ditetapkan, silahkan persiapkan diri untuk seminar
                proposal di jadwal tersebut.
            </p>
            </div>

            <div id="popup-level69" class="popup69-container">
            <div class="popup69-content">
                <button class="close69-popup" onclick="closePopup('popup-level69')">
                ✖
                </button>
                <div class="popup69-flex">
                <div class="popup69-character">
                    <img src="{{ asset('images/Peta/icon-lvl69.png') }}" alt="Penyihir" />
                </div>
                <div class="popup69-info">
                    <h2>Level 6-9 - Lembah Revisi Abadi</h2>
                    <p>
                    Lorong yang panjang dan berliku ini, setiap masukan mentor
                    adalah cahaya yang membimbingmu menuju penyempurnaan karya.
                    Kau akan tersesat, kembali, dan memulai ulang—tapi itulah
                    jalan sejati para Arcanist Pengetahuan.
                    </p>
                    <p class="quest69-label">Quest:</p>

                    <div class="quest69-box">
                    <div class="quest69-left">
                        <div class="quest69-icon">
                        <img src="{{ asset('images/Peta/quest-lvl69.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest69-text">
                        <strong>Jalani bimbingan demi bimbingan</strong>
                        <p>Lakukan sesi bimbingan lanjutan minimal 6x.</p>
                        </div>
                    </div>
                    <div id="after-popuplvl69" class="quest69-xp">+40 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div
            id="popup691-container"
            class="popup691-bimbingan-container"
            style="display: none"
            >
            <div class="popup691-content">
                <button
                class="close691-popup-btn"
                onclick="closePopup('popup691-container')"
                >
                ✖
                </button>
                <h2>Jalani bimbingan demi bimbingan</h2>
                <p>
                Lorong demi lorong, langkahmu bergaung di antara bisikan revisi
                dan gema literatur. Tiap pertemuan bukan sekadar formalitas, tapi
                ritual penyempurnaan naskah. Kadang kau tersesat dalam koreksi,
                terjebak dalam labirin teori, atau justru tercerahkan oleh satu
                masukan sederhana. Inilah ujian sejati sebelum akhir perjalanan.
                </p>

                <button id="progress691-box" class="progress-box" type="button">
                <div class="progress-icon">
                    <img src="{{ asset('images/Peta/quest-lvl69.png') }}" alt="Star Icon" />
                </div>
                <div class="progress-text">Lakukan 3 bimbingan awal</div>
                <div class="progress-count">0/6 Bimbingan</div>
                </button>
            </div>
            </div>

            <div id="quest-alert691" class="quest-alert691">
            <p>Quest Level 6-9 telah diselesaikan, <span>+40 XP</span></p>
            </div>
            <div id="quest-alert692" class="quest-alert692">
            <p>Quest Level 10 Telah dibuka!</p>
            </div>

            <div id="popup-level10" class="popup10-container">
            <div class="popup10-content">
                <button class="close10-popup" onclick="closePopup('popup-level10')">
                ✖
                </button>
                <div class="popup10-flex">
                <div class="popup10-character">
                    <img src="{{ asset('images/Peta/icon-lvl10.png') }}" alt="Penyihir" />
                </div>
                <div class="popup10-info">
                    <h2>Level 10 - Sidang Suci Arcana</h2>
                    <p>
                    Kini, kau berdiri di hadapan Lingkaran Penguji. Di balik meja
                    sihir dan lembaran evaluasi, mereka menilai bukan hanya
                    skripsimu, tapi perjuangan dan pengetahuanmu. Ini adalah
                    pertarungan akhir, dan hanya mereka yang konsisten akan keluar
                    sebagai Mahasiswa Terpilih.
                    </p>
                    <p class="quest10-label">Quest:</p>

                    <div class="quest10-box">
                    <div class="quest10-left">
                        <div class="quest10-icon">
                        <img src="{{ asset('images/Peta/quest-lvl10.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest10-text">
                        <strong>Tantang ruang pengujian terakhir</strong>
                        <p>Lakukan sidang skripsi.</p>
                        </div>
                    </div>
                    <div id="after-popuplvl10" class="quest10-xp">+10 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div id="popup101-jadwal" class="popup101-jadwal-container">
            <div class="popup101-jadwal-content">
                <button
                class="close101-popup-btn"
                onclick="closePopup('popup101-jadwal')"
                >
                ✖
                </button>
                <h2>Tantang ruang pengujian terakhir</h2>
                <p>
                Lingkaran Penguji telah terbentuk. Di sinilah segala hal yang kau
                pelajari diuji dalam pertempuran intelektual. Hadapi mereka dengan
                penuh keyakinan. Kini saatnya membuktikan bahwa kau layak menjadi
                Sarjana Arcanum.
                </p>

                <label for="judul 1">Judul Skripsi Anda</label>
                <input
                type="text"
                id="alasan1"
                placeholder="Isi judul skripsi anda"
                />

                <label for="jadwal">Jadwal Seminar Hasil</label>
                <select id="jadwal">
                <option value="">--- jadwal ---</option>
                <option value="jadwal1">jadwal1</option>
                <option value="jadwal2">jadwal 2</option>
                <option value="jadwal3">jadwal 3</option>
                </select>

                <label for="transkrip">Unggah Skripsi Final Anda</label>
                <label class="upload101-btn">
                <input type="file" id="transkrip" />
                <span>📤 Upload file</span>
                </label>

                <button id="submit101-jadwal" class="submit101-btn">Kirim</button>
            </div>
            </div>

            <div id="popup102-submit" class="popup102-submit-container">
            <div class="popup102-submit-content">
                <button
                class="close102-popup"
                onclick="closePopup('popup102-submit')"
                >
                ✖
                </button>
                <div class="popup102-judul-content">
                <h2>Sidang suci arcana</h2>
                <p>
                    Unggah hasil revisi skripsi final
                </p>

                <label class="upload102-btn">
                    <input type="file" id="lampiran" />
                    <span>📤 Upload file</span>
                </label>

                <button id="submit102-submit" class="submit102-submit-btn">
                    Kirim
                </button>
                </div>
            </div>
            </div>

            <div id="quest-alert101" class="quest-alert101">
            <p>
                Jadwal telah ditetapkan, silahkan persiapkan diri untuk seminar
                hasil di jadwal tersebut.
            </p>
            </div>
            <div id="quest-alert102" class="quest-alert102">
            <p>Quest Level 10 telah diselesaikan, <span>+10 XP</span></p>
            </div>
            <div id="quest-alert103" class="quest-alert103">
            <p>Quest Ending Telah dibuka!</p>
            </div>

            <div id="popup-level12" class="popup12-container">
            <div class="popup12-content">
                <button class="close12-popup" onclick="closePopup('popup-level12')">
                ✖
                </button>
                <div class="popup12-flex">
                <div class="popup12-character">
                    <img src="{{ asset('images/Peta/icon-lvlend.png') }}" alt="Penyihir" />
                </div>
                <div class="popup12-info">
                    <h2>The END? - Wisuda Purnacita</h2>
                    <p>
                    Dengan semua ritus terlampaui, satu langkah terakhir
                    menunggumu. Mengukuhkan gelar dan menerima mahkota kebanggaan.
                    Saat jubah kebesaran disematkan dan namamu dipanggil, Akademia
                    Arcana mengenangmu sebagai legenda baru dalam sejarahnya.
                    </p>
                    <p class="quest12-label">Quest:</p>

                    <div class="quest12-box">
                    <div class="quest12-left">
                        <div class="quest12-icon">
                        <img src="{{ asset('images/Peta/quest-lvlend.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest12-text">
                        <strong>Kunci akhir ritus akademik</strong>
                        <p>Daftarkan diri untuk wisuda.</p>
                        </div>
                    </div>
                    <div id="after-popuplvl12" class="quest12-xp">+9999 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div id="popup121-jadwal" class="popup121-jadwal-container">
            <div class="popup121-jadwal-content">
                <button
                class="close121-popup-btn"
                onclick="closePopup('popup121-jadwal')"
                >
                ✖
                </button>
                <h2>Kunci akhir ritus akademik</h2>
                <p>
                Langkahkan kakimu menuju upacara agung. Klik di sini untuk
                mengunci ritus terakhir dan daftarkan dirimu dalam sejarah
                Akademia!
                </p>

                <label for="judul 1">Judul Skripsi Anda</label>
                <input
                type="text"
                id="alasan1"
                placeholder="Isi judul skripsi anda"
                />

                <label for="jadwal">Pilih Jadwal Yudisium</label>
                <select id="jadwal">
                <option value="">--- jadwal ---</option>
                <option value="jadwal1">jadwal1</option>
                <option value="jadwal2">jadwal 2</option>
                <option value="jadwal3">jadwal 3</option>
                </select>

                <label for="SKL">Unggah Surat Keterangan Lulus</label>

                <label class="upload121-btn">
                <input type="file" id="transkrip" />
                <span>📤 Upload Skripsi Final</span>
                </label>

                <label for="foto">Unggah Pas Foto 3x2</label>

                <label class="upload121-btn">
                <input type="file" id="lampiran" />
                <span>📤 Upload Lampiran Pendukung</span>
                </label>

                <button id="submit121-jadwal" class="submit121-btn">Kirim</button>
            </div>
            </div>

            <div id="quest-overlay" class="quest-overlay">
            <img
                src="assets/Ending.png"
                alt="Notifikasi"
                id="quest-img"
                class="quest-img"
            />
            </div>
        </main>
    </div>
    <script src="{{ asset('js/Peta/peta2.js') }}"></script>
</body>
</html>
