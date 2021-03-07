(($) => {
  $(document).ready(function () {
    $("#fullpage").fullpage({
      anchors: ["firstPage", "secondPage", "thirdPage", "fourthPage", "footer"],
      menu: "#myMenu",
      slidesNavigation: true,
      paddingTop: "82px",
      controlArrows: false,
      responsiveHeight: 768,
      responsiveWidth: 768,
      afterResponsive: function (isResponsive) {},
    });
  });
})(jQuery);
