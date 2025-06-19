const slide = document.querySelectorAll('.slide');
const btns = document.querySelectorAll('.btn');
let currentSlide = 1;

const manualNav = function(manual){
  slide.forEach((slide) => {
    slide.classList.remove('slider-active');
    btns.forEach((btn) => {
      btn.classList.remove('slider-active');
    });
  });

  slide[manual].classList.add('slider-active');
  btns[manual].classList.add('slider-active');
}

btns.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    manualNav(i);
    currentSlide = i;
  });
});

const repeat = function() {
  let i = 1;

  const repeater = () => {
    setTimeout(function() {
      document.querySelectorAll('.slider-active').forEach((activeSlide) => {
        activeSlide.classList.remove('slider-active');
      });

      slide[i].classList.add('slider-active');
      btns[i].classList.add('slider-active');
      i++;

      if (i >= slide.length) {
        i = 0;
      }

      repeater();
    }, 3000);
  }

  repeater();
}

repeat();
