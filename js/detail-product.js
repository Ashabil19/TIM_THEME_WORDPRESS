const tabsProduct = document.querySelectorAll(".tablinks-product");
const allContents = document.querySelectorAll(".tabcontent-product");

tabsProduct.forEach((tab) => {
  tab.addEventListener("click", (e) => {
    const tabsProductet = tab.getAttribute("data-tabsProductet");

    // Deactivate all tabsProduct and contents in the current tabsProductet
    const currenttabsProduct = document.querySelectorAll(
      `.tablinks-product[data-tabsProductet="${tabsProductet}"]`
    );
    currenttabsProduct.forEach((t) => t.classList.remove("tab-product-active"));

    const currentContents = document.querySelectorAll(
      `.tabcontent-product[data-tabsProductet="${tabsProductet}"]`
    );
    currentContents.forEach((content) =>
      content.classList.remove("tab-product-active")
    );

    // Activate clicked tab and its corresponding content
    tab.classList.add("tab-product-active");

    const contentToShow = document.querySelectorAll(
      `.tabcontent-product-container[data-tabsProductet="${tabsProductet}"] .tabcontent-product`
    )[Array.from(currenttabsProduct).indexOf(tab)];
    contentToShow.classList.add("tab-product-active");
  });
});
