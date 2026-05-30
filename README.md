<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo"><br>
  <h1 align="center">🎮 BIMA: Bimbingan Mahasiswa Informatika (Gamified Edition)</h1>
  <p align="center">
    <strong>Platform Bimbingan Tugas Akhir Tematik RPG untuk Mahasiswa Informatika UPN "Veteran" Jawa Timur</strong>
  </p>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/TailwindCSS-Optional-blue?style=for-the-badge&logo=tailwind-css" alt="Tailwind">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Role--Playing-Thesis-ff69b4?style=for-the-badge" alt="RPG Thesis">
</p>

---

## 📖 Tentang BIMA Gamifikasi

**BIMA (Bimbingan Mahasiswa Informatika)** adalah platform bimbingan skripsi dan tugas akhir yang dikembangkan khusus untuk program studi **Informatika UPN "Veteran" Jawa Timur**. 

Perbedaan paling mencolok dan inovatif pada versi BIMA ini adalah **penambahan unsur gamifikasi dan alur cerita (*storyline*) fantasi RPG**. Menulis skripsi sering kali dipandang sebagai proses yang melelahkan, penuh tekanan, dan membosankan. BIMA hadir untuk mengubah paradigma tersebut dengan mengemas setiap babak penulisan skripsi menjadi sebuah petualangan epik!

Setiap langkah akademis direpresentasikan sebagai tingkatan level dan wilayah kekuasaan mistis:
*   **Level 1 (Gerbang Arcana):** Memulai pengisian profil dan persiapan.
*   **Level 2 (Mencari Mentor):** Pencarian dosen pembimbing yang tepat.
*   **Level 3 (Ritual Judul):** Merumuskan dan mengajukan judul skripsi.
*   **Level 5 (Duel Proposal):** Melangsungkan Ujian Seminar Proposal.
*   **Level 6 - 9 (Lembah Revisi Abadi):** Fase bimbingan draf intensif dan revisi tiada akhir.
*   **Level 10 (Sidang Suci Arcana):** Pertempuran pamungkas di Ujian Sidang Skripsi untuk meraih gelar Sarjana Komputer!

---

## 🚀 Perjalanan Belajar Developer (Developer's Journey)

> 🎓 *“Setiap master dulunya adalah seorang pemula yang menolak untuk menyerah.”*

Program ini merupakan sarana pembelajaran pribadi bagi saya untuk **mengenal dan menggunakan framework Laravel untuk pertama kalinya**. 

Sebagai langkah awal di dunia pengembangan web berskala penuh:
*   Pada awalnya, masih terdapat banyak **redundansi kode** dan keputusan desain arsitektur yang belum sepenuhnya saya pahami dengan matang.
*   Banyak konsep bawaan Laravel yang mulanya terasa asing dan membingungkan bagi saya sebagai pembuat kode.
*   Namun, seiring berjalannya waktu, pengerjaan proyek, dan penelusuran dokumentasi, saya mulai mengerti secara mendalam bagaimana komponen-komponen Laravel saling terintegrasi — mulai dari *Routing*, *Eloquent ORM*, *Session State*, hingga *Multi-Guard Authentication*.

Aplikasi ini adalah bukti nyata dari proses pembelajaran yang dinamis, di mana kode merepresentasikan evolusi pemahaman saya dari baris pertama hingga selesai!

---

## 🏛️ Ikhtisar Arsitektur MVC

BIMA dibangun dengan arsitektur **Model-View-Controller (MVC)** standar industri Laravel untuk memisahkan logika data, tampilan antarmuka, dan pemrosesan aksi secara bersih:

*   **📂 Model (M):** Terletak di `app/Models/`. Mengelola skema tabel data. Di dalamnya terdapat logika gamifikasi inti (seperti perhitungan kenaikan level dinamis dan penambahan XP mahasiswa di [User.php](app/Models/User.php) serta pengajuan draf bimbingan di [Mentoring.php](app/Models/Mentoring.php)).
*   **🖥️ View (V):** Terletak di `resources/views/`. Menggunakan Blade Engine untuk merender UI interaktif, termasuk 10 halaman *Storyline Intro* berantai (`storylogin/`), visualisasi peta skripsi (`peta/`), leaderboard peringkat XP mahasiswa (`peringkat.blade.php`), serta dasbor analitik admin.
*   **🎮 Controller (C):** Terletak di `app/Http/Controllers/`. Bertindak sebagai otak operasional yang memproses permintaan HTTP, memicu penambahan XP dari penyelesaian Quest harian ([DashboardController.php](file:///c:/Users/TUF/RPL_UAS/app/Http/Controllers/DashboardController.php)), dan mengontrol alur login bertahap ([AuthController.php](file:///c:/Users/TUF/RPL_UAS/app/Http/Controllers/AuthController.php)).

> 📘 **Dokumentasi Lengkap MVC:** Detail diagram alir data, relasi Eloquent, serta analisis mendalam per file dapat Anda baca di:
> 👉 **[Dokumentasi Lengkap Struktur MVC BIMA](docs/MVC_ARCHITECTURE.md)**

---

## ✨ Fitur Utama Platform

1.  **🏰 Peta Kemajuan Skripsi (Visual Progress):** Visualisasi berbentuk peta petualangan interaktif (`peta1` & `peta2`) untuk melihat sejauh mana progres tulisan draf skripsi.
2.  **⭐ Akumulasi XP & Kenaikan Level:** Setiap kali menyelesaikan target skripsi atau quest harian, mahasiswa mendapatkan XP yang mendongkrak level mereka beserta nama julukan RPG-nya.
3.  **🏆 Papan Peringkat (Leaderboard):** Memacu motivasi persahabatan antar mahasiswa Informatika lewat kompetisi sehat perolehan level dan konsistensi mingguan.
4.  **🎭 Multi-Step Login Storyline:** Proses otentikasi login bertahap yang dinamis (`login2` s/d `login4`), dibalut narasi cerita fantasi pembuka yang imersif.
5.  **📅 Pengajuan Bimbingan & Draft:** Mahasiswa dapat mengajukan jadwal bimbingan tatap muka atau melampirkan teks draf secara langsung ke dalam sistem.
6.  **📊 Dasbor Dosen (Game Master):** Dashboard analitik canggih bagi dosen koordinator untuk melihat grafik mingguan bimbingan mahasiswa dan melakukan *Approve / Reject* antrean bimbingan secara cepat.

---

## 🛠️ Panduan Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek BIMA di komputer lokal Anda:

### Prasyarat
*   PHP `>= 8.2`
*   Composer
*   Node.js & NPM
*   Database Server (MySQL / MariaDB / PostgreSQL)

### Langkah-Langkah

1.  **Clone / Buka Repositori**
    Pastikan Anda berada di direktori utama proyek:
    ```bash
    cd RPL_UAS
    ```

2.  **Instalasi Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Instalasi Dependensi JavaScript & CSS**
    ```bash
    npm install
    ```

4.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan sesuaikan koneksi database Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=username_database
    DB_PASSWORD=password_database
    ```

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Migrasi Database & Seeding**
    Jalankan migrasi untuk membuat seluruh tabel (termasuk kolom level, xp, dan admin):
    ```bash
    php artisan migrate
    ```
    *(Opsional)* Jika ada seeder untuk data awal mahasiswa dan admin:
    ```bash
    php artisan db:seed
    ```

7.  **Jalankan Server Lokal**
    Buka dua terminal terpisah:
    *   **Terminal 1 (Menjalankan Backend Laravel):**
        ```bash
        php artisan serve
        ```
    *   **Terminal 2 (Menjalankan Asset compiler Vite):**
        ```bash
        npm run dev
        ```

8.  **Akses Web**
    Buka browser Anda dan akses tautan:
    `http://127.0.0.1:8000`

---
*Dibuat dengan 💖 sebagai bagian dari perjalanan menguasai Laravel. Selamat berpetualang menyelesaikan skripsi di dunia BIMA!*
