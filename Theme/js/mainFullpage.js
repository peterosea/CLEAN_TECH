(($) => {
  $(document).ready(function () {
    $("#fullpage").fullpage({
      anchors: ["firstPage", "secondPage", "thirdPage", "fourthPage", "footer"],
      menu: "#myMenu",
      slidesNavigation: true,
      paddingTop: "82px",
      controlArrows: false,
    });
  });
})(jQuery);
