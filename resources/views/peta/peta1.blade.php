<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="{{ asset('css/Peta/peta1.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <img src="{{ asset('images/Peta/logo-bima.png') }}" alt="Logo BIMA" class="logo" />
            <nav class="menu">
                <a href="{{ route('homepage') }}"><img src="{{ asset('images/Peta/icon-dashboard.png') }}" alt="Icon Dashboard"/> Dashboard</a>
                <a href="{{ route('peta.peta1') }}" class="active"><img src="{{ asset('images/Peta/icon-peta.png') }}" alt="Icon Peta"/> Peta</a>
                <a href="{{ route('mentoring.index') }}"><img src="{{ asset('images/Peta/icon-mentoring.png') }}" alt="Icon Mentoring"/> Mentoring</a>
                <a href="{{ route('peringkat') }}"><img src="{{ asset('images/Peta/icon-peringkat.png') }}" alt="Icon Peringkat"/> Peringkat</a>
                <a href="{{ route('library') }}"><img src="{{ asset('images/Peta/icon-library.png') }}" alt="Icon Library"/> Library</a>
            </nav>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;padding:0;">@csrf<button type="submit" class="logout" style="background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:8px;color:inherit;font:inherit;padding:0;"><img src="{{ asset('images/Peta/icon-logout.png') }}" alt="Icon Log Out" /> Logout</button></form>
        </aside>
        <main class="main">
            <header class="main-header">
                <div class="top-right-icons">
                    <button class="icon-button">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img src="{{ asset('images/Peta/profile-dashboard.jpg') }}" alt="Profile" class="profile-image"/>
                </div>
            </header>

            <h2 class="peta-title">Peta Level</h2>

            <div class="peta-container">
            <div class="jalur atas">
                <div id="level-1" class="level">
                <img src="{{ asset('images/Peta/smoothcorner.png') }}" alt="Bintang" class="bintang"/>
                <p><strong>Level 1</strong><br />Gerbang Arcana</p>
                </div>
                <div class="line"></div>
                <div id="level-2" class="level">
                <img src="{{ asset('images/Peta/smoothcorner.png') }}" alt="Bintang" class="bintang"/>
                <p><strong>Level 2</strong><br />Mencari Mentor</p>
                </div>
                <div class="line"></div>
                <div id="level-3" class="level">
                <img src="{{ asset('images/Peta/smoothcorner.png') }}" alt="Bintang" class="bintang"/>
                <p><strong>Level 3</strong><br />Ritual Judul</p>
                </div>
                <div class="line"></div>
                <div id="level-4" class="level">
                <img src="{{ asset('images/Peta/smoothcorner.png') }}" alt="Bintang" class="bintang"/>
                <p><strong>Level 4</strong><br />Awal Perjalanan</p>
                </div>
            </div>

            <div class="line-vertical"></div>

            <div class="jalur bawah">
                <div class="level">
                <a href="{{ route('peta.peta2') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>The End?</strong><br />Wisuda Purnacita</p>
                </div>
                <div class="line2"></div>
                <div class="level">
                <a href="{{ route('peta.peta2') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 10</strong><br />Sidang Suci Arcana</p>
                </div>
                <div class="line2"></div>
                <div class="level">
                <a href="{{ route('peta.peta2') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 6 - 9</strong><br />Lembah Revisi Abadi</p>
                </div>
                <div class="line2"></div>
                <div class="level">
                <a href="{{ route('peta.peta2') }}">
                    <img
                    src="{{ asset('images/Peta/smoothcorner.png') }}"
                    alt="Bintang"
                    class="bintang"
                    />
                </a>
                <p><strong>Level 5</strong><br />Duel Proposal</p>
                </div>
            </div>
            </div>

            <div id="popup-level1" class="popup1-container">
            <div class="popup1-content">
                <button class="close1-popup" onclick="closePopup('popup-level1')">
                ✖
                </button>

                <div class="popup1-flex">
                <div class="popup1-character">
                    <img src="{{ asset('images/Peta/icon-lvl1.png') }}" alt="Penyihir" />
                </div>
                <div class="popup1-info">
                    <h2>Level 1 – Gerbang Arcana</h2>
                    <p>
                    Langkah pertamamu telah dimulai. Saat menjejakkan kaki di
                    pelataran Akademia, sebuah gerbang kuno terbuka menyambutmu.
                    Mendaftar skripsi adalah kunci memasuki dunia penuh misteri
                    dan tantangan yang akan menguji segala potensimu.
                    </p>
                    <p class="quest1-label">Quest:</p>

                    <div class="quest1-box">
                    <div class="quest1-left">
                        <div class="quest1-icon">
                        <img src="{{ asset('images/Peta/quest-lvl1.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest1-text">
                        <strong>Beri nama tongkat sihirmu</strong>
                        <p>Lengkapi data dan dokumen pengajuan skripsi.</p>
                        </div>
                    </div>
                    <div id="after-popuplvl1" class="quest1-xp">+10 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div id="popup-level12" class="popup12-container" style="display: none">
                <div class="popup12-content">
                    <button class="close12-popup" onclick="closePopup('popup-level12')">
                    ✖
                    </button>
                    <h2>Beri nama tongkat sihirmu</h2>
                    <p>
                    Setiap penyihir hebat memulai petualangannya dengan sebuah tongkat
                    sihir yang memiliki nama unik. Berikan nama untuk tongkat sihirmu
                    sebagai tanda resmi memulai perjalanan skripsimu!
                    </p>

                    <label for="nama">Nama Lengkap</label>
                    <input
                    type="text"
                    id="nama"
                    placeholder="Masukkan nama lengkap anda"
                    />

                    <label for="npm">NPM</label>
                    <input type="text" id="npm" placeholder="Masukkan NPM anda" />
                    <label for="topik">Topik Skripsi</label>
                    <input
                    type="text"
                    id="topik"
                    placeholder="Masukkan topik skripsi anda"
                    />

                    <label for="transkrip">Transkrip (Link Google Drive)</label>
                    <input
                    type="text"
                    id="transkrip"
                    placeholder="Masukkan catatan atau link transkrip nilai"
                    />
                    <button id="submit12-btn" type="submit" class="submit12-btn">
                    Kirim
                    </button>
                </div>
            </div>

            <div id="quest-alert" class="quest-alert">
            <p>Quest Level 1 telah diselesaikan, <span>+10 XP</span></p>
            </div>
            <div id="quest-alert2" class="quest-alert2">
            <p>Quest Level 2 Telah dibuka!</p>
            </div>

            <div id="popup-level2" class="popup2-container" style="display: none">
            <div class="popup2-content">
                <button class="close2-popup" onclick="closePopup('popup-level2')">
                ✖
                </button>

                <div class="popup2-flex">
                <div class="popup2-character">
                    <img src="{{ asset('images/Peta/icon-lvl2.png') }}" alt="Penyihir" />
                </div>
                <div class="popup2-info">
                    <h2>Level 2 – Mencari Mentor</h2>
                    <p>
                    Di balik gerbang, berdiri Ruang Pemanggilan. Dalam ruangan
                    ini, para Roh Pembimbing bersedia membimbing para pencari
                    ilmu. Namun, tidak sembarang mentor akan menyambutmu. Pilihlah
                    dengan bijak, karena dialah yang akan menuntunmu melewati
                    badai intelektual yang akan datang.
                    </p>
                    <p class="quest2-label">Quest:</p>

                    <div class="quest2-box">
                    <div class="quest2-left">
                        <div class="quest2-icon">
                        <img src="{{ asset('images/Peta/quest-lvl2.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest2-text">
                        <strong>Panggil Sang Pembimbing</strong>
                        <p>Pilih dan ajukan dosen pembimbing mu</p>
                        </div>
                    </div>
                    <div id="after-popuplvl2" class="quest2-xp">+10 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div
            id="popup21-pembimbing"
            class="popup21-pembimbing-container"
            style="display: none"
            >
            <div class="popup21-pembimbing-content">
                <button
                class="close21-popup-btn"
                onclick="closePopup('popup21-pembimbing')"
                >
                ✖
                </button>
                <h2>Panggil sang pembimbing</h2>
                <p>
                Tidak semua penyihir berjalan sendirian. Di hadapanmu berdiri
                Ruang Pemanggilan, tempat para mentor terpilih bersedia membimbing
                para murid. Pilihlah dengan bijak siapa yang akan kau panggil
                sebagai penuntun langkahmu.
                </p>

                <label for="dosen1">Pilih Dosen Pembimbing</label>
                <select id="dosen1">
                <option value="">--- Dosen Pembimbing ---</option>
                <option value="Pratama Wirya Atmaja, S.Kom. M.Kom.">1. Pratama Wirya Atmaja, S.Kom. M.Kom.</option>
                <option value="Henni Endah Wahanani, S.T., M.Kom.">2. Henni Endah Wahanani, S.T., M.Kom.</option>
                </select>

                <label for="alasan1">Alasan memilih dosen pembimbing 1</label>
                <input type="text" id="alasan1" placeholder="Berikan alasan kenapa memilih Dosen Pembimbing 1"/>

                <label for="dosen2">Pilih Dosen Pembimbing</label>
                <select id="dosen2">
                <option value="">--- Dosen Pembimbing ---</option>
                <option value="Pratama Wirya Atmaja, S.Kom. M.Kom.">1. Pratama Wirya Atmaja, S.Kom. M.Kom.</option>
                <option value="Henni Endah Wahanani, S.T., M.Kom.">2. Henni Endah Wahanani, S.T., M.Kom.</option>
                </select>

                <label for="alasan2">Alasan memilih dosen pembimbing 2</label>
                <input type="text" id="alasan2" placeholder="Berikan alasan kenapa memilih Dosen Pembimbing 2"/>
                <button id="submit21-pembimbing" class="submit21-btn">Kirim</button>
            </div>
            </div>

            <div id="quest-alert3" class="quest-alert3">
            <p>Quest Level 2 telah diselesaikan, <span>+10 XP</span></p>
            </div>
            <div id="quest-alert4" class="quest-alert4">
            <p>Quest Level 3 Telah dibuka!</p>
            </div>

            <div id="popup-level3" class="popup3-container">
            <div class="popup3-content">
                <button class="close3-popup" onclick="closePopup('popup-level3')">
                ✖
                </button>
                <div class="popup3-flex">
                <div class="popup3-character">
                    <img src="{{ asset('images/Peta/icon-lvl3.png') }}" alt="Penyihir" />
                </div>
                <div class="popup3-info">
                    <h2>Level 3 – Ritual Judul</h2>
                    <p>
                    Setiap penjelajah butuh mantra utama (judul skripsi). Dalam
                    Ritual Judul, kau akan memahat niatmu menjadi kata-kata sakti.
                    Tapi hati-hati, judul yang lemah akan hancur dalam kobaran
                    kritik. Bacalah literatur purba dan siapkan alasan yang kuat!
                    </p>
                    <p class="quest3-label">Quest:</p>

                    <div class="quest3-box">
                    <div class="quest3-left">
                        <div class="quest3-icon">
                        <img src="{{ asset('images/Peta/quest-lvl3.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest3-text">
                        <strong>Ajukan mantra judulmu</strong>
                        <p>Ajukan dan validasi judul skripsi</p>
                        </div>
                    </div>
                    <div id="after-popuplvl3" class="quest3-xp">+10 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div id="popup31-judul" class="popup31-judul-container">
            <div class="popup31-judul-content">
                <button class="close31-popup" onclick="closePopup('popup31-judul')">
                ✖
                </button>
                <div id="popup31-flex">
                <h2>Ajukan mantra judulmu</h2>
                <p>
                    Sebelum menempuh perjalanan besar, kau harus merapal mantra
                    utama: judul skripsi. Wujudkan ide dan niatmu dalam rangkaian
                    kata-kata sakti yang akan membimbing seluruh proses penjelajahan
                    akademikmu.
                </p>
                <form id="form31-judul">
                    <input
                    type="text"
                    id="judul-input"
                    class="judul-input"
                    placeholder="Tuliskan judulmu di sini"
                    required
                    />
                    <button id="submit31-judul" class="submit31-judul-btn">
                    Kirim
                    </button>
                </form>
                </div>
            </div>
            </div>

            <div id="quest-alert5" class="quest-alert5">
            <p>Quest Level 3 telah diselesaikan, <span>+10 XP</span></p>
            </div>
            <div id="quest-alert6" class="quest-alert6">
            <p>Quest Level 4 Telah dibuka!</p>
            </div>

            <div id="popup-level4" class="popup4-container">
            <div class="popup4-content">
                <button class="close4-popup" onclick="closePopup('popup-level4')">
                ✖
                </button>
                <div class="popup4-flex">
                <div class="popup4-character">
                    <img src="{{ asset('images/Peta/icon-lvl4.png') }}" alt="Penyihir" />
                </div>
                <div class="popup4-info">
                    <h2>Level 4 – Awal Perjalanan</h2>
                    <p>
                    Perjalananmu dimulai dengan percikan tinta pertama. Di sinilah
                    hubungan antara penyihir muda dan mentornya diuji. Dengarkan
                    arahan, perbaiki draft awalmu, dan bangun fondasi yang kokoh
                    sebelum badai revisi datang menerpa.
                    </p>
                    <p class="quest4-label">Quest:</p>

                    <div class="quest4-box">
                    <div class="quest4-left">
                        <div class="quest4-icon">
                        <img src="{{ asset('images/Peta/quest-lvl4.png') }}" alt="Star Icon" />
                        </div>
                        <div class="quest4-text">
                        <strong>Ajukan mantra judulmu</strong>
                        <p>Ajukan dan validasi judul skripsi</p>
                        </div>
                    </div>
                    <div id="after-popuplvl4" class="quest4-xp">+10 XP</div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div id="popup41-container" class="popup41-bimbingan-container">
            <div class="popup41-content">
                <button
                class="close41-popup-btn"
                onclick="closePopup('popup41-container')"
                >
                ✖
                </button>
                <h2>Hadiri tiga pertemuan awal</h2>
                <p>
                Tinta pertama telah disiapkan, dan kertas awal terbentang. Inilah
                momen di mana penyihir muda dan pembimbingnya membentuk ikatan.
                Awali pertemuan, dengarkan wejangan, dan siapkan rancangan pertama
                petualanganmu.
                </p>

                <button id="progress41-box" class="progress-box" type="button">
                <div class="progress-icon">
                    <img src="{{ asset('images/Peta/quest-lvl4.png') }}" alt="Star Icon" />
                </div>
                <div class="progress-text">Lakukan 3 bimbingan awal</div>
                <div class="progress-count">0/3 Bimbingan</div>
                </button>
            </div>
            </div>

            <div id="quest-alert7" class="quest-alert7">
            <p>Quest Level 4 telah diselesaikan, <span>+10 XP</span></p>
            </div>
            <div id="quest-alert8" class="quest-alert8">
            <p>Quest Level 5 Telah dibuka!</p>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/Peta/peta1.js') }}"></script>
    <script>
        let userData = {
            nama: '',
            npm: '',
            topik: '',
            transkrip: ''
        };

        function showPopup(popupId) {
            document.getElementById(popupId).style.display = 'flex';
        }

        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }

        function saveData() {
            const nama = document.getElementById('nama').value;
            const npm = document.getElementById('npm').value;
            const topik = document.getElementById('topik').value;
            const transkrip = document.getElementById('transkrip').value;

            if (!nama || !npm || !topik) {
                alert('⚠️ Mohon lengkapi semua field yang wajib diisi!');
                return false;
            }

            userData.nama = nama;
            userData.npm = npm;
            userData.topik = topik;
            userData.transkrip = transkrip || 'Tidak diisi';

            updateDataDisplay();

            alert('✅ Data berhasil disimpan! Tongkat sihir telah diberi nama: "' + nama + '"');

            return true;
        }

        function updateDataDisplay() {
            document.getElementById('displayNama').textContent = userData.nama || '-';
            document.getElementById('displayNpm').textContent = userData.npm || '-';
            document.getElementById('displayTopik').textContent = userData.topik || '-';
            document.getElementById('displayTranskrip').textContent = userData.transkrip || '-';

            if (userData.nama || userData.npm || userData.topik) {
                document.getElementById('dataDisplay').style.display = 'block';
            }
        }

        function clearData() {
            if (confirm('🗑️ Apakah Anda yakin ingin menghapus semua data?')) {
                userData = {
                    nama: '',
                    npm: '',
                    topik: '',
                    transkrip: ''
                };

                document.getElementById('questForm').reset();

                updateDataDisplay();
                document.getElementById('dataDisplay').style.display = 'none';

                alert('✅ Data berhasil dihapus!');
            }
        }

        document.getElementById('questForm').addEventListener('submit', function(e) {
            e.preventDefault();

            if (saveData()) {
                closePopup('popup-level12');
            }
        });

        window.addEventListener('load', function() {
            updateDataDisplay();
        });

        function getUserData() {
            return userData;
        }

        function setUserData(newData) {
            userData = { ...userData, ...newData };
            updateDataDisplay();
        }

        let level2Data = {
            dosen1: '',
            alasan1: '',
            dosen2: '',
            alasan2: ''
        };

        function showPopup(popupId) {
            document.getElementById(popupId).style.display = 'block';
        }

        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }

        function saveLevel2Data() {
            const dosen1 = document.getElementById('dosen1').value;
            const alasan1 = document.getElementById('alasan1').value;
            const dosen2 = document.getElementById('dosen2').value;
            const alasan2 = document.getElementById('alasan2').value;

            if (!dosen1 || !alasan1 || !dosen2 || !alasan2) {
                alert('⚠️ Mohon lengkapi semua field!');
                return false;
            }

            if (dosen1 === dosen2) {
                alert('⚠️ Tidak boleh memilih dosen pembimbing yang sama!');
                return false;
            }

            level2Data.dosen1 = dosen1;
            level2Data.alasan1 = alasan1;
            level2Data.dosen2 = dosen2;
            level2Data.alasan2 = alasan2;

            updateLevel2DataDisplay();

            alert('✅ Data pembimbing berhasil disimpan!\n\n' +
                  '🎓 Dosen Pembimbing 1: ' + dosen1 + '\n' +
                  '🎓 Dosen Pembimbing 2: ' + dosen2);

            return true;
        }

        function updateLevel2DataDisplay() {
            document.getElementById('displayDosen1').textContent = level2Data.dosen1 || '-';
            document.getElementById('displayAlasan1').textContent = level2Data.alasan1 || '-';
            document.getElementById('displayDosen2').textContent = level2Data.dosen2 || '-';
            document.getElementById('displayAlasan2').textContent = level2Data.alasan2 || '-';
        }

        function showStoredData() {
            if (level2Data.dosen1 || level2Data.dosen2) {
                document.getElementById('dataDisplay').style.display = 'block';
                updateLevel2DataDisplay();
            } else {
                alert('📋 Belum ada data yang tersimpan');
            }
        }

        function clearLevel2Data() {
            if (confirm('🗑️ Apakah Anda yakin ingin menghapus data Level 2?')) {
                level2Data = {
                    dosen1: '',
                    alasan1: '',
                    dosen2: '',
                    alasan2: ''
                };

                document.getElementById('pembimbingForm').reset();

                updateLevel2DataDisplay();
                document.getElementById('dataDisplay').style.display = 'none';

                alert('✅ Data Level 2 berhasil dihapus!');
            }
        }

        document.getElementById('pembimbingForm').addEventListener('submit', function(e) {
            e.preventDefault();

            if (saveLevel2Data()) {
                closePopup('popup21-pembimbing');
                showStoredData();
            }
        });

        function getLevel2Data() {
            return level2Data;
        }

        function setLevel2Data(newData) {
            level2Data = { ...level2Data, ...newData };
            updateLevel2DataDisplay();
        }

        window.addEventListener('load', function() {
            updateLevel2DataDisplay();
        });

        document.getElementById('dosen1').addEventListener('change', function() {
            const dosen1Value = this.value;
            const dosen2Select = document.getElementById('dosen2');

            if (dosen2Select.value === dosen1Value && dosen1Value !== '') {
                dosen2Select.value = '';
                alert('⚠️ Silakan pilih dosen pembimbing 2 yang berbeda');
            }
        });

        document.getElementById('dosen2').addEventListener('change', function() {
            const dosen2Value = this.value;
            const dosen1Select = document.getElementById('dosen1');

            if (dosen1Select.value === dosen2Value && dosen2Value !== '') {
                this.value = '';
                alert('⚠️ Tidak boleh memilih dosen pembimbing yang sama!');
            }
        });

        function getAllData() {
            return {
                level1: window.userData || {},
                level2: level2Data
            };
        }

        let level3Data = {
            judul: ''
        };

        function showPopup(popupId) {
            document.getElementById(popupId).style.display = 'flex';
        }

        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }

        function saveJudul() {
            const judul = document.getElementById('judul-input').value.trim();

            if (!judul) {
                alert('⚠️ Mantra judul tidak boleh kosong!');
                return false;
            }

            level3Data.judul = judul;

            alert('✅ Judul berhasil diajukan! Mantra-mu: "' + judul + '"');

            document.getElementById('form31-judul').reset();

            updateJudulDisplay();

            return true;
        }

        function updateJudulDisplay() {
            const display = document.getElementById('displayJudul');

            if (display) {
                display.textContent = level3Data.judul || '-';
                display.style.display = level3Data.judul ? 'block' : 'none';
            }
        }

        document.getElementById('form31-judul').addEventListener('submit', function(e) {
            e.preventDefault();

            if (saveJudul()) {
                closePopup('popup31-judul');
            }
        });

        window.addEventListener('load', function() {
            updateJudulDisplay();
        });

        function getJudulData() {
            return level3Data;
        }

        function setJudulData(newJudul) {
            level3Data.judul = newJudul;
            updateJudulDisplay();
        }
    </script>
  </body>
</html>
