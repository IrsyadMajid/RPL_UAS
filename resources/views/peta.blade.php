<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard BIMA</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="dashboard-container">
      <!-- SIDEBAR -->
      <aside class="sidebar">
        <img src="assets/logo-bima.png" alt="Logo BIMA" class="logo" />
        <nav class="menu">
          <a href="../dashboard/dashboard.html"
            ><img src="assets/icon-dashboard.png" alt="" /> Dashboard</a
          >
          <a href="../peta/peta.html" class="active"
            ><img src="assets/icon-map.png" alt="" /> Peta</a
          >
          <a href="../mentoring/1/mentoring.html"
            ><img src="assets/icon-mentoring.png" alt="" /> Mentoring</a
          >
          <a href="../peringkat/peringkat.html"
            ><img src="assets/icon-peringkat.png" alt="" /> Peringkat</a
          >
          <a href="../library/library.html"
            ><img src="assets/icon-library.png" alt="" /> Library</a
          >
        </nav>
        <a class="logout" href="../login/1/login1.html"
          ><img src="assets/icon-logout.png" alt="" /> Logout</a
        >
      </aside>

      <!-- MAIN CONTENT -->
      <main class="main">
        <!-- HEADER -->
        <header class="main-header">
          <div></div>
          <!-- Placeholder untuk posisi kiri -->
          <div class="top-right-icons">
            <button class="icon-button">
              <i class="fa-solid fa-bell"></i>
            </button>
            <img
              src="assets/profile-dashboard.jpg"
              alt="Profile"
              class="profile-image"
            />
          </div>
        </header>

        <!-- JUDUL -->
        <h2 class="peta-title">Peta Level</h2>

        <!-- MAP SECTION -->
        <div class="peta-container">
          <div class="jalur atas">
            <div id="level-1" class="level">
              <img
                src="assets/smoothcorner.png"
                alt="Bintang"
                class="bintang"
              />
              <p><strong>Level 1</strong><br />Gerbang Arcana</p>
            </div>
            <div class="line"></div>
            <div id="level-2" class="level">
              <img
                src="assets/smoothcorner.png"
                alt="Bintang"
                class="bintang"
              />
              <p><strong>Level 2</strong><br />Mencari Mentor</p>
            </div>
            <div class="line"></div>
            <div id="level-3" class="level">
              <img
                src="assets/smoothcorner.png"
                alt="Bintang"
                class="bintang"
              />
              <p><strong>Level 3</strong><br />Ritual Judul</p>
            </div>
            <div class="line"></div>
            <div id="level-4" class="level">
              <img
                src="assets/smoothcorner.png"
                alt="Bintang"
                class="bintang"
              />
              <p><strong>Level 4</strong><br />Awal Perjalanan</p>
            </div>
          </div>

          <div class="line-vertical"></div>

          <div class="jalur bawah">
            <div class="level">
              <a href="peta2.html">
                <img
                  src="assets/smoothcorner.png"
                  alt="Bintang"
                  class="bintang"
                />
              </a>
              <p><strong>The End?</strong><br />Wisuda Purnacita</p>
            </div>
            <div class="line2"></div>
            <div class="level">
              <a href="peta2.html">
                <img
                  src="assets/smoothcorner.png"
                  alt="Bintang"
                  class="bintang"
                />
              </a>
              <p><strong>Level 10</strong><br />Sidang Suci Arcana</p>
            </div>
            <div class="line2"></div>
            <div class="level">
              <a href="peta2.html">
                <img
                  src="assets/smoothcorner.png"
                  alt="Bintang"
                  class="bintang"
                />
              </a>
              <p><strong>Level 6 - 9</strong><br />Lembah Revisi Abadi</p>
            </div>
            <div class="line2"></div>
            <div class="level">
              <a href="peta2.html">
                <img
                  src="assets/smoothcorner.png"
                  alt="Bintang"
                  class="bintang"
                />
              </a>
              <p><strong>Level 5</strong><br />Duel Proposal</p>
            </div>
          </div>
        </div>

        <!-- POP UP LEVEL -->
        <!-- LEVEL 1 -->
        <div id="popup-level1" class="popup1-container">
          <div class="popup1-content">
            <button class="close1-popup" onclick="closePopup('popup-level1')">
              ✖
            </button>

            <div class="popup1-flex">
              <div class="popup1-character">
                <img src="assets/icon-lvl1.png" alt="Penyihir" />
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
                      <img src="assets/quest-lvl1.png" alt="Star Icon" />
                    </div>
                    <div class="quest1-text">
                      <strong>Beri nama tongkat sihirmu</strong>
                      <p>Lengkapi data dan dokumen pengajuan skripsi.</p>
                    </div>
                  </div>
                  <div id="after-popuplvl1" class="quest1-xp">+60 XP</div>
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

            <label for="transkrip">Unggah Transkrip Nilai</label>
            <label class="upload12-btn">
              <input type="file" id="transkrip" />
              <span>📤 Upload file</span>
            </label>

            <button id="submit12-btn" type="submit" class="submit12-btn">
              Kirim
            </button>
          </div>
        </div>

        <div id="quest-alert" class="quest-alert">
          <p>Quest Level 1 telah diselesaikan, <span>+60 XP</span></p>
        </div>
        <div id="quest-alert2" class="quest-alert2">
          <p>Quest Level 2 Telah dibuka!</p>
        </div>

        <!-- LEVEL 2 -->
        <div id="popup-level2" class="popup2-container" style="display: none">
          <div class="popup2-content">
            <button class="close2-popup" onclick="closePopup('popup-level2')">
              ✖
            </button>

            <div class="popup2-flex">
              <div class="popup2-character">
                <img src="assets/icon-lvl2.png" alt="Penyihir" />
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
                      <img src="assets/quest-lvl2.png" alt="Star Icon" />
                    </div>
                    <div class="quest2-text">
                      <strong>Panggil Sang Pembimbing</strong>
                      <p>Pilih dan ajukan dosen pembimbing mu</p>
                    </div>
                  </div>
                  <div id="after-popuplvl2" class="quest2-xp">+100 XP</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Popup Container -->
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

            <!-- Dosen Pembimbing 1 -->
            <label for="dosen1">Pilih Dosen Pembimbing</label>
            <select id="dosen1">
              <option value="">--- Dosen Pembimbing ---</option>
              <option value="dosen1">Dosen Pembimbing 1</option>
              <option value="dosen2">Dosen Pembimbing 2</option>
              <option value="dosen3">Dosen Pembimbing 3</option>
            </select>

            <label for="alasan1">Alasan memilih dosen pembimbing 1</label>
            <input
              type="text"
              id="alasan1"
              placeholder="Berikan alasan kenapa memilih Dosen Pembimbing 1"
            />

            <!-- Dosen Pembimbing 2 -->
            <label for="dosen2">Pilih Dosen Pembimbing</label>
            <select id="dosen2">
              <option value="">--- Dosen Pembimbing ---</option>
              <option value="dosen1">Dosen Pembimbing 1</option>
              <option value="dosen2">Dosen Pembimbing 2</option>
              <option value="dosen3">Dosen Pembimbing 3</option>
            </select>

            <label for="alasan2">Alasan memilih dosen pembimbing 2</label>
            <input
              type="text"
              id="alasan2"
              placeholder="Berikan alasan kenapa memilih Dosen Pembimbing 2"
            />
            <button id="submit21-pembimbing" class="submit21-btn">Kirim</button>
          </div>
        </div>

        <div id="quest-alert3" class="quest-alert3">
          <p>Quest Level 2 telah diselesaikan, <span>+100 XP</span></p>
        </div>
        <div id="quest-alert4" class="quest-alert4">
          <p>Quest Level 3 Telah dibuka!</p>
        </div>

        <!-- LEVEL 3 -->
        <div id="popup-level3" class="popup3-container">
          <div class="popup3-content">
            <button class="close3-popup" onclick="closePopup('popup-level3')">
              ✖
            </button>
            <div class="popup3-flex">
              <div class="popup3-character">
                <img src="assets/icon-lvl3.png" alt="Penyihir" />
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
                      <img src="assets/quest-lvl3.png" alt="Star Icon" />
                    </div>
                    <div class="quest3-text">
                      <strong>Ajukan mantra judulmu</strong>
                      <p>Ajukan dan validasi judul skripsi</p>
                    </div>
                  </div>
                  <div id="after-popuplvl3" class="quest3-xp">+120 XP</div>
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
          <p>Quest Level 3 telah diselesaikan, <span>+120 XP</span></p>
        </div>
        <div id="quest-alert6" class="quest-alert6">
          <p>Quest Level 4 Telah dibuka!</p>
        </div>

        <!-- LEVEL 4 -->
        <div id="popup-level4" class="popup4-container">
          <div class="popup4-content">
            <button class="close4-popup" onclick="closePopup('popup-level4')">
              ✖
            </button>
            <div class="popup4-flex">
              <div class="popup4-character">
                <img src="assets/icon-lvl4.png" alt="Penyihir" />
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
                      <img src="assets/quest-lvl4.png" alt="Star Icon" />
                    </div>
                    <div class="quest4-text">
                      <strong>Ajukan mantra judulmu</strong>
                      <p>Ajukan dan validasi judul skripsi</p>
                    </div>
                  </div>
                  <div id="after-popuplvl4" class="quest4-xp">+120 XP</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banyak Bimbingan -->
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
                <img src="assets/quest-lvl4.png" alt="Star Icon" />
              </div>
              <div class="progress-text">Lakukan 3 bimbingan awal</div>
              <div class="progress-count">0/3 Bimbingan</div>
            </button>
          </div>
        </div>

        <div id="quest-alert7" class="quest-alert7">
          <p>Quest Level 4 telah diselesaikan, <span>+120 XP</span></p>
        </div>
        <div id="quest-alert8" class="quest-alert8">
          <p>Quest Level 5 Telah dibuka!</p>
        </div>
      </main>
    </div>
    <script src="script.js"></script>
  </body>
</html>
