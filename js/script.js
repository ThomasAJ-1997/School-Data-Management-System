const hamMenu = document.querySelector(".hamburger");
const navMenuPopUp = document.querySelector(".navbar");

hamMenu.addEventListener("click", () => {
  hamMenu.classList.toggle("active");
  navMenuPopUp.classList.toggle("active");
});
