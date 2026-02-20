(function () {
  document.addEventListener("DOMContentLoaded", function () {
    counterSpeed();
    AOS.init();
//     animateDiv(0);
    croProcess();
//     animateCircleVisibility(0);
    testTalkSwiper();
    testimonialSwiper();
    // clientSwiper();
    dropDown();
  });

  // import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";

  //Test talk swiper
  function testTalkSwiper() {
    const swiper = new Swiper(".brill-swiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      // isFinite: true,
      loop: true,

      centerSlide: "true",
      fade: "true",
      // grabCursor: "true",
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        // dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        596:{
          slidesPerView: 2,
          spaceBetween: 20,
        },
        950: {
          slidesPerView: 3,
        },
      },
    });
  }

  // Testimonial swiper
  function testimonialSwiper() {
    var mySwiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      direction: "horizontal",
      autoHeight: true,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      allowTouchMove: true,
      centeredSlides: true,
    });
  }

  //(Accordion)
  const accordionItems = document.querySelectorAll(".accordion button");

  function toggleAccordion() {
    const itemToggle = this.getAttribute("aria-expanded");
    for (var i = 0; i < accordionItems.length; i++) {
      accordionItems[i].setAttribute("aria-expanded", "false");
    }
    if (itemToggle == "false") {
      this.setAttribute("aria-expanded", "true");
    }
  }
  accordionItems.forEach((item) =>
    item.addEventListener("click", toggleAccordion)
  );

  //Client swiper
  function clientSwiper() {
    var clientSwiper = new Swiper(".clientSwiper", {
      slidesPerView: 8,
      spaceBetween: 0,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      allowTouchMove: true,
      autoplay: {
        delay: 500,
        disableOnInteraction: false,
      },
      freeMode: true,
      speed: 5000,
      stopOnLastSlide: false,
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        520: {
          slidesPerView: 3,
        },
        950: {
          slidesPerView: 5,
        },
        1440: {
          slidesPerView: 7,
        },
      },
    });
  }
  // **************************

  // Hero animation js
//   var heroRoundedDivs = document.querySelectorAll(".ripple-circle");
//   var laptopContents = document.querySelectorAll(".svg-laptop-content");
//   var heroCircles = document.querySelectorAll(".hero-div-rounded");

//   var animationTimeout;

//   function animateCircleVisibility(index) {
//     var circle = heroCircles[index];
//     if (index < heroCircles.length - 1) {
//       setTimeout(() => {
//         circle.style.opacity = 1;
//         animateCircleVisibility(index + 1);
//       }, 400);
//     } else {
//       setTimeout(() => {
//         circle.style.opacity = 1;
//       }, 400);
//     }
//   }

//   function animateDiv(index) {
//     var roundedDiv = heroRoundedDivs[index];
//     roundedDiv.classList.add("ripple");
//     laptopContents[index].classList.add("svg-laptop-content-show");
//     if (index < heroRoundedDivs.length - 1) {
//       animationTimeout = setTimeout(() => {
//         roundedDiv.classList.remove("ripple");
//         animateDiv(index + 1);
//       }, 750);
//     } else {
//       animationTimeout = setTimeout(() => {
//         roundedDiv.classList.remove("ripple");
//         laptopContents.forEach((content, contentIndex) => {
//           content.classList.remove("svg-laptop-content-show");
//         });
//         animateDiv(0);
//       }, 750);
//     }
//   }

//   function stopAnimation() {
//     clearTimeout(animationTimeout);
//     heroRoundedDivs.forEach((element, index) => {
//       // div.style.animation = "";
//       element.classList.remove("ripple");
//       laptopContents[index].classList.remove("svg-laptop-content-show");
//     });
//   }

//   heroRoundedDivs.forEach((heroDiv, index) => {
//     heroDiv.addEventListener("click", () => {
//       stopAnimation();
//       animateDiv(index);
//     });
//   });

  //Hero animation end

  // CRO BOX Dynamic Content

  // function croProcess() {
  //   const boxes = document.querySelectorAll(".cro-stepper-box");
  //   // const heading = document.getElementById("box-headings");
  //   const croVertical = document.querySelectorAll(".step-counter");
  //   const activeImage = document.querySelectorAll(".active-image");
  //   const ulSections = document.querySelectorAll(".pro-tab-content");

  //   function selectBox(box, index) {
  //     // console.log(box);
  //     // console.log(index);

  //     boxes.forEach((b, i) => {
  //       b.classList.remove("active-Box");
  //       const croVert = croVertical[i];
  //       croVert.classList.remove("completed");
  //       const activeImage = b.querySelector(".active-image");
  //       const inactiveImage = b.querySelector(".inactive-image");
  //       activeImage.style.display = "none";
  //       inactiveImage.style.display = "block";
  //     });

  //     ulSections.forEach((ul, i) => {
  //       ul.classList.remove("active");
  //       if (i === index) {
  //         ul.classList.add("active");
  //       }
  //     });

  //     const activeImage = box.querySelector(".active-image");
  //     const inactiveImage = box.querySelector(".inactive-image");
  //     activeImage.style.display = "block";
  //     inactiveImage.style.display = "none";

  //     box.classList.add("active-Box");
  //     const stepperFill = croVertical[index];
  //     stepperFill.classList.add("completed");
  //   }

  //   function isInViewport(element) {
  //     const rect = element.getBoundingClientRect();
  //     console.log(rect);
  //     return (
  //       rect.top >= 0 &&
  //       rect.left >= 0 &&
  //       rect.bottom <=
  //         (window.innerHeight || document.documentElement.clientHeight) &&
  //       rect.right <=
  //         (window.innerWidth || document.documentElement.clientWidth)
  //     );
  //   }

  //   function handleKeyboardNavigation(event) {
  //     console.log("Checking Event", event);
  //     const activeIndex = Array.from(boxes).findIndex((box) =>
  //       box.classList.contains("active-Box")
  //     );
  //     if (event.key === "ArrowLeft" && activeIndex > 0) {
  //       if (isInViewport(boxes[activeIndex - 1])) {
  //         selectBox(boxes[activeIndex - 1], activeIndex - 1);
  //       }
  //     } else if (event.key === "ArrowRight" && activeIndex < boxes.length - 1) {
  //       if (isInViewport(boxes[activeIndex + 1])) {
  //         selectBox(boxes[activeIndex + 1], activeIndex + 1);
  //       }
  //     }
  //   }

  //   boxes.forEach((box, index) => {
  //     box.addEventListener("click", function () {
  //       selectBox(this, index);
  //     });

  //     // Click event for the step-counter to select the box
  //     croVertical[index].addEventListener("click", function () {
  //       selectBox(box, index);
  //     });
  //   });

  //   document.addEventListener("keydown", handleKeyboardNavigation);

  //   // By default, set the heading and highlight the first box
  //   selectBox(boxes[0], 0);
  // }

  function croProcess() {
    const boxes = document.querySelectorAll(".cro-stepper-box");
    const croVertical = document.querySelectorAll(".step-counter");
    const activeImage = document.querySelectorAll(".active-image");
    const ulSections = document.querySelectorAll(".pro-tab-content");
    const displayHeroImage = document.querySelector(".display-cro-hero-image");

    // Define an array of hero images corresponding to each tab
    const heroImages = [
      "/assets/CRO/Biotechnology-Researching-1.svg", // Tab 1 image
      "/assets/CRO/design.svg",        // Tab 2 image
      "/assets/CRO/build.svg",                // Tab 3 image
      "/assets/CRO/qa.svg",                // Tab 4 image
      "/assets/CRO/deploy.svg",             // Tab 5 image
    ];

    function selectBox(box, index) {
      // Reset all boxes and images
      boxes.forEach((b, i) => {
        b.classList.remove("active-Box");
        const croVert = croVertical[i];
        croVert.classList.remove("completed");
        const activeImage = b.querySelector(".active-image");
        const inactiveImage = b.querySelector(".inactive-image");
        activeImage.style.display = "none";
        inactiveImage.style.display = "block";
      });

      // Update content section
      ulSections.forEach((ul, i) => {
        ul.classList.remove("active");
        if (i === index) {
          ul.classList.add("active");
        }
      });

      // Set the active box and image
      const activeImage = box.querySelector(".active-image");
      const inactiveImage = box.querySelector(".inactive-image");
      activeImage.style.display = "block";
      inactiveImage.style.display = "none";
      box.classList.add("active-Box");

      // Highlight the corresponding stepper
      const stepperFill = croVertical[index];
      stepperFill.classList.add("completed");

      // Update the display-cro-hero-image based on the active tab
      displayHeroImage.src = heroImages[index];
    }

    function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    function handleKeyboardNavigation(event) {
      const activeIndex = Array.from(boxes).findIndex((box) =>
        box.classList.contains("active-Box")
      );
      if (event.key === "ArrowLeft" && activeIndex > 0) {
        if (isInViewport(boxes[activeIndex - 1])) {
          selectBox(boxes[activeIndex - 1], activeIndex - 1);
        }
      } else if (event.key === "ArrowRight" && activeIndex < boxes.length - 1) {
        if (isInViewport(boxes[activeIndex + 1])) {
          selectBox(boxes[activeIndex + 1], activeIndex + 1);
        }
      }
    }

    // Attach event listeners to boxes and step counters
    boxes.forEach((box, index) => {
      box.addEventListener("click", function () {
        selectBox(this, index);
      });

      // Click event for the step-counter to select the box
      croVertical[index].addEventListener("click", function () {
        selectBox(box, index);
      });
    });

    document.addEventListener("keydown", handleKeyboardNavigation);

    // By default, set the first box as active and update the hero image
    selectBox(boxes[0], 0);
  }




  // CRO Accordion
  document.addEventListener("DOMContentLoaded", function () {
    const accordionButtons = document.querySelectorAll(
      ".mobile-tab-accordion-button"
    );
    const accordionContents = document.querySelectorAll(
      ".mobile-tab-accordion-content"
    );
    // Expand the first accordion
    accordionContents[0].style.maxHeight =
      accordionContents[0].scrollHeight + "px";
    accordionButtons[0].classList.add("active");

    accordionButtons.forEach((button, index) => {
      button.addEventListener("click", function () {
        const content = button.nextElementSibling;

        // Collapse all contents except the clicked one
        accordionContents.forEach((accContent, accIndex) => {
          if (accIndex !== index) {
            accContent.style.maxHeight = null;
            accordionButtons[accIndex].classList.remove("active");
          }
        });

        // Toggle the clicked content
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
          button.classList.remove("active");
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
          button.classList.add("active");
        }
      });
    });
  });

  const hamburgerBtn = document.querySelector(".hamburger-btn");
  const hamburgerElement = document.getElementById("hamburger-element");
  let isAnimating = false; // To track if animation is in progress

  hamburgerBtn.addEventListener("click", function () {
    console.log("Hamburger clicked");
    if (isAnimating) return; // If animation is in progress, do nothing

    isAnimating = true; // Set animation flag to true

    if (this.classList.contains("openIcon")) {
      setTimeout(() => {
        this.classList.toggle("openIcon");
      }, 50);
    } else {
      this.classList.toggle("openIcon");
    }

    if (!hamburgerElement.classList.contains("open")) {
      hamburgerElement.classList.add("open");

      let myInterval = setInterval(function () {
        let menuList = document.querySelector(
          ".hamburger-menu-list ul.hamburger-list"
        );
        if (menuList.getAttribute("style")) {
          let element = menuList;
          let cssObj = window.getComputedStyle(element, null);
          let height = cssObj.getPropertyValue("max-height");
          height = parseInt(height.replace("px", ""));

          menuList.style.maxHeight = height + 50 + "px";
        } else {
          menuList.style.maxHeight = 50 + "px";
        }
      }, 20);

      setTimeout(function () {
        hamburgerElement.classList.add("opened");
        document
          .querySelector(".hamburger-menu-list ul.hamburger-list")
          .removeAttribute("style");
        clearInterval(myInterval);
        isAnimating = false; // Reset animation flag after opening is done
      }, 50);
    } else {
      let menuList = document.querySelector(
        ".hamburger-menu-list ul.hamburger-list"
      );
      let height = menuList.clientHeight;
      menuList.style.maxHeight = height + "px";

      let myInterval = setInterval(function () {
        if (menuList.getAttribute("style")) {
          let element = menuList;
          let cssObj = window.getComputedStyle(element, null);
          let height = cssObj.getPropertyValue("max-height");
          height = parseInt(height.replace("px", ""));

          menuList.style.maxHeight = height - 50 + "px";
          menuList.style.overflow = "hidden";
        }
      }, 20);

      setTimeout(function () {
        hamburgerElement.classList.remove("opened");
        hamburgerElement.classList.remove("open");
        hamburgerBtn.classList.remove("openIcon"); // Ensure the hamburger icon is reset
        document
          .querySelector(".hamburger-menu-list ul.hamburger-list")
          .removeAttribute("style");
        clearInterval(myInterval);
        isAnimating = false; // Reset animation flag after closing is done
      }, 50);
    }
  });

  // Smooth Scroller
  document.addEventListener(
    "DOMContentLoaded",
    () => {
      const scroller = new SweetScroll({
        /* some options */
        trigger: "a[href^='#']",
        header: "[data-scroll-header]",
        easing: "easeOutQuint",
        offset: 0, // Specifies the value to offset the scroll position in pixels
        duration: 1000,
      });
    },
    false
  );

  // Fixed Nav Animation

  var navbar = document.getElementById("navigation-bar");
  var sticky = navbar.offsetTop;


  console.log(window.pageYOffset);

  function stickyNavbar() {
    if (window.pageYOffset > sticky) {
      navbar.classList.add("nav-auto-bg");
    } else {
      navbar.classList.remove("nav-auto-bg");
    }
  }
  window.onload = function() {
  stickyNavbar(); 
};

  window.onscroll = function () {
    stickyNavbar();
  };

  // Mega dropdown Menu
  function dropDown() {
    const dropDownLink = document.getElementById("dropDown-link");
    const dropDownMenu = document.getElementById("dropContent");
    const caretDown = dropDownLink.querySelector(".fa-chevron-down");
    const caretUp = dropDownLink.querySelector(".fa-chevron-up");

    dropDownMenu.classList.add("dropdown-hidden");
    caretUp.classList.add("caret-down-hidden");

    function showDropDownMenu() {
      dropDownMenu.classList.remove("dropdown-hidden");
      dropDownMenu.classList.add("dropdown-visible");
      caretDown.classList.add("caret-down-hidden");
      caretUp.classList.add("caret-up-visible");
    }

    function hideDropDownMenu() {
      dropDownMenu.classList.remove("dropdown-visible");
      dropDownMenu.classList.add("dropdown-hidden");
      caretDown.classList.remove("caret-down-hidden");
      caretUp.classList.remove("caret-up-visible");
    }

    dropDownLink.addEventListener("mouseover", showDropDownMenu);

    dropDownLink.addEventListener("mouseleave", function (event) {
      if (
        !dropDownLink.contains(event.relatedTarget) &&
        !dropDownMenu.contains(event.relatedTarget)
      ) {
        hideDropDownMenu();
      }
    });

    dropDownMenu.addEventListener("mouseover", showDropDownMenu);

    dropDownMenu.addEventListener("mouseleave", function (event) {
      if (
        !dropDownLink.contains(event.relatedTarget) &&
        !dropDownMenu.contains(event.relatedTarget)
      ) {
        hideDropDownMenu();
      }
    });

    const dropItems = document.querySelectorAll(".drop-item");
    const detailContents = document.querySelectorAll(".drop-detail-content");

    // Showing the first content by default
    const defaultContent = document.getElementById("development-content");
    defaultContent.classList.add("active");

    // Setting the default active menu item background
    const defaultItem = document.querySelector(
      '.drop-item[data-target="development-content"]'
    );

    defaultItem.classList.add("active");

    dropItems.forEach((item) => {
      item.addEventListener("mouseenter", function () {
        const targetId = this.getAttribute("data-target");
        detailContents.forEach((content) => {
          content.classList.remove("active");
        });
        document.querySelectorAll(".drop-item").forEach((item) => {
          item.classList.remove("active");
        });
        document.getElementById(targetId).classList.add("active");
        this.classList.add("active");
      });
    });
  }

  // Mobile drop
  document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".mobile-drop-menu-item a");
    const accordion = document.querySelector(".mobile-drop-accordion");
    const accordionHeaders = document.querySelectorAll(
      ".mobile-drop-accordion-header"
    );

    menuItems.forEach((item) => {
      item.addEventListener("click", function (event) {
        if (this.dataset.toggle === "accordion") {
          event.preventDefault();
          if (accordion.classList.contains("mobile-drop-show-accordion")) {
            accordion.classList.remove("mobile-drop-show-accordion");
          } else {
            accordion.classList.add("mobile-drop-show-accordion");
          }
        } else if (this.classList.contains("mobile-drop-link")) {
          event.preventDefault();
          if (accordion.classList.contains("mobile-drop-show-accordion")) {
            accordion.classList.remove("mobile-drop-show-accordion");
            setTimeout(() => {
              window.location.href = this.href;
            }, 300); // Wait for the transition to finish
          } else {
            window.location.href = this.href;
          }
        }
      });
    });

    accordionHeaders.forEach((header) => {
      header.addEventListener("click", function () {
        const content = this.nextElementSibling;
        const icon = this.querySelector(".mobile-drop-icon");

        document
          .querySelectorAll(".mobile-drop-accordion-content")
          .forEach((item) => {
            if (item !== content) {
              item.classList.remove("mobile-drop-show-content");
              const otherIcon =
                item.previousElementSibling.querySelector(".mobile-drop-icon");
              if (otherIcon) {
                otherIcon.textContent = "+";
              }
            }
          });

        content.classList.toggle("mobile-drop-show-content");
        icon.textContent = content.classList.contains(
          "mobile-drop-show-content"
        )
          ? "-"
          : "+";
      });
    });
  });

  // Counter Speed CRO *****************************************
  function counterSpeed() {
    function isInViewport(element) {
      var rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
          (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    function speedyCounter() {
      var counters = document.querySelectorAll(".speed-counter");

      counters.forEach(function (counter) {
        if (isInViewport(counter)) {
          if (!counter.started || counter.reset) {
            counter.started = true;
            counter.reset = false;

            var updateCount = function () {
              var target = +counter.getAttribute("data-target");
              var count = +counter.innerText;
              var speed = +counter.getAttribute("data-speed");
              var delay = +counter.getAttribute("data-delay");

              var increment = target / speed;

              if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, delay);
              } else {
                counter.innerText = target;
              }
            };

            counter.innerText = "0";
            updateCount();
          }
        } else {
          if (counter.started) {
            counter.reset = true;
            counter.started = false;
          }
        }
      });
    }

    function checkCounters() {
      speedyCounter();
    }

    window.addEventListener("scroll", checkCounters);
    window.addEventListener("load", checkCounters);
    window.addEventListener("resize", checkCounters);
  }
})();

// Dynamic Button Schedule
const scheduleBtn = document.getElementById("scheduleBtn");

function updateHref() {
  const now = new Date();
  const month = now.getMonth() + 1;
  const year = now.getFullYear();
  const currentMonth = `${year}-${month.toString().padStart(2, "0")}`;

  scheduleBtn.href = `https://calendly.com/brillmark/intro?month=${currentMonth}`;
}
if(scheduleBtn){
   scheduleBtn.addEventListener("mouseover", updateHref);
   scheduleBtn.addEventListener("click", updateHref);
}




// Scroller


// SCROLLER MOBILE TAB

document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".dev-shop-tab-mobile-tab-header");
  if (tabs.length > 0) {
    tabs[0].parentElement.classList.add("content-active");
  }
  tabs.forEach((tabHeader) => {
    tabHeader.addEventListener("click", function () {
      const parentTab = tabHeader.parentElement;

      // If the clicked tab is already active, remove the active class to close it
      if (parentTab.classList.contains("content-active")) {
        parentTab.classList.remove("content-active");
      } else {
        // Close all other tabs
        document.querySelectorAll(".dev-shop-tab-mobile-tab").forEach((tab) => {
          tab.classList.remove("content-active");
        });

        // Open the clicked tab
        parentTab.classList.add("content-active");
      }
    });
  });
});


// document.addEventListener("DOMContentLoaded", function () {
//   const listItems = document.querySelectorAll(
//     ".orbital-unordered-list .orbital-list-item"
//   );

//   for (let i = 0; i < 4; i++) {
//     if (listItems[i]) {
//       listItems[i].classList.add("visible");
//     }
//   }

//   document
//     .querySelector(".orbital-read-more")
//     .addEventListener("click", function () {
//       for (let i = 4; i < listItems.length; i++) {
//         listItems[i].classList.toggle("visible");
//       }
//       this.style.display = "none";
//     });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const listItems = document.querySelectorAll(
//     ".orbital-unordered-list-shopify .orbital-list-item-shopify"
//   );

//   for (let i = 0; i < 4; i++) {
//     if (listItems[i]) {
//       listItems[i].classList.add("visible");
//     }
//   }

//   document
//     .querySelector(".orbital-read-more-shopify")
//     .addEventListener("click", function () {
//       for (let i = 4; i < listItems.length; i++) {
//         listItems[i].classList.toggle("visible");
//       }
//       this.style.display = "none";
//     });
// });
// document.addEventListener("DOMContentLoaded", function () {
//   const listItems = document.querySelectorAll(
//     ".orbital-unordered-list-wordpress .orbital-list-item-wordpress"
//   );

//   for (let i = 0; i < 4; i++) {
//     if (listItems[i]) {
//       listItems[i].classList.add("visible");
//     }
//   }

//   document
//     .querySelector(".orbital-read-more-wordpress")
//     .addEventListener("click", function () {
//       for (let i = 4; i < listItems.length; i++) {
//         listItems[i].classList.toggle("visible");
//       }
//       this.style.display = "none";
//     });
// });