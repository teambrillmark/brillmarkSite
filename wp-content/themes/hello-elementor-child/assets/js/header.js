/**
 * Navbar Section Block JavaScript
 *
 * Desktop: dropdown opens on hover over parent only.
 * Mobile: logo, Let's Talk CTA, hamburger; menu items inside hamburger;
 *        dropdown opens only on click of parent (toggle).
 */

(function () {
    'use strict';
  
    var MOBILE_BREAKPOINT = 1024;
  
    function isMobile() {
      return window.innerWidth <= MOBILE_BREAKPOINT;
    }
  
    function initNavbar(navbar) {
      var dropdownTrigger = navbar.querySelector('[data-dropdown-trigger]');
      var megaMenu = navbar.querySelector('.navbar-section-mega-menu');
      var mobileMenu = navbar.querySelector('.navbar-section-mobile-menu');
      var hamburgerBtn = navbar.querySelector('.navbar-section-hamburger-btn');
      var mobileDropdownTrigger = navbar.querySelector('[data-mobile-dropdown-trigger]');
      var chevrons = navbar.querySelectorAll('.navbar-section-chevron-icon');
  
      if (!megaMenu) return;
  
      var closeTimeout = null;
      var isMegaOpen = false;
  
      function openMegaMenu() {
        isMegaOpen = true;
        megaMenu.classList.add('is-open');
        navbar.querySelectorAll('[data-dropdown-trigger], [data-mobile-dropdown-trigger]').forEach(function (el) {
          el.setAttribute('aria-expanded', 'true');
        });
        chevrons.forEach(function (c) {
          c.style.transform = 'rotate(180deg)';
        });
      }
  
      function closeMegaMenu() {
        isMegaOpen = false;
        megaMenu.classList.remove('is-open');
        navbar.querySelectorAll('[data-dropdown-trigger], [data-mobile-dropdown-trigger]').forEach(function (el) {
          el.setAttribute('aria-expanded', 'false');
        });
        chevrons.forEach(function (c) {
          c.style.transform = 'rotate(0deg)';
        });
      }
  
      function openMobileDropdownContent(trigger) {
        var content = trigger && trigger.nextElementSibling;
        if (content && content.classList.contains('navbar-section-mobile-dropdown-content')) {
          content.classList.add('is-open');
          content.setAttribute('aria-hidden', 'false');
          trigger.setAttribute('aria-expanded', 'true');
          var chev = trigger.querySelector('.navbar-section-chevron-icon');
          if (chev) chev.style.transform = 'rotate(180deg)';
        }
      }
  
      function closeMobileDropdownContent(trigger) {
        var content = trigger && trigger.nextElementSibling;
        if (content && content.classList.contains('navbar-section-mobile-dropdown-content')) {
          content.classList.remove('is-open');
          content.setAttribute('aria-hidden', 'true');
          trigger.setAttribute('aria-expanded', 'false');
          var chev = trigger.querySelector('.navbar-section-chevron-icon');
          if (chev) chev.style.transform = 'rotate(0deg)';
        }
      }
  
      function closeAllMobileDropdowns() {
        navbar.querySelectorAll('[data-mobile-dropdown-trigger]').forEach(function (tr) {
          closeMobileDropdownContent(tr);
        });
      }
  
      function closeMobileMenu() {
        if (mobileMenu) {
          mobileMenu.classList.remove('is-open');
          mobileMenu.setAttribute('aria-hidden', 'true');
        }
        if (hamburgerBtn) {
          hamburgerBtn.setAttribute('aria-expanded', 'false');
        }
        closeAllMobileDropdowns();
        if (!isMobile()) return;
        closeMegaMenu();
      }
  
      function openMobileMenu() {
        if (mobileMenu) {
          mobileMenu.classList.add('is-open');
          mobileMenu.setAttribute('aria-hidden', 'false');
        }
        if (hamburgerBtn) {
          hamburgerBtn.setAttribute('aria-expanded', 'true');
        }
      }
  
      // ---------- Desktop: hover only ----------
      function setupDesktopHover() {
        if (!dropdownTrigger) return;
        dropdownTrigger.removeEventListener('click', onDesktopClick);
        dropdownTrigger.addEventListener('mouseenter', onDesktopEnter);
        dropdownTrigger.addEventListener('mouseleave', onDesktopLeave);
        megaMenu.removeEventListener('mouseenter', onMegaEnter);
        megaMenu.removeEventListener('mouseleave', onMegaLeave);
        megaMenu.addEventListener('mouseenter', onMegaEnter);
        megaMenu.addEventListener('mouseleave', onMegaLeave);
      }
  
      function onDesktopEnter() {
        if (closeTimeout) {
          clearTimeout(closeTimeout);
          closeTimeout = null;
        }
        openMegaMenu();
      }
  
      function onDesktopLeave() {
        closeTimeout = setTimeout(function () {
          closeMegaMenu();
          closeTimeout = null;
        }, 200);
      }
  
      function onMegaEnter() {
        if (closeTimeout) {
          clearTimeout(closeTimeout);
          closeTimeout = null;
        }
      }
  
      function onMegaLeave() {
        closeTimeout = setTimeout(function () {
          closeMegaMenu();
          closeTimeout = null;
        }, 200);
      }
  
      function onDesktopClick(e) {
        e.preventDefault();
        e.stopPropagation();
      }
  
      // ---------- Mobile: hamburger + click toggle dropdown ----------
      function setupMobileClick() {
        if (dropdownTrigger) {
          dropdownTrigger.removeEventListener('mouseenter', onDesktopEnter);
          dropdownTrigger.removeEventListener('mouseleave', onDesktopLeave);
          dropdownTrigger.addEventListener('click', onDesktopClick);
        }
        megaMenu.removeEventListener('mouseenter', onMegaEnter);
        megaMenu.removeEventListener('mouseleave', onMegaLeave);
      }
  
      function onHamburgerClick() {
        if (!mobileMenu || !hamburgerBtn) return;
        var open = mobileMenu.classList.toggle('is-open');
        mobileMenu.setAttribute('aria-hidden', !open);
        hamburgerBtn.setAttribute('aria-expanded', open);
        if (!open) closeAllMobileDropdowns();
      }
  
      function onMobileDropdownClick(e) {
        e.preventDefault();
        e.stopPropagation();
        var trigger = e.currentTarget;
        var content = trigger.nextElementSibling;
        var isOpen = content && content.classList.contains('navbar-section-mobile-dropdown-content') && content.classList.contains('is-open');
        if (isOpen) {
          closeMobileDropdownContent(trigger);
        } else {
          closeAllMobileDropdowns();
          openMobileDropdownContent(trigger);
        }
      }
  
      // ---------- Bind by viewport ----------
      function bind() {
        if (isMobile()) {
          setupMobileClick();
          closeMegaMenu();
          if (mobileDropdownTrigger) {
            mobileDropdownTrigger.removeEventListener('click', onMobileDropdownClick);
            mobileDropdownTrigger.addEventListener('click', onMobileDropdownClick);
          }
          if (hamburgerBtn) {
            hamburgerBtn.removeEventListener('click', onHamburgerClick);
            hamburgerBtn.addEventListener('click', onHamburgerClick);
          }
        } else {
          setupDesktopHover();
          if (mobileMenu) mobileMenu.classList.remove('is-open');
          if (hamburgerBtn) hamburgerBtn.setAttribute('aria-expanded', 'false');
          if (mobileDropdownTrigger) {
            mobileDropdownTrigger.removeEventListener('click', onMobileDropdownClick);
          }
          if (hamburgerBtn) {
            hamburgerBtn.removeEventListener('click', onHamburgerClick);
          }
        }
      }
  
      // Click outside: close mobile menu and/or mega menu
      document.addEventListener('click', function (e) {
        if (!navbar.contains(e.target)) {
          if (isMobile()) {
            closeMobileMenu();
          } else {
            closeMegaMenu();
          }
        }
      });
  
      // Escape key
      document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        if (isMobile()) {
          closeMobileMenu();
        } else {
          closeMegaMenu();
        }
      });
  
      bind();
      window.addEventListener('resize', function () {
        bind();
        if (!isMobile()) closeMegaMenu();
      });
        
        
        
      // Debounce function
  function debounce(fn, delay) {
    let timeout;
    return function () {
      const context = this;
      const args = arguments;
      clearTimeout(timeout);
      timeout = setTimeout(() => fn.apply(context, args), delay);
    };
  }
  
  const nav = document.querySelector('.navbar-section-section');
  
  function handleScroll() {
    if (!nav) return;
  
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
  console.log('scrolling')
    if (scrollTop > 20) {   // user scrolled a bit
      nav.classList.add('scrolling');
    } else {                // back at the very top
      nav.classList.remove('scrolling');
    }
  }
  
  // Run once on load (in case page reloads mid-scroll)
  handleScroll();
  
  // Debounced scroll listener
  window.addEventListener('scroll', debounce(handleScroll, 100));
        
    }
  
      
      
    function run() {
      var sections = document.querySelectorAll('.navbar-section-section');
      sections.forEach(function (s) {
        initNavbar(s);
      });
    }
  
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', run);
    } else {
      run();
    }
  
    if (typeof acf !== 'undefined') {
      acf.addAction('render_block_preview/type=acf/navbar-section', function () {
        setTimeout(run, 100);
      });
    }
  })();
  