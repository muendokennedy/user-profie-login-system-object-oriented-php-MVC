const menuBtn = document.querySelector(".menu span");
const menuClose = document.querySelector(".close span");
const navigationBar = document.querySelector("nav");

menuBtn.onclick = () => {
  navigationBar.classList.toggle("show");
  menuBtn.classList.toggle("fa-xmark");
  menuBtn.classList.toggle("fa-bars");
}