function setLanguage(lang) {
  document.querySelectorAll("[data-en]").forEach(el => {
    el.innerText = el.getAttribute(`data-${lang}`);
  });

  localStorage.setItem("language", lang);
}

// Load saved language
window.onload = () => {
  const savedLang = localStorage.getItem("language") || "en";
  setLanguage(savedLang);
};
window.onload = () => {
  document.querySelectorAll(".fade-in").forEach(el => {
    el.style.animation = "none";
    el.offsetHeight; // trigger reflow
    el.style.animation = "";
  });
};
// Scroll reveal logic
const reveals = document.querySelectorAll(".reveal");

function revealOnScroll() {
  const windowHeight = window.innerHeight;

  reveals.forEach(el => {
    const elementTop = el.getBoundingClientRect().top;
    const revealPoint = 120;

    if (elementTop < windowHeight - revealPoint) {
      el.classList.add("active");
    }
  });
}

window.addEventListener("scroll", revealOnScroll);
window.addEventListener("load", revealOnScroll);
