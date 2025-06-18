let slides = document.querySelectorAll('.slide');
let btns = document.querySelectorAll('.btn');
let currentSlide = 0;

// Fungsi untuk menampilkan slide berdasarkan index
function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove('slider-active');
    btns[i].classList.remove('slider-active');
  });

  slides[index].classList.add('slider-active');
  btns[index].classList.add('slider-active');
  currentSlide = index;
}

// Navigasi manual via tombol bulat
btns.forEach((btn, i) => {
  btn.addEventListener('click', () => {
    showSlide(i);
  });
});

// Auto play
function autoPlay() {
  setInterval(() => {
    let nextSlide = (currentSlide + 1) % slides.length;
    showSlide(nextSlide);
  }, 3000); // 3 detik
}

autoPlay();
