// Initialize AOS for scroll animations
AOS.init({
    duration: 1000,
    once: true
  });
  
  // You can add additional JavaScript here if needed.

  // When a gallery thumbnail is clicked, set the carousel slide accordingly
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('click', function() {
      const slideTo = parseInt(this.getAttribute('data-bs-slide-to'), 10);
      const carouselElement = document.querySelector('#galleryCarousel');
      
      // Get existing carousel instance or create a new one
      let carousel = bootstrap.Carousel.getInstance(carouselElement);
      if (!carousel) {
        carousel = new bootstrap.Carousel(carouselElement);
      }
      
      carousel.to(slideTo);
    });
  });
  