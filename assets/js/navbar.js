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