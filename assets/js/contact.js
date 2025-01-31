function page2Animation() {
    const contactInfos = document.querySelectorAll('.contact-info');

    contactInfos.forEach((contactInfo, index) => {
        const oldmanSearch = contactInfo.querySelector('.oldmanSearch');

        contactInfo.addEventListener('mousemove', (event) => {
            console.log('mousemove event triggered');
            gsap.to(oldmanSearch, {
                opacity: 1,
                scale: 1,
            });

            gsap.to(oldmanSearch, {
                x: event.clientX - contactInfo.getBoundingClientRect().x - 50,
                y: event.clientY - contactInfo.getBoundingClientRect().y - 100,
            });
        });

        contactInfo.addEventListener('mouseleave', () => {
            console.log('mouseleave event triggered');
            gsap.to(oldmanSearch, {
                opacity: 0,
                scale: 0,
            });
        });
    });
}

page2Animation();