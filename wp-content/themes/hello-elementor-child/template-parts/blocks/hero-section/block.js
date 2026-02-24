(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initHeroSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      console.log(typeof window.initSwiperInRoot , 'typeof window.initSwiperInRoot ');
      
      if (typeof window.initSwiperInRoot === 'function') {
        window.initSwiperInRoot(section);
      }
    } catch (error) {
      console.error('HeroSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllHeroSections() {
    document.querySelectorAll('.hero-testimonial-slider')
      .forEach(function (section) {
        try {
          initHeroSection(section);
        } catch (e) {
          console.error('HeroSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllHeroSections();
      } catch (e) {
        console.error('HeroSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=hero-section', function ($block) {
      try {
        if ($block && $block[0]) initHeroSection($block[0]);
      } catch (e) {
        console.error('HeroSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllHeroSections();
    } catch (e) {
      console.error('HeroSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();
