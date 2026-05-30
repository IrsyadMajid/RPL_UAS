/**
 * FUNGSI TOGGLE PASSWORD:
 * Mengubah tipe input field password antara 'text' (terlihat) dan 'password' (tersembunyi).
 * Serta memperbarui kelas CSS ikon mata pada tombol.
 */
function togglePassword(button) {
  const input = document.getElementById("password");
  const isHidden = input.type === "password";

  // Ubah tipe input secara dinamis
  input.type = isHidden ? "text" : "password";

  // Perbarui indikator visual ikon
  if (isHidden) {
    button.classList.add("show-closed");
  } else {
    button.classList.remove("show-closed");
  }
}

/**
 * LOGIKA SUBMIT FORM LOGIN (Legacy/API):
 * Mengintersepsi pengiriman form login konvensional untuk memicu AJAX Fetch request ke API.
 * Catatan: Pada Laravel modern BIMA, otentikasi ditangani secara sinkron oleh AuthController@login.
 */
document.getElementById('loginForm')?.addEventListener('submit', function(e) {
  e.preventDefault(); // Mencegah reload halaman default browser

  const username = e.target.username.value;
  const password = e.target.password.value;

  // Mengirim request JSON POST ke endpoint otentikasi API
  fetch('/api/login', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ username, password })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      // Mengarahkan mahasiswa ke transisi storyline login2
      window.location.href = "../2/login2.html";
    } else {
      alert('Username atau password salah!');
    }
  });
});

/**
 * AKSI REDIRECT KLIK GAMBAR:
 * Mengalihkan halaman jika pengguna mengklik gambar dekorasi login.
 */
document.querySelector('.login-image')?.addEventListener('click', function () {
  window.location.href = '../2/login2.html';
});
