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
