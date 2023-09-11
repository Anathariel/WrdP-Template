document.addEventListener("DOMContentLoaded", function () {
    var burger = document.querySelector(".burger-menu");
    var navMenu = document.querySelector(".nav-menu");
  
    burger.addEventListener("click", function () {
        navMenu.classList.toggle("active");
    });
  });
  
  //Infinite Carousel
document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".items");
  let slides = document.querySelectorAll(".item");
  const button = document.querySelectorAll(".button");

  let current = 0;
  let prev = slides.length - 1;
  let next = 1;

  const updateSlides = () => {
    slides = document.querySelectorAll(".item");
    prev = slides.length - 1;
    next = 1;
  };

  // Initialize carousel
  const initializeCarousel = () => {
    updateSlides();
    gotoNum(current);
  };

  // Button click handlers
  for (let i = 0; i < button.length; i++) {
    button[i].addEventListener("click", () => {
      i == 0 ? gotoPrev() : gotoNext();
      updateSlides();
    });
  }

  // Navigation functions
  const gotoPrev = () => current > 0 ? gotoNum(current - 1) : gotoNum(slides.length - 1);
  const gotoNext = () => current < slides.length - 1 ? gotoNum(current + 1) : gotoNum(0);

  const gotoNum = number => {
    current = number;
    prev = current - 1;
    next = current + 1;

    // Remove existing classes
    for (let i = 0; i < slides.length; i++) {
      slides[i].classList.remove("active", "prev", "next");
    }

    // Edge cases for carousel bounds
    if (next >= slides.length) {
      next = 0;
    }

    if (prev < 0) {
      prev = slides.length - 1;
    }

    // Set classes for current, next, and prev slides
    slides[current].classList.add("active");
    slides[prev].classList.add("prev");
    slides[next].classList.add("next");
  };

  // Initialize the carousel when the document is ready
  initializeCarousel();
});


//Header margin
window.addEventListener("load", function() {
  const headerHeight = document.querySelector("header").offsetHeight;
  document.querySelector("main").style.marginTop = `${headerHeight}px`;
});

window.addEventListener("resize", function() {
  const headerHeight = document.querySelector("header").offsetHeight;
  document.querySelector("main").style.marginTop = `${headerHeight}px`;
});


// Link cards
document.addEventListener("DOMContentLoaded", function() {
  const cards = document.querySelectorAll(".card");
  
  cards.forEach(card => {
    card.addEventListener("click", function() {
      const url = this.getAttribute("data-href");
      if (url) {
        window.location.href = url;
      }
    });
  });
});
