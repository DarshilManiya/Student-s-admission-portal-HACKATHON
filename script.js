let menuIcon = document.querySelector('#menu-icon');
let navbars = document.querySelector('.navbars');
let body = document.body;

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbars.classList.toggle('active');

    if (navbars.classList.contains('active')) {
        // Open the navbars with a smooth animation
        navbars.style.maxHeight = navbars.scrollHeight + 'px';
        navbars.style.opacity = 1;
    } else {
        // Close the navbars with a smooth animation
        navbars.style.maxHeight = '0';
        navbars.style.opacity = 0;
    }
};

window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        navbars.style.maxHeight = ''; 
        navbars.style.opacity = ''; 
    }
});
function closenavbars() {
    menuIcon.classList.remove('bx-x');
    navbars.classList.remove('active');
    navbars.style.maxHeight = '0';
    navbars.style.opacity = '0';
}

body.addEventListener('click', (event) => {
    if (navbars.classList.contains('active') && event.target !== menuIcon && !navbars.contains(event.target)) {
        closenavbars();
    }
});