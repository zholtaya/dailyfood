document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".content_popular-products", {
        slidesPerView: 5,
        spaceBetween: 12,
        
        loop: true,
        // autoplay: {
        //     delay: 1500,
        // },
        loopedSlides: 5,
        watchOverflow: true,
        breakpoints: {
            1150: {
                slidesPerView: 4,
                spaceBetween: 12,
            },
            950: {
                slidesPerView: 4,
                spaceBetween: 8,
            },
            650: {
                slidesPerView: 3,
                spaceBetween: 8,
            },
            430: {
                slidesPerView: 2,
                spaceBetween: 8,
            },
            300: {
                slidesPerView: 1,
                outerWidth: 220,
            },
        },
    });
});
