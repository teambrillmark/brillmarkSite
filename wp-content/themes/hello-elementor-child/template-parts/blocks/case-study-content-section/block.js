(function () {

  /* ---
     INIT ONE BLOCK (ONCE ONLY)
  ---- */
  function initCaseStudyContentSection(section) {
    if (!section || section.dataset.jsInitialized) return;
    section.dataset.jsInitialized = "true";

    try {
      var links = section.querySelectorAll('a');
      links.forEach(function (link) {
        if (!link || link.dataset.jsBound) return;
        link.dataset.jsBound = "true";
      });
    } catch (error) {
      console.error('CaseStudyContentSection block init error:', error);
    }
  }

  /* ---
     INIT ALL BLOCKS
  ---- */
  function initAllCaseStudyContentSections() {
    document.querySelectorAll('.case-study-content-section-section')
      .forEach(function (section) {
        try {
          initCaseStudyContentSection(section);
        } catch (e) {
          console.error('CaseStudyContentSection section init error:', e);
        }
      });
  }

  /* ---
     FRONTEND LOAD
  ---- */
  if (!document.body.classList.contains('block-editor-page')) {
    document.addEventListener('DOMContentLoaded', function () {
      try {
        initAllCaseStudyContentSections();
      } catch (e) {
        console.error('CaseStudyContentSection load error:', e);
      }
    });
  }

  /* ---
     ACF EDITOR PREVIEW
  ---- */
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=case-study-content-section', function ($block) {
      try {
        if ($block && $block[0]) initCaseStudyContentSection($block[0]);
      } catch (e) {
        console.error('CaseStudyContentSection preview error:', e);
      }
    });
  }

  /* ---
     GUTENBERG RERENDER WATCHER
  ---- */
  var observer = new MutationObserver(function () {
    try {
      initAllCaseStudyContentSections();
    } catch (e) {
      console.error('CaseStudyContentSection rerender error:', e);
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

})();
