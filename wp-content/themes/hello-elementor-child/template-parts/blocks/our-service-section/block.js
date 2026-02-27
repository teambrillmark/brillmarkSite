(function () {

  var MOBILE_BREAKPOINT = 768;

  function isMobile() {
    return typeof window !== 'undefined' && window.innerWidth <= MOBILE_BREAKPOINT;
  }

  function applyMobileStacked(section) {
    if (!section) return;
    try {
      section.classList.add('our-service-section--stacked');
      var swiperEl = section.querySelector('[data-swiper]');
      if (swiperEl && swiperEl.swiper) {
        swiperEl.swiper.destroy(true, true);
        delete swiperEl.dataset.swiperInitialized;
      }
      initAccordion(section);
    } catch (e) {
      console.error('OurServiceSection applyMobileStacked error:', e);
    }
  }

  /**
   * Mobile accordion: one panel open at a time, toggleable (click open again to close).
   */
  function initAccordion(section) {
    if (!section) return;
    try {
      var slides = section.querySelectorAll('.our-service-section-swiper .swiper-slide');
      var triggers = section.querySelectorAll('.our-service-section-panel-mobile-trigger');
      if (!slides.length || !triggers.length) return;

      triggers.forEach(function (trigger) {
        if (trigger.dataset.accordionBound === 'true') return;
        trigger.dataset.accordionBound = 'true';

        trigger.addEventListener('click', function () {
          try {
            var idx = parseInt(trigger.dataset.panelIndex, 10);
            if (isNaN(idx)) return;

            var slide = section.querySelector('.our-service-section-swiper .swiper-slide[data-slide-index="' + idx + '"]');
            if (!slide) return;

            var isOpen = slide.classList.contains('swiper-slide--open');

            if (isOpen) {
              slide.classList.remove('swiper-slide--open');
              trigger.setAttribute('aria-expanded', 'false');
            } else {
              slides.forEach(function (s) { s.classList.remove('swiper-slide--open'); });
              section.querySelectorAll('.our-service-section-panel-mobile-trigger').forEach(function (t) {
                t.setAttribute('aria-expanded', 'false');
              });
              slide.classList.add('swiper-slide--open');
              trigger.setAttribute('aria-expanded', 'true');
            }
          } catch (err) {
            console.error('OurServiceSection accordion click error:', err);
          }
        });
      });

      /* Ensure at least first slide is open on init if none are */
      var hasOpen = section.querySelector('.our-service-section-swiper .swiper-slide--open');
      if (!hasOpen && slides[0]) {
        slides[0].classList.add('swiper-slide--open');
        var firstTrigger = section.querySelector('.our-service-section-panel-mobile-trigger[data-panel-index="0"]');
        if (firstTrigger) firstTrigger.setAttribute('aria-expanded', 'true');
      }
    } catch (e) {
      console.error('OurServiceSection initAccordion error:', e);
    }
  }

  function applyDesktopSlider(section) {
    if (!section) return;
    try {
      section.classList.remove('our-service-section--stacked');
      /* Allow Swiper to be re-created: clear flag so initSwiperInRoot will run again after we destroyed it on mobile */
      var swiperEl = section.querySelector('[data-swiper]');
      if (swiperEl) {
        delete swiperEl.dataset.swiperInitialized;
      }
      delete section.dataset.jsInitialized;
      initOurServiceSection(section);
    } catch (e) {
      console.error('OurServiceSection applyDesktopSlider error:', e);
    }
  }

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initOurServiceSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var tabs = section.querySelectorAll('.our-service-section-tab');
      var panels = section.querySelectorAll('.our-service-section-panel');
      var ctaWrap = section.querySelector('.our-service-section-cta-wrap');
      var ctaEl = ctaWrap ? ctaWrap.querySelector('.our-service-section-cta') : null;
      var ctaText = ctaWrap ? ctaWrap.querySelector('.our-service-section-cta-text') : null;

      if (!tabs.length || !panels.length) return;

      /* On mobile: stacked layout — no Swiper, all panels visible */
      if (isMobile()) {
        section.classList.add('our-service-section--stacked');
        /* Defer destroy so we run after bundle may have inited Swiper */
        setTimeout(function () {
          applyMobileStacked(section);
        }, 0);
        return;
      }

      /* Ensure Swiper is initialized in this section (idempotent) */
      if (typeof window.initSwiperInRoot === 'function') {
        window.initSwiperInRoot(section);
      }

      var swiperEl = section.querySelector('[data-swiper]');
      var swiper = swiperEl && swiperEl.swiper;
      if (!swiper) return;

      /**
       * Sync tabs and CTA from current slide index.
       * @param {number} index - Active slide index (0-based).
       */
      function syncUiFromSlide(index) {
        try {
          if (index < 0 || index >= panels.length) return;

          tabs.forEach(function (tab) {
            tab.classList.remove('active');
            tab.setAttribute('aria-selected', 'false');
          });

          var targetTab = section.querySelector('[data-tab-index="' + index + '"]');
          if (targetTab) {
            targetTab.classList.add('active');
            targetTab.setAttribute('aria-selected', 'true');
          }

          var targetPanel = section.querySelector('[data-panel-index="' + index + '"]');
          if (targetPanel && ctaEl) {
            var panelCtaText = targetPanel.dataset.ctaText;
            var panelCtaLink = targetPanel.dataset.ctaLink;
            if (ctaText && panelCtaText) ctaText.textContent = panelCtaText;
            if (panelCtaLink) ctaEl.setAttribute('href', panelCtaLink);
          }
        } catch (err) {
          console.error('OurServiceSection sync UI error:', err);
        }
      }

      /* Swiper slide change: sync tabs and CTA */
      swiper.on('slideChangeTransitionEnd', function () {
        try {
          var idx = swiper.activeIndex;
          syncUiFromSlide(idx);
        } catch (err) {
          console.error('OurServiceSection slideChange error:', err);
        }
      });

      /* Initial sync (in case first slide is not 0) */
      syncUiFromSlide(swiper.activeIndex);

      /* Tab click: go to that slide */
      tabs.forEach(function (tab) {
        if (!tab || tab.dataset.jsBound) return;
        tab.dataset.jsBound = "true";

        tab.addEventListener('click', function () {
          try {
            var idx = parseInt(this.dataset.tabIndex, 10);
            if (!isNaN(idx)) swiper.slideTo(idx, 300);
          } catch (err) {
            console.error('OurServiceSection tab click error:', err);
          }
        });
      });

      /* Keyboard navigation for tabs: move slide and focus active tab */
      tabs.forEach(function (tab) {
        if (tab.dataset.jsKbdBound) return;
        tab.dataset.jsKbdBound = "true";

        tab.addEventListener('keydown', function (e) {
          try {
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
              e.preventDefault();
              swiper.slideNext();
              var nextIdx = swiper.activeIndex;
              var nextTab = section.querySelector('[data-tab-index="' + nextIdx + '"]');
              if (nextTab) nextTab.focus();
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
              e.preventDefault();
              swiper.slidePrev();
              var prevIdx = swiper.activeIndex;
              var prevTab = section.querySelector('[data-tab-index="' + prevIdx + '"]');
              if (prevTab) prevTab.focus();
            }
          } catch (err) {
            console.error('OurServiceSection keyboard nav error:', err);
          }
        });
      });

    } catch (error) {
      console.error('OurServiceSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllOurServiceSections() {
    document.querySelectorAll('.our-service-section')
      .forEach(function (section) {
        try {
          initOurServiceSection(section);
        } catch (e) {
          console.error('OurServiceSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllOurServiceSections();
      } catch (e) {
        console.error('OurServiceSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=our-service-section', function ($block) {
      try {
        if ($block && $block[0]) initOurServiceSection($block[0]);
      } catch (e) {
        console.error('OurServiceSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllOurServiceSections();
    } catch (e) {
      console.error('OurServiceSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

  /* ---
     RESIZE: toggle stacked (mobile) vs slider (desktop)
  ---- */
  var resizeTimeout;
  function onResize() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function () {
      try {
        var sections = document.querySelectorAll('.our-service-section');
        sections.forEach(function (section) {
          if (isMobile()) {
            applyMobileStacked(section);
          } else {
            applyDesktopSlider(section);
          }
        });
      } catch (e) {
        console.error('OurServiceSection resize error:', e);
      }
    }, 150);
  }
  if (typeof window !== 'undefined') {
    window.addEventListener('resize', onResize);
  }

})();
