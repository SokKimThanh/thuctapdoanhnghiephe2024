/**
 * su kien cho menu mobile
 */
const menuButton = document.getElementById('menu-button-mobile');
const menuContainerVisible = document.querySelector('.menu-container-visible');
const menuContainer = document.querySelector('.menu-container');
menuButton.addEventListener('click', () => {
    menuContainerVisible.classList.toggle('show-menu');
    // bat tiep su kien thu 2
    menuContainer.classList.toggle('show-menu-box');
});

/**
 * su kien cho nut search
 */

const btnSearch = document.querySelector('.btn-search');
const searchContainer = document.querySelector('.search-container');
const btnCloseSearch = document.getElementsByClassName('icon-close')[1];

btnSearch.addEventListener('click', () => {
    searchContainer.classList.toggle('show-search-container');
});
btnCloseSearch.addEventListener('click', () => {
    searchContainer.classList.remove('show-search-container');
});


/**
 * Section slider-company
 */
$(document).ready(function () {
    $(".slider-company").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 5
            }
        }
    });
});
/**
 * Trigger animation window scroll
 */
window.addEventListener('scroll', function () {
    /**
     * For section powerful-feature
     */
    const triggerSection = document.getElementById('powerful-feature');
    const sectionPosition = triggerSection.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 2;

    console.log(`${sectionPosition} < ${screenPosition}`);
    if (sectionPosition < screenPosition) {
        document.querySelectorAll('.row > .col-md-4:nth-child(1)').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
        document.querySelectorAll('.row > .col-md-4:nth-child(2)').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.4s';
            el.classList.add('fade-in', 'slide-in-y');
        });
        document.querySelectorAll('.row > .col-md-4:nth-child(3)').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.5s';
            el.classList.add('fade-in', 'slide-in-y');
        });
        document.querySelectorAll('.section-title, .title, .sub-title, .button-container').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
    }
    /**
     * For section company
     */
    const triggerSectionSliderCompany = document.getElementById('slider-company');
    const sectionPositionSliderCompany = triggerSectionSliderCompany.getBoundingClientRect().top;
    const screenPositionSliderCompany = window.innerHeight;
    if (sectionPositionSliderCompany < screenPositionSliderCompany) {
        document.querySelectorAll('.slider-company-container').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
    }
    /**
     * For section company
     */
    const triggerSectionOurProcess = document.getElementById('our-process');
    const sectionPositionOurProcess = triggerSectionOurProcess.getBoundingClientRect().top;
    const screenPositionOurProcess = window.innerHeight;
    if (sectionPositionOurProcess < screenPositionOurProcess) {
        document.querySelectorAll('.process-item').forEach(el => {
            el.style.animation = ' scale 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('scale');
        });
    }
});

/**
 * Section customer-testimonials
 */
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
});