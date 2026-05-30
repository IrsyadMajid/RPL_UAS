document.addEventListener("DOMContentLoaded", function () {
  // --- INISIALISASI ELEMEN DOM TINGKATAN PETUALANGAN ---
  
  // Elemen Tingkat 1 (Gerbang Arcana)
  const level1 = document.getElementById("level-1");
  const popup1 = document.getElementById("popup-level1");
  const nextQuestBtn = document.getElementById("after-popuplvl1");
  const popup12 = document.getElementById("popup-level12");
  const submitBtn12 = document.getElementById("submit12-btn");
  const questAlert = document.getElementById("quest-alert");
  const questAlert2 = document.getElementById("quest-alert2");
  
  // Elemen Tingkat 2 (Mencari Mentor)
  const level2 = document.getElementById("level-2");
  const popup2 = document.getElementById("popup-level2");
  const nextQuestBtn2 = document.getElementById("after-popuplvl2");
  const popup21 = document.getElementById("popup21-pembimbing");
  const submitBtn21 = document.getElementById("submit21-pembimbing");
  const questAlert3 = document.getElementById("quest-alert3");
  const questAlert4 = document.getElementById("quest-alert4");
  
  // Elemen Tingkat 3 (Ritual Judul)
  const level3 = document.getElementById("level-3");
  const popup3 = document.getElementById("popup-level3");
  const nextQuestBtn3 = document.getElementById("after-popuplvl3");
  const popup31 = document.getElementById("popup31-judul");
  const submitBtn31 = document.getElementById("submit31-judul");
  const questAlert5 = document.getElementById("quest-alert5");
  const questAlert6 = document.getElementById("quest-alert6");
  
  // Elemen Tingkat 4 (Awal Perjalanan / Bab 1)
  const level4 = document.getElementById("level-4");
  const popup4 = document.getElementById("popup-level4");
  const nextQuestBtn4 = document.getElementById("after-popuplvl4");
  const popup41 = document.getElementById("popup41-container");
  const questAlert7 = document.getElementById("quest-alert7");
  const questAlert8 = document.getElementById("quest-alert8");

  // --- LOGIKA EVENT LISTENERS UNTUK POPUP INTERAKTIF ---

  // Tingkat 1: Klik tingkat 1 memunculkan modal pengantar
  level1?.addEventListener("click", () => {
    popup1.style.display = "flex";
  });

  // Klik tombol lanjut memicu modal pengerjaan berikutnya
  nextQuestBtn?.addEventListener("click", () => {
    popup1.style.display = "none";
    popup12.style.display = "flex";
  });

  // Mengumpulkan tugas tingkat 1, menyembunyikan modal, dan menampilkan notifikasi reward XP
  submitBtn12?.addEventListener("click", (e) => {
    e.preventDefault();
    popup12.style.display = "none";
    showQuestAlert();
    showQuestAlert2();
  });

  // Tingkat 2: Klik tingkat 2 memunculkan modal pencarian dospem
  level2?.addEventListener("click", () => {
    popup2.style.display = "flex";
  });

  nextQuestBtn2?.addEventListener("click", () => {
    popup2.style.display = "none";
    popup21.style.display = "flex";
  });

  submitBtn21?.addEventListener("click", (e) => {
    e.preventDefault();
    popup21.style.display = "none";
    showQuestAlert3();
    showQuestAlert4();
  });

  // Tingkat 3: Klik tingkat 3 memunculkan modal pengajuan judul
  level3?.addEventListener("click", () => {
    popup3.style.display = "flex";
  });

  nextQuestBtn3?.addEventListener("click", () => {
    popup3.style.display = "none";
    popup31.style.display = "flex";
  });

  submitBtn31?.addEventListener("click", (e) => {
    e.preventDefault();
    popup31.style.display = "none";
    showQuestAlert5();
    showQuestAlert6();
  });

  // Tingkat 4: Klik tingkat 4 memunculkan modal Bab 1
  level4?.addEventListener("click", () => {
    popup4.style.display = "flex";
  });

  nextQuestBtn4?.addEventListener("click", () => {
    popup4.style.display = "none";
    popup41.style.display = "flex";
  });

  popup41?.addEventListener("click", (e) => {
    e.preventDefault();
    popup41.style.display = "none";
      showQuestAlert7();
      showQuestAlert8();
  });

  function showQuestAlert() {
    questAlert.classList.add("show");

    setTimeout(() => {
      questAlert.classList.remove("show");
      questAlert.classList.add("hide");

      setTimeout(() => {
        questAlert.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert2() {
    questAlert2.classList.add("show");

    setTimeout(() => {
      questAlert2.classList.remove("show");
      questAlert2.classList.add("hide");

      setTimeout(() => {
        questAlert2.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert3() {
    questAlert3.classList.add("show");

    setTimeout(() => {
      questAlert3.classList.remove("show");
      questAlert3.classList.add("hide");

      setTimeout(() => {
        questAlert3.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert4() {
    questAlert4.classList.add("show");

    setTimeout(() => {
      questAlert4.classList.remove("show");
      questAlert4.classList.add("hide");

      setTimeout(() => {
        questAlert4.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert5() {
    questAlert5.classList.add("show");

    setTimeout(() => {
      questAlert5.classList.remove("show");
      questAlert5.classList.add("hide");

      setTimeout(() => {
        questAlert5.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert6() {
    questAlert6.classList.add("show");

    setTimeout(() => {
      questAlert6.classList.remove("show");
      questAlert6.classList.add("hide");

      setTimeout(() => {
        questAlert6.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert7() {
    questAlert7.classList.add("show");

    setTimeout(() => {
      questAlert7.classList.remove("show");
      questAlert7.classList.add("hide");

      setTimeout(() => {
        questAlert7.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert8() {
    questAlert8.classList.add("show");

    setTimeout(() => {
      questAlert8.classList.remove("show");
      questAlert8.classList.add("hide");

      setTimeout(() => {
        questAlert8.classList.remove("hide");
      }, 500);
    }, 3000);
  }
});

  window.closePopup = function (popupId) {
    const target = document.getElementById(popupId);
    if (target) target.style.display = "none";
  };
