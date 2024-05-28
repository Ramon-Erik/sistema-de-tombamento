const menu = document.querySelector('#menuHamburger');
const fade = document.querySelector('.fade');
const menuLinks = document.querySelector('#menu-links');

menu.addEventListener('click', function () {
    menuLinks.classList.toggle('visivel');
});