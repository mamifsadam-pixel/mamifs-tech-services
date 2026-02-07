const lamp = document.getElementById("lamp");
const panel = document.getElementById("login-panel");

lamp.addEventListener("click", () => {
  lamp.classList.toggle("on");
  panel.classList.toggle("show");
});
