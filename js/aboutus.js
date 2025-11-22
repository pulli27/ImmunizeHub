document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.querySelector('.carousel');
  const carouselItems = carousel.querySelectorAll('.carousel-item');
  

  let currentSlide = 0; // Track the current slide index
  const slideInterval = 3000; // Change image every 3 seconds (adjust as needed)

  // Function to show the selected slide
  function showSlide(n) {
    if (n > carouselItems.length - 1) {
      currentSlide = 0;
    } else if (n < 0) {
      currentSlide = carouselItems.length - 1;
    } else {
      currentSlide = n;
    }

    carouselItems.forEach(item => item.classList.remove('active'));
    carouselItems[currentSlide].classList.add('active');
  }

  // Function to automatically change the slide
  function autoSlide() {
    showSlide(currentSlide + 1);
  }

  // Start the automatic slide change
  const autoSlideInterval = setInterval(autoSlide, slideInterval);

 
  // Start the carousel on the first slide
  showSlide(currentSlide);
});