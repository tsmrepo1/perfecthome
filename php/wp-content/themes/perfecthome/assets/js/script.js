$(document).ready(function () {
  // ---> Site Header Shrink
  const siteHeader = $(".site-header");
  $(window).scroll(function () {
    if ($(document).scrollTop() > 30) {
      siteHeader.addClass("site-header--shrinked");
    } else {
      siteHeader.removeClass("site-header--shrinked");
    }

    // Scroll Top fade in out
    if ($(document).scrollTop() > 300) {
      $(".button--scroll-to-top").addClass("show");
    } else {
      $(".button--scroll-to-top").removeClass("show");
    }
  });

  $(".button--scroll-to-top").on("click", function () {
    scrollToTop(0, 500);
  });

  function scrollToTop(offset, duration) {
    $("html, body").animate({ scrollTop: offset }, duration);
    return false;
  }

  // ---> Test Overflowing Element
  var docWidth = document.documentElement.offsetWidth;

  [].forEach.call(document.querySelectorAll("*"), function (el) {
    if (el.offsetWidth > docWidth) {
      console.log(el);
    }
  });

  // ---> Hero Banner Carousel
  $(".hero-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 300,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: true,
    responsive: {
      0: {
        items: 1,
        margin: 0,
      },
    },
  });

  // ---> Partners Carousel
  $(".partners-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 10,
    nav: false,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: true,
    responsive: {
      0: {
        items: 2,
        margin: 12,
      },
      576: {
        items: 3,
        margin: 12,
      },
      768: {
        items: 3,
        margin: 16,
      },
      992: {
        items: 4,
        margin: 20,
      },
      1200: {
        items: 5,
        margin: 24,
      },
    },
  });

  // ---> Products Owl Carousel
  $(".services-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 0,
    nav: false,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      1200: {
        items: 3,
      },
    },
  });

  // ---> Solutions Carousel
  $(".gallery-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: false,
    smartSpeed: 1000,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-arrow-left-long'></i>", "<i class='fa-solid fa-arrow-right-long'></i>"],
    dots: false,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 3,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
      1200: {
        items: 5,
      },
      1400: {
        items: 5,
      },
    },
  });

  // ---> Testimonials Carousel
  $(".testimonial-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayHoverPause: false,
    smartSpeed: 1000,
    items: 1,
    nav: false,
    navText: ["<i class='fa-solid fa-arrow-left-long'></i>", "<i class='fa-solid fa-arrow-right-long'></i>"],
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
        margin: 0,
      },
      768: {
        items: 1,
        margin: 0,
      },
      992: {
        items: 2,
        margin: 0,
      },
      1200: {
        items: 2,
        margin: 4,
      },
      1400: {
        items: 2,
        margin: 8,
      },
      1700: {
        items: 2,
        margin: 12,
      },
    },
  });

  // ---> Accordion
  $(".set > a").on("click", function (e) {
    e.preventDefault();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).siblings(".content").slideUp(200);
      $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
    } else {
      $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this).siblings(".content").slideDown(200);
    }
  });

  // ---> Search Function on Header
  $(".site-header__button--search").on("click", function () {
    $(".site-header .form-wrapper").addClass("show");
    $("body").toggleClass("scroll--disabled");
    $(".site-content").toggleClass("pe-none");
  });

  $(".form-wrapper__button--close").on("click", function () {
    $(".site-header .form-wrapper").removeClass("show");
    $("body").removeClass("scroll--disabled");
    $(".site-content").removeClass("pe-none");
  });

  // ---> Quantity increment decrement function
  var qtyPlusBtns = $(".qtyplus");
  var qtyMinusBtns = $(".qtyminus");

  qtyPlusBtns.each(function () {
    $(this).on("click", function () {
      var getVal = $(this).prev().val();
      getVal = parseInt(getVal);
      // console.log(typeof getVal);
      console.log(getVal);
      $(this)
        .prev()
        .attr("value", getVal + 1);
    });
  });

  qtyMinusBtns.each(function () {
    $(this).on("click", function () {
      var getVal = $(this).next().val();
      getVal = parseInt(getVal);
      console.log(getVal);

      if (getVal > 1) {
        $(this)
          .next()
          .attr("value", getVal - 1);
      }
    });
  });

  // ---> Faqs Search Form
  var faqsField = $(".faqs-form input");
  var faqsResetBtn = $(".faqs-form .form__button--reset");

  faqsField.on("keyup", function () {
    const getVal = $(this).val().toUpperCase().trim();

    if (getVal) {
      var isItemFound = false;
      $(".faqs-section .qa-grid .qa-col").hide();
      faqsResetBtn.show();
      $(".faqs-search-status").removeClass("d-none");

      $(".faqs-section .qa-block .qa-block__header .qa-block__question").each(function () {
        if ($(this).text().toUpperCase().includes(getVal)) {
          $(this).closest(".qa-col").show();
          isItemFound = true;
        }
      });

      if (isItemFound) {
        $(".faqs-search-status").addClass("d-none");
      }
    } else {
      $(".faqs-section .qa-grid .qa-col").show();
      faqsResetBtn.hide();
    }
  });

  faqsResetBtn.on("click", function (e) {
    e.preventDefault();
    $(this).closest(".form").trigger("reset");
    $(".faqs-section .qa-grid .qa-col").show();
  });

  // ---> Maginific Popup
  $(".gallery-carousel a").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  // ---> Price Range Filter
  const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
  let priceGap = 1000;

  priceInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);

      if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
        if (e.target.className === "input-min") {
          rangeInput[0].value = minPrice;
          range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
        } else {
          rangeInput[1].value = maxPrice;
          range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
        }
      }
    });
  });

  rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

      if (maxVal - minVal < priceGap) {
        if (e.target.className === "range-min") {
          rangeInput[0].value = maxVal - priceGap;
        } else {
          rangeInput[1].value = minVal + priceGap;
        }
      } else {
        priceInput[0].value = minVal;
        priceInput[1].value = maxVal;
        range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
      }

      // console.log(minVal, maxVal);
    });
  });

  // ---> Filter Toggler Button
  var isFilterActive = false;
  $(".button--filter-toggler").on("click", function () {
    $("#filtersWrapper").toggleClass("d-none");

    if (!isFilterActive) {
      $(this).find("span").text("hide");
      isFilterActive = true;
    } else {
      $(this).find("span").text("show");
      isFilterActive = false;
    }
  });

  // ---> Product CTA Button
  $(".product-card__button--cta").each(function () {
    $(this).on("click", function (e) {
      e.preventDefault();
      $("#productEnquiryModal").modal("show");
    });
  });

  $(".product-single__cta-container .button").on("click", function (e) {
    e.preventDefault();
    $("#productEnquiryModal").modal("show");
  });

  // On page load or when changing themes, best to add inline in `head` to avoid FOUC
  if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
    // $(document.documentElement).removeClass("light").addClass("dark");
    $(document.documentElement).attr("data-bs-theme","dark");
    $(".switcher-input").prop("checked", true);
  } else {
    // $(document.documentElement).removeClass("dark").addClass("light");
    $(document.documentElement).attr("data-bs-theme","light");
    $(".switcher-input").prop("checked", false);
  }

  // Whenever the user explicitly chooses to respect the OS preference
  // localStorage.removeItem("theme");

  $(".switcher-input").each(function () {
    $(this).on("change", function (e) {
      e.preventDefault();

      if ($(this).checked === true || localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
        // $(document.documentElement).removeClass("dark").addClass("light");
        $(document.documentElement).attr("data-bs-theme","light");
        $(".switcher-input").prop("checked", false);
        // Whenever the user explicitly chooses light mode
        localStorage.theme = "light";
      } else {
        // $(document.documentElement).removeClass("light").addClass("dark");
        $(document.documentElement).attr("data-bs-theme","dark");
        $(".switcher-input").prop("checked", true);
        // Whenever the user explicitly chooses dark mode
        localStorage.theme = "dark";
      }
    });
  });
});
