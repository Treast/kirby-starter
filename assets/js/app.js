import "../scss/app.scss";

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM Loaded");

  const navChildren = document.querySelectorAll("header nav .has-children");

  navChildren.forEach((navChild) => {
    navChild.addEventListener("click", (e) => {
      e.stopPropagation();
      navChild.classList.toggle("nav--opened");
    });
  });

  document.addEventListener("click", () => {
    navChildren.forEach((navChild) =>
      navChild.classList.toggle("nav--opened", false)
    );
  });

  const menuClose = document.querySelector(".button-close-menu");
  menuClose.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("CloseMenu");
    document.querySelector(".mobile-menu").classList.add("translate-x-full");
  });

  const menuOpen = document.querySelector(".button-open-menu");
  menuOpen.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("OpenMenu");
    document.querySelector(".mobile-menu").classList.remove("translate-x-full");
  });
});
