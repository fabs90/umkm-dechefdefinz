let navbar = document.querySelector(".header .navbar");

const menu = document.querySelector("#menu-btn");

menu.onclick = () => {
    menu.classList.toggle("fa-times");
    const newLocal = "active";
    navbar.classList.toggle(newLocal);
    navbar.classList.toggle(newFunction());

    function newFunction() {
        return "active";
    }
};

var swiper = new Swiper(".home-slider", {
    grabCursor: true,
    loop: true,
    cnteredSlides: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
const allStar = document.querySelectorAll(".rating .star");
const ratingValue = document.querySelector(".rating input");

allStar.forEach((item, idx) => {
    item.addEventListener("click", function () {
        let click = 0;
        ratingValue.value = idx + 1;

        allStar.forEach((i) => {
            i.classList.replace("bxs-star", "bx-star");
            i.classList.remove("active");
        });
        for (let i = 0; i < allStar.length; i++) {
            if (i <= idx) {
                allStar[i].classList.replace("bx-star", "bxs-star");
                allStar[i].classList.add("active");
            } else {
                allStar[i].style.setProperty("--i", click);
                click++;
            }
        }
    });
});
var swiper = new Swiper(".review-row", {
    spaceBetween: 30,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
        1500: {
            slidesPerView: 4,
        },
    },
});
