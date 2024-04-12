const collapse = document.querySelector('.header .nav-bar .nav-list .collapse');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const header = document.querySelector('.header.container');


collapse.addEventListener('click', () => {
    collapse.classList.toggle('active');
    mobile_menu.classList.toggle('active');

});
document.addEventListener('scroll', () => {
    var scroll_position = window.scrollY;
    if (scroll_position > 250) {
        header.style.backgroundColor = "#29323c";
    } else { header.style.backgroundColor = "transparent"; }
});