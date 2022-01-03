
const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    slidesPerView: 5,
    spaceBetween:10,
    centerSlides:true,
    speed: 1000,
    grabCursor: true,
    watchSlidesProgress: true,
    mousewheelControl: true,
    keyboardControl: true,
    // Navigation arrows
    breakpoints: {
        // when window width is >= 320px
        280: {
            slidesPerView: 1,
            slidesOffsetBefore: 170,
            slidesOffsetAfter:-480,
        },
        425:{
            slidesPerView: 2,
            slidesOffsetBefore: 120,
            slidesOffsetAfter:-120,
        },
        500: {
            slidesPerView: 2,
            slidesOffsetBefore: 80,
            slidesOffsetAfter:-160,
        },
        720:{
            slidesPerView: 3,

        }
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }

});
  