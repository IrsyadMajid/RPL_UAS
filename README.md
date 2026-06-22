<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo"><br>
  <h1 align="center">🎮 BIMA: Bimbingan Mahasiswa Informatika (Gamified Edition)</h1>
  <p align="center">
    <strong>RPG-Themed Thesis Mentoring Platform for Informatics Students of UPN "Veteran" Jawa Timur</strong>
  </p>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/TailwindCSS-Optional-blue?style=for-the-badge&logo=tailwind-css" alt="Tailwind">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Role--Playing-Thesis-ff69b4?style=for-the-badge" alt="RPG Thesis">
</p>

---

## 📖 About BIMA Gamification

**BIMA (Bimbingan Mahasiswa Informatika)** is a thesis and final project mentoring platform developed specifically for the **Informatics study program at UPN "Veteran" Jawa Timur**.

The most prominent and innovative feature of this version of BIMA is the **addition of gamification elements and an RPG (Role-Playing Game) fantasy storyline**. Writing a thesis is often seen as a tedious, stressful, and exhausting process. BIMA changes this paradigm by turning each phase of thesis writing into an epic adventure!

Each academic milestone is represented by a character level and a mystical realm of control:
*   **Level 1 (Arcana Gate):** Setting up the profile and initial preparations.
*   **Level 2 (Seeking a Mentor):** Searching and matching with the right thesis advisor.
*   **Level 3 (Title Ritual):** Formulating and submitting the thesis proposal title.
*   **Level 5 (Proposal Duel):** Undergoing the Seminar Proposal Exam.
*   **Level 6 - 9 (Valley of Eternal Revisions):** The intense draft-writing phase and dealing with endless revisions.
*   **Level 10 (Sacred Arcana Session):** The final battle—the Thesis Defense Exam to earn the Bachelor of Computer Science (S.Kom) degree!

---

## 🚀 Developer's Learning Journey

> 🎓 *“Every master was once a beginner who refused to give up.”*

This program is a personal learning medium for me to **learn and use the Laravel framework for the very first time**.

As a starting point in the world of full-scale web development:
*   In the beginning, there was still a lot of **code redundancy** and architectural design choices that I did not fully understand.
*   Many of Laravel's built-in concepts felt unfamiliar and confusing to me as the developer.
*   However, over time, through project implementation, and by studying the documentation, I began to deeply understand how Laravel's components integrate—from Routing, Eloquent ORM, Session State, to Multi-Guard Authentication.

This application is living proof of a dynamic learning process, where the code represents the evolution of my understanding from the first line to completion!

Please note that **this program still requires a lot of fixes, refactoring, and further development in the future**. Future development plans will focus on clean-ups of code redundancy, optimizing the architecture to be more modular, adding new interactive gamification elements, and enhancing overall system security.

---

## 🏛️ MVC Architecture Overview

BIMA is built with the industry-standard **Model-View-Controller (MVC)** pattern to cleanly separate data logic, user interface, and action handling:

*   **📂 Model (M):** Located in `app/Models/`. Manages the database tables. It contains the core gamification logic (such as dynamic level calculations and user XP increments in [User.php](app/Models/User.php) as well as mentoring draft applications in [Mentoring.php](app/Models/Mentoring.php)).
*   **🖥️ View (V):** Located in `resources/views/`. Uses the Blade engine to render the interactive UI, including 10 sequential Storyline Intro pages (`storylogin/`), thesis progress maps (`peta/`), student XP rankings leaderboard (`peringkat.blade.php`), and the admin dashboard.
*   **🎮 Controller (C):** Located in `app/Http/Controllers/`. Acts as the operational brain that handles HTTP requests, triggers XP rewards upon completing daily Quests ([DashboardController.php](file:///c:/Users/TUF/RPL_UAS/app/Http/Controllers/DashboardController.php)), and controls the multi-step login flow ([AuthController.php](file:///c:/Users/TUF/RPL_UAS/app/Http/Controllers/AuthController.php)).

> 📘 **Complete MVC Documentation:** For details on data flows, Eloquent relationships, and deep code analysis of each file, refer to:
> 👉 **[Complete BIMA MVC Structure Documentation](docs/MVC_ARCHITECTURE.md)**

---

## ✨ Key Features

1.  **🏰 Thesis Progress Map (Visual Progress):** An interactive adventure map visualization (`peta1` & `peta2`) to track the progress of the thesis draft.
2.  **⭐ XP Accumulation & Leveling:** Every time students complete a thesis target or daily quest, they earn XP which increases their level and updates their RPG rank title.
3.  **🏆 Leaderboard:** Boosts healthy competition and friendly motivation among Informatics students through level rankings and weekly consistency metrics.
4.  **🎭 Multi-Step Login Storyline:** A dynamic step-by-step authentication process (`login2` to `login4`), wrapped in an immersive opening fantasy narrative.
5.  **📅 Mentoring & Draft Submissions:** Students can schedule face-to-face meetups or directly submit their thesis draft text into the system.
6.  **📊 Lecturer Dashboard (Game Master):** An advanced analytical dashboard for the coordinator to view weekly student bimbingan graphs and quickly approve or reject mentoring queues.

---

## 🛠️ Installation & Setup Guide

Follow these steps to run the BIMA project on your local machine:

### Prerequisites
*   PHP `>= 8.2`
*   Composer
*   Node.js & NPM
*   Database Server (MySQL / MariaDB / PostgreSQL)

### Setup Steps

1.  **Clone / Open the Repository**
    Ensure you are in the project root directory:
    ```bash
    cd RPL_UAS
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Install JavaScript & CSS Dependencies**
    ```bash
    npm install
    ```

4.  **Environment Configuration**
    Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```
    Open the `.env` file and adjust your database connection:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Database Migration & Seeding**
    Run migrations to create all tables (including level, xp, and admin columns):
    ```bash
    php artisan migrate
    ```
    *(Optional)* If there is seeder data for default students and admins:
    ```bash
    php artisan db:seed
    ```

7.  **Run Local Servers**
    Open two separate terminals:
    *   **Terminal 1 (Run Laravel Backend):**
        ```bash
        php artisan serve
        ```
    *   **Terminal 2 (Run Vite Asset Compiler):**
        ```bash
        npm run dev
        ```

8.  **Access the Web Application**
    Open your browser and navigate to:
    `http://127.0.0.1:8000`

---
*Made with 💖 as part of the journey to master Laravel. Happy adventuring on your thesis in the world of BIMA!*
