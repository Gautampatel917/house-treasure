const scroll = new LocomotiveScroll({
    el: document.querySelector('#main'),
    smooth: true,
    lerp: 0.05,
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

scroll.on('scroll', (args) => {
    const videoSection = document.querySelector('.about-us-video');
    const contentSection = document.querySelector('.about-us-content');

    const contentRect = contentSection.getBoundingClientRect();
    const videoRect = videoSection.getBoundingClientRect();

    if (contentRect.top <= videoRect.bottom) {
        videoSection.style.position = 'absolute';
        videoSection.style.top = `${videoRect.bottom}px`;
    } else {
        videoSection.style.position = 'fixed';
        videoSection.style.top = '0';
    }
});