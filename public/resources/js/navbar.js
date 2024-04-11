

//menu burger
document.addEventListener('DOMContentLoaded', function() {
const menuHamburger = document.querySelector(".menu-hamburger")
const navLinks = document.querySelector(".nav-links")

menuHamburger.addEventListener('click',()=>{
navLinks.classList.toggle('mobile-menu')})


//no scroll quand menu burger ouvert
const hamburger = document.querySelector('.menu-hamburger');
const body = document.body;


function toggleScroll() {
    body.classList.toggle('no-scroll');
}

hamburger.addEventListener('click', function() {
    toggleScroll();
});});
