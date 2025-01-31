// Adjust the navigation bar's position dynamically
/* scroll.on('scroll', (position) => {
    nav.style.transform = `translateY(${position.scroll.y}px)`;
}); */

// Add event listener to window resize
window.addEventListener('resize', () => {
    // Get all property images
    const propertyImages = document.querySelectorAll('.property-item img');

    // Loop through images and make them responsive
    propertyImages.forEach((image) => {
        image.style.height = '150px';
        image.style.objectFit = 'cover';
    });
});