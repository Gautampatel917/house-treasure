let scrollImg = document.querySelectorAll('.scrollContainer img');

window.addEventListener('load', function () {
    // Your code here
    const tl = gsap.timeline();
    tl.to('.introContainer1 img', {
        left: "10%",
        opacity: 1,
        duration: 1.7,
        stagger: 0
    }, 0)
        .to('.introContainer1 .introText', {
            right: "20%",
            opacity: 1,
            duration: 1.7,
            startAt: 0
        }, 0).
        to('.introContainer2 img', {
            right: "10%",
            opacity: 1,
            duration: 1.7,
            stagger: 0
        }, 2.3)
        .to('.introContainer2 .introText', {
            left: "20%",
            opacity: 1,
            duration: 1.7,
            startAt: 0
        }, 2.3)

});

const slides = document.querySelector('.scrollContainer');
const slide = document.querySelectorAll('.scroll');
let currentIndex = 0;
const totalSlides = slide.length;

function showSlide(index) {
    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }
    const offset = -currentIndex * 100 + '%';
    slides.style.transform = `translateX(${offset})`;
}

setInterval(() => {
    showSlide(currentIndex + 1);
}, 3000);

showSlide(currentIndex);

//benefits animation

let benefitsList = document.querySelectorAll('.benefits');
benefitsList.forEach((benefits) => {
    document.addEventListener('DOMContentLoaded', function () {
        let observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    benefits.classList.add('animate');
                }
            });
        });
        observer.observe(benefits);
    });
})

//----feedback Animation

document.addEventListener('DOMContentLoaded', function () {
    let feedbackForm = document.querySelector('.feedbackForm');
    let observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                feedbackForm.classList.add('feedAnimate');
                observer.unobserve(feedbackForm);
            }
        });
    });

    observer.observe(feedbackForm);
});

document.addEventListener('DOMContentLoaded', function () {
    let feedbackForm = document.querySelector('.feedbackImg');
    let observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                feedbackForm.classList.add('feedAnimate');
                observer.unobserve(feedbackImg);
            }
        });
    });

    observer.observe(feedbackForm);
});

//-----------------------------------------form
/* document.getElementById('my-feedback-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent page reload on form submission

    // Gather form data
    const formData = new FormData(this);

    // Send AJAX request to backend PHP file
    fetch('../../code.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text()) // Handle the response as text
        .then(data => {
            // Display response message
            document.getElementById('feedback-response').innerHTML = data;

            // Scroll to the feedback form smoothly
            document.getElementById('feedbackForm').scrollIntoView({ behavior: 'smooth' });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}); */