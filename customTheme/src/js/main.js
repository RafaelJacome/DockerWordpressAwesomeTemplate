import '../sass/styles.scss'
import 'slick-carousel/slick/slick.js';
const $ = jQuery;

$(document).ready(()=>{
    $('.slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000
    });  
});

(() => {
    window.onload = () => {
        const navBtn = document.querySelector('.nav-btn');
        const nav = document.querySelector('header nav');
        const closeNav = document.querySelector('.close-menu');
        navBtn.addEventListener('click', () => nav.classList.add('show') );
        closeNav.addEventListener('click', () => nav.classList.remove('show') );
        window.onresize = () => nav.classList.remove('show');
    }
})();


