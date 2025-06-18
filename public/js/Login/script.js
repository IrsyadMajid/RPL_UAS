function togglePassword(button) {
  const input = document.getElementById("password");
  const isHidden = input.type === "password";

  input.type = isHidden ? "text" : "password";

  if (isHidden) {
    button.classList.add("show-closed");
  } else {
    button.classList.remove("show-closed");
  }
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const username = e.target.username.value;
  const password = e.target.password.value;

  fetch('/api/login', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ username, password })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      window.location.href = "../2/login2.html";
    } else {
      alert('Username atau password salah!');
    }
  });
});

document.querySelector('.login-image').addEventListener('click', function () {
  window.location.href = '../2/login2.html';
});
