(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
     ---- */
  function initCaseStudySection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var ctaButtons = section.querySelectorAll('.case-study-section-cta');
      ctaButtons.forEach(function (btn) {
        if (!btn || btn.dataset.jsBound) return;
        btn.dataset.jsBound = "true";
        btn.addEventListener('keydown', function (e) {
          try {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              btn.click();
            }
          } catch (err) {
            console.error('CaseStudySection cta keydown error:', err);
          }
        });
      });
    } catch (error) {
      console.error('CaseStudySection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
     ---- */
  function initAllCaseStudySections() {
    document.querySelectorAll('.case-study-section-section')
      .forEach(function (section) {
        try {
          initCaseStudySection(section);
        } catch (e) {
          console.error('CaseStudySection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
     ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllCaseStudySections();
      } catch (e) {
        console.error('CaseStudySection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
     ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=case-study-section', function ($block) {
      try {
        if ($block && $block[0]) initCaseStudySection($block[0]);
      } catch (e) {
        console.error('CaseStudySection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
     ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllCaseStudySections();
    } catch (e) {
      console.error('CaseStudySection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();
