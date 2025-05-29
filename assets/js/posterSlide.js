var slide = document.querySelectorAll('.slide');
        var btns= document.querySelectorAll('.btn');
        let currentSlide = 1;

        //manua slide

        var manualNav = function(manual){
            slide.forEach((slide)=>{
                slide.classList.remove('slider-active');

                btns.forEach((btn)=>{
                    btn.classList.remove('slider-active');
                });
            });

            slide[manual].classList.add('slider-active');
            btns[manual].classList.add('slider-active');
        }

        btns.forEach((btn, i)=> {
            btn.addEventListener("click", ()=>{
                manualNav(i);
                currentSlide = i;
            });
        });

           // slider autoplay
        var repeat = function(activeClass){
            let active = document.getElementsByClassName('slider-active');
            let i = 1;

            var repeater = () => {
                setTimeout(function(){
                    [...active].forEach((activeSlide)=>{
                       activeSlide.classList.remove('slider-active');
                    })

                slide[i].classList.add('slider-active');
                btns[i].classList.add('slider-active');
                i++;

                if(slide.length == i){
                    i = 0;
                }
               if(i >= slide.length){
                     return;
                }

                repeater();
                }, 3000);
            }
            repeater();
        }
        repeat();