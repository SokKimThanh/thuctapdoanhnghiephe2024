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

navItems.forEach(item => {
    // Truy cập phần tử nav-link và home-link
    const navLink = item.querySelector('.nav-link.dropdown-toggle');
    const homeLink = item.querySelector('.dropdown-menu');

    if (homeLink === null) return;

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
 * Desktop Menu hover: homeLink hover show
 */
// Truy cập phần tử home-link đầu tiên
const firstHomeLink = document.getElementsByClassName('home-link');

// Thêm lớp CSS đặc biệt hoặc thay đổi style trực tiếp
if (firstHomeLink) {
    // Thêm lớp CSS đặc biệt 
    firstHomeLink[0].classList.add('area-inside');
}