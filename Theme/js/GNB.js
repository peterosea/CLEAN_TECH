(($) => {
  var myElement = document.querySelector("nav.GNB");
  var options = {};
  var headroom = new Headroom(myElement, options);

  headroom.init();

  // mobile
  var shrinkHeader = 10;
  $(window).scroll(function () {
    var scroll = getCurrentScroll();
    if (scroll >= shrinkHeader) {
      $("nav.GNB").addClass("shrink");
    } else {
      $("nav.GNB").removeClass("shrink");
    }
  });
  function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
  }
})(jQuery);
