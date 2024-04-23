let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(index) {
  if (index < 0) {
    index = totalSlides - 1;
  } else if (index >= totalSlides) {
    index = 0;
  }

  const sliderTrack = document.querySelector('.slider-track');
  const slideWidth = slides[0].clientWidth;

  sliderTrack.style.transform = `translateX(${-index * slideWidth}px)`;
  currentIndex = index;
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

setInterval(nextSlide, 10000); // Change slide every 5 seconds



// script.js
document.getElementById('myForm').addEventListener('submit', function(event) {
  event.preventDefault();  // Prevent the default form submission
  showLoading(true);
  
  // Simulate a network request or processing delay, then redirect
  setTimeout(function() {
      showLoading(false);
      window.location.href = 'header.html';  // Redirect to the header page
  }, 3000);  // Show the loader for 3000ms (3 seconds)
});

function showLoading(show) {
  var overlay = document.getElementById('loadingOverlay');
  if (show) {
      overlay.classList.remove('hidden');
  } else {
      overlay.classList.add('hidden');
  }
}
