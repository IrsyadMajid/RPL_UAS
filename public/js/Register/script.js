/**
 * FUNGSI TOGGLE PASSWORD:
 * Mengubah visibilitas teks input pada kolom password secara dinamis.
 */
function togglePassword(button) {
  const input = document.getElementById("password");
  const isHidden = input.type === "password";
  
  // Tukar tipe tipe input
  input.type = isHidden ? "text" : "password";

  // Perbarui state CSS ikon
  if (isHidden) {
    button.classList.add("show-closed");
  } else {
    button.classList.remove("show-closed");
  }
}

/**
 * INTERSEPSI REGISTER FORM:
 * Mengontrol logika klik submit formulir pendaftaran.
 * Catatan: Proses registrasi pada Laravel BIMA diproses secara sinkron oleh AuthController@register.
 */
document.getElementById("loginForm")?.addEventListener("submit", function (e) {
  e.preventDefault(); // Menghentikan postback halaman otomatis browser

  const username = e.target.username.value;
  const password = e.target.password.value;

  // Lakukan pemanggilan API Login
  fetch("/api/login", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ username, password }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        window.location.href = "../2/login2.html";
      } else {
        alert("Username atau password salah!");
      }
    });
});

/**
 * REDIRECT KLIK ELEMEN:
 * Arahkan ke storyline halaman 2 ketika elemen dekoratif diklik.
 */
document.querySelector(".login-image")?.addEventListener("click", function () {
  window.location.href = "../2/login2.html";
});
