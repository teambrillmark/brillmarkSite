(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initFlexibleModalSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var buttons = section.querySelectorAll('.flexible-modal-section-card-btn');
      buttons.forEach(function (button) {
        if (!button || button.dataset.jsBound) return;
        button.dataset.jsBound = "true";
        button.addEventListener('click', function (e) {
          try {
            var href = button.getAttribute('href');
            if (!href || href === '#') {
              e.preventDefault();
            }
          } catch (err) {
            console.error('FlexibleModalSection button click error:', err);
          }
        });
      });
    } catch (error) {
      console.error('FlexibleModalSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllFlexibleModalSections() {
    document.querySelectorAll('.flexible-modal-section-section')
      .forEach(function (section) {
        try {
          initFlexibleModalSection(section);
        } catch (e) {
          console.error('FlexibleModalSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllFlexibleModalSections();
      } catch (e) {
        console.error('FlexibleModalSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW (must not break editor)
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=flexible-modal-section', function ($block) {
      try {
        if ($block && $block[0]) initFlexibleModalSection($block[0]);
      } catch (e) {
        console.error('FlexibleModalSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER (optional)
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllFlexibleModalSections();
    } catch (e) {
      console.error('FlexibleModalSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();
