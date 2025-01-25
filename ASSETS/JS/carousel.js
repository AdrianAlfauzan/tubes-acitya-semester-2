const slide = document.querySelector(".slider");
const btn1 = document.querySelector(".btn1");
const btn2 = document.querySelector(".btn2");
const btn3 = document.querySelector(".btn3");
btn1.onclick = function () {
  slide.style.transform = "translateX(0px)";
};
btn2.onclick = function () {
  slide.style.transform = "translateX(-2000px)";
};
btn3.onclick = function () {
  slide.style.transform = "translateX(-4000px)";
};

// Mengambil elemen loading berdasarkan id
var loadingElement = document.getElementById("loading");

// Menampilkan loading
loadingElement.classList.add("show");

// Menyembunyikan loading
loadingElement.classList.remove("show");
