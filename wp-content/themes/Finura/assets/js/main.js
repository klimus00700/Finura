$(document).ready(function () {
    const swiper = new Swiper(".swiper", {
        slidesPerView: 1,
        slidesPerGroup: 1,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    })

    // // Mobile menu
    // $(".burger-menu").click(function () {
    //     $(".menu-mobile").toggle(500)
    //     $(this).toggleClass("close")
    // })
})
