(($) => {
  $(".previewSlide").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    draggable: false,
    asNavFor: ".moreThumbnailSlide",
  });
  $(".moreThumbnailSlide").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    asNavFor: ".previewSlide",
    draggable: false,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: "0px",
  });

  // 활용 섹션
  $(".utilPreviewSlide").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    draggable: false,
    asNavFor: ".controlSlide",
  });
  $(".controlSlide").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    asNavFor: ".utilPreviewSlide",
    draggable: false,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: "0px",
  });
})(jQuery);
