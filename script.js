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
// AUTO GALLERY SLIDER
const slides = document.querySelector('.slides');
const images = document.querySelectorAll('.slides img');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let index = 0;
let interval;

function showSlide(i) {
  index = (i + images.length) % images.length;
  slides.style.transform = `translateX(-${index * 100}%)`;
}

function nextSlide() { showSlide(index + 1); }
function prevSlide() { showSlide(index - 1); }

nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);

// Auto play
function startAuto() {
  interval = setInterval(nextSlide, 3500);
}
function stopAuto() {
  clearInterval(interval);
}

slides.addEventListener('mouseenter', stopAuto);
slides.addEventListener('mouseleave', startAuto);

// Swipe (mobile)
let startX = 0;
slides.addEventListener('touchstart', e => startX = e.touches[0].clientX);
slides.addEventListener('touchend', e => {
  let endX = e.changedTouches[0].clientX;
  if (startX - endX > 50) nextSlide();
  if (endX - startX > 50) prevSlide();
});

startAuto();
