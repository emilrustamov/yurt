jQuery(function ($) {
  $('.gallery-slider').owlCarousel({
    loop: true,
    margin: 30,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 2000,
    autoplayHoverPause: false,
    nav: false,
    responsive: {
      0: {
        items: 1,

      },
      600: {
        items: 2,

      },
      1000: {
        items: 3,
      }
    }
  });


  $('.partners-slider').owlCarousel({
    loop: true,
    margin: 30,
    responsiveClass: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 2000,
    autoplayHoverPause: false,
    nav: false,
    responsive: {
      0: {
        items: 3,

      },
      600: {
        items: 3,

      },
      1000: {
        items: 5,
      }
    }
  });

});

jQuery(function () {
  var owl = jQuery('.showreels-slider').owlCarousel({
    loop: false,
    nav: true,
    items: 1,
    dots: false,
    navText: [
      "<img src='/wp-content/uploads/2024/06/arrow.png' alt='Назад'>",
      "<img src='/wp-content/uploads/2024/06/arrow.png' alt='Вперед'>"
    ]
  });

  var filterOwl = jQuery('.showreels-nav').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    items: 3,
    dots: false,
    slideBy: 3,

  });

  function syncNavWithVideo(index) {
    console.log("Syncing nav with video, index:", index);
    jQuery('.showreels-nav-item').removeClass('active');
    var currentNavItem = jQuery('.showreels-nav-item').eq(index);
    currentNavItem.addClass('active');
    filterOwl.trigger('to.owl.carousel', [index - (index % 3), 300, true]);
  }

  jQuery('.showreels-nav-item').click(function () {
    var index = jQuery(this).data('index');
    var year = jQuery(this).data('year');
    console.log("Clicked year: " + year, "Index:", index);
    owl.trigger('to.owl.carousel', [index, 300, true]);
    syncNavWithVideo(index);
  });

  jQuery('.arrow-prev').click(function () {
    var currentActiveIndex = jQuery('.showreels-nav-item.active').data('index');
    if (currentActiveIndex > 0) {
      var newIndex = currentActiveIndex - 1;
      var year = jQuery('.showreels-nav-item').eq(newIndex).data('year');
      console.log("Previous year: " + year, "New Index:", newIndex);
      owl.trigger('to.owl.carousel', [newIndex, 300, true]);
      syncNavWithVideo(newIndex);
    }
  });

  jQuery('.arrow-next').click(function () {
    var currentActiveIndex = jQuery('.showreels-nav-item.active').data('index');
    var totalItems = jQuery('.showreels-nav-item').length;
    if (currentActiveIndex < totalItems - 1) {
      var newIndex = currentActiveIndex + 1;
      var year = jQuery('.showreels-nav-item').eq(newIndex).data('year');
      console.log("Next year: " + year, "New Index:", newIndex);
      owl.trigger('to.owl.carousel', [newIndex, 300, true]);
      syncNavWithVideo(newIndex);
    }
  });

  owl.on('changed.owl.carousel', function (event) {
    var currentIndex = event.item.index;
    var year = jQuery('.showreels-nav-item').eq(currentIndex).data('year');
    console.log("Swiped to year: " + year, "Index:", currentIndex);
    syncNavWithVideo(currentIndex);
  });


  syncNavWithVideo(0);
});