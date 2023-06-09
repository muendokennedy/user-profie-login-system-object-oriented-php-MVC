const swiperImg = document.querySelectorAll(".profile-swiper img");
 
let index = 0;

function slide(){
  swiperImg[index].classList.remove("active");
  index = (index + 1) % swiperImg.length;
  swiperImg[index].classList.add("active");
}

setInterval(slide, 3000);