document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".content_popular-products", {
        slidesPerView: 5,
        spaceBetween: 24,
        loop: true,
        autoplay: {
            delay: 1500,
        },
    });
});
