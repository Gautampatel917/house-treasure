const scroll = new LocomotiveScroll({
    el: document.querySelector('#main'),
    smooth: true,
    lerp: 0.1
});


// userLogout------------------
let userImg = document.querySelector('.user');
let userLogout = document.querySelector('.userControl');

userImg.addEventListener('mouseenter', function () {
    userLogout.style.display = 'block';
})
userLogout.addEventListener('mouseleave', function () {
    userLogout.style.display = 'none';
})


//userResponse------------------
let response = document.querySelector('.response');
let userResponse = document.querySelector('.userResponse');

response.addEventListener('mouseenter', function () {
    userResponse.style.display = 'block';
})
userResponse.addEventListener('mouseleave', function () {
    userResponse.style.display = 'none';
})

const nav = document.querySelector('nav');

// Adjust the navigation bar's position dynamically
scroll.on('scroll', (position) => {
    nav.style.transform = `translateY(${position.scroll.y}px)`;
});


//service image load
window.addEventListener('load', function () {
    const tl = gsap.timeline();
    tl.to('.service-image img', {
        left: "0%",
        opacity: 1,
        duration: 1.6,
    }, 0)
        .to('.inquiry-form', {
            right: "0%",
            opacity: 1,
            duration: 1.7,
            startAt: 0
        }, 0.7);
});