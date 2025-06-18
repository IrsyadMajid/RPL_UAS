document.addEventListener("DOMContentLoaded", function () {
  const level5 = document.getElementById("level-5");
  const popup5 = document.getElementById("popup-level5");
  const nextQuestBtn5 = document.getElementById("after-popuplvl5");
  const popup51 = document.getElementById("popup51-jadwal");
  const submitBtn51 = document.getElementById("submit51-jadwal");
  const popup52 = document.getElementById("popup52-submit");
  const submitBtn52 = document.getElementById("submit52-submit");
  const questAlert91 = document.getElementById("quest-alert91");
  const questAlert9 = document.getElementById("quest-alert9");
  const questAlert10 = document.getElementById("quest-alert10");
  const level69 = document.getElementById("level-69");
  const popup69 = document.getElementById("popup-level69");
  const nextQuestBtn69 = document.getElementById("after-popuplvl69");
  const popup691 = document.getElementById("popup691-container");
  const progress691Btn = document.getElementById("progress691-box");
  const questAlert691 = document.getElementById("quest-alert691");
  const questAlert692 = document.getElementById("quest-alert692");
  const level10 = document.getElementById("level-10");
  const popup10 = document.getElementById("popup-level10");
  const nextQuestBtn10 = document.getElementById("after-popuplvl10");
  const popup101 = document.getElementById("popup101-jadwal");
  const submitBtn101 = document.getElementById("submit101-jadwal");
  const popup102 = document.getElementById("popup102-submit");
  const submitBtn102 = document.getElementById("submit102-submit");
  const questAlert101 = document.getElementById("quest-alert101");
  const questAlert102 = document.getElementById("quest-alert102");
  const questAlert103 = document.getElementById("quest-alert103");
  const level12 = document.getElementById("level-12");
  const popup12 = document.getElementById("popup-level12");
  const nextQuestBtn12 = document.getElementById("after-popuplvl12");
  const popup121 = document.getElementById("popup121-jadwal");
  const submitBtn121 = document.getElementById("submit121-jadwal");
  const overlay = document.getElementById("quest-overlay");
  const image = document.getElementById("quest-img");

  let level5State = 0;
  let level10State = 0;

  // Buka popup level 5
  level5?.addEventListener("click", () => {
    if (level5State === 0) {
      popup5.style.display = "flex"; // buka quest awal
    } else if (level5State === 1) {
      popup52.style.display = "flex"; // buka upload file final
    }
  });

  // Tombol +200 XP: Tutup popup 2, buka popup 51
  nextQuestBtn5?.addEventListener("click", () => {
    popup5.style.display = "none";
    popup51.style.display = "flex";
  });

  // Submit tombol form: tutup popup, tampilkan alert
  submitBtn51?.addEventListener("click", (e) => {
    e.preventDefault();
    popup51.style.display = "none";
    showQuestAlert91();
    level5State = 1;
  });

  // Submit upload file final
  submitBtn52?.addEventListener("click", (e) => {
    e.preventDefault();
    popup52.style.display = "none";
    showQuestAlert9();
    showQuestAlert10();
  });

  // Buka popup level 69
  level69?.addEventListener("click", () => {
    popup69.style.display = "flex";
  });

  // Tombol +60 XP: Tutup popup 4, buka popup 41
  nextQuestBtn69?.addEventListener("click", () => {
    popup69.style.display = "none";
    popup691.style.display = "flex";
  });

  // Submit tombol form: tutup popup, tampilkan alert
  progress691Btn?.addEventListener("click", (e) => {
    e.preventDefault();
    popup691.style.display = "none";
    showQuestAlert691();
    showQuestAlert692();
  });

  // Buka popup level 10
  level10?.addEventListener("click", () => {
    if (level10State === 0) {
      popup10.style.display = "flex"; // buka quest awal
    } else if (level10State === 1) {
      popup102.style.display = "flex"; // buka upload file final
    }
  });

  // Tombol +200 XP: Tutup popup 2, buka popup 51
  nextQuestBtn10?.addEventListener("click", () => {
    popup10.style.display = "none";
    popup101.style.display = "flex";
  });

  // Submit tombol form: tutup popup, tampilkan alert
  submitBtn101?.addEventListener("click", (e) => {
    e.preventDefault();
    popup101.style.display = "none";
    showQuestAlert101();
    level10State = 1;
  });

  // Submit upload file final
  submitBtn102?.addEventListener("click", (e) => {
    e.preventDefault();
    popup102.style.display = "none";
    showQuestAlert102();
    showQuestAlert103();
  });

  // Buka popup level end
  level12?.addEventListener("click", () => {
    popup12.style.display = "flex";
  });

  // Tombol +200 XP: Tutup popup 2, buka popup 51
  nextQuestBtn12?.addEventListener("click", () => {
    popup12.style.display = "none";
    popup121.style.display = "flex";
  });

  // Event saat tombol "Kirim" diklik
  submitBtn121.addEventListener("click", function (e) {
    e.preventDefault();
    popup121.style.display = "none";
    showQuestImage();
  });

  // Fungsi menampilkan notifikasi lvl 5
  function showQuestAlert91() {
    questAlert91.classList.add("show");

    setTimeout(() => {
      questAlert91.classList.remove("show");
      questAlert91.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert91.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert9() {
    questAlert9.classList.add("show");

    setTimeout(() => {
      questAlert9.classList.remove("show");
      questAlert9.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert9.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert10() {
    questAlert10.classList.add("show");

    setTimeout(() => {
      questAlert10.classList.remove("show");
      questAlert10.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert10.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  // Fungsi menampilkan notifikasi lvl 69
  function showQuestAlert691() {
    questAlert691.classList.add("show");

    setTimeout(() => {
      questAlert691.classList.remove("show");
      questAlert691.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert691.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert692() {
    questAlert692.classList.add("show");

    setTimeout(() => {
      questAlert692.classList.remove("show");
      questAlert692.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert692.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  // Fungsi menampilkan notifikasi lvl 10
  function showQuestAlert101() {
    questAlert101.classList.add("show");

    setTimeout(() => {
      questAlert101.classList.remove("show");
      questAlert101.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert101.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert102() {
    questAlert102.classList.add("show");

    setTimeout(() => {
      questAlert102.classList.remove("show");
      questAlert102.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert102.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert103() {
    questAlert103.classList.add("show");

    setTimeout(() => {
      questAlert103.classList.remove("show");
      questAlert103.classList.add("hide");

      // Bersihkan class hide setelah selesai animasi
      setTimeout(() => {
        questAlert103.classList.remove("hide");
      }, 500);
    }, 3000);
  }


  // Fungsi animasi gambar notifikasi
  function showQuestImage() {
    overlay.style.display = "flex";

    // Reset animasi agar bisa diulang
    image.classList.remove("animate");
    void image.offsetWidth;
    image.classList.add("animate");

    // Sembunyikan overlay setelah animasi selesai
    setTimeout(() => {
      overlay.style.display = "none";
    }, 3000);
  }
});

// Fungsi untuk menutup popup manapun
window.closePopup = function (popupId) {
  const target = document.getElementById(popupId);
  if (target) target.style.display = "none";
};
