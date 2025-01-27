var list = document.getElementById("list");
var menu = document.getElementById("menu");
menu.onclick = function () {
  list.classList.toggle ("active");
};

var carrusel = document.querySelector('.carrusel');
var slides = document.querySelectorAll('.slide');
var atras = document.querySelector('.atras');
var siguiente = document.querySelector('.siguiente');
let slideIndex = 0;

atras.addEventListener('click', () => {
  slideIndex = Math.max(slideIndex - 1, 0);
  carrusel.style.transform = `translateX(-${slideIndex * 100}%)`;
});

siguiente.addEventListener('click', () => {
  slideIndex = Math.min(slideIndex + 1, slides.length - 1);
  carrusel.style.transform = `translateX(-${slideIndex * 100}%)`;
});

const flecha = document.querySelectorAll('.flecha');
const header = document.querySelector('header');
flecha.onclick = function () {
  header.classList.toggle ('active');
};