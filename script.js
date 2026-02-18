const toggle = document.getElementById("menuToggle");
const nav = document.getElementById("navMenu");

toggle.onclick = () => {
  nav.style.display = nav.style.display === "flex" ? "none" : "flex";
};
