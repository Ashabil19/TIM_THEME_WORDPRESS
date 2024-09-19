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
