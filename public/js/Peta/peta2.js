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

  level5?.addEventListener("click", () => {
    if (level5State === 0) {
      popup5.style.display = "flex";
    } else if (level5State === 1) {
      popup52.style.display = "flex";
    }
  });

  nextQuestBtn5?.addEventListener("click", () => {
    popup5.style.display = "none";
    popup51.style.display = "flex";
  });

  submitBtn51?.addEventListener("click", (e) => {
    e.preventDefault();
    popup51.style.display = "none";
    showQuestAlert91();
    level5State = 1;
  });

  submitBtn52?.addEventListener("click", (e) => {
    e.preventDefault();
    popup52.style.display = "none";
    showQuestAlert9();
    showQuestAlert10();
  });

  level69?.addEventListener("click", () => {
    popup69.style.display = "flex";
  });

  nextQuestBtn69?.addEventListener("click", () => {
    popup69.style.display = "none";
    popup691.style.display = "flex";
  });

  progress691Btn?.addEventListener("click", (e) => {
    e.preventDefault();
    popup691.style.display = "none";
    showQuestAlert691();
    showQuestAlert692();
  });

  level10?.addEventListener("click", () => {
    if (level10State === 0) {
      popup10.style.display = "flex";
    } else if (level10State === 1) {
      popup102.style.display = "flex";
    }
  });

  nextQuestBtn10?.addEventListener("click", () => {
    popup10.style.display = "none";
    popup101.style.display = "flex";
  });

  submitBtn101?.addEventListener("click", (e) => {
    e.preventDefault();
    popup101.style.display = "none";
    showQuestAlert101();
    level10State = 1;
  });

  submitBtn102?.addEventListener("click", (e) => {
    e.preventDefault();
    popup102.style.display = "none";
    showQuestAlert102();
    showQuestAlert103();
  });

  level12?.addEventListener("click", () => {
    popup12.style.display = "flex";
  });

  nextQuestBtn12?.addEventListener("click", () => {
    popup12.style.display = "none";
    popup121.style.display = "flex";
  });

  submitBtn121.addEventListener("click", function (e) {
    e.preventDefault();
    popup121.style.display = "none";
    showQuestImage();
  });

  function showQuestAlert91() {
    questAlert91.classList.add("show");

    setTimeout(() => {
      questAlert91.classList.remove("show");
      questAlert91.classList.add("hide");

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

      setTimeout(() => {
        questAlert10.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert691() {
    questAlert691.classList.add("show");

    setTimeout(() => {
      questAlert691.classList.remove("show");
      questAlert691.classList.add("hide");

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

      setTimeout(() => {
        questAlert692.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestAlert101() {
    questAlert101.classList.add("show");

    setTimeout(() => {
      questAlert101.classList.remove("show");
      questAlert101.classList.add("hide");

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

      setTimeout(() => {
        questAlert103.classList.remove("hide");
      }, 500);
    }, 3000);
  }

  function showQuestImage() {
    overlay.style.display = "flex";

    image.classList.remove("animate");
    void image.offsetWidth;
    image.classList.add("animate");

    setTimeout(() => {
      overlay.style.display = "none";
    }, 3000);
  }
});

window.closePopup = function (popupId) {
  const target = document.getElementById(popupId);
  if (target) target.style.display = "none";
};

// Menunggu hingga seluruh konten halaman dimuat
document.addEventListener('DOMContentLoaded', function() {

    // --- FUNGSI BARU: Untuk memuat data dari localStorage ---
    function muatData() {
        // Ambil data yang tersimpan dengan kunci 'yudisiumData'
        const dataTersimpan = localStorage.getItem('yudisiumData');

        // Jika ada data yang tersimpan
        if (dataTersimpan) {
            // Ubah kembali data dari string JSON menjadi objek
            const data = JSON.parse(dataTersimpan);

            // Masukkan data ke setiap kolom input di form
            document.getElementById('judulSkripsi').value = data.judul || '';
            document.getElementById('jadwal').value = data.jadwal || '';
            document.getElementById('linkSkripsi').value = data.skripsiFinal || '';
            document.getElementById('linkLampiran').value = data.lampiran || '';

            console.log('✅ Data berhasil dimuat dari localStorage.');
        }
    }

    // Cari tombol "Kirim" berdasarkan ID-nya
    const submitButton = document.getElementById('submit121-jadwal');

    // Tambahkan event listener untuk merespons klik pada tombol
    submitButton.addEventListener('click', function() {

        // 1. Ambil nilai dari setiap input form
        const judulSkripsi = document.getElementById('judulSkripsi').value;
        const jadwalYudisium = document.getElementById('jadwal').value;
        const linkSkripsi = document.getElementById('linkSkripsi').value;
        const linkLampiran = document.getElementById('linkLampiran').value;

        // 2. Validasi sederhana: pastikan input yang wajib sudah diisi
        if (!judulSkripsi || !jadwalYudisium) {
            alert('⚠️ Mohon isi Judul Skripsi dan pilih Jadwal Yudisium.');
            return;
        }

        // 3. Simpan data dalam sebuah objek
        const formData = {
            judul: judulSkripsi,
            jadwal: jadwalYudisium,
            skripsiFinal: linkSkripsi,
            lampiran: linkLampiran
        };

        // --- BARIS BARU: Simpan data ke localStorage ---
        // Ubah objek menjadi string JSON dan simpan dengan kunci 'yudisiumData'
        localStorage.setItem('yudisiumData', JSON.stringify(formData));

        // 4. Tampilkan data yang berhasil dikumpulkan
        alert('✅ Data berhasil disimpan!\n\n' + JSON.stringify(formData, null, 2));
    });

    // --- PANGGIL FUNGSI: Muat data saat halaman dibuka ---
    muatData();

});

// Menunggu hingga seluruh konten halaman dimuat
document.addEventListener('DOMContentLoaded', function() {

    const storageKey = 'revisiFinalData'; // Kunci unik untuk localStorage

    // Fungsi untuk memuat data dari localStorage
    function muatData() {
        const dataTersimpan = localStorage.getItem(storageKey);
        if (dataTersimpan) {
            const data = JSON.parse(dataTersimpan);
            const inputElement = document.getElementById('linkRevisiFinal');
            if (inputElement && data.link) {
                inputElement.value = data.link;
                console.log('✅ Data revisi final berhasil dimuat.');
            }
        }
    }

    // Cari tombol "Kirim" berdasarkan ID-nya
    const submitButton = document.getElementById('submit102-submit');

    // Tambahkan event listener untuk merespons klik pada tombol
    submitButton.addEventListener('click', function() {

        // 1. Ambil nilai dari input link
        const linkRevisi = document.getElementById('linkRevisiFinal').value;

        // 2. Validasi sederhana
        if (!linkRevisi) {
            alert('⚠️ Mohon isi link revisi final terlebih dahulu.');
            return;
        }

        // 3. Buat objek untuk data
        const formData = {
            link: linkRevisi
        };

        // 4. Simpan data ke localStorage
        localStorage.setItem(storageKey, JSON.stringify(formData));

        // 5. Beri notifikasi ke pengguna
        alert('✅ Link revisi final berhasil disimpan!');
    });

    // Panggil fungsi muatData saat halaman dibuka
    muatData();
});

document.addEventListener('DOMContentLoaded', function() {

    // --- LOGIC FOR FORM 1: PENDAFTARAN SEMINAR PROPOSAL ---
    const proposalStorageKey = 'seminarProposalData';

    function muatDataProposal() {
        const dataTersimpan = localStorage.getItem(proposalStorageKey);
        if (dataTersimpan) {
            const data = JSON.parse(dataTersimpan);
            document.getElementById('judulProposal').value = data.judul || '';
            document.getElementById('jadwalProposal').value = data.jadwal || '';
            document.getElementById('linkProposal').value = data.link || '';
            console.log('✅ Data Pendaftaran Proposal dimuat.');
        }
    }

    const submitProposalBtn = document.getElementById('submit51-jadwal');
    if (submitProposalBtn) {
        submitProposalBtn.addEventListener('click', function() {
            const formData = {
                judul: document.getElementById('judulProposal').value,
                jadwal: document.getElementById('jadwalProposal').value,
                link: document.getElementById('linkProposal').value
            };

            if (!formData.judul || !formData.jadwal) {
                alert('⚠️ Mohon isi Judul dan Jadwal Proposal terlebih dahulu.');
                return;
            }

            localStorage.setItem(proposalStorageKey, JSON.stringify(formData));
            alert('✅ Data Pendaftaran Seminar Proposal berhasil disimpan!');
        });
    }

    // --- LOGIC FOR FORM 2: UNGGAH BUKTI SEMINAR PROPOSAL ---
    const buktiStorageKey = 'buktiSeminarData';

    function muatDataBukti() {
        const dataTersimpan = localStorage.getItem(buktiStorageKey);
        if (dataTersimpan) {
            const data = JSON.parse(dataTersimpan);
            document.getElementById('linkBuktiProposal').value = data.linkBukti || '';
            console.log('✅ Data Bukti Proposal dimuat.');
        }
    }

    const submitBuktiBtn = document.getElementById('submit52-submit');
    if (submitBuktiBtn) {
        submitBuktiBtn.addEventListener('click', function() {
            const formData = {
                linkBukti: document.getElementById('linkBuktiProposal').value
            };

            if (!formData.linkBukti) {
                alert('⚠️ Mohon isi link bukti pelaksanaan terlebih dahulu.');
                return;
            }

            localStorage.setItem(buktiStorageKey, JSON.stringify(formData));
            alert('✅ Link Bukti Pelaksanaan berhasil disimpan!');
        });
    }

    // --- INITIALIZE BOTH FORMS ON PAGE LOAD ---
    muatDataProposal();
    muatDataBukti();
});
