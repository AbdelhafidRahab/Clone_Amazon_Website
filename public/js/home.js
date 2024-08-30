// top slider
const carousel = document.getElementById('carousel');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');

let currentIndex = 0;
const slides = carousel.children;
const totalSlides = slides.length;

function updateCarousel() {
    const translateX = -currentIndex * 100;
    carousel.style.transform = `translateX(${translateX}%)`;
}

nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateCarousel();
});

prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateCarousel();
});