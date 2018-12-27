(function($) {
  function featuredCarousel() {
    $('.featured-carousel').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '#featured-carousel-prev',
      nextArrow: '#featured-carousel-next',
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 479,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  function carouselPosts() {
    $('.carousel-posts').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      prevArrow: '<a href="#" class="slick-arrow-prev"><span class="arrow arrow-big arrow-left"></span></a>',
      nextArrow: '<a href="#" class="slick-arrow-next"><span class="arrow arrow-big arrow-right"></span></a>',
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 479,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  $(document).ready(function() {
    featuredCarousel();

    carouselPosts();
  });
})(jQuery);
