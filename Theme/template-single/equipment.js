(($) => {
  $(".previewSlide").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    draggable: false,
    asNavFor: ".moreThumbnailSlide",
    infinite: false,
  });
  $(".moreThumbnailSlide").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: false,
    asNavFor: ".previewSlide",
    draggable: false,
    focusOnSelect: true,
    centerMode: false,
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
    centerMode: false,
    centerPadding: "0px",
  });

  // 솔루션
  $(".vpreviewSlide").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    draggable: false,
    asNavFor: ".vcontrolSlide",
  });
  $(".vcontrolSlide").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    asNavFor: ".vpreviewSlide",
    draggable: false,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: "0px",
  });
})(jQuery);
