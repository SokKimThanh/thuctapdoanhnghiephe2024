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
