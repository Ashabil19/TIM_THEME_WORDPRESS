const hamburgerIcon = document.querySelector(".hamburger-icon");
const navList = document.querySelector("nav ul");
const navLink = document.querySelectorAll("nav ul li a");

hamburgerIcon.addEventListener("click", () => {
  navList.classList.toggle("tampil-nav-ul");
});

navLink.forEach((item) => {
  item.addEventListener("click", () => {
    navList.classList.remove("tampil-nav-ul");
  });
});

const tabs = document.querySelectorAll(".tablinks");
const all_content = document.querySelectorAll(".tabcontent");

tabs.forEach((tab, index) => {
  tab.addEventListener("click", (e) => {
    tabs.forEach((tab) => {
      tab.classList.remove("tab-active");
    });
    tab.classList.add("tab-active");
    let line = document.querySelector(".line");
    line.style.width = e.target.offsetWidth + "px";
    line.style.left = e.target.offsetLeft + "px";

    all_content.forEach((content) => [content.classList.remove("tab-active")]);
    all_content[index].classList.add("tab-active");
  });
});


const slides = document.querySelector('.slides');
let currentIndex = 0;
const totalSlides = 3;
const slideInterval = 3000;

function goToNextSlide() {
  currentIndex++;
  if (currentIndex === totalSlides) {
    slides.style.transition = 'none'; // Disable transition for instant jump
    slides.style.transform = 'translateX(0)'; // Jump to the first slide
    currentIndex = 0;
    setTimeout(() => {
      slides.style.transition = 'transform 0.5s ease-in-out'; // Re-enable smooth transition
    }, 50); // Re-enable after a tiny delay
  } else {
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
  }
}

setInterval(goToNextSlide, slideInterval);

