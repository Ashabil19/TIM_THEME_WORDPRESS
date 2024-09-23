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
const all_contents = document.querySelectorAll(".tabcontent");

tabs.forEach((tab) => {
  tab.addEventListener("click", (e) => {
    const tabset = tab.getAttribute("data-tabset");

    // Deactivate all tabs and contents in the current tabset
    const currentTabs = document.querySelectorAll(
      `.tablinks[data-tabset="${tabset}"]`
    );
    currentTabs.forEach((t) => t.classList.remove("tab-active"));

    const currentContents = document.querySelectorAll(
      `.tabcontent[data-tabset="${tabset}"]`
    );
    currentContents.forEach((content) =>
      content.classList.remove("tab-active")
    );

    // Activate clicked tab and its corresponding content
    tab.classList.add("tab-active");

    // Adjust line under the active tab
    let line = document.querySelector(`.line[data-tabset="${tabset}"]`);
    if (!line) {
      line = document.querySelector(`.line2[data-tabset="${tabset}"]`);
    }
    line.style.width = e.target.offsetWidth + "px";
    line.style.left = e.target.offsetLeft + "px";

    const contentToShow = document.querySelectorAll(
      `.tabcontent-container[data-tabset="${tabset}"] .tabcontent`
    )[Array.from(currentTabs).indexOf(tab)];
    contentToShow.classList.add("tab-active");
  });
});

// filter container

document.addEventListener("DOMContentLoaded", function () {
  const headers = document.querySelectorAll(
    ".accordion-header, .accordion-sub-header"
  );

  headers.forEach((header) => {
    header.addEventListener("click", function () {
      const parentItem = header.parentElement;
      const content = header.nextElementSibling;

      // Toggle current section
      if (content && content.style.display === "block") {
        content.style.display = "none";
        parentItem.classList.remove("active");
      } else {
        content.style.display = "block";
        parentItem.classList.add("active");
      }
    });
  });
});

// hero carousel
let list = document.querySelector(".slider .list");
let items = document.querySelectorAll(".slider .list .item");
let dots = document.querySelectorAll(".slider .dots li");

let active = 0;

function reloadSlider() {
  let checkLeft = items[active].offsetLeft;
  list.style.left = -checkLeft + "px";

  let lastActiveDot = document.querySelector(".slider .dots li.active");
  lastActiveDot.classList.remove("active");
  dots[active].classList.add("active");
}

// Fungsi untuk pindah ke slide berikutnya secara otomatis
function autoSlide() {
  active++;
  if (active >= items.length) {
    active = 0; // Kembali ke slide pertama setelah slide terakhir
  }
  reloadSlider();
}

// Mengatur interval untuk pindah slide otomatis setiap 3 detik
let slideInterval = setInterval(autoSlide, 3000);

dots.forEach((li, key) => {
  li.addEventListener("click", function () {
    active = key;
    reloadSlider();
    clearInterval(slideInterval);
    slideInterval = setInterval(autoSlide, 3000);
  });
});

//end hero carousel

// carousel kategori
const carousel = document.querySelector(".carousel-kategori");
const arrowBtn = document.querySelectorAll(".carousel-container button");
const firstCardWidth = carousel.querySelector(".card-kategori").offsetWidth;

arrowBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    carousel.scrollLeft += btn.id === "prev" ? -firstCardWidth : firstCardWidth;
  });
});

// end carousel kategori
