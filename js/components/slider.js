import Swiper from 'swiper/swiper-bundle';
import 'swiper/swiper-bundle.css';


new Swiper('.finance-slider', {
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    observer: true,
    observeParents: true
});

new Swiper('.news-slider', {
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    observer: true,
    observeParents: true
});

new Swiper('.header-slider', {
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 4000,
        pauseOnMouseEnter: true,
        disableOnInteraction: false
    },
    observer: true,
    observeParents: true
});

new Swiper('.savings-services-slider', {
    observer: true,
    observeParents: true,
    breakpoints: {
        320: {
            slidesPerView: 1.5,
            spaceBetween: 60
        },
        420: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        575: {
            slidesPerView: 2.1,
            spaceBetween: 20
        },
        767: {
            slidesPerView: 2.5,
            spaceBetween: 30
        },
        991: {
            slidesPerView: 3.2,
            spaceBetween: 40
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: 40
        }
    }
});

new Swiper('.block-table-tariff-slider', {
    spaceBetween: 30,
    grid: {
        fill: 'row',
        rows: 2
    },
    observer: true,
    observeParents: true,
    breakpoints: {
        991: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        1200: {
            slidesPerView: 2
        }
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
});