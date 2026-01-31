jQuery(document).ready(function() {
  // Initialize fade-in animation with a small delay to ensure DOM is ready
  setTimeout(function() {
    initializeFadeInAnimation();
  }, 100);
  
  // Initialize Slick slider for latest projects
  initializeLatestProjectsSlider();
  
  // Re-check on scroll
  $(window).on('scroll', function() {
    checkFadeInElements();
  });
  
  // Also check on window load and resize
  $(window).on('load resize', function() {
    checkFadeInElements();
    initializeLatestProjectsSlider(); // Re-initialize slider on resize
  });
});

/**
 * Initialize fade-in and slide-up animation for elements with .fade-in class
 */
function initializeFadeInAnimation() {
  checkFadeInElements();
}

/**
 * Check which .fade-in elements are in view and animate them
 */
function checkFadeInElements() {
  $('.fade-in').each(function() {
    // Skip if already animated
    if ($(this).hasClass('fade-in-active')) {
      return;
    }
    
    // Check if element is in viewport
    if (isElementInView($(this))) {
      $(this).addClass('fade-in-active');
    }
  });
}

/**
 * Check if an element is in the viewport
 */
function isElementInView($element) {
  const elementTop = $element.offset().top;
  const elementBottom = elementTop + $element.outerHeight();
  const viewportTop = $(window).scrollTop();
  const viewportBottom = viewportTop + $(window).height();
  
  // Element is in view if it's within 50px from bottom of viewport
  return elementBottom > (viewportTop + 50) && elementTop < viewportBottom;
}

/**
 * Initialize Slick slider for latest projects (mobile only - under 600px)
 */
function initializeLatestProjectsSlider() {
  const $slider = $('.latest-projects__list');
  
  if (!$slider.length) {
    return;
  }
  
  const windowWidth = $(window).width();
  
  // Check if Slick is already initialized
  const isSlickActive = $slider.hasClass('slick-initialized');
  
  if (windowWidth < 600) {
    // Initialize Slick for mobile
    if (!isSlickActive) {
      $slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
      });
    }
  } else {
    // Destroy Slick for desktop
    if (isSlickActive) {
      $slider.slick('unslick');
    }
  }
}