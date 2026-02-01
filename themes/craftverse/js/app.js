jQuery(document).ready(function() {
  setTimeout(function() {
    initializeFadeInAnimation();
  }, 100);

  initializeLatestProjectsSlider();
  // Latest projects staggered fade-in
  initializeLatestProjectsItemsFade();

  $(window).on('scroll', function() {
    checkFadeInElements();
    checkLatestProjectsItemsFade();
  });

  $(window).on('load resize', function() {
    checkFadeInElements();
    checkLatestProjectsItemsFade();
    initializeLatestProjectsSlider();
  });
});

// Generic fade-in
function initializeFadeInAnimation() {
  checkFadeInElements();
}

// Latest projects staggered fade-in
function initializeLatestProjectsItemsFade() {
  const $items = $('.latest-projects__item');

  if (!$items.length) {
    return;
  }

  $items.addClass('fade-in');
}

function checkFadeInElements() {
  $('.fade-in').each(function() {
    if ($(this).hasClass('latest-projects__item')) {
      return;
    }

    if ($(this).hasClass('fade-in-active')) {
      return;
    }

    if (isElementInView($(this))) {
      $(this).addClass('fade-in-active');
    }
  });
}

function checkLatestProjectsItemsFade() {
  const $items = $('.latest-projects__item');

  if (!$items.length) {
    return;
  }

  if ($items.first().hasClass('fade-in-active')) {
    return;
  }

  const anyInView = $items.toArray().some(function(item) {
    const $item = $(item);
    const elementTop = $item.offset().top;
    const elementHeight = $item.outerHeight();
    const elementMiddle = elementTop + (elementHeight / 2);
    const viewportTop = $(window).scrollTop();
    const viewportBottom = viewportTop + $(window).height();
    return elementMiddle > viewportTop && elementMiddle < viewportBottom;
  });

  if (!anyInView) {
    return;
  }

  $items.each(function(index) {
    const $item = $(this);
    setTimeout(function() {
      $item.addClass('fade-in-active');
    }, index * 150);
  });
}

function isElementInView($element) {
  const elementTop = $element.offset().top;
  const elementBottom = elementTop + $element.outerHeight();
  const viewportTop = $(window).scrollTop();
  const viewportBottom = viewportTop + $(window).height();
  
  return elementBottom > (viewportTop + 50) && elementTop < viewportBottom;
}

function initializeLatestProjectsSlider() {
  const $slider = $('.latest-projects__list');
  
  if (!$slider.length) {
    return;
  }
  
  const windowWidth = $(window).width();
  
  const isSlickActive = $slider.hasClass('slick-initialized');
  
  if (windowWidth < 600) {
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
    if (isSlickActive) {
      $slider.slick('unslick');
    }
  }
}