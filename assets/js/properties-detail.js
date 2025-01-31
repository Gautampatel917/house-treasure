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

//feature image animation

function p_feature() {
    let features = document.querySelectorAll(".feature-item");
    let p_feature = document.querySelector(".p_feature");

    p_feature.addEventListener('mouseover', () => {
        features.forEach(feature => {
            gsap.to(p_feature, {
                borderBottom: '3px solid #8D493A',
                transition: 'all 0.1s linear'
            })
            gsap.to(feature.querySelector('.image'), { // select the img element with class "image"
                opacity: 1,
                scale: 1,
            })
        })
    })

    p_feature.addEventListener('mouseleave', () => {
        features.forEach(feature => {
            gsap.to(p_feature, {
                borderBottom: '1px solid #8D493A',
                transition: 'all 0.1s linear'
            })
            gsap.to(feature.querySelector('.image'), {
                opacity: 0,
                scale: 0
            })
        })
    })

    p_feature.addEventListener('mousemove', (dets) => {
        features.forEach(feature => {
            gsap.to(feature.querySelector('.image'), {
                x: dets.x - p_feature.getBoundingClientRect().x - 500,
                y: dets.y - p_feature.getBoundingClientRect().y - 120
            })
        })
    })
}

p_feature();

function p_description() {
    let p_desc = document.querySelector(".p_description");
    let desc = document.querySelector(".description");

    p_desc.addEventListener('mouseover', () => {
        gsap.to(p_desc, {
            borderBottom: '3px solid #8D493A',
            transition: 'all 0.1s linear'
        })
        gsap.to(desc.childNodes[1], {
            opacity: 1,
            scale: 1,
        })
    })

    p_desc.addEventListener('mouseleave', () => {
        gsap.to(p_desc, {
            borderBottom: '1px solid #8D493A',
            transition: 'all 0.1s linear'
        })
        gsap.to(desc.childNodes[1], {
            opacity: 0,
            scale: 0
        })
    })

    p_desc.addEventListener('mousemove', (dets) => {
        gsap.to(desc.childNodes[1], {
            x: dets.x - p_desc.getBoundingClientRect().x - 500,
            y: dets.y - p_desc.getBoundingClientRect().y - 120
        })
    })
}

p_description();

function p_landmark() {
    let p_land = document.querySelector(".p_landmarks");
    let landmark = document.querySelector(".landmarks");

    p_land.addEventListener('mouseover', () => {
        gsap.to(p_land, {
            borderBottom: '3px solid #8D493A',
            transition: 'all 0.1s linear'
        })
        gsap.to(landmark.childNodes[1], {
            opacity: 1,
            scale: 1,
        })
        console.log(p_land);
    })

    p_land.addEventListener('mouseleave', () => {
        gsap.to(p_land, {
            borderBottom: '1px solid #8D493A',
            transition: 'all 0.1s linear'
        })
        gsap.to(landmark.childNodes[1], {
            opacity: 0,
            scale: 0
        })
    })

    p_land.addEventListener('mousemove', (dets) => {
        gsap.to(landmark.childNodes[1], {
            x: dets.x - p_land.getBoundingClientRect().x - 500,
            y: dets.y - p_land.getBoundingClientRect().y - 120
        })
    })
}

p_landmark();

function p_location() {
    let p_loc = document.querySelector(".p_location");
    let location = document.querySelector(".location");

    p_loc.addEventListener('mouseover', () => {
        gsap.to(p_loc, {
            borderBottom: '3px solid #8D493A',
            transition: 'all 0.1s linear'
        })
        gsap.to(location.childNodes[1], {
            opacity: 1,
            scale: 1,
        })
    })

    p_loc.addEventListener('mouseleave', () => {
        gsap.to(p_loc, {
            borderBottom: '1px solid #8D493A',
            transition: 'all 0.1s linear'
        })
        gsap.to(location.childNodes[1], {
            opacity: 0,
            scale: 0
        })
    })

    p_loc.addEventListener('mousemove', (dots) => {
        gsap.to(location.childNodes[1], {
            x: dots.x - p_loc.getBoundingClientRect().x - 500,
            y: dots.y - p_loc.getBoundingClientRect().y - 120
        })
    })
}

p_location();