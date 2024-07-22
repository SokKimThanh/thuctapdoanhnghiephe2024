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
 * Desktop Menu hover: nav-item hover active
 */
// Truy cập tất cả các phần tử nav-item
// Ghi đè sự kiện click bằng sự kiện hover
const navItems = document.querySelectorAll('.nav-item.dropdown');

navItems.forEach((item, index) => {
    // Truy cập phần tử nav-link và home-link
    const navLink = item.querySelector('.nav-link.dropdown-toggle');
    const homeLink = item.querySelector('.dropdown-menu');

    if (homeLink === null) return;

    // Thêm lớp CSS đặc biệt hoặc thay đổi style trực tiếp cho 2 phan tu dau tien
    if (index == 0 || index == 1) {
        // Thêm lớp CSS đặc biệt 
        homeLink.classList.add('home-link');

        // Tách lớp linear ra khỏi homeLink
        if (index == 0) {
            homeLink.classList.add('linear');
        }
    }

    // Thêm sự kiện mouseover cho nav-link
    navLink.addEventListener('mouseover', () => {
        homeLink.classList.add('show');
    });

    // Thêm sự kiện mouseleave cho nav-item
    item.addEventListener('mouseleave', () => {
        homeLink.classList.remove('show');
    });

    // Thêm sự kiện mouseover cho home-link để giữ nó hiển thị
    homeLink.addEventListener('mouseover', () => {
        homeLink.classList.add('show');
    });

    // Thêm sự kiện mouseleave cho home-link để ẩn nó khi không hover
    homeLink.addEventListener('mouseleave', () => {
        homeLink.classList.remove('show');
    });
});
/**
 * Băng chuyền animation
 */
const sliderWrapper = document.querySelector('.slider-wrapper');
const items = document.querySelectorAll('.slider-item');
const totalItems = items.length;
let isDragging = false;
let startPos = 0;
let currentTranslate = 0;
let prevTranslate = 0;
let animationID;
let currentIndex = 0;

// Clone items for infinite loop effect
items.forEach((item, index) => {
    const clone1 = item.cloneNode(true);
    clone1.classList.add('clone');
    sliderWrapper.appendChild(clone1);

    const clone2 = item.cloneNode(true);
    clone2.classList.add('clone');
    sliderWrapper.insertBefore(clone2, sliderWrapper.firstChild);
});

sliderWrapper.addEventListener('mousedown', startDrag);
sliderWrapper.addEventListener('mouseup', endDrag);
sliderWrapper.addEventListener('mouseleave', endDrag);
sliderWrapper.addEventListener('mousemove', dragging);

sliderWrapper.addEventListener('touchstart', startDrag);
sliderWrapper.addEventListener('touchend', endDrag);
sliderWrapper.addEventListener('touchmove', dragging);

document.getElementById('next').addEventListener('click', () => {
    currentIndex += 1;
    setPositionByIndex();
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex -= 1;
    setPositionByIndex();
});

function startDrag(event) {
    isDragging = true;
    startPos = getPositionX(event);
    animationID = requestAnimationFrame(animation);
    sliderWrapper.style.cursor = 'grabbing';
}

function endDrag() {
    isDragging = false;
    cancelAnimationFrame(animationID);
    sliderWrapper.style.cursor = 'grab';
    const movedBy = currentTranslate - prevTranslate;

    if (movedBy < -100) {
        currentIndex += 1;
    } else if (movedBy > 100) {
        currentIndex -= 1;
    }

    setPositionByIndex();
}

function dragging(event) {
    if (isDragging) {
        const currentPosition = getPositionX(event);
        currentTranslate = prevTranslate + currentPosition - startPos;
    }
}

function getPositionX(event) {
    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
}

function animation() {
    setSliderPosition();
    if (isDragging) requestAnimationFrame(animation);
}

function setSliderPosition() {
    sliderWrapper.style.transform = `translateX(${currentTranslate}px)`;
}

function setPositionByIndex() {
    if (currentIndex >= totalItems) {
        currentIndex = 0;
        prevTranslate = currentTranslate = 0;
        sliderWrapper.style.transition = 'none';
        setSliderPosition();
        setTimeout(() => {
            sliderWrapper.style.transition = 'transform 0.3s ease-in-out';
            currentTranslate = currentIndex * -300;
            prevTranslate = currentTranslate;
            setSliderPosition();
        }, 0);
    } else if (currentIndex < 0) {
        currentIndex = totalItems - 1;
        prevTranslate = currentTranslate = (totalItems - 1) * -300;
        sliderWrapper.style.transition = 'none';
        setSliderPosition();
        setTimeout(() => {
            sliderWrapper.style.transition = 'transform 0.3s ease-in-out';
            currentTranslate = currentIndex * -300;
            prevTranslate = currentTranslate;
            setSliderPosition();
        }, 0);
    } else {
        currentTranslate = currentIndex * -300;
        prevTranslate = currentTranslate;
        setSliderPosition();
    }
}
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
});

/**
 * Section customer-testimonials
 */
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

});