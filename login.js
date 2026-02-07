const lamp = document.getElementById("lamp");
const panel = document.getElementById("login-panel");

lamp.addEventListener("click", () => {
  lamp.classList.toggle("on");
  panel.classList.toggle("show");
});
document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const data = new FormData();
  data.append("email", email.value);
  data.append("password", password.value);

  fetch("login.php", {
    method: "POST",
    body: data
  })
  .then(res => res.text())
  .then(res => {
    if (res.trim() === "success") {
      window.location = "dashboard.php";
    } else {
      document.getElementById("msg").innerText = "❌ Wrong login";
    }
  });
});
