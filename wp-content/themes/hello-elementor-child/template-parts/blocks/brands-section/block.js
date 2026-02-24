(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initBrandsSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      if (typeof window.initSwiperInRoot === 'function') {
        window.initSwiperInRoot(section);
      }
    } catch (error) {
      console.error('BrandsSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllBrandsSections() {
    document.querySelectorAll('.brands-section-section').forEach(function (section) {
      try {
        initBrandsSection(section);
      } catch (e) {
        console.error('BrandsSection section init error:', e);
      }
    });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllBrandsSections();
      } catch (e) {
        console.error('BrandsSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=brands-section', function ($block) {
      try {
        if ($block && $block[0]) initBrandsSection($block[0]);
      } catch (e) {
        console.error('BrandsSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllBrandsSections();
    } catch (e) {
      console.error('BrandsSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();
